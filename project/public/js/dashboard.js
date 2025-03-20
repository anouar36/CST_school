// Sample user data
// مصفوفة المستخدمين - تحتوي على بيانات المستخدمين النموذجية
const users = [
    {
        id: 1,
        name: "John Smith",
        email: "john.smith@example.com",
        role: "Student", // طالب
        status: "active", // نشط
        image: "https://randomuser.me/api/portraits/men/32.jpg"
    },
    {
        id: 2,
        name: "Emma Johnson",
        email: "emma.johnson@example.com",
        role: "Teacher", // مدرس
        status: "active", // نشط
        image: "https://randomuser.me/api/portraits/women/44.jpg"
    },
    {
        id: 3,
        name: "Michael Brown",
        email: "michael.brown@example.com",
        role: "Student", // طالب
        status: "inactive", // غير نشط
        image: "https://randomuser.me/api/portraits/men/22.jpg"
    },
    {
        id: 4,
        name: "Olivia Davis",
        email: "olivia.davis@example.com",
        role: "Admin", // مسؤول
        status: "active", // نشط
        image: "https://randomuser.me/api/portraits/women/28.jpg"
    },
    {
        id: 5,
        name: "William Wilson",
        email: "william.wilson@example.com",
        role: "Student", // طالب
        status: "inactive", // غير نشط
        image: "https://randomuser.me/api/portraits/men/42.jpg"
    },
    {
        id: 6,
        name: "Sophia Martinez",
        email: "sophia.martinez@example.com",
        role: "Teacher", // مدرس
        status: "active", // نشط
        image: "https://randomuser.me/api/portraits/women/17.jpg"
    }
];

// دالة لعرض جدول المستخدمين - تقوم بإنشاء وتعبئة جدول بيانات المستخدمين
function renderUsersTable(usersData) {
    // الحصول على عنصر جسم الجدول
    const tableBody = document.getElementById('usersTableBody');
    // مسح محتوى الجدول الحالي
    tableBody.innerHTML = '';

    // التكرار على كل مستخدم وإنشاء صف في الجدول
    usersData.forEach(user => {
        // إنشاء صف جديد
        const row = document.createElement('tr');
        
        // خلية معلومات المستخدم - تحتوي على الصورة والاسم
        const userInfoCell = document.createElement('td');
        userInfoCell.innerHTML = `
            <div class="user-info">
                <div class="user-avatar">
                    <img src="${user.image}" alt="${user.name}">
                </div>
                <div>
                    <div class="user-name">${user.name}</div>
                </div>
            </div>
        `;
        
        // خلية البريد الإلكتروني
        const emailCell = document.createElement('td');
        emailCell.innerHTML = `<div class="user-email">${user.email}</div>`;
        
        // خلية الدور (طالب، مدرس، مسؤول)
        const roleCell = document.createElement('td');
        roleCell.textContent = user.role;
        
        // خلية الحالة (نشط أو غير نشط)
        const statusCell = document.createElement('td');
        const statusClass = user.status === 'active' ? 'status-active' : 'status-inactive';
        statusCell.innerHTML = `
            <div class="user-status ${statusClass}">
                <i class="bx bxs-circle"></i>
                ${user.status === 'active' ? 'Active' : 'Inactive'}
            </div>
        `;
        
        // خلية الإجراءات - تحتوي على أزرار التعديل والحظر/إلغاء الحظر
        const actionsCell = document.createElement('td');
        actionsCell.innerHTML = `
            <div class="action-icons">
                <div class="action-icon edit" title="Edit User">
                    <i class="bx bx-edit"></i>
                </div>
                <div class="action-icon ${user.status === 'active' ? 'block' : 'unblock'}" 
                     title="${user.status === 'active' ? 'Block User' : 'Unblock User'}"
                     onclick="toggleUserStatus(${user.id}, this)">
                    <i class="bx ${user.status === 'active' ? 'bx-block' : 'bx-check-circle'}"></i>
                </div>
            </div>
        `;
        
        // إضافة الخلايا إلى الصف
        row.appendChild(userInfoCell);
        row.appendChild(emailCell);
        row.appendChild(roleCell);
        row.appendChild(statusCell);
        row.appendChild(actionsCell);
        
        // إضافة الصف إلى جسم الجدول
        tableBody.appendChild(row);
    });
}

