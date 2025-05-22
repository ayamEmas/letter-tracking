<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parking System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-park {
            background-image: url('/image/bg-park.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        .bg-park::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        .content-wrapper {
            position: relative;
            z-index: 1;
        }
        .btn-hover-effect {
            transition: all 0.3s ease;
        }
        .btn-hover-effect:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .nav-buttons {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="bg-park min-h-screen">
    <!-- Navigation with Login/Register -->
    <nav class="nav-buttons fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end items-center h-16">
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" 
                       class="btn-hover-effect px-6 py-2 bg-white/20 text-white rounded-full font-medium hover:bg-white/30">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Login
                        </span>
                    </a>
                    <a href="{{ route('register') }}" 
                       class="btn-hover-effect px-6 py-2 bg-blue-600 text-white rounded-full font-medium hover:bg-blue-700">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Register
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content-wrapper min-h-screen flex items-center justify-center">
        <div class="text-center px-4">
            <h1 class="text-6xl font-bold text-white mb-4 tracking-tight">
                Smart<span class="text-blue-400">Park</span>
            </h1>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                Intelligent Parking Management System
            </p>
            
            <!-- Feature Highlights -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto mt-12">
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <h3 class="text-white text-lg font-semibold mb-2">Quick Parking</h3>
                    <p class="text-gray-300">Find and reserve parking spots instantly</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-white text-lg font-semibold mb-2">Real-time Updates</h3>
                    <p class="text-gray-300">Get live parking space availability</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <h3 class="text-white text-lg font-semibold mb-2">Secure System</h3>
                    <p class="text-gray-300">Your parking experience is our priority</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
