<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tipe Kamar - Admin Hotelku</title>
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
                margin-left: 0 !important;    
                width: 100% !important;        
                padding: 15px;                 
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

        .content-area {
            margin-left: 250px;
            padding: 20px;
            background: #f8f9fa;
            min-height: calc(100vh - 70px);
            width: calc(100% - 250px);
            overflow-x: hidden;
        }

        /* ===== TABLE ===== */
        .card {
            border-radius: 12px;
        }

        .table th {
            white-space: nowrap;
        }

        /* STATUS */
        .status-available { color: #28a745; }
        .status-maintenance { color: #dc3545; }
    </style>
</head>
<body>
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
        <aside class="sidebar">
            <a href="/ana/ManajementHotel_CI4_New/public/admin/dashboard"><i class="fas fa-home me-2"></i>Dashboard</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/akomodasi"><i class="fas fa-building me-2"></i>Kelola Akomodasi</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/tipe-kamar" class="active"><i class="fas fa-bed me-2"></i>Kelola Tipe Kamar</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/booking"><i class="fas fa-calendar-check me-2"></i>Data Booking</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/users"><i class="fas fa-users me-2"></i>Manajemen User</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/laporan"><i class="fas fa-file-pdf me-2"></i>Laporan</a>
        </aside>

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- CONTENT -->
    <main class="content-area">

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">
                <i class="fas fa-bed me-2 text-primary"></i>
                Kelola Tipe Kamar
                <?php if($akomodasi): ?>
                    <small class="text-muted">- <?= esc($akomodasi['nama']) ?></small>
                <?php endif; ?>
            </h2>

            <a href="/ana/ManajementHotel_CI4_New/public/admin/tipe-kamar/tambah" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Tipe Kamar
            </a>
        </div>

        <!-- TABLE -->
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Akomodasi</th>
                            <th>Tipe Kamar</th>
                            <th>Harga / Malam</th>
                            <th>Kapasitas</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($tipe_kamar)): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada tipe kamar
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($tipe_kamar as $tk): ?>
                                <tr>
                                    <td><?= esc($tk['nama_akomodasi']) ?></td>
                                    <td><strong><?= esc($tk['nama_tipe']) ?></strong></td>
                                    <td>Rp <?= number_format($tk['harga_per_malam'], 0, ',', '.') ?></td>
                                    <td><?= $tk['kapasitas'] ?> orang</td>
                                    <td>
                                        <span class="badge bg-info">
                                            <?= $tk['stok_kamar'] ?> kamar
                                        </span>
                                    </td>
                                    <td>
                                        <i class="fas fa-circle status-<?= $tk['status'] ?> me-1"></i>
                                        <?= ucfirst($tk['status']) ?>
                                    </td>
                                    <td>
                                        <a href="/ana/ManajementHotel_CI4_New/public/admin/tipe-kamar/edit/<?= $tk['id'] ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/ana/ManajementHotel_CI4_New/public/admin/tipe-kamar/delete/<?= $tk['id'] ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Hapus tipe kamar ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
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