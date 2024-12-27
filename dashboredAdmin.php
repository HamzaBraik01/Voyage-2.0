<?php
require_once 'DB.Class.php';
require_once 'Activite.Class.php';
$totalUsers = $db->getTotalUsers();
$totalReservations = $db->getTotalReservations();
$totalActivities = $db->getTotalActivities();


$db = new Database();
$conn = $db->getConnection();
$query = "SELECT * FROM activite"; 
$stmt = $conn->query($query);
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $place_dispo = $_POST['place_dispo'];
    $type = $_POST['type'];
    $image_url = $_POST['image_url'];

    
    $activite = new Activite($titre, $description, $prix, $date_debut, $date_fin, $place_dispo, $type, $image_url);

    $db = new Database();
    
    if ($activite->ajouterActivite($db)) {
        
        echo "Activity added successfully!";
    } else {
    
        echo "There was an error adding the activity.";
    }
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
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Admin Dashboard</h2>
            </div>
            <nav class="mt-4" id="sidebar-nav">
                <a href="#" data-section="dashboard" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white active">
                    Dashboard Overview
                </a>
                <a href="#" data-section="users" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Users
                </a>
                <a href="#" data-section="activities" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Activities
                </a>
                <a href="#" data-section="reservations" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Reservations
                </a>
                <a href="#" data-section="archive" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
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
                        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Déconnexion</button>
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

                <!-- Manage Users Section -->
                <section id="users" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h2 class="text-xl font-semibold">User Management</h2>
                        </div>
                        <div class="p-6">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left p-3">Name</th>
                                        <th class="text-left p-3">Email</th>
                                        <th class="text-left p-3">Role</th>
                                        <th class="text-left p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3">John Doe</td>
                                        <td class="p-3">john@example.com</td>
                                        <td class="p-3">User</td>
                                        <td class="p-3">
                                            <button class="text-blue-600 hover:text-blue-900">Edit</button>
                                            <button class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Manage Activities Section -->
                <section id="activities" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h2 class="text-xl font-semibold">Activity Management</h2>
                            <button onclick="showForm()" id="addActivityBtn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Add New Activity
                            </button>                   
                        </div>
                        <!-- Activity Form (Hidden by default) -->
                        <div id="activityForm" class="absolute inset-0 flex items-center justify-center z-32 hidden bg-black bg-opacity-50">
                            <div class="p-6 w-[25vw] bg-gradient-to-br from-indigo-50 via-white to-indigo-100 text-center rounded-lg shadow-2xl">
                                <h3 class="text-lg font-bold text-indigo-800 mb-4">Add New Activity</h3>
                                <form id="newActivityForm" class="space-y-4" action="">

                                    <!-- Input Group: Title -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Activity Title</label>
                                        <input type="text" id="titre" required 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Input Group: Description -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Description</label>
                                        <textarea id="description" required rows="3" 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
                                    </div>

                                    <!-- Input Group: Start & End Date -->
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Start Date</label>
                                            <input type="date" id="date_debut" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">End Date</label>
                                            <input type="date" id="date_fin" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                    </div>

                                    <!-- Input Group: Available Places & Price -->
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Available Places</label>
                                            <input type="number" id="place_dispo" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Price (DH)</label>
                                            <input type="number" id="prix" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                    </div>

                                    <!-- Input Group: Type -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Type</label>
                                        <input type="text" id="type" required placeholder="e.g., Vol + Hôtel"
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Input Group: Image URL -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Image URL</label>
                                        <input type="url" id="image_url" required 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Buttons -->
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" onclick="hideForm()" 
                                            class="px-4 py-2 bg-gray-400 text-white rounded-md shadow-sm hover:bg-gray-500 transition">
                                            Cancel
                                        </button>
                                        <button type="submit" 
                                            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 transition">
                                            Add Activity
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <div>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left p-3">Activity Name</th>
                                    <th class="text-left p-3">Description</th>
                                    <th class="text-left p-3">Start Date</th>
                                    <th class="text-left p-3">End Date</th>
                                    <th class="text-left p-3">Capacity</th>
                                    <th class="text-left p-3">Price</th>
                                    <th class="text-left p-3">Type</th>
                                    <th class="text-left p-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($activities as $activity) {
                                    $titre = $activity['titre'];
                                    $description = $activity['description'];
                                    $date_debut = $activity['date_debut'];
                                    $date_fin = $activity['date_fin'];
                                    $place_dispo = $activity['place_dispo'];
                                    $prix = $activity['prix'];
                                    $type = $activity['type'];

                                    // Output the activity row
                                    echo "<tr>";
                                    echo "<td class='p-3'>{$titre}</td>";
                                    echo "<td class='p-3'>{$description}</td>";
                                    echo "<td class='p-3'>{$date_debut}</td>";
                                    echo "<td class='p-3'>{$date_fin}</td>";
                                    echo "<td class='p-3'>{$place_dispo}</td>";
                                    echo "<td class='p-3'>{$prix} DH</td>";
                                    echo "<td class='p-3'>{$type}</td>";
                                    echo "<td class='p-3'>
                                            <button class='text-blue-600 hover:text-blue-900'>Edit</button>
                                            <button class='text-red-600 hover:text-red-900 ml-2'>Delete</button>
                                        </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </section>

                <!-- Manage Reservations Section -->
                <section id="reservations" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-semibold">Reservation Management</h2>
                        </div>
                        <div class="p-6">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left p-3">Guest Name</th>
                                        <th class="text-left p-3">Check-in</th>
                                        <th class="text-left p-3">Check-out</th>
                                        <th class="text-left p-3">Status</th>
                                        <th class="text-left p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3">Alice Smith</td>
                                        <td class="p-3">2024-01-20</td>
                                        <td class="p-3">2024-01-25</td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                                Confirmed
                                            </span>
                                        </td>
                                        <td class="p-3">
                                            <button class="text-blue-600 hover:text-blue-900">Edit</button>
                                            <button class="text-red-600 hover:text-red-900 ml-2">Cancel</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Archive Users Section -->
                <section id="archive" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-semibold">Archived Users</h2>
                        </div>
                        <div class="p-6">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left p-3">Name</th>
                                        <th class="text-left p-3">Email</th>
                                        <th class="text-left p-3">Archive Date</th>
                                        <th class="text-left p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3">Tom Wilson</td>
                                        <td class="p-3">tom@example.com</td>
                                        <td class="p-3">2024-01-15</td>
                                        <td class="p-3">
                                            <button class="text-blue-600 hover:text-blue-900">Restore</button>
                                            <button class="text-red-600 hover:text-red-900 ml-2">Delete</button>
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
            // Get all navigation links and content sections
            const navLinks = document.querySelectorAll('#sidebar-nav a');
            const sections = document.querySelectorAll('.section-content');
            const sectionTitle = document.getElementById('section-title');

            // Function to show selected section and hide others
            function showSection(sectionId) {
                sections.forEach(section => {
                    section.classList.add('hidden');
                });
                document.getElementById(sectionId).classList.remove('hidden');
                
                // Update active link styling
                navLinks.forEach(link => {
                    link.classList.remove('bg-blue-600');
                    if(link.dataset.section === sectionId) {
                        link.classList.add('bg-blue-600');
                        sectionTitle.textContent = link.textContent.trim();
                    }
                });
            }

            // Add click event listeners to all navigation links
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const sectionId = link.dataset.section;
                    showSection(sectionId);
                });
            });
        });
        function showForm() {
            document.getElementById('activityForm').classList.remove('hidden');
            document.getElementById('addActivityBtn').classList.add('hidden');
        }

        function hideForm() {
            document.getElementById('activityForm').classList.add('hidden');
            document.getElementById('addActivityBtn').classList.remove('hidden');
        }
    </script>
</body>
</html>