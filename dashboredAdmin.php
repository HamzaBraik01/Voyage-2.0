<?php
require_once 'DB.Class.php';
require_once 'Authentication.Class.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
    header('Location: login.php');
    exit();
}
$totalUsers = $db->getTotalUsers();
$totalReservations = $db->getTotalReservations();
$totalActivities = $db->getTotalActivities();
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
                <a href="./dashboredAdmin.php" data-section="dashboard" class="block py-3 px-4 bg-blue-600 text-gray-300 hover:bg-gray-700 hover:text-white active">
                    Dashboard Overview
                </a>
                <a href="./pageAdmin/ManageUsers.php" data-section="users" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Users
                </a>
                <a href="./pageAdmin/ManageActivities.php" data-section="activities" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Activities
                </a>
                <a href="./pageAdmin/ManageReservations.php" data-section="reservations" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Reservations
                </a>
                <a href="./pageAdmin/ArchiveUsers.php" data-section="archive" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Archive Users
                </a>
                
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-900" id="section-title">Dashboard Overview</h1>
                    <div class="flex items-center">
                        <span class="text-gray-700 mr-4">Welcome to your dashbored!</span>
                        <a href="logout.php" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Déconnexion</a>

                    </div>
                </div>
            </header>

            <!-- Content Sections -->
            <main class="p-6">
                <!-- Dashboard Overview Section -->
                <section id="dashboard" class="section-content">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Total Users</h3>
                            <p class="text-3xl font-bold text-gray-900"><?php echo number_format($totalUsers); ?></p>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Reservations</h3>
                            <p class="text-3xl font-bold text-gray-900"><?php echo number_format($totalReservations); ?></p>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Activities</h3>
                            <p class="text-3xl font-bold text-gray-900"><?php echo number_format($totalActivities); ?></p>
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