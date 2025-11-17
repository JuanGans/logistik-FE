<?php
// data_gudang.php

// -----------------------------------------------------------
// Variabel Data Dummy (Untuk simulasi data header dan form)
$headerUser = [
    'name' => 'John Doe', // Untuk header
    'role' => 'Admin'    // Untuk header
];

// Data default untuk form Gudang
$warehouseData = [
    'gudang_id' => 'GDG-JKT-01', // ID Gudang statis seperti pada gambar
];

// Dummy data tabel gudang
$warehouseList = [
    [
        'id' => 'GDG-JKT-01',
        'nama' => 'Gudang Jakarta Pusat',
        'lokasi' => 'Jl. Merdeka No. 1',
        'sublokasi' => 'Mobile A-1'
    ],
    [
        'id' => 'GDG-SBY-02',
        'nama' => 'Gudang Surabaya Timur',
        'lokasi' => 'Jl. Kenjeran No. 22',
        'sublokasi' => 'Mobile B-3'
    ],
];

// Set halaman saat ini agar sidebar.php tahu mana yang harus diaktifkan.
$currentPage = 'data_gudang.php'; 
// -----------------------------------------------------------

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Gudang | Logistix</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    
    <style>
        :root {
            --primary-color: #4e73df;
            --sidebar-bg: #2c3e50;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar-custom {
            width: 16rem;
            background-color: var(--sidebar-bg);
            padding: 1rem 0;
            min-height: 100vh;
            position: fixed; 
            top: 0;
            left: 0;
        }

        .sidebar-link.active, .master-data-link.active {
            background-color: #4f46e5;
            color: #ffffff;
            font-weight: 600;
        }
        .sidebar-link:not(.active):hover, .master-data-link:not(.active):hover {
            background-color: #334155;
        }

        .main-content-wrapper {
            margin-left: 16rem;
            flex-grow: 1; 
            display: flex;
            flex-direction: column;
            width: calc(100% - 16rem);
            min-height: 100vh;
        }
        
    </style>
</head>
<body class="bg-slate-100"> 
    
    <?php include 'partials/sidebar.php'; ?>

    <div class="main-content-wrapper"> 
        
        <header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-10 h-20"> 
            <div class="flex justify-between items-center h-full px-8">
                <h1 class="text-xl font-semibold text-slate-900">Master Gudang</h1>
                
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="py-2 pl-4 pr-10 border border-slate-300 rounded-lg text-sm w-48">
                        <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
                    </div>
                    
                    <div class="flex items-center space-x-2 cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-semibold text-sm">
                            JD
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-slate-700 leading-none"><?= htmlspecialchars($headerUser['name']); ?></p>
                            <p class="text-xs text-slate-500"><?= htmlspecialchars($headerUser['role']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="p-8 flex-1">
            
            <div id="warehouse-data-page" class="page-content">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-slate-800">Master Data Gudang</h2>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">Tambah Gudang</button>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700">No. Gudang</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-md shadow-sm" 
                                   value="<?= htmlspecialchars($warehouseData['gudang_id']); ?>" readonly>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Nama Gudang</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Lokasi Unit Gudang</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Sub Lokasi Gudang Mobile</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                        </div>
                        
                        <div class="md:col-span-2 text-right">
                            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700">Simpan Gudang</button>
                        </div>
                    </form>
                </div>

                <!-- ============================ -->
                <!-- TABEL DATA GUDANG -->
                <!-- ============================ -->

                <div class="bg-white p-8 rounded-xl shadow-md mt-8">
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Data Gudang Tersimpan</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-slate-300 rounded-lg">
                            <thead class="bg-slate-200">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold border-b">No</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold border-b">ID Gudang</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold border-b">Nama Gudang</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold border-b">Lokasi</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold border-b">Sub Lokasi</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold border-b">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                <?php $no = 1; foreach ($warehouseList as $row): ?>
                                <tr class="border-b hover:bg-slate-100">
                                    <td class="px-4 py-2 text-sm"><?= $no++; ?></td>
                                    <td class="px-4 py-2 text-sm"><?= $row['id']; ?></td>
                                    <td class="px-4 py-2 text-sm"><?= $row['nama']; ?></td>
                                    <td class="px-4 py-2 text-sm"><?= $row['lokasi']; ?></td>
                                    <td class="px-4 py-2 text-sm"><?= $row['sublokasi']; ?></td>
                                    <td class="px-4 py-2 text-sm">
                                        <button class="text-indigo-600 font-semibold">Edit</button>
                                        <button class="ml-3 text-red-600 font-semibold">Hapus</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </main>
        
    </div>
    
</body>
</html>
