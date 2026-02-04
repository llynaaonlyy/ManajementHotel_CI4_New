<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akomodasi - Admin Hotelku</title>
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

        .akomodasi-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            margin-bottom: 20px;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .akomodasi-card .card-body {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .akomodasi-card img {
            height: 240px;
            object-fit: cover;
            width: 100%;
        }
        .akomodasi-card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .badge-tipe {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-hotel { background: #22c55e; color: white; }
        .badge-villa { background: #f59e0b; color: white; }
        .badge-apart { background: #2563eb; color: white; }
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
    </div>

    <!-- LAYOUT -->
    <div class="dashboard-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <a href="<?= base_url('admin/dashboard') ?>">
                <i class="fas fa-home me-2"></i>Dashboard
            </a>
            <a href="<?= base_url('admin/akomodasi') ?>" class="active">
                <i class="fas fa-building me-2"></i>Kelola Akomodasi
            </a>
            <a href="<?= base_url('admin/tipe-kamar') ?>">
                <i class="fas fa-bed me-2"></i>Kelola Tipe Kamar
            </a>
            <a href="<?= base_url('admin/booking') ?>">
                <i class="fas fa-calendar-check me-2"></i>Data Booking
            </a>
            <a href="<?= base_url('admin/users') ?>">
                <i class="fas fa-users me-2"></i>Manajemen User
            </a>
            <a href="<?= base_url('admin/laporan') ?>">
                <i class="fas fa-file-pdf me-2"></i>Laporan
            </a>
        </aside>

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

            <!-- Content -->
            <div class="content-area">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">
                        <i class="fas fa-building text-primary me-2"></i>
                        Kelola Akomodasi
                    </h2>
                    <a href="/ana/ManajementHotel_CI4_New/public/admin/akomodasi/tambah" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Akomodasi
                    </a>
                </div>

                <!-- Akomodasi List -->
                <div class="row g-4">
                    <?php foreach($akomodasi as $item): ?>
                        <div class="col-md-6 col-lg-6 ps-3 pe-3">
                            <div class="akomodasi-card">
                               <img src="<?= base_url('uploads/akomodasi/' . $item['foto_utama']) ?>"
                                    class="card-img-top"
                                    alt="<?= esc($item['nama']) ?>">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title mb-0"><?= esc($item['nama']) ?></h5>
                                        <span class="badge-tipe badge-<?= $item['tipe'] ?>">
                                            <?= ucfirst($item['tipe']) ?>
                                        </span>
                                    </div>
                                    <p class="text-muted mb-2">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        <?= esc($item['kota']) ?>
                                    </p>
                                    <p class="mb-3" style="font-size: 14px; height: 40px; overflow: hidden;">
                                        <?= esc($item['deskripsi']) ?>
                                    </p>
                                    
                                    <div class="btn-group w-100" role="group">
                                        <a href="/ana/ManajementHotel_CI4_New/public/admin/akomodasi/edit/<?= $item['id'] ?>" 
                                           class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="/ana/ManajementHotel_CI4_New/public/admin/fasilitas/<?= $item['id'] ?>" 
                                           class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-cog"></i> Fasilitas
                                        </a>
                                        <a href="/ana/ManajementHotel_CI4_New/public/admin/highlights/<?= $item['id'] ?>" 
                                           class="btn btn-sm btn-success">
                                            <i class="fas fa-star"></i> Highlight
                                        </a>
                                    </div>
                                    
                                    <div class="btn-group w-100 mt-2" role="group">
                                        <a href="/ana/ManajementHotel_CI4_New/public/admin/kebijakan/<?= $item['id'] ?>" 
                                           class="btn btn-sm btn-secondary">
                                            <i class="fas fa-clipboard-list"></i> Kebijakan
                                        </a>
                                        <a href="/ana/ManajementHotel_CI4_New/public/admin/akomodasi/delete/<?= $item['id'] ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus akomodasi ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
