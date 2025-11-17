<?php 
// partials/sidebar.php

if (!isset($currentPage)) {
    $currentPage = '';
}

function getMenuIcon($name) {
    switch ($name) {
        case 'item': return '<i class="fa fa-box-open w-4"></i>';
        case 'warehouse': return '<i class="fa fa-warehouse w-4"></i>';
        case 'department': return '<i class="fa fa-users-cog w-4"></i>';
        case 'vendor': return '<i class="fa fa-building w-4"></i>';
        case 'pr_form': return '<i class="fa fa-file-alt w-4"></i>';
        case 'approval': return '<i class="fa fa-check-circle w-4"></i>';
        case 'bidding': return '<i class="fa fa-handshake w-4"></i>';
        case 'po_creation': return '<i class="fa fa-shopping-cart w-4"></i>';
        case 'goods_receipt': return '<i class="fa fa-truck-loading w-4"></i>';
        default: return '';
    }
}
?>

<aside class="w-64 bg-slate-800 text-slate-300 flex flex-col fixed h-full z-20">
    
    <!-- Logo -->
    <div class="p-6 text-white text-2xl font-bold border-b border-slate-700">
        <span class="text-indigo-400">LOGIS</span><span>TIX</span>
    </div>
    
    <nav class="flex-1 px-4 py-6 space-y-2 custom-scrollbar-hide overflow-y-auto"> 
        
        <!-- MAIN -->
        <a href="dashboard.php" 
           class="sidebar-link flex items-center px-4 py-2 rounded-lg transition duration-150 
           <?= ($currentPage == 'dashboard' ? 'active' : '') ?>">
            <i class="fa fa-home w-5 mr-3"></i> Dashboard
        </a>

        <a href="manajemen_user.php" 
           class="sidebar-link flex items-center px-4 py-2 rounded-lg transition duration-150 
           <?= ($currentPage == 'manajemen_user' ? 'active' : '') ?>">
            <i class="fa fa-users w-5 mr-3"></i> Manajemen User
        </a>

        <!-- MASTER DATA -->
        <h3 class="px-4 py-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mt-4">Master Data</h3>

        <a href="data_item.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'data_item' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('item') ?></span> Data Item
        </a>

        <a href="data_gudang.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'data_gudang' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('warehouse') ?></span> Data Gudang
        </a>

        <a href="departemen_divisi.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'departemen_divisi' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('department') ?></span> Departemen & Divisi
        </a>

        <a href="data_vendor.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'data_vendor' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('vendor') ?></span> Data Vendor
        </a>

        <!-- PENGADAAN -->
        <h3 class="px-4 py-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mt-4">Pengadaan</h3>

        <a href="purchase_request.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'purchase_request' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('pr_form') ?></span> Purchase Request (PR)
        </a>

        <a href="persetujuan_pr.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'persetujuan_pr' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('approval') ?></span> Persetujuan PR
        </a>

        <a href="proses_bidding_pr.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'proses_bidding_pr' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('bidding') ?></span> Proses Bidding PR
        </a>

        <a href="pembuatan_po.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'pembuatan_po' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('po_creation') ?></span> Pembuatan PO
        </a>

        <!-- PENERIMAAN -->
        <h3 class="px-4 py-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mt-4">Penerimaan</h3>

        <a href="goods_receipt.php" 
           class="sidebar-link flex items-center pl-6 pr-4 py-2 rounded-lg text-sm transition duration-150 
           <?= ($currentPage == 'goods_receipt' ? 'active' : '') ?>">
           <span class="text-indigo-300 mr-2"><?= getMenuIcon('goods_receipt') ?></span> Goods Receipt (GR)
        </a>

    </nav>
</aside>

<style>
    .custom-scrollbar-hide::-webkit-scrollbar {
        width: 0 !important;
        display: none !important;
    }
    .custom-scrollbar-hide {
        scrollbar-width: none !important;
        -ms-overflow-style: none !important;
    }

    /* Hover — Biru */
    .sidebar-link:hover {
        background: #4f46e5 !important; /* indigo-600 */
        color: #fff !important;
    }

    /* Active — Biru gelap */
    .sidebar-link.active {
        background: #4338ca !important; /* indigo-700 */
        color: #fff !important;
        font-weight: 600;
    }

    .sidebar-link i {
        font-size: 15px;
    }
</style>
