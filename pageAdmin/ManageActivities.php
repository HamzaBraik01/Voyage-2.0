<?php
require_once '../DB.Class.php';
require_once '../Activite.Class.php';
require_once '../Authentication.Class.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
    header('Location: login.php');
    exit();
}
$db = new Database();
$conn = $db->getConnection();
$query = "SELECT * FROM activite"; 
$stmt = $conn->query($query);
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_id'])) {
        $update_id = $_POST['update_id'];
        $titre = $_POST['titreEdit'];
        $description = $_POST['descriptionEdit'];
        $prix = $_POST['prixEdit'];
        $date_debut = $_POST['date_debutEdit'];
        $date_fin = $_POST['date_finEdit'];
        $place_dispo = $_POST['place_dispoEdit'];
        $type = $_POST['typeEdit'];
        $image_url = $_POST['image_urlEdit'];
        
        $query = "UPDATE activite SET 
            titre = :titre,
            description = :description,
            prix = :prix,
            date_debut = :date_debut,
            date_fin = :date_fin,
            place_dispo = :place_dispo,
            type = :type,
            image_url = :image_url
            WHERE id_activite = :id_activite";
            
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':titre' => $titre,
            ':description' => $description,
            ':prix' => $prix,
            ':date_debut' => $date_debut,
            ':date_fin' => $date_fin,
            ':place_dispo' => $place_dispo,
            ':type' => $type,
            ':image_url' => $image_url,
            ':id_activite' => $update_id
        ]);
        
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    // Handle Delete
    else if (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $query = "DELETE FROM activite WHERE id_activite = :id_activite";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_activite', $delete_id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    // Handle Create
    else {
        $titre = $_POST['titre'] ?? '';
        $description = $_POST['description'] ?? '';
        $prix = $_POST['prix'] ?? 0;
        $date_debut = $_POST['date_debut'] ?? '';
        $date_fin = $_POST['date_fin'] ?? '';
        $place_dispo = $_POST['place_dispo'] ?? 0;
        $type = $_POST['type'] ?? '';
        $image_url = $_POST['image_url'] ?? '';
        
        $activite = new Activite(
            $titre,
            $description,
            $prix,
            $date_debut,
            $date_fin,
            $place_dispo,
            $type,
            $image_url
        );
        $activite->ajouterActivite($db);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
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
                <a href="../dashboredAdmin.php" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white active">
                    Dashboard Overview
                </a>
                <a href="./ManageUsers.php" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Users
                </a>
                <a href="./ManageActivities.php" class="block py-3 px-4 bg-blue-600 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Activities
                </a>
                <a href="./ManageReservations.php" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Reservations
                </a>
                <a href="./ArchiveUsers.php" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Archive Users
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-900">Manage Activities</h1>
                    <div class="flex items-center">
                        <span class="text-gray-700 mr-4">Welcome to your dashboard!</span>
                        <a href="../logout.php" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Déconnexion</a>
                    </div>
                </div>
            </header>

            <!-- Content Sections -->
            <main class="p-6">
                <section id="activities" class="section-content">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h2 class="text-xl font-semibold">Activity Management</h2>
                            <button onclick="showForm()" id="addActivityBtn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Add New Activity
                            </button>                   
                        </div>

                        <!-- Activity Form -->
                        <div id="activityForm" class="absolute inset-0 flex items-center justify-center z-32 hidden bg-black bg-opacity-50">
                            <div class="p-6 w-[25vw] bg-gradient-to-br from-indigo-50 via-white to-indigo-100 text-center rounded-lg shadow-2xl">
                                <h3 class="text-lg font-bold text-indigo-800 mb-4" id="formTitle">Add New Activity</h3>
                                <form id="newActivityForm" class="space-y-4" action="" method="POST">
                                    
                                    <!-- Title Input -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Activity Title</label>
                                        <input type="text" id="titre" name="titre" required 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Description Input -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Description</label>
                                        <textarea id="description" name="description" required rows="3" 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
                                    </div>

                                    <!-- Dates Input -->
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Start Date</label>
                                            <input type="date" id="date_debut" name="date_debut" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">End Date</label>
                                            <input type="date" id="date_fin" name="date_fin" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                    </div>

                                    <!-- Places and Price Input -->
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Available Places</label>
                                            <input type="number" id="place_dispo" name="place_dispo" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Price (DH)</label>
                                            <input type="number" id="prix" name="prix" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                    </div>

                                    <!-- Type Input -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Type</label>
                                        <input type="text" id="type" name="type" required 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Image URL Input -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Image URL</label>
                                        <input type="url" id="image_url" name="image_url" required 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Form Buttons -->
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" onclick="hideForm()" 
                                            class="px-4 py-2 bg-gray-400 text-white rounded-md shadow-sm hover:bg-gray-500 transition">
                                            Cancel
                                        </button>
                                        <button type="submit" id="submitBtn"
                                            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 transition">
                                            Add Activity
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- edit Form -->
                        <div id="editForm" class="absolute inset-0 flex items-center justify-center z-32 hidden bg-black bg-opacity-50">
                            <div class="p-6 w-[25vw] bg-gradient-to-br from-indigo-50 via-white to-indigo-100 text-center rounded-lg shadow-2xl">
                                <h3 class="text-lg font-bold text-indigo-800 mb-4" id="formTitleEdit">Add New Activity</h3>
                                <form id="editActivityForm" class="space-y-4" action="" method="POST">
                                    <input type="hidden" id="update_id" name="update_id">
                                    
                                    <!-- Title Input -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Activity Title</label>
                                        <input type="text" id="titreEdit" name="titreEdit" required 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Description Input -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Description</label>
                                        <textarea id="descriptionEdit" name="descriptionEdit" required rows="3" 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
                                    </div>

                                    <!-- Dates Input -->
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Start Date</label>
                                            <input type="date" id="date_debutEdit" name="date_debutEdit" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">End Date</label>
                                            <input type="date" id="date_finEdit" name="date_finEdit" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                    </div>

                                    <!-- Places and Price Input -->
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Available Places</label>
                                            <input type="number" id="place_dispoEdit" name="place_dispoEdit" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-indigo-700 mb-1 block">Price (DH)</label>
                                            <input type="number" id="prixEdit" name="prixEdit" required 
                                                class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        </div>
                                    </div>

                                    <!-- Type Input -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Type</label>
                                        <input type="text" id="typeEdit" name="typeEdit" required 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Image URL Input -->
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium text-indigo-700 mb-1">Image URL</label>
                                        <input type="url" id="image_urlEdit" name="image_urlEdit" required 
                                            class="w-full p-2 border border-indigo-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                    </div>

                                    <!-- Form Buttons -->
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" onclick="hideForm()" 
                                            class="px-4 py-2 bg-gray-400 text-white rounded-md shadow-sm hover:bg-gray-500 transition">
                                            Cancel
                                        </button>
                                        <button type="submit" id="submitBtnEdit"
                                            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 transition">
                                            Add Activity
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Activities Table -->
                        <div class="overflow-x-auto">
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
                                    <?php foreach ($activities as $activity): ?>
                                        <tr>
                                            <td class="p-3"><?= htmlspecialchars($activity['titre']) ?></td>
                                            <td class="p-3"><?= htmlspecialchars($activity['description']) ?></td>
                                            <td class="p-3"><?= htmlspecialchars($activity['date_debut']) ?></td>
                                            <td class="p-3"><?= htmlspecialchars($activity['date_fin']) ?></td>
                                            <td class="p-3"><?= htmlspecialchars($activity['place_dispo']) ?></td>
                                            <td class="p-3"><?= htmlspecialchars($activity['prix']) ?> DH</td>
                                            <td class="p-3"><?= htmlspecialchars($activity['type']) ?></td>
                                            <td class="p-3 flex">
                                                <button onclick='editActivity(<?= json_encode($activity) ?>)' class='text-blue-600 hover:text-blue-900 mr-2' title='Edit'>
                                                    <i class='fas fa-edit'></i>
                                                </button>
                                                <form method="POST" action="" class="inline">
                                                    <input type="hidden" name="delete_id" value="<?= $activity['id_activite'] ?>">
                                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
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
function showForm() {
    document.getElementById('activityForm').classList.remove('hidden');
    document.getElementById('addActivityBtn').classList.add('hidden');
}
function editForm() {
    document.getElementById('editForm').classList.remove('hidden');
    document.getElementById('formTitleEdit').textContent = 'Edit Activity';
    document.getElementById('submitBtnEdit').textContent = 'Update Activity';
}

function hideForm() {
    document.getElementById('activityForm').classList.add('hidden');
    document.getElementById('addActivityBtn').classList.remove('hidden');
    document.getElementById('editForm').classList.add('hidden');
}

function editActivity(activity) {
    editForm();
    // Fill form with activity data
    document.getElementById('update_id').value = activity.id_activite;
    document.getElementById('titreEdit').value = activity.titre;
    document.getElementById('descriptionEdit').value = activity.description;
    document.getElementById('prixEdit').value = activity.prix;
    document.getElementById('date_debutEdit').value = activity.date_debut;
    document.getElementById('date_finEdit').value = activity.date_fin;
    document.getElementById('place_dispoEdit').value = activity.place_dispo;
    document.getElementById('typeEdit').value = activity.type;
    document.getElementById('image_urlEdit').value = activity.image_url;
}
</script>
</body>
</html>