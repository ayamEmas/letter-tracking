<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TRACE System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .bg-park {
            background-image: url('/image/bg.jpg');
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
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        .pulse {
            animation: pulse 2s ease-in-out infinite;
        }
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        .feature-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .feature-card:hover::before {
            opacity: 1;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            pointer-events: none;
        }
        .glow {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
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
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content-wrapper min-h-screen flex items-center justify-center">
        <div class="text-center px-4">
            <div class="floating">
                <h1 class="text-6xl font-bold text-white mb-4 tracking-tight glow">
                    <span class="text-blue-400">TRACE</span>
                </h1>
            </div>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl mx-auto fade-in">
                Tracking Records And Correspondence Efficiently
            </p>
            
            <!-- Feature Highlights -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto mt-12">
                <div class="feature-card bg-white/10 backdrop-blur-lg rounded-xl p-6 fade-in" style="animation-delay: 0.2s">
                    <div class="pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-white text-lg font-semibold mb-2">Efficient Tracking</h3>
                    <p class="text-gray-300">Track and manage records with ease</p>
                </div>
                
                <div class="feature-card bg-white/10 backdrop-blur-lg rounded-xl p-6 fade-in" style="animation-delay: 0.4s">
                    <div class="pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-white text-lg font-semibold mb-2">Smart Records</h3>
                    <p class="text-gray-300">Organize and access correspondence efficiently</p>
                </div>
                
                <div class="feature-card bg-white/10 backdrop-blur-lg rounded-xl p-6 fade-in" style="animation-delay: 0.6s">
                    <div class="pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-white text-lg font-semibold mb-2">Secure System</h3>
                    <p class="text-gray-300">Your data security is our priority</p>
                </div>
            </div>

            <!-- Floating Particles -->
            <div id="particles" class="fixed inset-0 pointer-events-none"></div>
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const container = document.getElementById('particles');
            const particleCount = 20;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Random position
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                
                // Random animation
                particle.style.animation = `float ${5 + Math.random() * 5}s ease-in-out infinite`;
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                container.appendChild(particle);
            }
        }

        // Initialize particles when page loads
        window.addEventListener('load', createParticles);
    </script>
</body>
</html>
