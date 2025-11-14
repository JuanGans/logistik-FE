<?php
$headerUser = [ 'name' => 'John Doe', 'role' => 'Admin' ];
$currentPage = "purchase_request";

$requestDate = '12 Oktober 2025';
$prNumber = 'PR/PROC/X/25/0765';
$unit = 'Produksi';
$department = 'Maintenance';

$itemGroups = ['Bearing','Elektrik','Machining','Material','Sparepart'];
$items = ['Bearing 6205 ZZ','Bearing 6302 RS','Cable NYA 1.5mm','Grease SKF','Seal Oil 20x40x8','Belt V A51'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Purchase Request</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }
    </style>
</head>

<body class="bg-slate-100 flex min-h-screen">

    <!-- === SIDEBAR (mengikuti layout bidding) === -->
    <?php include "partials/sidebar.php"; ?>

    <!-- === MAIN WRAPPER (mengikuti layout bidding) === -->
    <main class="flex-1 flex flex-col ml-64">

        <!-- === HEADER (mengikuti layout bidding) === -->
        <?php include "partials/header.php"; ?>

        <!-- === PAGE CONTENT === -->
        <div class="p-10 flex-1">
            <div class="bg-white p-8 shadow-md rounded-xl border border-slate-200">

                <h2 class="text-2xl font-semibold text-slate-800 mb-8">Formulir Purchase Request (PR)</h2>

                <!-- TOP INFO GRID -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10 pb-6 border-b border-slate-200">
                    <div>
                        <label class="text-sm text-slate-600">Tanggal Request</label>
                        <p class="font-semibold text-slate-800"><?=$requestDate?></p>
                    </div>
                    <div>
                        <label class="text-sm text-slate-600">No. PR</label>
                        <p class="font-semibold text-slate-800"><?=$prNumber?></p>
                    </div>
                    <div>
                        <label class="text-sm text-slate-600">Unit</label>
                        <p class="font-semibold text-slate-800"><?=$unit?></p>
                    </div>
                    <div>
                        <label class="text-sm text-slate-600">Department</label>
                        <p class="font-semibold text-slate-800"><?=$department?></p>
                    </div>
                </div>

                <!-- INPUT FORM -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div>
                        <label class="text-sm text-slate-600 mb-1 block">Expected Date Delivery</label>
                        <div class="relative">
                            <input type="text" placeholder="dd/mm/yyyy" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 pr-10 focus:ring-indigo-500 focus:border-indigo-500">
                            <i class="fa fa-calendar-alt text-slate-400 absolute right-3 top-1/2 -translate-y-1/2"></i>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm text-slate-600 mb-1 block">Group of Item</label>
                        <div class="relative">
                            <select class="w-full border border-slate-300 rounded-lg px-3 py-2.5 pr-10 appearance-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">-- Cari Group --</option>
                                <?php foreach ($itemGroups as $g): ?>
                                    <option><?=$g?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="fa fa-chevron-down text-slate-500 absolute right-3 top-1/2 -translate-y-1/2 text-sm"></i>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm text-slate-600 mb-1 block">Lokasi Tujuan (Gudang)</label>
                        <input type="text" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Isikan manual jika perlu">
                    </div>
                </div>

                <h3 class="text-xl font-semibold text-slate-800 mb-4">Detail Item</h3>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="p-3 text-left font-medium text-slate-600">Item</th>
                                <th class="p-3 text-left font-medium text-slate-600 w-56">Volume (Qty)</th>
                                <th class="w-10"></th>
                            </tr>
                        </thead>

                        <tbody id="item-list">
                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="p-3">
                                    <div class="relative">
                                        <select class="w-full border border-slate-300 rounded-lg px-3 py-2.5 pr-10 text-sm appearance-none focus:ring-indigo-500 focus:border-indigo-500">
                                            <?php foreach ($items as $i): ?>
                                                <option><?=$i?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <i class="fa fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 text-xs"></i>
                                    </div>
                                </td>

                                <td class="p-3">
                                    <div class="relative">
                                        <input type="number" value="10" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 pr-10 text-sm text-right focus:ring-indigo-500 focus:border-indigo-500">
                                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 text-xs">Pcs</span>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <button class="text-red-500 hover:text-red-700"><i class="fa fa-times text-lg"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button class="mt-4 flex items-center text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                    <i class="fa fa-plus mr-1 text-xs"></i> Tambah Item
                </button>

                <div class="flex justify-end mt-12">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-3 rounded-lg font-semibold shadow">
                        Submit Request
                    </button>
                </div>

            </div>
        </div>

    </main>

</body>
</html>
