<!-- File: app/Views/staff/detail_tamu.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tamu - Dashboard Pegawai</title>
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
            font-size: 25px;
            font-weight: 700;
            text-decoration: none;
        }

        .logo i {
            color: #3498db;
        }

         .text-white{
            background: #3bb1e7 !important;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 20px;
        }

        .text-white:hover {
            background: #256ac5 !important;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(37,99,235,0.3);
            transform: translateY(-2px);
        }

        .top-bar .container-fluid {
            max-width: 87%;
        }

        .detail-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .page-container {
            max-width: 1200px;
            margin: 100px auto 24px;
        }

        @media (max-width: 576px) {
            .top-bar {
                padding: 0 14px;
            }
            .top-bar .container-fluid {
                max-width: 100%;
            }
            .top-bar .text-end a {
                font-size: 12px;
                padding: 6px 10px;
            }
            .top-bar .text-end a i {
                font-size: 12px;
                margin-right: 6px !important;
            }
            .page-container {
                margin: 86px auto 16px;
                padding-left: 8px;
                padding-right: 8px;
            }
        }
    </style>
</head>
<body style="background: #f8f9fa;">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6">
                    <a href="/ana/ManajementHotel_CI4_New/public/staff/dashboard" class="logo">
                        <i class="fas fa-hotel"></i> Hotelku
                    </a>
                </div>
                <div class="col-6 text-end">
                    <a href="/ana/ManajementHotel_CI4_New/public/staff/data-tamu" class="text-white">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container page-container">
        <h2 class="mb-4"><i class="fas fa-user me-2"></i>Detail Tamu</h2>

        <div class="row">
            <div class="col-lg-4">
                <div class="detail-card text-center">
                    <div class="mb-3">
                        <i class="fas fa-user-circle fa-5x text-primary"></i>
                    </div>
                    <h4><?= esc($tamu['nama']) ?></h4>
                    <p class="text-muted"><?= esc($tamu['email']) ?></p>
                    <p class="text-muted"><?= esc($tamu['no_telp']) ?></p>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="detail-card">
                    <h5 class="mb-3">Riwayat Pemesanan</h5>
                    <?php if(empty($pemesanan)): ?>
                        <p class="text-muted">Belum ada riwayat pemesanan</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Akomodasi</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pemesanan as $p): ?>
                                        <tr>
                                            <td>HK<?= str_pad($p['id'], 6, '0', STR_PAD_LEFT) ?></td>
                                            <td><?= esc($p['nama_akomodasi']) ?></td>
                                            <td><?= date('d M Y', strtotime($p['tanggal_checkin'])) ?></td>
                                            <td>Rp <?= number_format($p['total_harga'], 0, ',', '.') ?></td>
                                            <td><span class="badge bg-<?= $p['status'] == 'confirmed' ? 'success' : 'warning' ?>"><?= $p['status'] ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
