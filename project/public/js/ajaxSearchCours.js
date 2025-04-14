console.log("AJAX Search Cours Script Loaded");
document.getElementById("bb").addEventListener("keyup", function() {

    let query = this.value;
    console.log("Query:", query);

    // Setup AJAX request
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/search/student/cours/" + encodeURIComponent(query), true);
    console.log("Searching for:", query);
    console.log("/search/student/cours/" + encodeURIComponent(query));
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the table with the new results
            console.log(xhr.responseText)
            let response = JSON.parse(xhr.responseText);

            // let tableBody = document.querySelector('#userTable tbody');
            let body = document.getElementById('cours');
  
            body.innerHTML = ''; // Clear existing rows
            
            // Loop through the response and populate the table
            response.forEach(course => {
                let courseHTML = `
                <div class="bg-white rounded-lg shadow overflow-hidden mb-4">
                    <div class="flex flex-col md:flex-row">
                        <div class="relative h-48 md:h-auto md:w-64 flex-shrink-0">
                            <video class="object-cover w-full h-full" width="640" height="360" controls>
                                <source src="../../../public/assets/Video/${course.content}" type="video/mp4">
                            </video>
                        </div>
                        <div class="p-6 flex-1">
                            <div class="flex flex-wrap gap-2 mb-2">
                                <span class="px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full">${course.category.name}</span>
                            </div>

                            <a href="/course/details/${course.id }" class="text-xl font-semibold hover:text-teal-500 transition-colors">
                                ${course.course_name}
                            </a>
                            <p class="text-sm text-gray-500 mt-1">
                                ${course.teacher.name}
                            </p>
                            <p class="text-gray-700 mt-3 mb-4"> ${course.description}</p>
                            <div class="flex flex-wrap items-center justify-between">
                                <div class="flex items-center mb-2 md:mb-0">
                                    <div class="flex items-center">
                                        <i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i>
                                        <span class="ml-1 text-sm font-medium">
                                            4.8
                                        </span>
                                    </div>
                                    <span class="text-sm text-gray-500 ml-1">
                                        (245 reviews)
                                    </span>
                                    <span class="mx-2 text-gray-300">|</span>
                                    <span class="text-sm text-gray-500">
                                        ${course.participants} students
                                    </span>
                                    <span class="mx-2 text-gray-300">|</span>
                                    <span class="text-sm text-gray-500">
                                        ${course.start_date} hours
                                    </span>
                                </div>
                                <div class="font-bold text-lg">
                                    ${course.price} MAD
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

                body.innerHTML += courseHTML;
          
  });
   }
    };
    xhr.send();
});


      
  
   