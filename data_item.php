<?php
// data_item.php

// -----------------------------------------------------------
// Variabel Data Dummy (Untuk simulasi data header dan form)
$headerUser = [
    'name' => 'John Doe', // Untuk header
    'role' => 'Admin'     // Untuk header
];

// Data default untuk form Item
$itemData = [
    'item_id' => 'ITM-00123',
    'group_options' => [
        'Bahan Baku' => 'selected', 
        'ATK' => '', 
        'Sparepart' => ''
    ],
    'class_options' => [
        'Bahan Kimia' => 'selected',
        'Elektronik' => '', 
        'Kertas' => ''
    ],
    'category_options' => [
        'Inventory' => 'selected',
        'Expenses' => '', 
        'Asset' => ''
    ]
];

// Dummy data untuk tabel (kamu bisa ganti ke DB nanti)
$itemList = [
    [
        'id' => 'ITM-00123',
        'nama' => 'Bahan Kimia Cair',
        'group' => 'Bahan Baku',
        'class' => 'Bahan Kimia',
        'kategori' => 'Inventory'
    ],
    [
        'id' => 'ITM-00124',
        'nama' => 'Kertas A4',
        'group' => 'ATK',
        'class' => 'Kertas',
        'kategori' => 'Expenses'
    ]
];

// -----------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Item | Logistix</title>
    
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
            z-index: 20;
        }

        .sidebar-link.active {
            background-color: #4f46e5;
            color: #ffffff;
            font-weight: 600;
        }
        .sidebar-link:not(.active):hover {
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
    
    <?php 
        $currentPage = 'item-data.php'; 
        include 'partials/sidebar.php'; 
    ?> 

    <div class="main-content-wrapper"> 
        
        <?php include 'partials/header.php'; ?>

        <main class="p-8 flex-1">
            
            <div id="item-data-page" class="page-content">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-slate-800">Master Data Item</h2> 
                    
                    <button id="openModalAdd" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                        Tambah Item
                    </button>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700">No. ID Item</label>
                            <input type="text" value="<?php echo $itemData['item_id']; ?>" 
                            class="mt-1 block w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-md shadow-sm" readonly>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Nama Item</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Barcode Produk</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Barcode Item</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Group</label>
                            <select class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                                <?php foreach ($itemData['group_options'] as $option => $sel): ?>
                                    <option <?php echo $sel; ?>><?php echo $option; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Class</label>
                            <select class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                                <?php foreach ($itemData['class_options'] as $option => $sel): ?>
                                    <option <?php echo $sel; ?>><?php echo $option; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700">Kategori</label>
                            <select class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                                <?php foreach ($itemData['category_options'] as $option => $sel): ?>
                                    <option <?php echo $sel; ?>><?php echo $option; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="md:col-span-2 text-right">
                            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700">
                                Simpan Item
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ============================ -->
                <!-- TABEL DATA ITEM TERSIMPAN -->
                <!-- ============================ -->

                <div class="bg-white p-8 rounded-xl shadow-md mt-8">
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Data Item Tersimpan</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-slate-300 rounded-lg overflow-hidden">
                            <thead class="bg-slate-200">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700 border-b">No</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700 border-b">ID Item</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700 border-b">Nama</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700 border-b">Group</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700 border-b">Class</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700 border-b">Kategori</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700 border-b">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                <?php $no = 1; foreach ($itemList as $item): ?>
                                <tr class="border-b hover:bg-slate-100">
                                    <td class="px-4 py-2 text-sm"><?php echo $no++; ?></td>
                                    <td class="px-4 py-2 text-sm"><?php echo $item['id']; ?></td>
                                    <td class="px-4 py-2 text-sm"><?php echo $item['nama']; ?></td>
                                    <td class="px-4 py-2 text-sm"><?php echo $item['group']; ?></td>
                                    <td class="px-4 py-2 text-sm"><?php echo $item['class']; ?></td>
                                    <td class="px-4 py-2 text-sm"><?php echo $item['kategori']; ?></td>
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


    <!-- MODAL TAMBAH ITEM -->
    <div id="modalAddItem" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6">
            <h3 class="text-xl font-semibold text-slate-800 mb-4">Tambah Item Baru</h3>
            
            <form class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Nama Item</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Barcode Produk</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Barcode Item</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm">
                </div>

                <div class="text-right mt-4 space-x-2">
                    <button id="closeModalAdd" type="button" class="px-4 py-2 bg-slate-300 rounded-lg font-medium">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modalAdd = document.getElementById("modalAddItem");
        const openAdd = document.getElementById("openModalAdd");
        const closeAdd = document.getElementById("closeModalAdd");

        openAdd.addEventListener("click", () => {
            modalAdd.classList.remove("hidden");
            modalAdd.classList.add("flex");
        });

        closeAdd.addEventListener("click", () => {
            modalAdd.classList.add("hidden");
            modalAdd.classList.remove("flex");
        });
    </script>

</body>
</html>
