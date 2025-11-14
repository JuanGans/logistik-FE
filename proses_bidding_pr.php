<?php
// proses_bidding_pr.php (FINAL)

// -----------------------------------------------------------
// Dummy Data & Context
$headerUser = [
    'name' => 'John Doe',
    'role' => 'Admin'
];

$prNumberSelected = 'PR/PROC/X/25/0765';
$biddingItem = [
    'item_name' => 'Bearing 6205 ZZ',
    'qty' => 10,
];

$vendorList = [
    'PT. Sinar Jaya Abadi',
    'CV. Mitra Teknik',
    'UD. Baja Perkasa',
    'Toko Makmur Sentosa',
];

$dummyBiddings = [
    [
        'id' => 1,
        'nama_vendor' => 'PT. Sinar Jaya Abadi',
        'harga_satuan' => 55000,
        'total' => 550000,
        'term_of_payment' => '30 Hari',
        'file_uploaded' => false,
    ],
    [
        'id' => 2,
        'nama_vendor' => 'CV. Mitra Teknik',
        'harga_satuan' => 52500,
        'total' => 525000,
        'term_of_payment' => '14 Hari',
        'file_uploaded' => false,
    ]
];

$currentPage = 'pr-bidding-page';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Bidding PR | Logistix</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }

        .form-input, .form-select {
            @apply w-full border border-slate-300 rounded-lg shadow-sm px-3 py-2.5 text-slate-700 
            focus:ring-indigo-500 focus:border-indigo-500 transition duration-150;
        }
        .input-label {
            @apply block text-sm font-medium text-slate-600 mb-1;
        }
        .total-input {
            @apply bg-slate-200 text-slate-800 font-semibold;
        }
    </style>
</head>

<body class="bg-slate-100 flex min-h-screen">

    <?php include 'partials/sidebar.php'; ?>

    <main class="flex-1 flex flex-col ml-64">

        <?php include 'partials/header.php'; ?>

        <div class="p-10 flex-1">
            <div class="bg-white p-8 rounded-xl shadow-md border border-slate-200">

                <h2 class="text-2xl font-semibold text-slate-800 mb-3">
                    Proses Bidding PR
                </h2>

                <p class="text-slate-600">
                    Item dari <strong class="text-slate-800"><?= $prNumberSelected ?></strong> yang disetujui:
                </p>

                <h3 class="text-xl font-bold text-indigo-700 mt-2 mb-8">
                    Item: <?= $biddingItem['item_name'] ?> (Qty: <?= $biddingItem['qty'] ?>)
                </h3>

                <!-- GRID PENAWARAN -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                    <?php foreach ($dummyBiddings as $index => $bidding): ?>
                    <div class="p-6 border border-slate-200 rounded-xl shadow-sm bg-white vendor-card overflow-hidden">

                        <h4 class="text-lg font-semibold text-slate-800 mb-5">
                            Penawaran <?= $index + 1 ?>
                        </h4>

                        <div class="space-y-5">

                            <!-- Vendor -->
                            <div>
                                <label class="input-label">Nama Vendor</label>
                                <select class="form-select bg-white">
                                    <option value="">-- Pilih Vendor --</option>
                                    <?php foreach ($vendorList as $vendor): ?>
                                        <option 
                                            value="<?= $vendor ?>" 
                                            <?= $vendor == $bidding['nama_vendor'] ? 'selected' : '' ?>>
                                            <?= $vendor ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Harga & Total -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="input-label">Harga Satuan</label>
                                    <input 
                                        type="number" 
                                        class="form-input harga-satuan"
                                        value="<?= $bidding['harga_satuan'] ?>"
                                        data-index="<?= $index ?>">
                                </div>

                                <div>
                                    <label class="input-label">Total</label>
                                    <input 
                                        type="text" 
                                        class="form-input total-input total-harga" 
                                        disabled
                                        value="<?= number_format($bidding['total'],0,',','.') ?>">
                                </div>
                            </div>

                            <!-- Term of Payment -->
                            <div>
                                <label class="input-label">Term of Payment</label>
                                <input 
                                    type="text" 
                                    class="form-input" 
                                    value="<?= $bidding['term_of_payment'] ?>">
                            </div>

                            <!-- File Upload -->
                            <div>
                                <label class="input-label">Dokumen Penawaran</label>
                                <label class="flex items-center px-4 py-2 bg-white border border-slate-300 rounded-lg cursor-pointer hover:bg-slate-50">
                                    <span class="text-sm text-slate-600">Choose File</span>
                                    <span class="ml-2 text-xs text-slate-400">No file chosen</span>
                                    <input type="file" class="hidden">
                                </label>
                            </div>

                        </div>

                    </div>
                    <?php endforeach; ?>

                </div>

                <!-- SIMPAN ITEM -->
                <div class="mt-8 flex justify-end">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-3 rounded-lg shadow">
                        Simpan Bidding Item Ini
                    </button>
                </div>

                <!-- SUBMIT ALL -->
                <div class="mt-12 flex justify-center border-t border-dashed pt-8">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-semibold px-12 py-4 rounded-xl text-lg shadow flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        Submit Semua Bidding untuk Approval
                    </button>
                </div>

            </div>
        </div>

    </main>

<script>
/* --------------------------
   AUTO HITUNG TOTAL HARGA
--------------------------- */
document.querySelectorAll('.harga-satuan').forEach(input => {
    input.addEventListener('input', function() {

        const parentCard = this.closest('.vendor-card');
        const totalInput = parentCard.querySelector('.total-harga');

        const qty = <?= $biddingItem['qty'] ?>;
        const harga = parseFloat(this.value) || 0;

        const total = harga * qty;

        totalInput.value = total.toLocaleString('id-ID');
    });
});
</script>

</body>
</html>
