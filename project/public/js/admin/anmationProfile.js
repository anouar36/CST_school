   // Theme toggle functionality
   const themeToggle = document.getElementById('theme-toggle');
   const htmlElement = document.documentElement;
   
   // Check for saved theme preference or use system preference
   const savedTheme = localStorage.getItem('theme');
   if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
     htmlElement.classList.add('dark');
   }
   
   // Toggle theme
   themeToggle.addEventListener('click', () => {
     htmlElement.classList.toggle('dark');
     localStorage.setItem('theme', htmlElement.classList.contains('dark') ? 'dark' : 'light');
   });
   
   // Mobile menu functionality
   const mobileMenuButton = document.getElementById('mobile-menu-button');
   const sidebar = document.getElementById('sidebar');
   const mobileOverlay = document.getElementById('mobile-overlay');
   
   mobileMenuButton.addEventListener('click', () => {
     sidebar.classList.toggle('-translate-x-full');
     mobileOverlay.classList.toggle('hidden');
   });
   
   mobileOverlay.addEventListener('click', () => {
     sidebar.classList.add('-translate-x-full');
     mobileOverlay.classList.add('hidden');
   });
   
   // Profile dropdown functionality
   const profileButton = document.getElementById('profile-button');
   const profileMenu = document.getElementById('profile-menu');
   
   profileButton.addEventListener('click', () => {
     profileMenu.classList.toggle('hidden');
   });
   
   // Close dropdown when clicking outside
   document.addEventListener('click', (event) => {
     const isClickInside = profileButton.contains(event.target) || profileMenu.contains(event.target);
     if (!isClickInside && !profileMenu.classList.contains('hidden')) {
       profileMenu.classList.add('hidden');
     }
   });


   // Profile image update hover functionality
   const profileImageContainer = document.getElementById('profile-image-container');
   const profileUpdateOverlay = document.getElementById('profile-update-overlay');

   profileImageContainer.addEventListener('mouseenter', () => {
     profileUpdateOverlay.classList.remove('hidden');
     profileUpdateOverlay.classList.add('flex');
   });

   profileImageContainer.addEventListener('mouseleave', () => {
     profileUpdateOverlay.classList.add('hidden');
     profileUpdateOverlay.classList.remove('flex');
   });