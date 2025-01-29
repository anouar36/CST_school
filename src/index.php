cd <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Courses</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Header Section -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between p-4">
            <h1 class="text-2xl font-bold text-blue-500">Onlearning</h1>
            <nav>
                <ul class="flex space-x-4 text-gray-600">
                    <li><a href="#" class="hover:text-blue-500">Home</a></li>
                    <li><a href="#" class="hover:text-blue-500">Courses</a></li>
                    <li><a href="#" class="hover:text-blue-500">About</a></li>
                    <li><a href="#" class="hover:text-blue-500">Contact</a></li>
                </ul>
            </nav>
            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">Login</button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-100 py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-4xl font-bold text-blue-600">Grow your skills with Onlearning</h2>
                <p class="mt-4 text-gray-700">Take online courses and improve your knowledge anytime, anywhere.</p>
                <button class="mt-6 px-6 py-2 bg-blue-500 text-white rounded-lg">Explore Courses</button>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="https://via.placeholder.com/400" alt="Hero Image" class="mx-auto">
            </div>
        </div>
    </section>

    <!-- Popular Courses Section -->
    <section class="py-12">
        <div class="container mx-auto">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Popular Courses</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Course Card -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://via.placeholder.com/300" alt="Course Image" class="w-full rounded-lg">
                    <h4 class="mt-4 text-lg font-bold">Course Title</h4>
                    <p class="text-gray-600">Short description of the course.</p>
                    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Learn More</button>
                </div>
                <!-- Duplicate the above div for more cards -->
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Courses Category</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                    <h4 class="font-bold">Category Name</h4>
                </div>
                <!-- Duplicate for more categories -->
            </div>
        </div>
    </section>

    <!-- Student ID Section -->
    <section class="py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
                <h3 class="text-2xl font-bold text-gray-800">Get Your Student ID Card</h3>
                <p class="mt-4 text-gray-600">Sign up today and enjoy exclusive benefits with our student ID card.</p>
                <button class="mt-6 px-6 py-2 bg-blue-500 text-white rounded-lg">Get Started</button>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="https://via.placeholder.com/400" alt="Student ID" class="mx-auto">
            </div>
        </div>
    </section>

    <!-- Staff Training Section -->
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="https://via.placeholder.com/400" alt="Staff Training" class="mx-auto">
            </div>
            <div class="md:w-1/2">
                <h3 class="text-2xl font-bold text-gray-800">Staff Training</h3>
                <p class="mt-4 text-gray-600">Improve your team's skills with our professional training courses.</p>
                <button class="mt-6 px-6 py-2 bg-blue-500 text-white rounded-lg">Learn More</button>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto flex justify-between">
            <p>&copy; 2025 Onlearning. All rights reserved.</p>
            <ul class="flex space-x-4">
                <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                <li><a href="#" class="hover:underline">Terms of Service</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
