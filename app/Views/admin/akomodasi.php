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
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            padding: 0 24px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .logo {
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            text-decoration: none;
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
            background: #2c3e50;
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            padding: 12px 24px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #34495e;
            border-left: 4px solid #667eea;
        }
        .content-area {
            margin-left: 250px;
            padding: 20px;
            background: #f8f9fa;
            min-height: calc(100vh - 70px);
            max-width: calc(100% - 250px);
            margin-right: auto;
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
        .badge-hotel { background: #4CAF50; color: white; }
        .badge-villa { background: #FF9800; color: white; }
        .badge-apart { background: #2196F3; color: white; }
    </style>
</head>
<body>
    <div class="top-bar">
        <a href="/ana/ManajementHotel_CI4_New/public/admin/dashboard" class="logo">
            <i class="fas fa-hotel"></i> Hotelku Admin
        </a>

        <div class="ms-auto dropdown">
            <a href="#" class="text-white dropdown-toggle text-decoration-none" data-bs-toggle="dropdown">
                <i class="fas fa-user-shield me-2"></i>
                <?= esc($user['nama']) ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="/ana/ManajementHotel_CI4_New/public/admin/profil_admin">Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="/ana/ManajementHotel_CI4_New/public/logout">Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- LAYOUT -->
    <div class="dashboard-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar d-none d-md-block">
            <a href="/ana/ManajementHotel_CI4_New/public/admin/dashboard"><i class="fas fa-home me-2"></i>Dashboard</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/akomodasi" class="active"><i class="fas fa-building me-2"></i>Kelola Akomodasi</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/tipe-kamar"><i class="fas fa-bed me-2"></i>Kelola Tipe Kamar</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/booking"><i class="fas fa-calendar-check me-2"></i>Data Booking</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/users"><i class="fas fa-users me-2"></i>Manajemen User</a>
            <a href="/ana/ManajementHotel_CI4_New/public/admin/laporan"><i class="fas fa-file-pdf me-2"></i>Laporan</a>
        </aside>

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
                        <i class="fas fa-building me-2" style="color: #667eea;"></i>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>