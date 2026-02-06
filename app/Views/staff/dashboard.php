<!-- File: app/Views/staff/dashboard.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pegawai - Hotelku</title>
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
            padding: 0 30px;
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

        .profil-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #eaf2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }
        
        .profil-icon:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .user-menu-wrapper {
            margin-left: auto;
            padding-right: 6px;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        .booking-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }

        .booking-card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending { background: #ffc107; color: #333; }
        .status-confirmed { background: #28a745; color: white; }
        .status-checked-in { background: #17a2b8; color: white; }
        .status-checked-out { background: #6c757d; color: white; }
        .status-cancelled { background: #dc3545; color: white; }

        .content-area {
            padding: 30px;
            background: #f8f9fa;
            min-height: calc(100vh - 70px);
            width: 100%;
            overflow-x: hidden;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 25px;
        }

        /* MOBILE RESPONSIVE */
        @media (max-width: 768px) {
            .top-bar {
                height: 56px;
                padding: 0 16px;
            }

            .logo {
                font-size: 16px;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                white-space: nowrap;
            }

            .logo i {
                font-size: 16px;
            }

            .hamburger-btn {
                display: block;
                font-size: 18px;
                padding: 4px;
                margin-right: 8px;
            }

            .profil-icon {
                width: 34px;
                height: 34px;
                font-size: 14px;
            }

            .user-menu-wrapper {
                padding-right: 4px;
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

            /* CONTENT */
            .content-area {
                margin-left: 250px;
                padding: 20px;
                background: #f8f9fa;
                min-height: calc(100vh - 70px);
                width: calc(100% - 250px);
                overflow-x: hidden;
            }
    </style>
</head>
<body>
    <!-- TOP BAR -->
    <div class="top-bar">
        <button class="hamburger-btn" id="hamburgerBtn">
                <i class="fas fa-bars"></i>
            </button>

            <a href="/ana/ManajementHotel_CI4_New/public/staff/dashboard" class="logo">
                <i class="fas fa-hotel"></i> Hotelku Pegawai
            </a>

            <div class="user-menu-wrapper">
                <div class="user-menu d-flex align-items-center justify-content-end">
                    <a href="<?= base_url('staff/profil_staff') ?>" class="profil-icon ms-2">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
            </div>
    </div>

    <!-- LAYOUT -->
    <div class="dashboard-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <a href="<?= base_url('staff/dashboard') ?>" class="active">
                <i class="fas fa-home me-2"></i>Dashboard
            </a>
            <a href="<?= base_url('staff/kelola-kamar') ?>">
                <i class="fas fa-bed me-2"></i>Kelola Kamar
            </a>
            <a href="<?= base_url('staff/data-tamu') ?>">
                <i class="fas fa-users me-2"></i>Data Tamu
            </a>
        </aside>

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

            <!-- Content Area -->
            <div class="content-area">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <h1 class="page-title">Dashboard Pegawai</h1>

                <!-- Statistik -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon" style="background: #667eea;">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <div class="stat-number"><?= $stats['pemesanan_hari_ini'] ?></div>
                            <div class="stat-label">Pemesanan Hari Ini</div>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon" style="background: #ffc107;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-number"><?= $stats['pending'] ?></div>
                            <div class="stat-label">Menunggu Konfirmasi</div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Pemesanan -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0"><i class="fas fa-list me-2"></i>Daftar Pemesanan</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Kode Booking</th>
                                        <th>Nama Tamu</th>
                                        <th>Akomodasi</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($pemesanan)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center py-5 text-muted">
                                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                                Belum ada pemesanan
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach($pemesanan as $p): ?>
                                            <tr>
                                                <td><strong>HK<?= str_pad($p['id'], 6, '0', STR_PAD_LEFT) ?></strong></td>
                                                <td>
                                                    <div><?= esc($p['nama_tamu']) ?></div>
                                                    <small class="text-muted"><?= esc($p['email_tamu']) ?></small>
                                                </td>
                                                <td>
                                                    <div><?= esc($p['nama_akomodasi']) ?></div>
                                                    <small class="text-muted"><?= esc($p['nama_tipe']) ?></small>
                                                </td>
                                                <td><?= date('d M Y', strtotime($p['tanggal_checkin'])) ?></td>
                                                <td><?= date('d M Y', strtotime($p['tanggal_checkout'])) ?></td>
                                                <td><strong>Rp <?= number_format($p['total_harga'], 0, ',', '.') ?></strong></td>
                                                <td>
                                                    <span class="status-badge status-<?= $p['status'] ?>">
                                                        <?= ucfirst($p['status']) ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('staff/pemesanan/') ?><?= $p['id'] ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
