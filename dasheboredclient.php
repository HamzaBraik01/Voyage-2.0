<?php
require_once 'DB.Class.php';
require_once 'Authentication.Class.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 3) {
    header('Location: login.php');
    exit();
}
$db = new Database();
$conn = $db->getConnection();
$stmt = $conn->prepare("SELECT * FROM activite");
$stmt->execute();
$activites = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT nom, prenom FROM user WHERE id_user = :user_id");
$stmt->execute([':user_id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['reserver'])) {
    $id_activite = $_POST['id_activite'];
    
    // Insert the reservation
    $stmt = $conn->prepare("INSERT INTO reservation (id_user, id_activite, statut) 
                            VALUES (:id_user, :id_activite, 'en attente')");
    $stmt->execute([
        ':id_user' => $_SESSION['user_id'],
        ':id_activite' => $id_activite
    ]);
    
    $stmt = $conn->prepare("UPDATE activite SET place_dispo = place_dispo - 1 
                            WHERE id_activite = :id_activite");
    $stmt->execute([':id_activite' => $id_activite]);
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

?>
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
                <a href="./dasheboredclient.php" data-section="offers" class="block py-3 px-4  bg-blue-600 text-gray-300 hover:bg-blue-700 hover:text-white active">
                    Offres Disponibles
                </a>
                <a href="./pageClient/MesReservations.php" data-section="myReservations" class="block py-3 px-4  text-gray-300 hover:bg-blue-700 hover:text-white">
                    Mes Réservations
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-900" id="section-title">Offres Disponibles</h1>
                    <div class="flex items-center gap-4">
                        <span class="text-gray-700">Bienvenue,<?= htmlspecialchars($user['nom'] . ' ' . $user['prenom']) ?></span>
                        <a href="logout.php" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Déconnexion</a>
                    </div>
                </div>
            </header>

            <main class="p-6">
                <section id="offers" class="section-content">
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center mb-10">
                            <h2 class="text-3xl font-bold">Best Offers</h2>
                            <p class="text-gray-600">Check out our top-rated tours</p>
                        </div>
                    </div>
                    <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <?php foreach($activites as $activite): ?>
                            <div class="bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                                <img src="<?php echo htmlspecialchars($activite['image_url']); ?>" alt="<?php echo htmlspecialchars($activite['titre']); ?>" class="w-full h-48 object-cover">
                                
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold"><?php echo htmlspecialchars($activite['titre']); ?></h3>
                                    <p class="text-gray-600">
                                        <?php 
                                            $date_debut = new DateTime($activite['date_debut']);
                                            $date_fin = new DateTime($activite['date_fin']);
                                            $diff = $date_debut->diff($date_fin);
                                            echo $diff->days + 1 . " jours / " . $diff->days . " nuits";
                                        ?>
                                    </p>
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">
                                        <?php echo htmlspecialchars($activite['type']); ?>
                                    </span>
                                    
                                    <div class="mt-4">
                                        <p class="text-gray-600 line-clamp-2"><?php echo htmlspecialchars($activite['description']); ?></p>
                                    </div>

                                    <div class="flex items-center text-gray-600 mt-2">
                                        <span>Places disponibles: <?php echo htmlspecialchars($activite['place_dispo']); ?></span>
                                    </div>

                                    <div class="flex items-center text-gray-600 mt-2">
                                        <span>À partir de <?php echo number_format($activite['prix'], 2, ',', ' '); ?>DH/personne</span>
                                    </div>

                                    <form method="POST" class="mt-6">
                                        <input type="hidden" name="id_activite" value="<?php echo $activite['id_activite']; ?>">
                                        <button type="submit" name="reserver" 
                                                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700"
                                                <?php echo ($activite['place_dispo'] <= 0) ? 'disabled' : ''; ?>>
                                            <?php echo ($activite['place_dispo'] <= 0) ? 'Complet' : 'Réserver'; ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                
            </main>
        </div>
    </div>

    <script>
        
    </script>
</body>
</html>