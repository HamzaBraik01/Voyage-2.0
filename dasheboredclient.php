<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Mon Espace</h2>
            </div>
            <nav class="mt-4" id="sidebar-nav">
                <a href="#" data-section="offers" class="block py-3 px-4 text-gray-300 hover:bg-blue-700 hover:text-white active">
                    Offres Disponibles
                </a>
              
                <a href="#" data-section="myReservations" class="block py-3 px-4 text-gray-300 hover:bg-blue-700 hover:text-white">
                    Mes Réservations
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-900" id="section-title">Offres Disponibles</h1>
                    <div class="flex items-center gap-4">
                        <span class="text-gray-700">Bienvenue, John Doe</span>
                        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Déconnexion</button>
                    </div>
                </div>
            </header>

            <!-- Content Sections -->
            <main class="p-6">
                <!-- Offers Section -->
                <section id="offers" class="section-content">
                    
                    <!-- Offers Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Best Offers</h2>
                <p class="text-gray-600">Check out our top-rated tours</p>
            </div>
            </div>
            <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2e/5c/d2/19/caption.jpg?w=1200&h=-1&s=1" alt="Turkey" class="w-full">
                    
                    <div class="p-6">
                        <h3 class="text-xl font-semibold">Paris City Break</h3>
                        <p class="text-gray-600">3 jours / 2 nuits</p>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Vol + Hôtel</span>
                        <div class="mt-4 flex items-center">
                            <span class="stars">★★★★★</span><span class="text-gray-600 ml-2">(120 avis)</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-2">
                            <span>Hôtel 4 étoiles inclus</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-2">
                            <span>À partir de 599€/personne</span>
                        </div>
                        <button class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Réserver</button>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0a/ca/8b/b1/photo1jpg.jpg?w=1000&h=-1&s=1" alt="Spain" class="w-full">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold">Bali Adventure</h3>
                        <p class="text-gray-600">5 jours / 4 nuits</p>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Vol + Hôtel</span>
                        <div class="mt-4 flex items-center">
                            <span class="stars">★★★★☆</span><span class="text-gray-600 ml-2">(80 avis)</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-2">
                            <span>Hôtel 5 étoiles inclus</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-2">
                            <span>À partir de 899€/personne</span>
                        </div>
                        <button class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Réserver</button>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2e/5c/d2/19/caption.jpg?w=1200&h=-1&s=1" alt="UK" class="w-full">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold">Bali Adventure</h3>
                        <p class="text-gray-600">5 jours / 4 nuits</p>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Vol + Hôtel</span>
                        <div class="mt-4 flex items-center">
                            <span class="stars">★★★★☆</span><span class="text-gray-600 ml-2">(80 avis)</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-2">
                            <span>Hôtel 5 étoiles inclus</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-2">
                            <span>À partir de 899€/personne</span>
                        </div>
                        <button class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Réserver</button>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2e/5c/d2/16/caption.jpg?w=1200&h=-1&s=1" alt="Eastern Europe" class="w-full">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold">Bali Adventure</h3>
                        <p class="text-gray-600">5 jours / 4 nuits</p>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Vol + Hôtel</span>
                        <div class="mt-4 flex items-center">
                            <span class="stars">★★★★☆</span><span class="text-gray-600 ml-2">(80 avis)</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-2">
                            <span>Hôtel 5 étoiles inclus</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-2">
                            <span>À partir de 899€/personne</span>
                        </div>
                        <button class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Réserver</button>
                    </div>
                </div>

                        <!-- Additional offer cards would be here -->
                    </div>
                </section>

                <!-- My Activities Section -->
                <section id="myActivities" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-semibold">Mes Activités Sélectionnées</h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between border-b pb-4">
                                    <div>
                                        <h3 class="font-semibold">Tour Eiffel & Croisière</h3>
                                        <p class="text-sm text-gray-600">Date: 15 Mars 2024</p>
                                        <p class="text-sm text-gray-600">2 personnes</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="px-4 py-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                                            Modifier
                                        </button>
                                        <button class="px-4 py-2 text-red-600 border border-red-600 rounded hover:bg-red-50">
                                            Supprimer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- My Reservations Section -->
                <section id="myReservations" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow">
                         <!-- Reservation Section -->
       
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-semibold">Mes Réservations</h2>
                        </div>
                        <div class="p-6">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left p-3">Activité</th>
                                        <th class="text-left p-3">Destination</th>
                                        <th class="text-left p-3">Dates</th>
                                        <th class="text-left p-3">Statut</th>
                                        <th class="text-left p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3"><div>
                                        <h3 class="font-semibold">Tour Eiffel & Croisière</h3>
                                        <p class="text-sm text-gray-600">Date: 15 Mars 2024</p>
                                        <p class="text-sm text-gray-600">2 personnes</p>
                                    </div></td>
                                        <td class="p-3">Paris</td>
                                        <td class="p-3">15-17 Mars 2024</td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                                Confirmé
                                            </span>
                                        </td>
                                        <td class="p-3">
                                            <button class="text-blue-600 hover:text-blue-900">Confirmé</button>
                                            <button class="text-red-600 hover:text-red-900 ml-2">Annuler</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('#sidebar-nav a');
            const sections = document.querySelectorAll('.section-content');
            const sectionTitle = document.getElementById('section-title');

            function showSection(sectionId) {
                sections.forEach(section => {
                    section.classList.add('hidden');
                });
                document.getElementById(sectionId).classList.remove('hidden');
                
                navLinks.forEach(link => {
                    link.classList.remove('bg-blue-600');
                    if(link.dataset.section === sectionId) {
                        link.classList.add('bg-blue-600');
                        sectionTitle.textContent = link.textContent.trim();
                    }
                });
            }

            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const sectionId = link.dataset.section;
                    showSection(sectionId);
                });
            });
        });
    </script>
</body>
</html>