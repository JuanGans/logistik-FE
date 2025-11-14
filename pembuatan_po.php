<?php
// pembuatan_po.php - Versi Final Sesuai Screenshot

$headerUser = [ 'name' => 'John Doe', 'role' => 'Admin' ];
$currentPage = "pembuatan_po";

$prBiddingList = [
    'PR/PROC/X/25/0765 - Bearing 6205 ZZ - CV. Mitra Teknik',
    'PR/PROC/X/25/0766 - Oli Mesin A - PT. Sinar Jaya Abadi',
    'PR/PROC/X/25/0767 - Filter Udara - UD. Barokah Sentosa',
];

$today = date('d/m/Y');
$expectedArrival = '21/11/2025';

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
<title>Pembuatan Purchase Order | Logistix</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Inter', sans-serif; }
.input-label { @apply block text-[13px] font-medium text-slate-600 mb-1; }
.form-input { @apply w-full border border-slate-300 rounded-lg shadow-sm px-3 py-2 text-[13px]; }
.form-static-bg { @apply bg-slate-100 text-slate-700 font-semibold cursor-not-allowed; }
.table-header { @apply px-4 py-3 bg-slate-50 text-slate-600 text-xs font-semibold uppercase tracking-wide; }
.table-cell { @apply px-4 py-3 text-slate-700 text-sm; }
.input-icon-right { position:absolute; right:12px; top:50%; transform:translateY(-50%); color:#64748b; }
</style>
</head>

<body class="bg-slate-100 flex min-h-screen">

<!-- SIDEBAR -->
<aside class="w-64 bg-white border-r border-slate-200 fixed inset-y-0 left-0 z-30">
    <?php include "partials/sidebar.php"; ?>
</aside>

<div class="flex-1 flex flex-col ml-64 overflow-y-auto scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-slate-100">

<header class="sticky top-0 bg-white border-b border-slate-200 z-20">
    <?php include "partials/header.php"; ?>
</header>

<main class="p-10 overflow-y-auto scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-slate-100">
<div class="bg-white p-8 rounded-2xl shadow-md border border-slate-200">

<h2 class="text-2xl font-semibold text-slate-800 mb-6">Pembuatan Purchase Order (PO)</h2>

<div class="mb-8 p-4 border border-indigo-200 bg-indigo-50 rounded-lg">
    <label class="font-medium text-slate-700 text-sm">Pilih PR Released (Bidding Approved):</label>
    <div class="relative mt-2 w-full max-w-xl">
        <select class="form-input pr-10 bg-white">
            <?php foreach ($prBiddingList as $k=>$pr): ?>
                <option <?= $k==0?'selected':'' ?>><?= $pr ?></option>
            <?php endforeach; ?>
        </select>
        <i class="fa fa-chevron-down input-icon-right"></i>
    </div>
</div>

<h3 class="text-xl font-semibold text-slate-700 mb-6 border-b pb-2">Detail PO</h3>

<form>
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8 text-sm">

    <div>
        <label class="input-label">No. PO</label>
        <input type="text" class="form-input form-static-bg" value="<?= $detailPO['no_po'] ?>" readonly>
    </div>

    <div>
        <label class="input-label">Vendor</label>
        <input type="text" class="form-input form-static-bg" value="<?= $detailPO['vendor'] ?>" readonly>
    </div>

    <div class="relative">
        <label class="input-label">Tanggal PO</label>
        <input type="text" class="form-input pr-10 font-semibold" value="<?= $detailPO['tglPO'] ?>">
        <i class="fa fa-calendar input-icon-right"></i>
    </div>

    <div class="relative">
        <label class="input-label">Tgl Diharapkan Tiba</label>
        <input type="text" class="form-input pr-10 font-semibold" value="<?= $detailPO['tglTiba'] ?>">
        <i class="fa fa-calendar input-icon-right"></i>
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
    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg flex items-center">
        <i class="fas fa-paper-plane mr-2"></i>Buat & Kirim PO
    </button>
</div>
</form>

</div>
</main>
</div>
</body>
</html>
