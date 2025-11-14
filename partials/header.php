<?php
// partials/header.php

// --- Helper: Generate Inisial ---
function getInitials($name) {
    $words = preg_split('/\s+/', trim($name));
    if (count($words) === 0) return "?";

    // Ambil huruf pertama dan huruf pertama dari kata terakhir
    $initials = strtoupper(substr($words[0], 0, 1));

    if (count($words) > 1) {
        $initials .= strtoupper(substr(end($words), 0, 1));
    }

    return $initials;
}

// --- Data User Fallback ---
$headerUser = $headerUser ?? ['name' => 'Pengguna Tamu', 'role' => 'Guest'];
$initials   = getInitials($headerUser['name']);

// --- Title Berdasarkan Halaman ---
$title = "Dashboard";

// daftar halaman + judulnya
$pageTitles = [
    'dashboard'          => 'Dashboard',
    'purchase_request'   => 'Purchase Request',
    'purchase_order'     => 'Purchase Order',
    'persetujuan_pr'     => 'Persetujuan PR',
    'persetujuan_po'     => 'Persetujuan PO',      // ditambahkan
    'pr-bidding-page'    => 'Proses Bidding PR',   // untuk bidding
    'inventory'          => 'Inventory',
    'users'              => 'Manajemen User',
    'settings'           => 'Pengaturan',
    'item-data'          => 'Master Item',         // diperbaiki dari item-data.php
    'manajemen_user'     => 'Manajemen User'
];

// jika $currentPage ada dan cocok dengan daftar, pakai judulnya
if (isset($currentPage) && array_key_exists($currentPage, $pageTitles)) {
    $title = $pageTitles[$currentPage];
}
?>

<header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-40">
    <div class="px-6 lg:px-8 py-3 flex items-center justify-between h-16">

        <!-- Page Title -->
        <h1 class="text-xl font-semibold text-slate-800 w-1/3">
            <?= htmlspecialchars($title); ?>
        </h1>

        <!-- Search Bar -->
        <div class="flex-1 max-w-md px-4 hidden md:block">
            <div class="relative">
                <input 
                    type="text" 
                    placeholder="Cari..." 
                    class="w-full pl-4 pr-10 py-2 border border-slate-300 rounded-lg 
                           text-sm bg-white shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                />
                <button 
                    type="button" 
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-indigo-600">
                    <i class="fa fa-search text-sm"></i>
                </button>
            </div>
        </div>

        <!-- User Section -->
        <div class="flex items-center space-x-3 w-1/3 justify-end">

            <!-- Avatar -->
            <div 
                class="w-10 h-10 flex items-center justify-center 
                       bg-indigo-600 text-white font-bold rounded-full shadow-md text-sm">
                <?= htmlspecialchars($initials); ?>
            </div>

            <!-- User Info -->
            <div class="text-right hidden sm:block">
                <p class="text-sm font-semibold text-slate-900 leading-none">
                    <?= htmlspecialchars($headerUser['name']); ?>
                </p>
                <p class="text-xs text-slate-500 leading-none">
                    <?= htmlspecialchars($headerUser['role']); ?>
                </p>
            </div>
        </div>
    </div>
</header>
