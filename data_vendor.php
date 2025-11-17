<?php
// data_vendor.php

// -----------------------------------------------------------
// Variabel Data Dummy 
$headerUser = [
    'name' => 'John Doe',
    'role' => 'Admin'   
];

// Data default untuk form Vendor
$vendorData = [
    'id' => 'VND-0891',
];
// -----------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Vendor | Logistix</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    
    <style>
        body { font-family: 'Inter', sans-serif; }

        .sidebar-link.active {
            background-color: #4f46e5; 
            color: #ffffff;
            font-weight: 600;
        }
        .sidebar-link:not(.active):hover {
            background-color: #334155;
        }

        .custom-scrollbar-hide::-webkit-scrollbar { display: none; }
        .custom-scrollbar-hide {
            -ms-overflow-style: none;  
            scrollbar-width: none;  
        }

        .main-content-wrapper {
            margin-left: 16rem; 
            width: calc(100% - 16rem);
            min-height: 100vh;
        }
    </style>
</head>
<body class="bg-slate-100"> 

    <!-- Sidebar DIPANGGIL DARI FILE LUAR -->
    <?php 
        $currentPage = 'data_vendor.php'; 
        include 'partials/sidebar.php';
    ?>

    <div class="main-content-wrapper"> 
        
        <header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-10 h-20"> 
            <div class="flex justify-between items-center h-full px-8">
                <h1 class="text-xl font-semibold text-slate-900">Master Vendor</h1>
                
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="py-2 pl-4 pr-10 border border-slate-300 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm w-48">
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


        <!-- ====== HALAMAN VENDOR (TIDAK DIUBAH SAMA SEKALI) ====== -->
        <main class="p-8 flex-1">
            <div id="vendor-data-page" class="page-content">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-slate-800">Master Data Vendor</h2>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">Tambah Vendor</button>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <form class="space-y-6">

                        <!-- FORM VENDOR TIDAK DIUTAK ATIK -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700">No. Vendor</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-md" 
                                value="<?= htmlspecialchars($vendorData['id']); ?>" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Nama Vendor</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Badan Usaha</label>
                                <select class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md bg-white">
                                    <option>PT</option><option>CV</option><option>Individual</option>
                                </select>
                            </div>
                        </div>

                        <div>
                             <label class="block text-sm font-medium text-slate-700">Alamat Vendor</label>
                             <textarea rows="3" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700">NIB</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700">NPWP</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md">
                            </div>
                            <div>
                                 <label class="block text-sm font-medium text-slate-700">PKP</label>
                                 <div class="mt-2 flex items-center space-x-4">
                                     <label><input type="radio" name="pkp" value="Ya"> <span class="ml-2">Ya</span></label>
                                     <label><input type="radio" name="pkp" value="Tidak" checked> <span class="ml-2">Tidak</span></label>
                                 </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-t pt-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Penanggung Jawab</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Jabatan</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Nama Sales</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700">No. Telp/HP</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700">Alamat Email</label>
                                <input type="email" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md">
                            </div>
                        </div>

                        <div class="pt-4 text-right">
                             <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700">Simpan Vendor</button>
                        </div>

                    </form>
                </div>

                <!-- Tabel vendor tetap -->
                <div class="bg-white p-8 rounded-xl shadow-md mt-8">
                    <h3 class="text-xl font-semibold text-slate-700 mb-4">Data Vendor Tersimpan</h3>

                    <!-- Search & display option -->
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" placeholder="Cari Kode atau Nama Vendor..." class="py-2 px-3 border border-slate-300 rounded-md w-64">
                        <select class="py-2 px-3 border border-slate-300 rounded-md">
                            <option>Tampilkan 10</option>
                            <option>Tampilkan 25</option>
                        </select>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">No. Vendor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Nama Vendor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Badan Usaha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">NPWP/PKP</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-slate-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-200 text-slate-700">
                                <tr>
                                    <td class="px-6 py-4 text-sm">VND-0801</td>
                                    <td class="px-6 py-4 text-sm font-medium">PT Solusi Prima</td>
                                    <td class="px-6 py-4 text-sm">PT</td>
                                    <td class="px-6 py-4 text-sm">PKP</td>
                                    <td class="px-6 py-4 text-center space-x-2">
                                        <button class="text-indigo-600"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-600"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-sm">VND-0802</td>
                                    <td class="px-6 py-4 text-sm font-medium">CV Jaya Abadi</td>
                                    <td class="px-6 py-4 text-sm">CV</td>
                                    <td class="px-6 py-4 text-sm">Non-PKP</td>
                                    <td class="px-6 py-4 text-center space-x-2">
                                        <button class="text-indigo-600"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-600"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 flex justify-between items-center text-sm text-slate-600">
                        <div>Menampilkan 1 sampai 10 dari 25 data</div>
                        <div class="space-x-1">
                            <button class="px-3 py-1 border border-slate-300 rounded-md">Sebelumnya</button>
                            <button class="px-3 py-1 border border-indigo-600 bg-indigo-600 text-white rounded-md">1</button>
                            <button class="px-3 py-1 border border-slate-300 rounded-md">2</button>
                            <button class="px-3 py-1 border border-slate-300 rounded-md">Selanjutnya</button>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

</body>
</html>
