<?php 
$currentPage = 'manajemen_user';

// Dummy user untuk header
$headerUser = [
    'name' => 'John Doe',
    'role' => 'Admin'
];

// Dummy data user
$users = [
    [
        'name' => 'Jane Cooper',
        'role' => 'Manager',
        'department' => 'Purchasing',
        'division' => 'Operasional',
        'last_activity' => 'Login (12/10/2025 22:50)'
    ],
    [
        'name' => 'Budi Santoso',
        'role' => 'SPV',
        'department' => 'Gudang',
        'division' => 'Logistik',
        'last_activity' => 'Approve PR-0123 (12/10/2025 21:15)'
    ],
    [
        'name' => 'Risa Dewi',
        'role' => 'Staff',
        'department' => 'Purchasing',
        'division' => 'Pengadaan',
        'last_activity' => 'Buat PR-0124 (13/10/2025 09:30)'
    ],
    [
        'name' => 'Ahmad Fauzi',
        'role' => 'General Manager',
        'department' => 'Management',
        'division' => 'Eksekutif',
        'last_activity' => 'Login (13/10/2025 10:00)'
    ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User | Logistix</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 flex min-h-screen">

    <!-- SIDEBAR -->
    <?php include 'partials/sidebar.php'; ?>

    <!-- MAIN WRAPPER -->
    <main class="flex-1 ml-64 flex flex-col">

        <!-- HEADER -->
        <?php include 'partials/header.php'; ?>

        <!-- CONTENT WRAPPER — match dashboard bidding -->
        <div class="p-10">

            <!-- TITLE + BUTTON -->
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-semibold text-slate-800">Manajemen User</h1>

                <a href="user-add.php"
                   class="bg-indigo-600 hover:bg-indigo-700 transition text-white font-medium py-2.5 px-5 rounded-lg shadow">
                    Tambah User
                </a>
            </div>

            <!-- TABLE CARD — match bidding card -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-md overflow-hidden">

                <table class="w-full text-sm">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Nama User</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Peran</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Departemen</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Divisi</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Aktivitas Terakhir</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-900">
                                <?= htmlspecialchars($user['name']) ?>
                            </td>
                            <td class="px-6 py-4 text-slate-700"><?= htmlspecialchars($user['role']) ?></td>
                            <td class="px-6 py-4 text-slate-700"><?= htmlspecialchars($user['department']) ?></td>
                            <td class="px-6 py-4 text-slate-700"><?= htmlspecialchars($user['division']) ?></td>
                            <td class="px-6 py-4 text-slate-700"><?= htmlspecialchars($user['last_activity']) ?></td>
                            <td class="px-6 py-4 text-right">
                                <a href="user-detail.php?id=<?= urlencode($user['name']) ?>"
                                   class="text-indigo-600 hover:text-indigo-800 font-medium">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </main>

</body>
</html>
