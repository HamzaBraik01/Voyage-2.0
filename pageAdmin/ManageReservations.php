<?php
require_once '../DB.Class.php';
require_once '../Reservation.Class.php';
require_once '../Authentication.Class.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
    header('Location: login.php');
    exit();
}
$db = new Database();
$reservationManager = new Reservation($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_reservation']) && isset($_POST['status'])) {
    $reservationManager->updateReservationStatus($_POST['id_reservation'], $_POST['status']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$reservations = $reservationManager->getReservationsWithUserInfo();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex"> 
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Admin Dashboard</h2>
            </div>
            <nav class="mt-4" id="sidebar-nav">
                <a href="../dashboredAdmin.php" data-section="dashboard" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white active">
                    Dashboard Overview
                </a>
                <a href="./ManageUsers.php" data-section="users" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Users
                </a>
                <a href="./ManageActivities.php" data-section="activities" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Activities
                </a>
                <a href="./ManageReservations.php" data-section="reservations" class="block py-3 px-4  bg-blue-600 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Reservations
                </a>
                <a href="./ArchiveUsers.php" data-section="archive" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Archive Users
                </a>
                
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-900" id="section-title">Manage Reservations</h1>
                    <div class="flex items-center">
                        <span class="text-gray-700 mr-4">Welcome to your dashbored!</span>
                        <a href="../logout.php" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Déconnexion</a>
                    </div>
                </div>
            </header>

            <!-- Content Sections -->
            <main class="p-6">
                <section id="reservations" class="section-content ">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-semibold">Reservation Management</h2>
                        </div>
                        <div class="p-6">
                        <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="text-left p-3">Full Name</th>
                                        <th class="text-left p-3">Activity</th>
                                        <th class="text-left p-3">Date Reservation</th>
                                        <th class="text-left p-3">Status</th>
                                        <th class="text-left p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reservations as $reservation): ?>
                                    <tr class="border-t">
                                        <td class="p-3"><?= htmlspecialchars($reservation['nom'] . ' ' . $reservation['prenom']) ?></td>
                                        <td class="p-3"><?= htmlspecialchars($reservation['activite_titre']) ?></td>
                                        <td class="p-3"><?= htmlspecialchars(date('Y-m-d H:i', strtotime($reservation['date_reservation']))) ?></td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 rounded-full text-sm
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
                                                ?>">
                                                <?= htmlspecialchars($reservation['statut']) ?>
                                            </span>
                                        </td>
                                        <td class="p-3">
                                            <form method="POST" class="inline-block">
                                                <input type="hidden" name="id_reservation" value="<?= $reservation['id_reservation'] ?>">
                                                <button type="submit" name="status" value="confirmée" 
                                                    class="text-blue-600 hover:text-blue-900 mr-2">
                                                    Confirmée
                                                </button>
                                                <button type="submit" name="status" value="annulée" 
                                                    class="text-red-600 hover:text-red-900">
                                                    Annulée
                                                </button>
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