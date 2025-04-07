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
                refreshTable();
            }
        };
        xhr.open("GET", methode, true);
        xhr.send();

        // تحديث الزر بعد النقر الأول
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
            refreshTable();
        }
    };
    xhr.open("GET", methode, true);
    xhr.send();
}

function refreshTable() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/get/users", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let response = JSON.parse(xhr.responseText);
            let tableBody = document.querySelector("#userTable tbody");
            tableBody.innerHTML = '';

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
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${user.isActive ? 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400' : 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400'}">
                                ${user.isActive ? 'Active' : 'Not Active'}
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
                                value="${user.is_block ? '1' : '0'}"
                                onclick="handleClick(event)"
                                class="action-button ${user.is_block ? 'text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300 hover:bg-green-50 dark:hover:bg-green-900/20' : 'text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20'} px-2 py-1 rounded transition-colors duration-150">
                                ${user.is_block ? 'Unblock' : 'Block'}
                            </button>
                        </td>
                    </tr>`;
                tableBody.innerHTML += row;
            });
        }
    };
    xhr.send();
}
