<!DOCTYPE html>
<html lang="fr" x-data="{ mobileMenuOpen: false, darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Portfolio - Développeur Full Stack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        [x-cloak] { display: none !important; }
        html {
            scroll-behavior: smooth;
        }
        .skill-bar {
            transition: width 1.5s ease-in-out;
        }
        .project-card {
            transition: all 0.3s ease;
        }
        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        .fade-in {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .gradient-text {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, #4f46e5, #7c3aed);
        }
        
        /* Animation du header */
        header {
            background: linear-gradient(90deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.95) 100%);
            transition: all 0.5s ease;
        }
        .dark header {
            background: linear-gradient(90deg, rgba(17,24,39,0.9) 0%, rgba(17,24,39,0.95) 100%);
        }
        header.scrolled {
            background: rgba(255,255,255,0.98);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .dark header.scrolled {
            background: rgba(17,24,39,0.98);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans antialiased transition-colors duration-300">
    <!-- Header avec animation -->
    <header class="fixed w-full z-50 backdrop-blur-sm transition-all duration-500" 
            :class="{ 'scrolled': window.scrollY > 10 }"
            x-data="{ scrolled: false }"
            @scroll.window="scrolled = window.scrollY > 10"
            x-cloak>
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 hover:scale-105 transition-transform">HeavenCoder</a>
            
            <!-- Navigation Desktop -->
            <div class="hidden md:flex space-x-8">
                <a href="#about" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition hover:scale-105">À propos</a>
                <a href="#skills" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition hover:scale-105">Compétences</a>
                <a href="#projects" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition hover:scale-105">Projets</a>
                <a href="#services" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition hover:scale-105">Services</a>
                <a href="#contact" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition hover:scale-105">Contact</a>
            </div>
            
            <!-- Bouton Mode Sombre et Mobile -->
            <div class="flex items-center space-x-4">
                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" 
                        class="p-2 rounded-full focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition"
                        aria-label="Basculer entre mode clair et sombre">
                    <span x-show="!darkMode" class="text-gray-700 dark:text-gray-300"><i class="fas fa-moon"></i></span>
                    <span x-show="darkMode" class="text-yellow-300"><i class="fas fa-sun"></i></span>
                </button>
                
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="md:hidden p-2 rounded-full focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition"
                        aria-label="Menu mobile">
                    <span x-show="!mobileMenuOpen"><i class="fas fa-bars text-gray-700 dark:text-gray-300"></i></span>
                    <span x-show="mobileMenuOpen"><i class="fas fa-times text-gray-700 dark:text-gray-300"></i></span>
                </button>
            </div>
        </nav>
        
        <!-- Menu Mobile -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="md:hidden bg-white dark:bg-gray-800 shadow-lg py-4 px-6 rounded-lg mx-4 mt-2">
            <div class="flex flex-col space-y-4">
                <a href="#about" @click="mobileMenuOpen = false" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition py-2">À propos</a>
                <a href="#skills" @click="mobileMenuOpen = false" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition py-2">Compétences</a>
                <a href="#projects" @click="mobileMenuOpen = false" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition py-2">Projets</a>
                <a href="#services" @click="mobileMenuOpen = false" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition py-2">Services</a>
                <a href="#contact" @click="mobileMenuOpen = false" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition py-2">Contact</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center pt-20">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 fade-in" style="transform: translateY(20px);">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Bonjour, je suis <span class="gradient-text">Williams FIAGAN</span></h1>
                <h2 class="text-2xl md:text-3xl mb-6">Développeur Full Stack</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-8 text-lg">Je crée des applications web performantes avec des technologies modernes en frontend et backend.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#contact" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg text-center transition transform hover:scale-105 shadow-lg hover:shadow-indigo-500/50">Me contacter</a>
                    <a href="#projects" class="border border-indigo-600 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-gray-800 px-6 py-3 rounded-lg text-center transition transform hover:scale-105">Voir mes projets</a>
                    <a href="{{ asset('storage/CV williams.pdf') }}" download class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-3 rounded-lg text-center transition flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Télécharger CV
                    </a>
                </div>
                
               <!-- <div class="mt-8 flex space-x-4">
                    <div class="flex items-center">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800" alt="">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800" alt="">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800" alt="">
                        </div>
                        <span class="ml-3 text-sm text-gray-600 dark:text-gray-300">+15 clients satisfaits</span>
                    </div>
                </div>-->
            </div>
            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                         alt="Développeur web" 
                         class="w-full max-w-md rounded-xl shadow-2xl floating border-4 border-white dark:border-gray-800">
                    <div class="absolute -bottom-5 -right-5 bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-lg">
                        <span class="font-bold">2+ ans</span> d'expérience
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- À propos -->
    <section id="about" class="py-20 bg-white dark:bg-gray-800/50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 fade-in" style="transform: translateY(20px);">
                <h2 class="text-3xl font-bold mb-4">À propos de moi</h2>
                <div class="w-20 h-1 bg-indigo-600 mx-auto mb-6"></div>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Développeur Full Stack passionné, j'allie expertise Laravel et maîtrise des technologies front-end (JavaScript/Bootstrap) à un solide sens de l'organisation et du design, comme en témoignent mes projets personnels et professionnels</p>
            </div>
            
            <div class="flex flex-col md:flex-row items-center fade-in" style="transform: translateY(20px);">
                <div class="md:w-1/3 mb-10 md:mb-0 flex justify-center">
                    <div class="relative">
                        <img src="" 
                             alt="Photo de profil" 
                             class="rounded-full w-48 h-48 object-cover border-4 border-indigo-500 shadow-lg">
                        <div class="absolute -bottom-3 -right-3 bg-white dark:bg-gray-700 p-2 rounded-full shadow-md">
                            <div class="bg-indigo-600 text-white p-2 rounded-full">
                                <i class="fas fa-code text-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="md:w-2/3 md:pl-12">
                    <h3 class="text-2xl font-semibold mb-4">Mon parcours technique</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Développeur full stack avec 2 ans d'expérience, spécialisé dans les technologies PHP (Laravel, Symfony), avec une base en Java (Spring Boot), C# et les frameworks frontend modernes . J'ai travaillé sur divers projets allant des applications web aux API .
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center bg-gray-50 dark:bg-gray-700 p-3 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                                <i class="fas fa-briefcase text-indigo-600 dark:text-indigo-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Expérience</h4>
                                <p class="text-gray-600 dark:text-gray-400">2+ ans</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center bg-gray-50 dark:bg-gray-700 p-3 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                                <i class="fas fa-project-diagram text-indigo-600 dark:text-indigo-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Projets</h4>
                                <p class="text-gray-600 dark:text-gray-400">5+ réalisés</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center bg-gray-50 dark:bg-gray-700 p-3 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                                <i class="fas fa-code text-indigo-600 dark:text-indigo-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Spécialités</h4>
                                <p class="text-gray-600 dark:text-gray-400">Full Stack</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center bg-gray-50 dark:bg-gray-700 p-3 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-indigo-600 dark:text-indigo-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Localisation</h4>
                                <p class="text-gray-600 dark:text-gray-400">Lome, Togo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Compétences -->
    <section id="skills" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-4 fade-in" style="transform: translateY(20px);">Mes Compétences</h2>
            <div class="w-20 h-1 bg-indigo-600 mx-auto mb-12 fade-in" style="transform: translateY(20px);"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 fade-in" style="transform: translateY(20px);">
                <!-- Compétences Backend -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-semibold mb-6 flex items-center">
                        <div class="bg-indigo-100 dark:bg-indigo-900/30 p-2 rounded-full mr-3">
                            <i class="fas fa-server text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        Backend & Frameworks
                    </h3>
                    
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>PHP (Laravel/Symfony)</span>
                                <span>85%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Java (Spring Boot)</span>
                                <span>65%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 65%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>C# (.NET)</span>
                                <span>55%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 55%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>API REST</span>
                                <span>60%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Compétences Frontend -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-semibold mb-6 flex items-center">
                        <div class="bg-indigo-100 dark:bg-indigo-900/30 p-2 rounded-full mr-3">
                            <i class="fas fa-laptop-code text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        Frontend & Frameworks
                    </h3>
                    
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>HTML/CSS/Boostrap</span>
                                <span>90%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 90%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>JavaScript</span>
                                <span>60%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Tailwind</span>
                                <span>80%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 80%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Angular</span>
                                <span>40%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Bases de données & Outils -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-semibold mb-6 flex items-center">
                        <div class="bg-indigo-100 dark:bg-indigo-900/30 p-2 rounded-full mr-3">
                            <i class="fas fa-database text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        Bases de données & Outils
                    </h3>
                    
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>MySQL/PostgreSQL</span>
                                <span>90%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 90%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>MongoDB</span>
                                <span>75%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 75%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Git & DevOps</span>
                                <span>85%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Docker</span>
                                <span>80%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Autres Compétences -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-semibold mb-6 flex items-center">
                        <div class="bg-indigo-100 dark:bg-indigo-900/30 p-2 rounded-full mr-3">
                            <i class="fas fa-tools text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        Autres Compétences
                    </h3>
                    
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>UI/UX Design</span>
                                <span>70%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 70%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Tests unitaires</span>
                                <span>85%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Photoshop</span>
                                <span>60%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Adobe Suite</span>
                                <span>50%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full skill-bar" style="width: 50%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Technologies -->
            <div class="mt-16 fade-in" style="transform: translateY(20px);">
                <h3 class="text-xl font-semibold mb-6 text-center">Technologies Maîtrisées</h3>
                
                <div class="flex flex-wrap gap-4 justify-center">
                    <!-- Backend -->
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-php text-4xl text-purple-500 mb-2 group-hover:text-purple-600 transition"></i>
                        <span class="text-sm">PHP</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-laravel text-4xl text-red-500 mb-2 group-hover:text-red-600 transition"></i>
                        <span class="text-sm">Laravel</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fas fa-symfony text-4xl text-black dark:text-white mb-2 group-hover:text-gray-600 dark:group-hover:text-gray-300 transition"></i>
                        <span class="text-sm">Symfony</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-java text-4xl text-red-600 mb-2 group-hover:text-red-700 transition"></i>
                        <span class="text-sm">Java</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fas fa-leaf text-4xl text-green-600 mb-2 group-hover:text-green-700 transition"></i>
                        <span class="text-sm">Spring Boot</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-microsoft text-4xl text-blue-600 mb-2 group-hover:text-blue-700 transition"></i>
                        <span class="text-sm">C#</span>
                    </div>
                    
                    <!-- Frontend -->
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-js text-4xl text-yellow-500 mb-2 group-hover:text-yellow-600 transition"></i>
                        <span class="text-sm">JavaScript</span>
                    </div>
                    
                    <!-- Angular -->
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-angular text-4xl text-red-500 mb-2 group-hover:text-red-600 transition"></i>
                        <span class="text-sm">Angular</span>
                    </div>

                    <!-- Tailwind CSS -->
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fas fa-wind text-4xl text-cyan-500 mb-2 group-hover:text-cyan-600 transition"></i>
                        <span class="text-sm">Tailwind</span>
                    </div>

                    <!-- Bootstrap -->
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-bootstrap text-4xl text-purple-500 mb-2 group-hover:text-purple-600 transition"></i>
                        <span class="text-sm">Bootstrap</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-html5 text-4xl text-orange-500 mb-2 group-hover:text-orange-600 transition"></i>
                        <span class="text-sm">HTML5</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-css3-alt text-4xl text-blue-500 mb-2 group-hover:text-blue-600 transition"></i>
                        <span class="text-sm">CSS3</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-sass text-4xl text-pink-500 mb-2 group-hover:text-pink-600 transition"></i>
                        <span class="text-sm">Sass</span>
                    </div>
                    
                    <!-- Outils -->
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-git-alt text-4xl text-orange-600 mb-2 group-hover:text-orange-700 transition"></i>
                        <span class="text-sm">Git</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fab fa-docker text-4xl text-blue-400 mb-2 group-hover:text-blue-500 transition"></i>
                        <span class="text-sm">Docker</span>
                    </div>
                    
                    <div class="group bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg flex flex-col items-center w-24 hover:shadow-lg hover:-translate-y-1 transition">
                        <i class="fas fa-code-branch text-4xl text-blue-400 mb-2 group-hover:text-blue-500 transition"></i>
                        <span class="text-sm">API REST</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projets -->
    <section id="projects" class="py-20 bg-white dark:bg-gray-800/50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-4 fade-in" style="transform: translateY(20px);">Mes Projets Récents</h2>
            <div class="w-20 h-1 bg-indigo-600 mx-auto mb-12 fade-in" style="transform: translateY(20px);"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Projet 1 - API Laravel -->
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg project-card transition duration-300 fade-in" style="transform: translateY(20px);">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="API Laravel" 
                             class="w-full h-full object-cover hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <span class="bg-indigo-600 text-xs px-2 py-1 rounded">Backend</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">API REST avec Springboot</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4"> Développement d'une API robuste pour une application de gestion
                            .</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Spring Boot 3.x/Maven </span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">API REST</span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs"> Postman</span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">MySQL</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="https://github.com/williamsjeffersonfiagan/api.git" class="text-indigo-600 dark:text-indigo-400 font-medium hover:underline flex items-center group">
                                Voir les détails
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                            <a href="https://github.com/williamsjeffersonfiagan/api.git" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Projet 2 - Application lARAVEL -->
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg project-card transition duration-300 fade-in" style="transform: translateY(20px);">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Application laravel" 
                             class="w-full h-full object-cover hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <span class="bg-blue-400 text-xs px-2 py-1 rounded">Frontend</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Dashboard Admin avec Laravel</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Création d'un dashboard administratif avec Laravel pour la gestion d'un blog</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Laravel</span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Html</span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Tailwind</span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Sqlite</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="https://github.com/williamsjeffersonfiagan/conference.git" class="text-indigo-600 dark:text-indigo-400 font-medium hover:underline flex items-center group">
                                Voir les détails
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                            <a href="https://github.com/williamsjeffersonfiagan/conference.git" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Projet 3 - Symfony API -->
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg project-card transition duration-300 fade-in" style="transform: translateY(20px);">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" 
                             alt="API Symfony" 
                             class="w-full h-full object-cover hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <span class="bg-indigo-600 text-xs px-2 py-1 rounded">Backend</span>
                            <span class="bg-gray-600 text-xs px-2 py-1 rounded ml-2">Microservices</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Microservices avec Symfony</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Architecture microservices avec API Gateway, service discovery et Kafka.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Symfony</span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Microservices</span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Kafka</span>
                            <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-xs">Docker</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="https://github.com/williamsjeffersonfiagan/guestbook-app.git" class="text-indigo-600 dark:text-indigo-400 font-medium hover:underline flex items-center group">
                                Voir les détails
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                            <a href="https://github.com/williamsjeffersonfiagan/guestbook-app.git" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12 fade-in" style="transform: translateY(20px);">
                <a href="https://github.com/williamsjeffersonfiagan" class="inline-flex items-center px-6 py-3 border border-indigo-600 text-indigo-600 dark:text-indigo-400 rounded-lg hover:bg-indigo-50 dark:hover:bg-gray-700 transition transform hover:scale-105">
                    Voir tous mes projets
                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-4 fade-in" style="transform: translateY(20px);">Mes Services</h2>
            <div class="w-20 h-1 bg-indigo-600 mx-auto mb-12 fade-in" style="transform: translateY(20px);"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm hover:shadow-md transition fade-in" style="transform: translateY(20px);">
                    <div class="text-indigo-600 dark:text-indigo-400 text-4xl mb-4">
                        <i class="fas fa-server"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Développement Backend</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Création d'applications backend robustes et évolutives avec Laravel, Symfony, Spring Boot ou .NET.
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>API RESTful</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Microservices</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Architecture hexagonale</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Optimisation des performances</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Service 2 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm hover:shadow-md transition fade-in" style="transform: translateY(20px);">
                    <div class="text-indigo-600 dark:text-indigo-400 text-4xl mb-4">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Développement Frontend</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Création d'interfaces utilisateur modernes et réactives avec React, Vue.js ou technologies natives.
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Applications Single Page</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Responsive Design</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Animations fluides</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Intégration API</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Service 3 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm hover:shadow-md transition fade-in" style="transform: translateY(20px);">
                    <div class="text-indigo-600 dark:text-indigo-400 text-4xl mb-4">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Intégration Cloud</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Déploiement et configuration d'applications sur les plateformes cloud (AWS, Azure, GCP).
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Docker & Kubernetes</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>CI/CD</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Serverless</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Monitoring</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-16 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl p-8 fade-in" style="transform: translateY(20px);">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-2/3 mb-6 md:mb-0">
                        <h3 class="text-xl font-semibold mb-2">Vous avez un projet en tête?</h3>
                        <p class="text-gray-600 dark:text-gray-300">Je peux vous aider à concevoir et développer la solution technique adaptée à vos besoins, que ce soit en frontend, backend ou full stack.</p>
                    </div>
                    <div class="md:w-1/3 flex justify-center md:justify-end">
                        <a href="#contact" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition transform hover:scale-105 shadow-lg hover:shadow-indigo-500/50">Contactez-moi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-20 bg-white dark:bg-gray-800/50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-4 fade-in" style="transform: translateY(20px);">Contactez-moi</h2>
            <div class="w-20 h-1 bg-indigo-600 mx-auto mb-12 fade-in" style="transform: translateY(20px);"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 fade-in" style="transform: translateY(20px);">
                <div>
                    <h3 class="text-xl font-semibold mb-4">Disponible pour de nouvelles opportunités</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">Vous avez un projet en tête? Parlons-en! Je suis disponible pour des missions freelance ou des opportunités en CDI.</p>
                    
                    <div class="space-y-4">
                        <!-- Email -->
                        <div class="flex items-center bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                                <i class="fas fa-envelope text-indigo-600 dark:text-indigo-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Email</h4>
                                <a href="mailto:jeffersonfiagan@gmail.com" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">jeffersonfiagan@gmail.com</a>
                            </div>
                        </div>
                        
                        <!-- Téléphone -->
                        <div class="flex items-center bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                                <i class="fas fa-phone text-indigo-600 dark:text-indigo-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Téléphone</h4>
                                <a href="tel:+22899462817" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">+228 99 46 28 17</a>
                            </div>
                        </div>
                        
                        <!-- WhatsApp -->
                        <a href="https://wa.me/22899462817" target="_blank" class="flex items-center bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-full mr-4">
                                <i class="fab fa-whatsapp text-green-600 dark:text-green-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">WhatsApp</h4>
                                <span class="text-gray-600 dark:text-gray-300">Envoyez-moi un message</span>
                            </div>
                        </a>
                        
                        <!-- Réseaux sociaux -->
                        <div class="pt-6">
                            <h4 class="font-semibold mb-4">Suivez-moi sur les réseaux</h4>
                            <div class="flex space-x-4">
                                <a href="https://www.linkedin.com/in/williams-jefferson-fiagan-515b9b2b6/" class="bg-gray-100 dark:bg-gray-700 p-3 rounded-full hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition transform hover:-translate-y-1">
                                    <i class="fab fa-linkedin-in text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400"></i>
                                </a>
                                <a href="https://github.com/williamsjeffersonfiagan" class="bg-gray-100 dark:bg-gray-700 p-3 rounded-full hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition transform hover:-translate-y-1">
                                    <i class="fab fa-github text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400"></i>
                                </a>
                                <a href="https://x.com/heavencoder2003" class="bg-gray-100 dark:bg-gray-700 p-3 rounded-full hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition transform hover:-translate-y-1">
                                    <i class="fab fa-twitter text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400"></i>
                                </a>
                                <a href="#" class="bg-gray-100 dark:bg-gray-700 p-3 rounded-full hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition transform hover:-translate-y-1">
                                    <i class="fab fa-stack-overflow text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Formulaire de contact -->
                <div>
                    <form 
                            action="https://formsubmit.co/jeffersonfiagan@gmail.com" 
                            method="POST"
                            class="space-y-6"
                            >
                            <!-- Champ Nom -->
                            <div>
                                <label for="name" class="block mb-2 font-medium">Votre nom</label>
                                <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 transition"
                                required
                                >
                            </div>

                            <!-- Champ Email -->
                            <div>
                                <label for="email" class="block mb-2 font-medium">Votre email</label>
                                <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 transition"
                                required
                                >
                            </div>

                            <!-- Champ Sujet -->
                            <div>
                                <label for="subject" class="block mb-2 font-medium">Sujet</label>
                                <select 
                                id="subject" 
                                name="subject" 
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 transition"
                                required
                                >
                                <option value="">Sélectionnez un sujet</option>
                                <option value="project">Demande de projet</option>
                                <option value="collaboration">Proposition de collaboration</option>
                                <option value="question">Question technique</option>
                                <option value="other">Autre</option>
                                </select>
                            </div>

                            <!-- Champ Message -->
                            <div>
                                <label for="message" class="block mb-2 font-medium">Votre message</label>
                                <textarea 
                                id="message" 
                                name="message" 
                                rows="4" 
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 transition"
                                required
                                ></textarea>
                            </div>

                            <!-- Bouton d'envoi -->
                            <button 
                                type="submit" 
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition w-full transform hover:scale-105 shadow-lg hover:shadow-indigo-500/50"
                            >
                                Envoyer le message
                            </button>

                            <!-- Paramètres optionnels de FormSubmit -->
                            <input type="hidden" name="_captcha" value="false">
                            <input type="hidden" name="_next" value="https://votresite.com/merci.html">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="text-2xl font-bold text-white hover:text-indigo-400 transition">DevPortfolio</a>
                    <p class="mt-2">© 2025 Tous droits réservés</p>
                </div>
                
                <div class="flex flex-col md:flex-row md:space-x-8 space-y-4 md:space-y-0">
                    <a href="#about" class="hover:text-white transition">À propos</a>
                    <a href="#skills" class="hover:text-white transition">Compétences</a>
                    <a href="#projects" class="hover:text-white transition">Projets</a>
                    <a href="#services" class="hover:text-white transition">Services</a>
                    <a href="#contact" class="hover:text-white transition">Contact</a>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p>Conçu et développé avec ❤️ par HeavenCoder</p>
                
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition transform hover:-translate-y-1">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="hover:text-white transition transform hover:-translate-y-1">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="hover:text-white transition transform hover:-translate-y-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="hover:text-white transition transform hover:-translate-y-1">
                        <i class="fab fa-stack-overflow"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Observer pour les animations de fade-in
            const fadeObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('.fade-in').forEach(el => {
                fadeObserver.observe(el);
            });

            // Observer pour les barres de compétences
            const skillObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const skillBars = entry.target.querySelectorAll('.skill-bar');
                        skillBars.forEach(bar => {
                            bar.style.transition = 'width 1.5s ease-in-out';
                        });
                    }
                });
            }, { threshold: 0.1 });
            
            const skillsSection = document.getElementById('skills');
            if (skillsSection) {
                skillObserver.observe(skillsSection);
            }
            
            // Smooth scroll pour les ancres
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Gestion du mode sombre
            function applyDarkModePreference() {
                const darkMode = localStorage.getItem('darkMode') === 'true';
                document.documentElement.classList.toggle('dark', darkMode);
            }

            // Appliquer le mode au chargement
            applyDarkModePreference();

            // Animation du header au scroll
            window.addEventListener('scroll', function() {
                const header = document.querySelector('header');
                if (window.scrollY > 10) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>
</html>