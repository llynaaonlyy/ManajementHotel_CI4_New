<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Laporan - Admin Hotelku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            background: #f4f6f9;
            overflow-x: hidden;
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

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            width: 100%;
        }
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
                <a href="/ana/ManajementHotel_CI4_New/public/admin/tipe-kamar"><i class="fas fa-bed me-2"></i>Kelola Tipe Kamar</a>
                <a href="/ana/ManajementHotel_CI4_New/public/admin/booking"><i class="fas fa-calendar-check me-2"></i>Data Booking</a>
                <a href="/ana/ManajementHotel_CI4_New/public/admin/users"><i class="fas fa-users me-2"></i>Manajemen User</a>
                <a href="/ana/ManajementHotel_CI4_New/public/admin/laporan" class="active"><i class="fas fa-file-pdf me-2"></i>Laporan</a>
            </aside>

            <div class="sidebar-overlay" id="sidebarOverlay"></div>

            <div class="content-area">
                <div class="form-container">
                    <h2 class="mb-4 text-center">
                        <i class="fas fa-file-pdf me-2" style="color: #667eea;"></i>
                        Generate Laporan Pemesanan
                    </h2>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Pilih rentang tanggal untuk generate laporan PDF format A4
                    </div>

                    <form action="/ana/ManajementHotel_CI4_New/public/admin/laporan/generate" method="post" target="_blank">
                        <?= csrf_field() ?>
                        
                        <div class="mb-4">
                            <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal_mulai" 
                                   value="<?= date('Y-m-01') ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal_selesai" 
                                   value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="alert alert-warning">
                            <strong>Catatan:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Laporan akan menampilkan semua pemesanan dalam rentang tanggal check-in</li>
                                <li>Jika tidak ada data, akan muncul pesan "Tidak ada pemesanan"</li>
                                <li>Format PDF A4 siap cetak dengan kop surat hotel</li>
                                <li>Pembuat laporan: <strong><?= esc($user['nama']) ?></strong></li>
                            </ul>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-file-download me-2"></i>
                            Generate & Download Laporan PDF
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="/admin/dashboard" class="text-muted">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                        </a>
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