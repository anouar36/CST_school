<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOTC - Login</title>
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
<body class="font-sans bg-gray-50">
  <!-- Navigation -->
  <nav class="bg-teal-400 text-white py-4 px-6">
    <div class="container mx-auto flex justify-between items-center">
      <a href="index.html" class="font-bold text-2xl">TOTC</a>
      <div class="hidden md:flex space-x-8">
        <a href="index.html" class="hover:text-teal-200">Home</a>
        <a href="#" class="hover:text-teal-200">Courses</a>
        <a href="#" class="hover:text-teal-200">Careers</a>
        <a href="#" class="hover:text-teal-200">Blog</a>
        <a href="#" class="hover:text-teal-200">About Us</a>
      </div>
      <div class="flex space-x-4">
        <a href="login.html"><button class="bg-white text-teal-500 px-6 py-2 rounded-full hover:bg-teal-100">Login</button></a>
        <a href="register.html"><button class="bg-white text-teal-500 px-6 py-2 rounded-full hover:bg-teal-100">Sign Up</button></a>
      </div>
    </div>
  </nav>

  <!-- Login Section -->
  <section class="py-12 md:py-20">
    <div class="container mx-auto px-6">
      <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="md:flex">
          <!-- Left Side - Image and Info -->
          <div class="md:w-1/2 bg-teal-400 text-white p-12 flex flex-col justify-center relative overflow-hidden">
            <div class="relative z-10">
              <h2 class="text-3xl font-bold mb-4">Welcome Back!</h2>
              <p class="mb-6">Sign in to continue your learning journey with TOTC's premium courses and resources.</p>
              <div class="flex items-center mb-8">
                <div class="bg-white rounded-full p-2 mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <span>Access to 15K+ courses</span>
              </div>
              <div class="flex items-center mb-8">
                <div class="bg-white rounded-full p-2 mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <span>Learn from expert instructors</span>
              </div>
              <div class="flex items-center">
                <div class="bg-white rounded-full p-2 mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <span>Track your progress</span>
              </div>
            </div>
            
            <!-- Decorative elements -->
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-teal-300 rounded-full opacity-50"></div>
            <div class="absolute top-10 -left-10 w-24 h-24 bg-teal-300 rounded-full opacity-50"></div>
          </div>
          
          <!-- Right Side - Login Form -->
          <div class="md:w-1/2 p-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Sign In</h2>
            <p class="text-gray-600 mb-8">Don't have an account? <a href="register.html" class="text-teal-500 hover:underline">Sign up</a></p>
            
            <form method="POST" action="Login">
              <div class="mb-6">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-teal-500 focus:outline-none transition-colors" placeholder="your@email.com" required>
              </div>
              
              <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-teal-500 focus:outline-none transition-colors" placeholder="••••••••" required>
              </div>
              
              <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                  <input type="checkbox" id="remember_me" name="remember_me" class="h-4 w-4 text-teal-500 focus:ring-teal-400 border-gray-300 rounded">
                  <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>
                <a href="#" class="text-sm text-teal-500 hover:underline">Forgot password?</a>
              </div>
              
              <button type="submit" class="w-full bg-teal-500 text-white py-3 px-4 rounded-full hover:bg-teal-400 transition-colors font-medium">Sign In</button>
            </form>
            
            <div class="mt-8">
              <div class="relative">
                <div class="absolute inset-0 flex items-center">
                  <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                  <span class="px-2 bg-white text-gray-500">Or continue with</span>
                </div>
              </div>
              
              <div class="mt-6 grid grid-cols-3 gap-3">
                <a href="#" class="flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                  </svg>
                </a>
                
                <a href="#" class="flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a7 7 0 100 14 7 7 0 000-14zm0 1a6 6 0 100 12 6 6 0 000-12z" clip-rule="evenodd" />
                  </svg>
                </a>
                
                <a href="#" class="flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.879V12.89h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.989C16.343 19.129 20 14.99 20 10c0-5.523-4.477-10-10-10z" clip-rule="evenodd" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer -->
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