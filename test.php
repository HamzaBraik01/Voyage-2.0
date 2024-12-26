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
    <nav class="bg-white shadow fixed w-full z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="#" class="text-2xl font-bold text-blue-600">VoyageHub</a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-600 hover:text-blue-600">Accueil</a>
                    <a href="#about" class="text-gray-600 hover:text-blue-600">À propos</a>
                    <a href="#reservation" class="text-gray-600 hover:text-blue-600">Réservation</a>
                    <a href="#contact" class="text-gray-600 hover:text-blue-600">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="#home" class="block py-2 text-gray-600">Accueil</a>
                <a href="#about" class="block py-2 text-gray-600">À propos</a>
                <a href="#reservation" class="block py-2 text-gray-600">Réservation</a>
                <a href="#contact" class="block py-2 text-gray-600">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow pt-16">
        <!-- Hero Section -->
        <section id="home" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white py-20">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Découvrez le monde avec nous</h1>
                <p class="text-xl mb-8">Votre prochaine aventure commence ici</p>
                <button class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50">
                    Explorer
                </button>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-16 px-4">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-8">À propos de nous</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold mb-4">Notre Mission</h3>
                        <p class="text-gray-600">
                            Nous nous engageons à vous offrir des expériences de voyage exceptionnelles.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold mb-4">Nos Valeurs</h3>
                        <p class="text-gray-600">
                            Qualité, authenticité et satisfaction client sont au cœur de notre approche.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Reservation Section -->
        <section id="reservation" class="py-16 px-4 bg-gray-100">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-8">Réservation</h2>
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
                    <form class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Date de départ
                            </label>
                            <input type="date" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Date de retour
                            </label>
                            <input type="date" class="w-full p-2 border rounded">
                        </div>
                    </form>
                    <button class="mt-6 w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                        Rechercher
                    </button>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-16 px-4">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-8">Contact</h2>
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
                    <form class="space-y-4">
                        <input type="email" placeholder="Votre email" class="w-full p-2 border rounded">
                        <textarea placeholder="Votre message" class="w-full p-2 border rounded" rows="4"></textarea>
                        <button class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700">
                            Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

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
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking a link
        const mobileLinks = mobileMenu.getElementsByTagName('a');
        for (let link of mobileLinks) {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        }

        // Smooth scrolling for navigation links
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