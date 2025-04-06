<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOTC - Premium Learning Platform</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            teal: {
              400: "#38B2AC",
              500: "#319795"
            },
            orange: {
              400: "#F6AD55"
            }
          }
        }
      }
    }
  </script>
  <link href="https://unpkg.com/lucide-icons/dist/umd/lucide.css" rel="stylesheet">
</head>
<body class="font-sans">
  <!-- Hero Section with Navigation -->
  <div class="bg-teal-400 text-white relative overflow-hidden">
    <!-- Navigation -->
    <nav class="container mx-auto py-4 px-6 flex justify-between items-center">
      <div class="font-bold text-2xl">TOTC</div>
      <div class="hidden md:flex space-x-8">
        <a href="#" class="hover:text-teal-200">Home</a>
        <a href="#" class="hover:text-teal-200">Courses</a>
        <a href="#" class="hover:text-teal-200">Careers</a>
        <a href="#" class="hover:text-teal-200">Blog</a>
        <a href="#" class="hover:text-teal-200">About Us</a>
      </div>
      <div class="flex space-x-4">
        <a href="login"><button class="bg-white text-teal-500 px-6 py-2 rounded-full hover:bg-teal-100">Login</button></a>
        <a href="register.html"><button class="bg-white text-teal-500 px-6 py-2 rounded-full hover:bg-teal-100">Sign Up</button></a>
      </div>
    </nav>

    <!-- Hero Content -->
    <div class="container mx-auto px-6 pb-24 pt-12 flex flex-col md:flex-row items-center">
      <!-- Left Content -->
      <div class="md:w-1/2 mb-12 md:mb-0">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
          <span class="text-orange-400">Studying</span> Online is now<br> much easier
        </h1>
        <p class="mb-8">
          TOTC is an interesting platform that will teach you in more an interactive way
        </p>
        <div class="flex space-x-4">
          <button class="bg-white text-teal-500 px-6 py-3 rounded-full font-bold hover:bg-teal-100">Join for free</button>
          <div class="flex items-center">
            <button class="bg-white rounded-full p-3 flex items-center justify-center hover:bg-teal-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </button>
            <span class="ml-2">Watch how it works</span>
          </div>
        </div>
      </div>
      
      <!-- Right Content with Student Image and Floating Cards -->
      <div class="md:w-1/2 relative">
        <img width="400" height="500" src="https://images.unsplash.com/photo-1608453162650-cba45689c284?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Student with books" class="relative z-10 rounded-lg mx-auto" />
        <!-- Floating Elements -->
        <div class="absolute top-1/4 left-0 bg-white p-3 rounded-lg shadow-lg z-20">
          <div class="flex items-center">
            <div class="bg-blue-100 p-2 rounded">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-gray-800 font-semibold">250k</p>
              <p class="text-gray-600 text-sm">Assisted Student</p>
            </div>
          </div>
        </div>
        
        <div class="absolute bottom-1/4 right-0 bg-white p-3 rounded-lg shadow-lg z-20">
          <div class="bg-pink-100 p-2 rounded mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </div>
          <p class="text-gray-800 font-semibold">Congratulations</p>
          <p class="text-gray-600 text-sm">Your admission completed</p>
        </div>
        
        
      </div>
    </div>
    
    <!-- Wave SVG for bottom curve -->
    <div class="absolute bottom-0 left-0 w-full">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120">
        <path fill="#ffffff" fill-opacity="1" d="M0,32L60,53.3C120,75,240,117,360,117.3C480,117,600,75,720,64C840,53,960,75,1080,80C1200,85,1320,75,1380,69.3L1440,64L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z"></path>
      </svg>
    </div>
  </div>

  <!-- Categories Section (from CourseVIP) -->
  <section class="py-12 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold mb-8 text-center">
        Browse by Category
      </h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="category/programming.html" class="bg-gray-100 hover:bg-gray-200 transition-colors rounded-lg p-6 text-center">
          <span class="font-medium">Programming</span>
        </a>
        <a href="category/design.html" class="bg-gray-100 hover:bg-gray-200 transition-colors rounded-lg p-6 text-center">
          <span class="font-medium">Design</span>
        </a>
        <a href="category/business.html" class="bg-gray-100 hover:bg-gray-200 transition-colors rounded-lg p-6 text-center">
          <span class="font-medium">Business</span>
        </a>
        <a href="category/marketing.html" class="bg-gray-100 hover:bg-gray-200 transition-colors rounded-lg p-6 text-center">
          <span class="font-medium">Marketing</span>
        </a>
        <a href="category/science.html" class="bg-gray-100 hover:bg-gray-200 transition-colors rounded-lg p-6 text-center">
          <span class="font-medium">Science</span>
        </a>
        <a href="category/languages.html" class="bg-gray-100 hover:bg-gray-200 transition-colors rounded-lg p-6 text-center">
          <span class="font-medium">Languages</span>
        </a>
        <a href="category/arts.html" class="bg-gray-100 hover:bg-gray-200 transition-colors rounded-lg p-6 text-center">
          <span class="font-medium">Arts</span>
        </a>
        <a href="category/mathematics.html" class="bg-gray-100 hover:bg-gray-200 transition-colors rounded-lg p-6 text-center">
          <span class="font-medium">Mathematics</span>
        </a>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-16 container mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold mb-4">Our Success</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Ornare id fames interdum porttitor nulla turpis etiam. Diam vitae sollicitudin at nec nam et pharetra gravida. Adipiscing a quis ultrices eu ornare tristique vel facilisis.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 text-center border border-gray-200 rounded-lg p-8">
      <div class="flex flex-col items-center">
        <h3 class="text-4xl font-bold text-teal-500">15K+</h3>
        <p class="text-gray-600">Students</p>
      </div>
      <div class="flex flex-col items-center">
        <h3 class="text-4xl font-bold text-teal-500">75%</h3>
        <p class="text-gray-600">Total success</p>
      </div>
      <div class="flex flex-col items-center">
        <h3 class="text-4xl font-bold text-teal-500">35</h3>
        <p class="text-gray-600">Main questions</p>
      </div>
      <div class="flex flex-col items-center">
        <h3 class="text-4xl font-bold text-teal-500">26</h3>
        <p class="text-gray-600">Chief experts</p>
      </div>
      <div class="flex flex-col items-center">
        <h3 class="text-4xl font-bold text-teal-500">16</h3>
        <p class="text-gray-600">Years of experience</p>
      </div>
    </div>
  </section>

  <!-- Featured Courses (from CourseVIP) -->
  <section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold">Featured Courses</h2>
        <a href="courses.html" class="text-teal-500 hover:underline">
          View All
        </a>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Course Card 1 -->
        <div class="bg-white rounded-lg shadow overflow-hidden transition-all hover:shadow-lg">
          <div class="relative h-48 w-full">
            <img
              src="https://placehold.co/350x200"
              alt="Web Development Masterclass"
              class="object-cover w-full h-full"
            />
          </div>
          <div class="p-4">
            <span class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full mb-2">Programming</span>
            <a href="courses/1.html">
              <h3 class="text-lg font-semibold hover:text-teal-500 transition-colors line-clamp-2">
                Web Development Masterclass
              </h3>
            </a>
            <p class="text-sm text-gray-500 mt-1">by John Doe</p>
            <div class="flex items-center mt-2">
              <div class="flex items-center">
                <i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i>
                <span class="ml-1 text-sm font-medium">4.8</span>
              </div>
              <span class="text-sm text-gray-500 ml-1">
                (245 reviews)
              </span>
            </div>
          </div>
          <div class="p-4 pt-0 flex items-center justify-between">
            <span class="font-bold">$89.99</span>
            <a href="courses/1.html">
              <span class="text-teal-500 hover:underline text-sm">
                View Course
              </span>
            </a>
          </div>
        </div>

        <!-- Course Card 2 -->
        <div class="bg-white rounded-lg shadow overflow-hidden transition-all hover:shadow-lg">
          <div class="relative h-48 w-full">
            <img
              src="https://placehold.co/350x200"
              alt="UI/UX Design Fundamentals"
              class="object-cover w-full h-full"
            />
          </div>
          <div class="p-4">
            <span class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full mb-2">Design</span>
            <a href="courses/2.html">
              <h3 class="text-lg font-semibold hover:text-teal-500 transition-colors line-clamp-2">
                UI/UX Design Fundamentals
              </h3>
            </a>
            <p class="text-sm text-gray-500 mt-1">by Jane Smith</p>
            <div class="flex items-center mt-2">
              <div class="flex items-center">
                <i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i>
                <span class="ml-1 text-sm font-medium">4.7</span>
              </div>
              <span class="text-sm text-gray-500 ml-1">
                (189 reviews)
              </span>
            </div>
          </div>
          <div class="p-4 pt-0 flex items-center justify-between">
            <span class="font-bold">$79.99</span>
            <a href="courses/2.html">
              <span class="text-teal-500 hover:underline text-sm">
                View Course
              </span>
            </a>
          </div>
        </div>

        <!-- Course Card 3 -->
        <div class="bg-white rounded-lg shadow overflow-hidden transition-all hover:shadow-lg">
          <div class="relative h-48 w-full">
            <img
              src="https://placehold.co/350x200"
              alt="Digital Marketing Strategy"
              class="object-cover w-full h-full"
            />
          </div>
          <div class="p-4">
            <span class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full mb-2">Marketing</span>
            <a href="courses/3.html">
              <h3 class="text-lg font-semibold hover:text-teal-500 transition-colors line-clamp-2">
                Digital Marketing Strategy
              </h3>
            </a>
            <p class="text-sm text-gray-500 mt-1">by Robert Johnson</p>
            <div class="flex items-center mt-2">
              <div class="flex items-center">
                <i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i>
                <span class="ml-1 text-sm font-medium">4.9</span>
              </div>
              <span class="text-sm text-gray-500 ml-1">
                (312 reviews)
              </span>
            </div>
          </div>
          <div class="p-4 pt-0 flex items-center justify-between">
            <span class="font-bold">$99.99</span>
            <a href="courses/3.html">
              <span class="text-teal-500 hover:underline text-sm">
                View Course
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Software Section -->
  <section class="py-16 container mx-auto px-6">
    <div class="text-center border border-gray-200 rounded-lg p-8">
      <h2 class="text-3xl font-bold mb-4">
        All-In-One <span class="text-teal-500">Cloud Software.</span>
      </h2>
      <p class="text-gray-600 max-w-3xl mx-auto mb-16">
        TOTC is one powerful online software suite that combines all the tools needed to run a successful school or office.
      </p>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        <div class="flex flex-col items-center">
          <div class="bg-blue-100 p-4 rounded-full mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold mb-2">Online Billing, Invoicing, & Contracts</h3>
          <p class="text-gray-600">Simple and secure control of your organization's financial and legal transactions.</p>
        </div>
        
        <div class="flex flex-col items-center">
          <div class="bg-teal-100 p-4 rounded-full mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold mb-2">Easy Scheduling & Attendance Tracking</h3>
          <p class="text-gray-600">Schedule and track appointments, classes, and events with ease.</p>
        </div>
        
        <div class="flex flex-col items-center">
          <div class="bg-indigo-100 p-4 rounded-full mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold mb-2">Customer & Student Management</h3>
          <p class="text-gray-600">Comprehensive solution for managing all your customer and student information.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer (from CourseVIP) -->
  <footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">TOTC</h3>
          <p class="text-gray-300">
            Premium learning platform for students and professionals.
          </p>
        </div>
        <div>
          <h4 class="font-bold mb-4">Quick Links</h4>
          <ul class="space-y-2">
            <li>
              <a href="courses.html" class="text-gray-300 hover:text-white">
                All Courses
              </a>
            </li>
            <li>
              <a href="exercises.html" class="text-gray-300 hover:text-white">
                Exercises
              </a>
            </li>
            <li>
              <a href="history.html" class="text-gray-300 hover:text-white">
                History
              </a>
            </li>
          </ul>
        </div>
        <div>
          <h4 class="font-bold mb-4">Support</h4>
          <ul class="space-y-2">
            <li>
              <a href="contact.html" class="text-gray-300 hover:text-white">
                Contact Us
              </a>
            </li>
            <li>
              <a href="faq.html" class="text-gray-300 hover:text-white">
                FAQ
              </a>
            </li>
            <li>
              <a href="help.html" class="text-gray-300 hover:text-white">
                Help Center
              </a>
            </li>
          </ul>
        </div>
        <div>
          <h4 class="font-bold mb-4">Subscribe</h4>
          <p class="text-gray-300 mb-2">
            Get the latest updates and offers
          </p>
          <div class="flex">
            <input
              type="email"
              placeholder="Your email"
              class="px-4 py-2 rounded-l-md w-full"
            />
            <button class="px-4 py-2 bg-teal-500 text-white rounded-r-md hover:bg-teal-400">Subscribe</button>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
        <p>&copy; <script>document.write(new Date().getFullYear())</script> TOTC. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</body>
</html>