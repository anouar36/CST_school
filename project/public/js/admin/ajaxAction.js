document.addEventListener("DOMContentLoaded", function() {
    let tableBody = document.querySelector("#userTable tbody");
    
    tableBody.addEventListener("click", function(event) {

        let button = event.target.closest(".action-button");
        if (!button) return;

        let action = parseInt(button.value);
        let userId = button.getAttribute("data-user-id");

        let methode = action === 1 ? `unblock/user/${encodeURIComponent(userId)}` : `block/user/${encodeURIComponent(userId)}`;
        console.log("Executing:", methode);

        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr);
                console.log('Action successful');
                refreshRow( userId );
            }
        };
        xhr.open("GET", methode, true);
        xhr.send();

        button.setAttribute("onclick", "handleClick(event)");
    });
});

function handleClick(event) {
    let button = event.target;
    let userId = button.getAttribute("data-user-id");
    let action = parseInt(button.value);

    let methode = action === 1 ? `unblock/user/${encodeURIComponent(userId)}` : `block/user/${encodeURIComponent(userId)}`;
    console.log("Executing:", methode);

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr);
            console.log('Action successful');
            refreshRow(userId);
        }
    };
    xhr.open("GET", methode, true);
    xhr.send();
}

function refreshRow(userId) {
    console.log('Refreshing row for user ID:', userId);
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/get/user/" + userId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let response = JSON.parse(xhr.responseText);
            let user = response.data;

            let row = document.getElementById(`user-id-${userId}`);
            if (!row) return;

            const isActive = user.isActive;
            const isBlocked = user.isBlocked;

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full object-cover" src="../../../public/assets/images/${user.image}" alt="User avatar">
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
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${
                      isActive
                          ? 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400'
                          : 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400'
                  }">
                    ${isActive ? 'Active' : 'Not Active'}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400">
                    Verified
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button 
                    data-user-id="${user.id}"
                    value="${isBlocked ? '0' : '1'}"
                    class="action-button ${
                        isBlocked 
                        ? 'text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300 hover:bg-green-50 dark:hover:bg-green-900/20'
                        : 'text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20'
                    } px-2 py-1 rounded transition-colors duration-150">
                    ${isBlocked ? 'Unblock' : 'Block'}
                  </button>
                </td>
            `;
        }
    };
    xhr.send();
}
