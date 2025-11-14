<?php 
$currentPage = 'dashboard';

// Dummy user
$headerUser = [
    'name' => 'John Doe',
    'role' => 'Admin'
];

$userName = "John";

// Dummy statistik
$stats = [
    [
        'label' => 'Purchase Request Baru',
        'value' => 12,
        'color' => 'bg-blue-100 text-blue-600',
        'icon'  => 'fa-file-circle-plus'
    ],
    [
        'label' => 'PO Menunggu GR',
        'value' => 8,
        'color' => 'bg-green-100 text-green-600',
        'icon'  => 'fa-circle-check'
    ],
    [
        'label' => 'Stok Kritis',
        'value' => "21 Item",
        'color' => 'bg-yellow-100 text-yellow-600',
        'icon'  => 'fa-clock'
    ],
    [
        'label' => 'Pengajuan Ditolak',
        'value' => 3,
        'color' => 'bg-red-100 text-red-600',
        'icon'  => 'fa-ban'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Logistix</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }
    </style>
</head>

<body class="bg-slate-100 flex min-h-screen">

    <!-- SIDEBAR -->
    <?php include 'partials/sidebar.php'; ?>

    <!-- MAIN WRAPPER -->
    <main class="flex-1 flex flex-col ml-64">

        <!-- HEADER (Topbar) -->
        <?php include 'partials/header.php'; ?>

        <!-- PAGE CONTENT -->
        <div class="p-10 flex-1">

            <!-- TITLE -->
            <h2 class="text-3xl font-semibold text-slate-800 mb-8">
                Selamat Datang, <?= $userName ?>!
            </h2>

            <!-- STATISTIC CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <?php foreach ($stats as $s): ?>
                <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-md flex items-center gap-5">
                    
                    <!-- Icon -->
                    <div class="p-4 rounded-full text-xl <?= $s['color'] ?>">
                        <i class="fa-solid <?= $s['icon'] ?>"></i>
                    </div>

                    <div>
                        <p class="text-slate-600 text-sm"><?= $s['label'] ?></p>
                        <p class="text-2xl font-bold text-slate-800"><?= $s['value'] ?></p>
                    </div>

                </div>
                <?php endforeach; ?>

            </div>

        </div>
    </main>

</body>
</html>
