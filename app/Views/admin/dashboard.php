<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Hotelku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            background: #f4f6f9;
        }

        /* TOP BAR */
        .top-bar {
            height: 70px;
            background: #ffffff;
            display: flex;
            align-items: center;
            padding: 0 24px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-bottom: 1px solid #e0e0e0;
        }

        .logo {
            color: #2c3e50;
            font-size: 22px;
            font-weight: 700;
            text-decoration: none;
        }

        .logo i {
            color: #3498db;
        }

        /* LAYOUT */
        .dashboard-wrapper {
            display: flex;
            padding-top: 70px;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #ffffff;
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
            border-right: 1px solid #e0e0e0;
            transition: transform 0.3s ease;
            z-index: 1001;  /* TAMBAHKAN INI */
        }

        .sidebar a {
            display: block;
            padding: 12px 24px;
            color: #2c3e50;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
            border-left: 4px solid transparent;
        }

        .sidebar a:hover {
            background: #f8f9fa;
            border-left-color: #3498db;
            color: #3498db;
        }

        .sidebar a.active {
            background: #e3f2fd;
            border-left-color: #3498db;
            color: #3498db;
            font-weight: 600;
        }

        /* HAMBURGER BUTTON */
        .hamburger-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #2c3e50;
            cursor: pointer;
            padding: 8px;
            margin-right: 15px; 
        }

        /* MOBILE RESPONSIVE */
        @media (max-width: 768px) {
            .hamburger-btn {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content-area {
                margin-left: 0 !important;    /* TAMBAHKAN INI */
                width: 100% !important;        /* TAMBAHKAN INI */
                padding: 15px;                 /* OPSIONAL: padding lebih kecil di mobile */
            }

            /* Overlay ketika sidebar terbuka */
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 70px;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 999;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }
        .sidebar a i {
            width: 20px;
            text-align: center;
        }

        /* CONTENT */
        .content-area {
            margin-left: 250px;
            padding: 20px;
            background: #f8f9fa;
            min-height: calc(100vh - 70px);
            width: calc(100% - 250px);
            overflow-x: hidden;
        }

        /* CARD */
        .stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 6px 20px rgba(0,0,0,.08);
            height: 100%;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
            margin-bottom: 16px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .content-area {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- TOP BAR -->
<div class="top-bar">
    <button class="hamburger-btn" id="hamburgerBtn">
            <i class="fas fa-bars"></i>
        </button>

        <a href="/ana/ManajementHotel_CI4_New/public/admin/dashboard" class="logo">
            <i class="fas fa-hotel"></i> Hotelku Admin
        </a>

    <div class="ms-auto dropdown">
        <a href="#" class="text-white dropdown-toggle text-decoration-none" data-bs-toggle="dropdown">
            <i class="fas fa-user-shield me-2"></i>
            <?= esc($user['nama']) ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/ana/ManajementHotel_CI4_New/public/profil">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="/ana/ManajementHotel_CI4_New/public/logout">Logout</a></li>
        </ul>
    </div>
</div>

<!-- LAYOUT -->
<div class="dashboard-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar d-none d-md-block">
        <a href="/ana/ManajementHotel_CI4_New/public/admin/dashboard" class="active"><i class="fas fa-home me-2"></i>Dashboard</a>
        <a href="/ana/ManajementHotel_CI4_New/public/admin/akomodasi"><i class="fas fa-building me-2"></i>Kelola Akomodasi</a>
        <a href="/ana/ManajementHotel_CI4_New/public/admin/tipe-kamar"><i class="fas fa-bed me-2"></i>Kelola Tipe Kamar</a>
        <a href="/ana/ManajementHotel_CI4_New/public/admin/booking"><i class="fas fa-calendar-check me-2"></i>Data Booking</a>
        <a href="/ana/ManajementHotel_CI4_New/public/admin/users"><i class="fas fa-users me-2"></i>Manajemen User</a>
        <a href="/ana/ManajementHotel_CI4_New/public/admin/laporan"><i class="fas fa-file-pdf me-2"></i>Laporan</a>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- CONTENT -->
    <main class="content-area">

        <h2 class="mb-4 fw-bold">Dashboard Admin</h2>

        <!-- STAT -->
        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="stat-number"><?= $stats['total_akomodasi'] ?></div>
                    <small>Total Akomodasi</small>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-number"><?= $stats['total_pemesanan'] ?></div>
                    <small>Total Pemesanan</small>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number"><?= $stats['total_users'] ?></div>
                    <small>Total Pelanggan</small>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="stat-number"><?= $stats['total_pegawai'] ?></div>
                    <small>Total Pegawai</small>
                </div>
            </div>
        </div>

        <!-- QUICK ACTION -->
        <div class="card border-0 shadow-sm mt-5">
            <div class="card-body">
                <h5 class="mb-3"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <a href="/ana/ManajementHotel_CI4_New/public/admin/akomodasi/tambah" class="btn btn-primary w-100">Tambah Akomodasi</a>
                    </div>
                    <div class="col-md-3">
                        <a href="/ana/ManajementHotel_CI4_New/public/admin/tipe-kamar/tambah" class="btn btn-success w-100">Tambah Tipe Kamar</a>
                    </div>
                    <div class="col-md-3">
                        <a href="/ana/ManajementHotel_CI4_New/public/admin/booking" class="btn btn-info w-100 text-white">Lihat Booking</a>
                    </div>
                    <div class="col-md-3">
                        <a href="/ana/ManajementHotel_CI4_New/public/admin/laporan" class="btn btn-warning w-100">Generate Laporan</a>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle Sidebar Mobile
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    hamburgerBtn.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    overlay.addEventListener('click', function() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    });

    // Close sidebar saat link diklik (mobile)
    document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            }
        });
    });
</script>
</body>
</html>