// دالة لتبديل حالة المستخدم بين نشط وغير نشط
function toggleUserStatus(userId, element) {
    // البحث عن المستخدم في المصفوفة
    const userIndex = users.findIndex(user => user.id === userId);
    if (userIndex !== -1) {
        // تبديل الحالة
        users[userIndex].status = users[userIndex].status === 'active' ? 'inactive' : 'active';
        
        // تحديث واجهة المستخدم
        const row = element.closest('tr');
        const statusCell = row.querySelector('.user-status');
        const statusIcon = element.querySelector('i');
        
        // إذا كان المستخدم نشطًا، قم بتحديث العناصر لتعكس ذلك
        if (users[userIndex].status === 'active') {
            statusCell.className = 'user-status status-active';
            statusCell.innerHTML = '<i class="bx bxs-circle"></i> Active';
            element.className = 'action-icon block';
            element.title = 'Block User';
            statusIcon.className = 'bx bx-block';
        } else {
            // إذا كان المستخدم غير نشط، قم بتحديث العناصر لتعكس ذلك
            statusCell.className = 'user-status status-inactive';
            statusCell.innerHTML = '<i class="bx bxs-circle"></i> Inactive';
            element.className = 'action-icon unblock';
            element.title = 'Unblock User';
            statusIcon.className = 'bx bx-check-circle';
        }
    }
}

// وظيفة البحث - تصفية المستخدمين بناءً على مدخلات البحث
document.getElementById('searchUsers').addEventListener('input', function(e) {
    // الحصول على مصطلح البحث وتحويله إلى أحرف صغيرة
    const searchTerm = e.target.value.toLowerCase();
    // تصفية المستخدمين الذين يتطابقون مع مصطلح البحث
    const filteredUsers = users.filter(user => 
        user.name.toLowerCase().includes(searchTerm) || 
        user.email.toLowerCase().includes(searchTerm) ||
        user.role.toLowerCase().includes(searchTerm)
    );
    // عرض المستخدمين المصفاة
    renderUsersTable(filteredUsers);
});

// وظائف بطاقة الملف الشخصي - تتعامل مع تفاعلات المستخدم مع بطاقة الملف الشخصي
document.addEventListener('DOMContentLoaded', function() {
    // الحصول على العناصر
    const avatar = document.getElementById('profileAvatar');
    const card = document.getElementById('profileCard');
    const closeBtn = document.getElementById('closeProfileCard');
    const imageUpload = document.getElementById('imageUpload');
    const profileImg = document.getElementById('profileImage');
    const cardImg = document.getElementById('profileCardImage');
    
    // تبديل عرض البطاقة عند النقر على الصورة الرمزية
    avatar.onclick = function() {
        card.style.display = card.style.display === 'none' || card.style.display === '' ? 'block' : 'none';
    };
    
    // إغلاق البطاقة عند النقر على زر الإغلاق
    closeBtn.onclick = function() {
        card.style.display = 'none';
    };
    
    // التعامل مع تحميل الصورة
    document.getElementById('profileImageOverlay').onclick = function() {
        imageUpload.click();
    };
    
    // تحديث الصور عند اختيار ملف
    imageUpload.onchange = function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // تحديث صورة الملف الشخصي وصورة البطاقة
                profileImg.src = e.target.result;
                cardImg.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    };
    
    // التعامل مع أزرار التعديل
    document.querySelectorAll('.edit-btn').forEach(function(btn) {
        btn.onclick = function() {
            const field = this.getAttribute('data-field');
            // إخفاء قيمة الحقل وإظهار حقل التحرير
            document.getElementById(`${field}Value`).style.display = 'none';
            document.getElementById(`${field}Edit`).style.display = 'flex';
        };
    });
    
    // التعامل مع أزرار الحفظ
    document.querySelectorAll('.save-btn').forEach(function(btn) {
        btn.onclick = function() {
            const field = this.getAttribute('data-field');
            const value = document.getElementById(`${field}Input`).value;
            const valueEl = document.getElementById(`${field}Value`);
            
            // تحديث القيمة إذا تم إدخال قيمة جديدة
            if (value) {
                valueEl.textContent = field === 'password' ? '••••••••' : value;
                
                // تحديث الاسم في الترويسة إذا تم تغيير الاسم
                if (field === 'name') {
                    document.getElementById('userName').childNodes[0].nodeValue = value + '!';
                }
            }
            
            // إظهار قيمة الحقل وإخفاء حقل التحرير
            document.getElementById(`${field}Value`).style.display = 'block';
            document.getElementById(`${field}Edit`).style.display = 'none';
        };
    });
    
    // إغلاق البطاقة عند النقر خارجها
    document.onclick = function(e) {
        if (!card.contains(e.target) && e.target !== avatar && !avatar.contains(e.target)) {
            card.style.display = 'none';
        }
    };
    
    // إخفاء جميع حقول التحرير في البداية
    document.querySelectorAll('.field-edit').forEach(function(el) {
        el.style.display = 'none';
    });

    // تهيئة جدول المستخدمين
    renderUsersTable(users);
});
