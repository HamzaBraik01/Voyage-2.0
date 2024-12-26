<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoyageHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-2xl font-bold text-blue-600">VoyageHub</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-600 hover:text-blue-600 transition duration-300">Accueil</a>
                    <a href="#about" class="text-gray-600 hover:text-blue-600 transition duration-300">À propos</a>
                    <a href="#reservation" class="text-gray-600 hover:text-blue-600 transition duration-300">Réservation</a>
                    <a href="#contact" class="text-gray-600 hover:text-blue-600 transition duration-300">Contact</a>
                    
                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-4">
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 transition duration-300">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Connexion</span>
                        </a>
                        <a href="#" class="flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <span>Inscription</span>
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button and Icons -->
                <div class="flex items-center space-x-4 md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-blue-600 transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-6">
                <a href="#home" class="block py-3 px-4 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-300">Accueil</a>
                <a href="#about" class="block py-3 px-4 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-300">À propos</a>
                <a href="#reservation" class="block py-3 px-4 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-300">Réservation</a>
                <a href="#contact" class="block py-3 px-4 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-300">Contact</a>
            </div>
        </div>
    </nav>
    <section class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Sign In</h2>
        <form id="signin-form" action="" method="POST">
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" id="email" name="email" required class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Enter your email" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" id="password" name="password" required class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Enter your password" />
                </div>
            </div>
            <button type="submit" class="w-full p-3 mt-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Sign In</button>
        </form>
        <p class="text-center text-sm text-gray-600">Don't have an account? <a href="SignUp.php" class="text-indigo-600 hover:underline">Sign Up</a></p>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- About Column -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">À propos</h3>
                    <p class="text-gray-400">
                        VoyageHub est votre partenaire de confiance pour des voyages inoubliables.
                    </p>
                </div>
                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white">Accueil</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">À propos</a></li>
                        <li><a href="#reservation" class="text-gray-400 hover:text-white">Réservation</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>123 Rue du Voyage</li>
                        <li>75001 Paris, France</li>
                        <li>Tél: +33 1 23 45 67 89</li>
                        <li>Email: contact@voyagehub.fr</li>
                    </ul>
                </div>
                <!-- Social Media -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
                        <a href="#" class="text-gray-400 hover:text-white">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 VoyageHub. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>

        /*-------------------------------------------------------------------*/
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        const mobileLinks = mobileMenu.getElementsByTagName('a');
        for (let link of mobileLinks) {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>