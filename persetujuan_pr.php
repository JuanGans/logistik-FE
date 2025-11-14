<?php
$headerUser = [ 'name' => 'John Doe', 'role' => 'Admin' ];
$currentPage = "persetujuan_pr";

$prList = [
    "PR/PROC/X/25/0765 - Maintenance",
    "PR/PROC/X/25/0743 - Engineering",
    "PR/PROC/X/25/0720 - Maintenance",
];

$prDetail = [
    'nomor'         => 'PR/PROC/X/25/0765',
    'requestor'     => 'Budi Santoso',
    'department'    => 'Maintenance',
    'tgl_request'   => '12/10/2025',
    'tgl_harap'     => '20/10/2025',
    'items' => [
        [ 'nama' => 'Bearing 6205 ZZ', 'qty' => 10, 'approved' => 10, 'status' => 'Setuju' ],
        [ 'nama' => 'V-Belt B-52', 'qty' => 5,  'approved' => 0,  'status' => 'Tolak' ],
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Persetujuan Purchase Request</title>

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

    <!-- === SIDEBAR (dari bidding) === -->
    <?php include "partials/sidebar.php"; ?>

    <!-- === MAIN WRAPPER === -->
    <main class="flex-1 flex flex-col ml-64">

        <!-- === HEADER (dari bidding) === -->
        <?php include "partials/header.php"; ?>

        <!-- === PAGE BODY === -->
        <div class="p-10 flex-1">
            <div class="bg-white shadow-md rounded-xl p-8 border border-slate-200">

                <h2 class="text-2xl font-semibold text-slate-800 mb-6">
                    Persetujuan Purchase Request
                </h2>

                <!-- Dropdown Cari PR -->
                <div class="mb-8">
                    <label class="font-medium text-slate-700">Cari No. PR:</label>
                    <select class="w-full mt-2 rounded-xl border-slate-300 px-4 py-3 shadow-sm focus:ring-indigo-500">
                        <?php foreach ($prList as $p): ?>
                            <option><?= $p ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- BOX DETAIL -->
                <div class="border border-slate-200 rounded-xl p-6">

                    <h3 class="text-lg font-semibold text-slate-800 mb-4">
                        Detail <?= $prDetail['nomor'] ?>
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div>
                            <p class="text-sm text-slate-500">Requestor:</p>
                            <p class="font-semibold"><?= $prDetail['requestor'] ?></p>
                        </div>

                        <div>
                            <p class="text-sm text-slate-500">Departemen:</p>
                            <p class="font-semibold"><?= $prDetail['department'] ?></p>
                        </div>

                        <div>
                            <p class="text-sm text-slate-500">Tgl Request:</p>
                            <p class="font-semibold"><?= $prDetail['tgl_request'] ?></p>
                        </div>

                        <div>
                            <p class="text-sm text-slate-500">Tgl Diharapkan:</p>
                            <p class="font-semibold"><?= $prDetail['tgl_harap'] ?></p>
                        </div>
                    </div>

                    <table class="w-full mt-4">
                        <thead>
                            <tr class="bg-slate-50 text-slate-700 text-sm border-y border-slate-200">
                                <th class="text-left py-3 px-3">Item</th>
                                <th class="text-left py-3 px-3">Qty Diajukan</th>
                                <th class="text-left py-3 px-3">Qty Disetujui</th>
                                <th class="text-left py-3 px-3">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($prDetail['items'] as $item): ?>
                                <tr class="border-b border-slate-200">
                                    <td class="py-3 px-3"><?= $item['nama'] ?></td>
                                    <td class="py-3 px-3"><?= $item['qty'] ?></td>
                                    <td class="py-3 px-3">
                                        <input 
                                            type="number" 
                                            value="<?= $item['approved'] ?>"
                                            class="border rounded-lg px-3 py-2 w-24 text-center"
                                        >
                                    </td>
                                    <td class="py-3 px-3">
                                        <select class="border rounded-lg px-3 py-2">
                                            <option <?= $item['status']=='Setuju'?'selected':'' ?>>Setuju</option>
                                            <option <?= $item['status']=='Tolak'?'selected':'' ?>>Tolak</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>

                <!-- BUTTONS -->
                <div class="flex justify-end gap-3 mt-8">
                    <button class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-8 py-3 rounded-lg font-semibold">
                        Simpan Draft
                    </button>

                    <button class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold">
                        Submit Persetujuan
                    </button>
                </div>

            </div>
        </div>

    </main>

</body>
</html>
