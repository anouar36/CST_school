document.getElementById("searchInput").addEventListener("keyup", function() {
    let query = this.value;

    // Setup AJAX request
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/search/users/" + encodeURIComponent(query), true);
    console.log("Searching for:", query);
    console.log("/search/users/" + encodeURIComponent(query));
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the table with the new results
            console.log(xhr.responseText)
            let response = JSON.parse(xhr.responseText);

            let tableBody = document.querySelector('#userTable tbody');
  
            tableBody.innerHTML = ''; // Clear existing rows
            
            // Loop through the response and populate the table
            response.forEach(user => {
                let row = `
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User avatar">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">${user.name}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400">${user.email}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            ${user.isActive ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">Active</span>' : '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400">Not Active</span>'}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400">Verified</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            ${user.is_block ? `<a href="/block/user/${user.id}">
                                <button class="text-green-600 dark:text-green-400 hover:text-red-900 dark:hover:text-green-300 px-2 py-1 rounded hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors duration-150">UnBlock</button>
                            </a>` : `<a href="/unblock/user/${user.id}">
                                <button class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 px-2 py-1 rounded hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150">Block</button>
                            </a>`}
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        }
    };
    xhr.send();
});