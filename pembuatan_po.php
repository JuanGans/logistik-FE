<?php
$headerUser = [ 'name' => 'John Doe', 'role' => 'Admin' ];
$currentPage = "pembuatan_po";

$divisionName = "Produksi";

// Dummy PR Bidding
$prBiddingList = [
    'PR/PROC/X/25/0765 - Bearing 6205 ZZ - CV. Mitra Teknik',
    'PR/PROC/X/25/0766 - Oli Mesin A - PT. Sinar Jaya Abadi',
    'PR/PROC/X/25/0767 - Filter Udara - UD. Barokah Sentosa',
];

$today = date('Y-m-d');
$expectedArrival = '2025-11-21';

// Detail PO Dummy
$detailPO = [
    'no_po' => 'PO/MT/X/25/0432',
    'vendor' => 'CV. Mitra Teknik',
    'item' => 'Bearing 6205 ZZ',
    'volume' => 10,
    'satuan' => 'Pcs',
    'hargaSatuan' => 52500,
    'tglPO' => $today,
    'tglTiba' => $expectedArrival,
    'ppn_rate' => 0.11
];

$subtotal = $detailPO['volume'] * $detailPO['hargaSatuan'];
$ppn = floor($subtotal * $detailPO['ppn_rate']);
$grandTotal = $subtotal + $ppn;

function formatRupiah($n){ return 'Rp ' . number_format($n,0,',','.'); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembuatan PO</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color:#f1f5f9;
    }

    /* LABEL */
    .input-label {
        display:block;
        font-size:13px;
        font-weight:500;
        color:#64748b;
        margin-bottom:4px;
    }

    /* INPUT TEXT */
    .form-input {
        width:100%;
        border:1px solid #cbd5e1;
        border-radius:8px;
        box-shadow:0 1px 2px rgba(0,0,0,0.05);
        padding:10px 12px;
        font-size:13px;
        color:#334155;
        height:42px;
    }

    .form-static-bg {
        background:#f1f5f9;
        color:#475569;
        font-weight:600;
        cursor:not-allowed;
    }

    /* TABEL */
    .table-header {
        padding:12px 16px;
        background:#f8fafc;
        color:#64748b;
        font-size:12px;
        font-weight:600;
        letter-spacing:0.5px;
        text-transform:uppercase;
    }

    .table-cell {
        padding:12px 16px;
        color:#334155;
        font-size:14px;
    }

    /* DATE INPUT */
    .input-date-wrapper {
        position: relative;
        width: 100%;
    }

    .input-date {
        width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        padding: 10px 40px 10px 12px;
        font-size: 13px;
        color: #334155;
        background: white;
        height: 42px;
        line-height: 42px;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        opacity: 0;
        cursor: pointer;
    }

    .input-date-wrapper i {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 15px;
        color: #475569;
        pointer-events: none;
    }

    /* BUTTON PRIMARY */
    .btn-primary {
        background:#4f46e5;
        color:white;
        padding:12px 40px;
        border-radius:10px;
        font-weight:600;
        box-shadow:0 2px 6px rgba(0,0,0,0.15);
        display:flex;
        align-items:center;
        transition:0.2s;
    }

    .btn-primary:hover {
        background:#4338ca;
    }
</style>
</head>

<body class="bg-slate-100 flex min-h-screen">

<!-- === SIDEBAR === -->
<?php include "partials/sidebar.php"; ?>

<!-- === MAIN WRAPPER === -->
<main class="flex-1 flex flex-col ml-64">

    <!-- === HEADER === -->
    <?php include "partials/header.php"; ?>

    <!-- === PAGE CONTENT === -->
    <div class="p-10 flex-1">

        <h2 class="text-md font-semibold text-slate-700 mb-6 pb-2 border-b border-slate-300">
            <?= $divisionName ?> – Pembuatan Purchase Order (PO)
        </h2>

        <!-- CARD -->
        <div class="bg-white p-8 rounded-xl shadow-md border border-slate-200">

            <!-- SELECT PR -->
            <div class="mb-8 p-4 border border-indigo-200 bg-indigo-50 rounded-lg">
                <label class="font-medium text-slate-700 text-sm">Pilih PR Released (Bidding Approved):</label>
                <div class="relative mt-2 w-full max-w-xl">
                    <select class="form-input pr-10 bg-white">
                        <?php foreach ($prBiddingList as $k=>$pr): ?>
                            <option <?= $k==0?'selected':'' ?>><?= $pr ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- DETAIL PO -->
            <h3 class="text-xl font-semibold text-slate-800 mb-6">Detail PO</h3>

            <form>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10 pb-6 border-b border-slate-200">

                    <div>
                        <label class="input-label">No. PO</label>
                        <input type="text" class="form-input form-static-bg" value="<?= $detailPO['no_po'] ?>" readonly>
                    </div>

                    <div>
                        <label class="input-label">Vendor</label>
                        <input type="text" class="form-input form-static-bg" value="<?= $detailPO['vendor'] ?>" readonly>
                    </div>

                    <!-- Tanggal PO -->
                    <div>
                        <label class="input-label">Tanggal PO</label>
                        <div class="input-date-wrapper">
                            <input 
                                type="date" 
                                class="input-date"
                                value="<?= $detailPO['tglPO'] ?>"
                            >
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>

                    <!-- Tanggal Tiba -->
                    <div>
                        <label class="input-label">Tgl Diharapkan Tiba</label>
                        <div class="input-date-wrapper">
                            <input 
                                type="date" 
                                class="input-date"
                                value="<?= $detailPO['tglTiba'] ?>"
                            >
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>

                </div>

                <div class="overflow-x-auto mb-8 border border-slate-200 rounded-lg">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead>
                        <tr>
                            <th class="table-header text-left">Item</th>
                            <th class="table-header text-center">Volume</th>
                            <th class="table-header text-right">Harga Satuan</th>
                            <th class="table-header text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                        <tr>
                            <td class="table-cell font-medium"><?= $detailPO['item'] ?></td>
                            <td class="table-cell text-center"><?= $detailPO['volume'].' '.$detailPO['satuan'] ?></td>
                            <td class="table-cell text-right"><?= formatRupiah($detailPO['hargaSatuan']) ?></td>
                            <td class="table-cell text-right"><?= formatRupiah($subtotal) ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-end">
                    <div class="w-full max-w-sm space-y-2 pr-4 text-slate-700">
                        <div class="flex justify-between text-sm">
                            <span>Subtotal</span>
                            <span class="font-medium"><?= formatRupiah($subtotal) ?></span>
                        </div>
                        <div class="flex justify-between text-sm border-b pb-2">
                            <span>PPN 11%</span>
                            <span class="font-medium"><?= formatRupiah($ppn) ?></span>
                        </div>
                        <div class="flex justify-between text-xl font-bold text-indigo-700 pt-2">
                            <span class="text-base font-semibold">Grand Total</span>
                            <span class="text-2xl font-bold"><?= formatRupiah($grandTotal) ?></span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-10">
                    <button class="btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i> Buat & Kirim PO
                    </button>
                </div>

            </form>

        </div>

    </div>

</main>

</body>
</html>
