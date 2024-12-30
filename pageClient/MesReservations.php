<?php
require_once '../DB.Class.php';
require_once '../Authentication.Class.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 3) {
    header('Location: login.php');
    exit();
}

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT nom, prenom FROM user WHERE id_user = :user_id");
$stmt->execute([':user_id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['action']) && isset($_POST['id_reservation'])) {
    $id_reservation = $_POST['id_reservation'];
    $nouveau_statut = '';
    
    if ($_POST['action'] === 'confirmer') {
        $nouveau_statut = 'confirmée';
    } elseif ($_POST['action'] === 'annuler') {
        $nouveau_statut = 'annulée';
    }
    
    if ($nouveau_statut) {
        $query = "UPDATE reservation SET statut = ? WHERE id_reservation = ? AND id_user = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$nouveau_statut, $id_reservation, $_SESSION['user_id']]);
    }
}

$query = "SELECT r.*, a.titre, a.date_debut, a.prix 
            FROM reservation r 
            JOIN activite a ON r.id_activite = a.id_activite 
            WHERE r.id_user = ? 
            ORDER BY r.date_reservation DESC";

$stmt = $conn->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                <a href="../dasheboredclient.php" data-section="offers" class="block py-3 px-4 text-gray-300 hover:bg-blue-700 hover:text-white active">
                    Offres Disponibles
                </a>
                <a href="./MesReservations.php" data-section="myReservations" class="block py-3 px-4  bg-blue-600 text-gray-300 hover:bg-blue-700 hover:text-white">
                    Mes Réservations
                </a>
            </nav>
        </div>

        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-900" id="section-title">Offres Disponibles</h1>
                    <div class="flex items-center gap-4">
                        <span class="text-gray-700">Bienvenue,<?= htmlspecialchars($user['nom'] . ' ' . $user['prenom']) ?></span>
                        <a href="../logout.php" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Déconnexion</a>
                    </div>
                </div>
            </header>

            <main class="p-6">
                <section id="myReservations" class="section-content ">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-semibold">Mes Réservations</h2>
                        </div>
                        <div class="p-6">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left p-3">Activité</th>
                                    <th class="text-left p-3">Date réservation</th>
                                    <th class="text-left p-3">Statut</th>
                                    <th class="text-left p-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservations as $reservation): ?>
                                    <tr>
                                        <td class="p-3"><?php echo htmlspecialchars($reservation['titre']); ?></td>
                                        <td class="p-3"><?php echo date('d/m/Y', strtotime($reservation['date_reservation'])); ?></td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 
                                                <?php 
                                                switch($reservation['statut']) {
                                                    case 'confirmée':
                                                        echo 'bg-green-100 text-green-800';
                                                        break;
                                                    case 'en attente':
                                                        echo 'bg-yellow-100 text-yellow-800';
                                                        break;
                                                    case 'annulée':
                                                        echo 'bg-red-100 text-red-800';
                                                        break;
                                                }
                                                ?> 
                                                rounded-full text-sm">
                                                <?php echo htmlspecialchars($reservation['statut']); ?>
                                            </span>
                                        </td>
                                        <td class="p-3">
                                                <form method="POST" style="display: inline;">
                                                    <input type="hidden" name="id_reservation" value="<?php echo $reservation['id_reservation']; ?>">
                                                    <button type="submit" name="action" value="confirmer" 
                                                        class="text-blue-600 hover:text-blue-900">Confirmer</button>
                                                    <button type="submit" name="action" value="annuler" 
                                                        class="text-red-600 hover:text-red-900 ml-2">Annuler</button>
                                                </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        
    </script>
</body>
</html>