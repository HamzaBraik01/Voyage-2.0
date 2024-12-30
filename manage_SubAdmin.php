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
                <p class="text-gray-400 text-sm">Super Admin Panel</p>
            </div>
            <nav class="mt-4" id="sidebar-nav">
                <a href="#" data-section="dashboard" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white active">
                    Dashboard Overview
                </a>
                <a href="#" data-section="archive" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Archive Sub-Admins
                </a>
                <a href="#" data-section="subadmins" class="block py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    Manage Sub-Admins
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
                        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Logout</button>
                    </div>
                </div>
            </header>

            <!-- Content Sections -->
            <main class="p-6">
                <!-- Dashboard Overview Section -->
                <section id="dashboard" class="section-content">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Total Sub-Admins</h3>
                            <p class="text-3xl font-bold text-gray-900">14</p>
                        </div>
                    </div>
                </section>
                <!-- Archive Sub-Admins Section -->
                <section id="archive" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-semibold">Archived Sub-Admins</h2>
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

                <!-- Manage Sub-Admins Section -->
                <section id="subadmins" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h2 class="text-xl font-semibold">Sub-Admin Management</h2>
                            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Sub-Admin</button>
                        </div>
                        <div class="p-6">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left p-3">Name</th>
                                        <th class="text-left p-3">Email</th>
                                        <th class="text-left p-3">Status</th>
                                        <th class="text-left p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3">Sarah Johnson</td>
                                        <td class="p-3">sarah@example.com</td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                                Active
                                            </span>
                                        </td>
                                        <td class="p-3">
                                            <button class="text-blue-600 hover:text-blue-900">Edit</button>
                                            <button class="text-red-600 hover:text-red-900 ml-2">Remove</button>
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
        
    </script>
</body>
</html>