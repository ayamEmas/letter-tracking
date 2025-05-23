<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TRACE Systems') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
                100% { transform: translateY(0px); }
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes slideIn {
                from { transform: translateX(-50px); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            .floating {
                animation: float 6s ease-in-out infinite;
            }
            .fade-in {
                animation: fadeIn 1s ease-out forwards;
            }
            .slide-in {
                animation: slideIn 1s ease-out forwards;
            }
            .glow {
                text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
            }
            .card-glow {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.2);
            }
            .glass-effect {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }
            .particle {
                position: absolute;
                width: 6px;
                height: 6px;
                background: rgba(255, 255, 255, 0.5);
                border-radius: 50%;
                pointer-events: none;
            }
        </style>
    </head>
    <body class="min-h-screen flex flex-col md:flex-row items-center justify-center font-sans bg-cover bg-center bg-no-repeat relative" style="background-image: url('/image/bg.jpg');">
        <!-- Dark overlay with blur -->
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>
        
        <!-- Floating Particles -->
        <div id="particles" class="fixed inset-0 pointer-events-none"></div>
        
        <div class="flex flex-col md:flex-row items-center w-full px-4 md:px-0 relative z-10 justify-center">
            
            <div class="w-full max-w-md p-6 glass-effect rounded-xl shadow-xl md:ml-auto md:mr-8 card-glow fade-in">
                <div class="flex justify-center mb-4">
                    <a href="/">
                        <x-application-logo class="w-16 h-16 md:w-20 md:h-20 fill-current text-gray-500" />
                    </a>
                </div>
                {{ $slot }}
            </div>
            <div class="text-center text-white mb-8 md:mb-0 md:ml-8 md:mr-auto slide-in">
                <h1 class="text-3xl md:text-6xl font-bold mb-6 glow floating">TRACE Systems</h1>
                <div class="space-y-2">
                    <h2 class="text-2xl md:text-4xl font-normal">(Tracking Records</h2>
                    <h2 class="text-2xl md:text-4xl font-normal">And Correspondence Efficiently)</h2>
                </div>
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
