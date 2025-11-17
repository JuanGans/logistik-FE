<?php
// departemen_divisi.php

// -----------------------------------------------------------
// Variabel Data Dummy
$headerUser = [
    'name' => 'John Doe', 
    'role' => 'Admin'
];

$departments = [
    ['id' => 'DEPT-01', 'name' => 'Finance & Accounting', 'division_count' => 3, 'description' => 'Mengelola semua transaksi keuangan dan pelaporan.', 'status' => 'Aktif'],
    ['id' => 'DEPT-02', 'name' => 'Supply Chain Management', 'division_count' => 2, 'description' => 'Mengawasi rantai pasokan dan logistik.', 'status' => 'Aktif'],
    ['id' => 'DEPT-03', 'name' => 'Human Resources', 'division_count' => 1, 'description' => 'Mengelola sumber daya manusia dan administrasi umum.', 'status' => 'Aktif'],
];

$divisions = [
    ['id' => 'DIV-FN-01', 'department_id' => 'DEPT-01', 'department_name' => 'Finance & Accounting', 'name' => 'Financial Reporting', 'description' => 'Membuat laporan keuangan triwulanan.', 'status' => 'Aktif'],
    ['id' => 'DIV-FN-02', 'department_id' => 'DEPT-01', 'department_name' => 'Finance & Accounting', 'name' => 'Taxation', 'description' => 'Mengurus kepatuhan pajak perusahaan.', 'status' => 'Aktif'],
    ['id' => 'DIV-SC-01', 'department_id' => 'DEPT-02', 'department_name' => 'Supply Chain Management', 'name' => 'Procurement', 'description' => 'Unit pengadaan barang dan jasa.', 'status' => 'Aktif'],
];

// Set halaman aktif untuk sidebar
$currentPage = 'departemen_divisi.php';
// -----------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Departemen & Divisi | Logistix</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 

    <style>
        :root { --primary-color: #4e73df; --sidebar-bg: #2c3e50; }
        body { font-family: 'Inter', sans-serif; }
        .main-content-wrapper { margin-left: 16rem; flex-grow: 1; display: flex; flex-direction: column; width: calc(100% - 16rem); min-height: 100vh; }
        .form-card { background: white; border-radius: 0.75rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 1.5rem; }
        .form-title { color: #1e293b; font-size: 1.5rem; font-weight: 700; }
        .status-aktif { background-color: #d1fae5; color: #059669; padding: 2px 8px; border-radius: 9999px; font-size: .75rem; }
    </style>
</head>

<body class="bg-slate-100">

    <!-- 🔥 Sidebar sekarang dipanggil dari partial -->
    <?php 
        include 'partials/sidebar.php';
    ?>

    <div class="main-content-wrapper"> 
        
        <!-- HEADER -->
        <header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-10 h-20"> 
            <div class="flex justify-between items-center h-full px-8">
                <h1 class="text-xl font-semibold text-slate-900">Departemen & Divisi</h1>
                
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="py-2 pl-4 pr-10 border border-slate-300 rounded-lg focus:ring-indigo-500 w-48 text-sm">
                        <i class="fas fa-search absolute right-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                    
                    <div class="flex items-center space-x-2 cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-semibold text-sm">JD</div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-slate-700 leading-none"><?php echo $headerUser['name']; ?></p>
                            <p class="text-xs text-slate-500"><?php echo $headerUser['role']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="p-8 flex-1">

            <div class="flex justify-between items-center mb-6">
                <h2 class="form-title">Master Departemen & Divisi</h2>
                <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700">
                    Tambah Data
                </button>
            </div>

            <!-- Inline Form (tidak saya ubah) -->
            <div class="form-card">
                <form id="inline-form" onsubmit="event.preventDefault(); saveDepartment();">
                    <div class="grid grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">No. ID</label>
                            <input type="text" class="w-full px-3 py-2 border rounded-md bg-gray-100" value="DPT-005" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Kode</label>
                            <input type="text" id="form-code" class="w-full px-3 py-2 border rounded-md" placeholder="Contoh: FIN" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Nama</label>
                            <input type="text" id="form-name" class="w-full px-3 py-2 border rounded-md" placeholder="Departemen atau Divisi" required>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </main>

    </div>

    <script>
        function saveDepartment() {
            alert('Data berhasil disimpan (simulasi).');
            document.getElementById('inline-form').reset();
        }
    </script>

</body>
</html>
