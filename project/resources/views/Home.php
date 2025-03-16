<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOTC - Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="/login"><button class="bg-white text-teal-500 px-6 py-2 rounded-full hover:bg-teal-100">Login</button></a>
                <a href=""><button class="bg-white text-teal-500 px-6 py-2 rounded-full hover:bg-teal-100">Sign Up</button>
                </a>
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
                <img src="/api/placeholder/400/500" alt="Student with books" class="relative z-10 rounded-lg mx-auto" />
                
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
                
                <div class="absolute bottom-1/3 left-1/4 bg-white p-3 rounded-lg shadow-lg z-20">
                    <div class="flex items-center mb-2">
                        <img src="/api/placeholder/40/40" alt="User" class="rounded-full" />
                        <div class="ml-3">
                            <p class="text-gray-800 font-semibold">User Experience Class</p>
                            <p class="text-gray-600 text-sm">Today at 12:00 PM</p>
                        </div>
                    </div>
                    <button class="bg-pink-500 text-white px-4 py-1 rounded-full text-sm w-full">Join Now</button>
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
                <h3 class="text-4xl font-bold text-blue-500">15K+</h3>
                <p class="text-gray-600">Students</p>
            </div>
            <div class="flex flex-col items-center">
                <h3 class="text-4xl font-bold text-blue-500">75%</h3>
                <p class="text-gray-600">Total success</p>
            </div>
            <div class="flex flex-col items-center">
                <h3 class="text-4xl font-bold text-blue-500">35</h3>
                <p class="text-gray-600">Main questions</p>
            </div>
            <div class="flex flex-col items-center">
                <h3 class="text-4xl font-bold text-blue-500">26</h3>
                <p class="text-gray-600">Chief experts</p>
            </div>
            <div class="flex flex-col items-center">
                <h3 class="text-4xl font-bold text-blue-500">16</h3>
                <p class="text-gray-600">Years of experience</p>
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
</body>
</html>