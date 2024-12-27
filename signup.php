<?php
session_start();
require_once 'DB.Class.php';
require_once 'User.Class.php';
require_once 'Client.Class.php';
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $conn = $db->getConnection();
    
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $date_naissance = $_POST['date_naissance'] ?? '';
    $telephone = trim($_POST['telephone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($nom) || empty($prenom) || empty($date_naissance) || empty($telephone) || empty($email) || empty($password)) {
        $error_message = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "L'adresse email n'est pas valide.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $error_message = "Impossible de procéder à l'inscription.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $client = new Client([
                'id' => null,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $hashed_password,
                'telephone' => $telephone,
                'date_naissance' => $date_naissance,
                'archive' => 0,
                'id_role' => 3
            ]);

            if ($client->register()) {
                $_SESSION['user'] = [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'role' => 'client'
                ];
                header('Location: login.php');
                exit();
            } else {
                $error_message = "Erreur lors de l'inscription. Veuillez réessayer.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoyageHub - Inscription</title>
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

                <!-- Menu items comme dans votre template original -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php#home" class="text-gray-600 hover:text-blue-600 transition duration-300">Accueil</a>
                    <a href="index.php#about" class="text-gray-600 hover:text-blue-600 transition duration-300">À propos</a>
                    <a href="index.php#reservation" class="text-gray-600 hover:text-blue-600 transition duration-300">Réservation</a>
                    <a href="index.php#contact" class="text-gray-600 hover:text-blue-600 transition duration-300">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
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
                <a href="index.php#home" class="block py-3 px-4 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-300">Accueil</a>
                <a href="index.php#about" class="block py-3 px-4 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-300">À propos</a>
                <a href="index.php#reservation" class="block py-3 px-4 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-300">Réservation</a>
                <a href="index.php#contact" class="block py-3 px-4 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-300">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Formulaire Section -->
    <section class="flex pt-52 items-center justify-center h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center text-gray-700">Sign Up</h2>
            
            <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
            <?php endif; ?>

            <form id="signup-form" method="POST">
                <div class="space-y-4">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-600">Nom</label>
                        <input type="text" id="nom" name="nom" required 
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none" 
                                placeholder="Entrez votre nom" 
                                value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>" />
                    </div>
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-600">Prénom</label>
                        <input type="text" id="prenom" name="prenom" required 
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none" 
                                placeholder="Entrez votre prénom"
                                value="<?php echo htmlspecialchars($_POST['prenom'] ?? ''); ?>" />
                    </div>
                    <div>
                        <label for="date_naissance" class="block text-sm font-medium text-gray-600">Date de Naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" required 
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                                value="<?php echo htmlspecialchars($_POST['date_naissance'] ?? ''); ?>" />
                    </div>
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-600">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" required 
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none" 
                                placeholder="Entrez votre numéro de téléphone"
                                value="<?php echo htmlspecialchars($_POST['telephone'] ?? ''); ?>" />
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" id="email" name="email" required 
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none" 
                                placeholder="Entrez votre email"
                                value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" />
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-600">Mot de Passe</label>
                        <input type="password" id="password" name="password" required 
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none" 
                                placeholder="Créez un mot de passe" />
                    </div>
                </div>
                <button type="submit" class="w-full p-3 mt-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Sign Up</button>
            </form>

            <p class="text-center text-sm text-gray-600">Already have an account? <a href="login.php" class="text-blue-600 hover:underline">Sign In</a></p>
        </div>
    </section>
    <!-- Footer -->
    <footer class="mt-20 bg-gray-800 text-white">
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

        // Close mobile menu when clicking a link
        const mobileLinks = mobileMenu.getElementsByTagName('a');
        for (let link of mobileLinks) {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        }
    </script>
</body>
</html>