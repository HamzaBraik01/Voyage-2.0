<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoyageHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="min-h-screen bg-gray-100 flex flex-col">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-2xl font-bold text-blue-600">VoyageHub</span>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-600 hover:text-blue-600 transition duration-300">Accueil</a>
                    <a href="#about" class="text-gray-600 hover:text-blue-600 transition duration-300">À propos</a>
                    <a href="#reservation" class="text-gray-600 hover:text-blue-600 transition duration-300">Réservation</a>
                    <a href="#contact" class="text-gray-600 hover:text-blue-600 transition duration-300">Contact</a>
                    
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
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </a>
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

        <!-- Best Offers Section -->
        
        <section class="py-16 bg-gray-100">
<div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Best Offers</h2>
                <p class="text-gray-600">Check out our top-rated tours</p>
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
            </div>
        </section>
        <div class="max-w-6xl mx-auto">
  
  <!-- Activities Container -->
  <div id="activitiesContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Sample Activity Card -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
          <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2e/5c/d2/19/caption.jpg?w=1200&h=-1&s=1" alt="Turkey" class="w-full h-48 object-cover">
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
  </div>
</div>

        <!-- Why Us Section -->
        <section class="py-16 bg-white">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Why Tourizto</h2>
            </div>
            <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="flex flex-col items-center text-center p-4">
                    <div class="bg-orange-500 text-white p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4-4-4m8 8l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Personalized Matching</h3>
                    <p class="text-gray-600">We can provide up to 3 experienced travel specialists who fit best.</p>
                    
                </div>
                <div class="flex flex-col items-center text-center p-4">
                    <div class="bg-orange-500 text-white p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4-4-4m8 8l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Wide Variety of Destinations</h3>
                    <p class="text-gray-600">Find a perfect destination among hundreds available.</p>
                </div>
                <div class="flex flex-col items-center text-center p-4">
                    <div class="bg-orange-500 text-white p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4-4-4m8 8l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Highly Qualified Service</h3>
                    <p class="text-gray-600">Our high level of service is officially recognized by thousands of clients.</p>
                </div>
            </div>
        </section>

        <!-- Customer Reviews Section -->
        <section class="py-16 bg-gray-100">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Customer Reviews</h2>
                <p class="text-gray-600">See what our customers have to say about us!</p>
            </div>
            <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="text-gray-600 italic">"Tourizto made my vacation unforgettable! The service was top-notch."</p>
                    <h3 class="font-bold mt-4">- Sarah Johnson</h3>
                    <span class="stars text-yellow-600">★★★★★</span><span class="text-gray-600 ml-2">(120 avis)</span>

                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="text-gray-600 italic">"I loved the personalized service and the variety of options available."</p>
                    <h3 class="font-bold mt-4">- Michael Smith</h3>
                    <span class="stars text-yellow-600">★★★★★</span><span class="text-gray-600 ml-2">(120 avis)</span>

                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="text-gray-600 italic">"An amazing experience from start to finish. Highly recommend!"</p>
                    <h3 class="font-bold mt-4">- Emily Davis</h3>
                    <span class="stars text-yellow-600">★★★★★</span><span class="text-gray-600 ml-2">(120 avis)</span>

                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="text-gray-600 italic">" The team at Tourizto was incredibly helpful in planning my trip. I couldn't have done it without them!"</p>
                    <h3 class="font-bold mt-4">- David Brown</h3>
                    <span class="stars text-yellow-600">★★★★★</span><span class="text-gray-600 ml-2">(120 avis)</span>

                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="text-gray-600 italic">"Fantastic service! They really listened to my needs and delivered beyond my expectations."</p>
                    <h3 class="font-bold mt-4">- Jessica Wilson</h3>
                    <span class="stars text-yellow-600">★★★★★</span><span class="text-gray-600 ml-2">(120 avis)</span>

                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="text-gray-600 italic">"I had a wonderful time exploring new places thanks to Tourizto's excellent recommendations."</p>
                    <h3 class="font-bold mt-4">- Chris Lee</h3>
                    <span class="stars text-yellow-600">★★★★★</span><span class="text-gray-600 ml-2">(120 avis)</span>

                </div>
            </div>
        </section>

        <!-- <section id="reservation" class="py-16 px-4 bg-gray-100">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Make Your Reservation</h2>
        
                <div class="mb-8">
                    <img src="https://metropolitan.realestate/wp-content/webp-express/webp-images/doc-root/wp-content/uploads/2024/02/MALDIVES.jpg.webp" alt="Luxury accommodation" class="w-full h-48 object-cover rounded-lg">
                </div>
        
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Check-in Date
                            </label>
                            <input type="date" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Check-out Date
                            </label>
                            <input type="date" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
        
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Number of family
                            </label>
                            <select required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select family</option>
                                <option value="1">1 family</option>
                                <option value="2">2 family</option>
                                <option value="3">3 family</option>
                                <option value="4">4 family</option>
                                <option value="5">5 family</option>
                                <option value="6">6 family</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name
                            </label>
                            <input type="text" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your full name">
                        </div>
                    </div>
        
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input type="email" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="your@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <input type="tel" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="+1 (555) 000-0000">
                    </div>
                </div>
                    <div class="space-y-4">
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                                Confirm Reservation
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section> -->

        <!-- Contact Section -->
        <section id="contact" class="py-16 px-4">
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Contact Us</h2>
                
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Full Name
                        </label>
                        <input 
                            type="text" 
                            required 
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Enter your full name"
                        >
                    </div>
        
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input 
                                type="email" 
                                required 
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="your@email.com"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <input 
                                type="tel" 
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="+1 (555) 000-0000"
                            >
                        </div>
                    </div>
        
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Subject
                        </label>
                        <input 
                            type="text" 
                            required 
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="What is your message about?"
                        >
                    </div>
        
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Message
                        </label>
                        <textarea 
                            required 
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-32" 
                            placeholder="Write your message here..."
                        ></textarea>
                    </div>
        
                    <div class="flex justify-end">
                        <button 
                            type="submit" 
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200"
                        >
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">À propos</h3>
                    <p class="text-gray-400">
                        VoyageHub est votre partenaire de confiance pour des voyages inoubliables.
                    </p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white">Accueil</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">À propos</a></li>
                        <li><a href="#reservation" class="text-gray-400 hover:text-white">Réservation</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>123 Rue du Voyage</li>
                        <li>75001 Paris, France</li>
                        <li>Tél: +33 1 23 45 67 89</li>
                        <li>Email: contact@voyagehub.fr</li>
                    </ul>
                </div>
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
        function createActivityCard(data) {
            const card = document.createElement('div');
            card.className = 'bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition';
            
            card.innerHTML = `
                <img src="${data.imageUrl}" alt="${data.title}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold">${data.title}</h3>
                    <p class="text-gray-600">${data.duration}</p>
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">${data.type}</span>
                    <div class="mt-4 flex items-center">
                        <span class="stars">★★★★★</span><span class="text-gray-600 ml-2">(0 avis)</span>
                    </div>
                    <div class="flex items-center text-gray-600 mt-2">
                        <span>Hôtel ${data.hotelRating} étoiles inclus</span>
                    </div>
                    <div class="flex items-center text-gray-600 mt-2">
                        <span>À partir de ${data.price}€/personne</span>
                    </div>
                    <button class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Réserver</button>
                </div>
            `;

            return card;
        }

        document.getElementById('newActivityForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                title: document.getElementById('activityTitle').value,
                duration: document.getElementById('duration').value,
                type: document.getElementById('type').value,
                hotelRating: document.getElementById('hotelRating').value,
                price: document.getElementById('price').value,
                imageUrl: document.getElementById('imageUrl').value
            };

            const newCard = createActivityCard(formData);
            document.getElementById('activitiesContainer').appendChild(newCard);
            
            // Reset form and hide it
            this.reset();
            hideForm();
        });
    </script>
</body>
</html>














