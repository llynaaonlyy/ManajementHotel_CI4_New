<!-- File: app/Views/staff/kelola_kamar.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kamar - Dashboard Pegawai</title>
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

        .room-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .status-available { color: #28a745; }
        .status-maintenance { color: #dc3545; }

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
    </div>

    <!-- LAYOUT -->
    <div class="dashboard-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <a href="<?= base_url('staff/dashboard') ?>" >
                <i class="fas fa-home me-2"></i>Dashboard
            </a>
            <a href="<?= base_url('staff/kelola-kamar') ?>" class="active">
                <i class="fas fa-bed me-2"></i>Kelola Kamar
            </a>
            <a href="<?= base_url('staff/data-tamu') ?>">
                <i class="fas fa-users me-2"></i>Data Tamu
            </a>
        </aside>

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

            <!-- Content -->
            <div class="col-md-10 content-area">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <h2 class="mb-4"><i class="fas fa-bed me-2"></i>Kelola Ketersediaan Kamar</h2>

                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Akomodasi</th>
                                        <th>Tipe Kamar</th>
                                        <th>Harga/Malam</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tipe_kamar as $tk): ?>
                                        <tr>
                                            <td><?= esc($tk['nama_akomodasi']) ?></td>
                                            <td><?= esc($tk['nama_tipe']) ?></td>
                                            <td>Rp <?= number_format($tk['harga_per_malam'], 0, ',', '.') ?></td>
                                            <td>
                                                <form action="/ana/ManajementHotel_CI4_New/public/staff/update-stok-kamar" method="post" class="d-inline-flex align-items-center">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="kamar_id" value="<?= $tk['id'] ?>">
                                                    <input type="number" name="stok_kamar" value="<?= $tk['stok_kamar'] ?>" 
                                                           class="form-control form-control-sm" style="width: 80px;" min="0">
                                                    <button type="submit" class="btn btn-sm btn-primary ms-2">
                                                        <i class="fas fa-save"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <i class="fas fa-circle status-<?= $tk['status'] ?> me-1"></i>
                                                <?= ucfirst($tk['status']) ?>
                                            </td>
                                            <td>
                                                <form action="/ana/ManajementHotel_CI4_New/public/staff/update-status-kamar" method="post">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="kamar_id" value="<?= $tk['id'] ?>">
                                                    <?php if($tk['status'] == 'available'): ?>
                                                        <input type="hidden" name="status" value="maintenance">
                                                        <button type="submit" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-wrench me-1"></i>Set Maintenance
                                                        </button>
                                                    <?php else: ?>
                                                        <input type="hidden" name="status" value="available">
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fas fa-check me-1"></i>Set Available
                                                        </button>
                                                    <?php endif; ?>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
    const toggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebarBackdrop');

    toggle?.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        backdrop.classList.toggle('show');
    });

    backdrop?.addEventListener('click', () => {
        sidebar.classList.remove('show');
        backdrop.classList.remove('show');
    });
    </script>

</body>
</html>
