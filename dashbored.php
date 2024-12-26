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
                        <!-- <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Logout</button> -->
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
                            <p class="text-3xl font-bold text-gray-900">1,254</p>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Active Reservations</h3>
                            <p class="text-3xl font-bold text-gray-900">845</p>
                        </div>
                     
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Activities</h3>
                            <p class="text-3xl font-bold text-gray-900">56</p>
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
        <div id="activityForm" class="pl-28 absolute  rounded-lg shadow mb-6 z-32 hidden">
            <div class="p-6 w-[50vw]  text-center bg-white">
                <h3 class="text-lg font-semibold mb-4">Add New Activity</h3>
                <form id="newActivityForm" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Activity Title
                        </label>
                        <input type="text" id="activityTitle" required class="w-full p-2 border rounded-lg">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Duration
                        </label>
                        <input type="text" id="duration" required placeholder="e.g., 3 jours / 2 nuits" class="w-full p-2 border rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Type
                        </label>
                        <input type="text" id="type" required placeholder="e.g., Vol + Hôtel" class="w-full p-2 border rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Hotel Rating
                        </label>
                        <select id="hotelRating" required class="w-full p-2 border rounded-lg">
                            <option value="">Select rating</option>
                            <option value="3">3 étoiles</option>
                            <option value="4">4 étoiles</option>
                            <option value="5">5 étoiles</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Price per Person (€)
                        </label>
                        <input type="number" id="price" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Image URL
                        </label>
                        <input type="url" id="imageUrl" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="hideForm()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Add Activity
                        </button>
                    </div>
                </form>
            </div>
        </div>

                        <div class="p-6">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left p-3">Activity Name</th>
                                        <th class="text-left p-3">Duration</th>
                                        <th class="text-left p-3">Capacity</th>
                                        <th class="text-left p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3">Yoga Class</td>
                                        <td class="p-3">1 hour</td>
                                        <td class="p-3">20</td>
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