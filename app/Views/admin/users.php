<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Admin Hotelku</title>
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

        /* ===== CARD & BADGE ===== */
        .role-badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .role-admin { background: #dc3545; color: #fff; }
        .role-pegawai { background: #ffc107; color: #333; }
        .role-pelanggan { background: #28a745; color: #fff; }

        .section-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #00aeffb0;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #006effda;
            margin: 0;
        }

        .section-card {
            width: 100%;
        }

        .dashboard-wrapper {
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
        </div>

        <!-- LAYOUT -->
        <div class="dashboard-wrapper">

            <!-- SIDEBAR -->
            <aside class="sidebar">
                <a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="<?= base_url('admin/akomodasi') ?>"><i class="fas fa-building me-2"></i>Kelola Akomodasi</a>
                <a href="<?= base_url('admin/tipe-kamar') ?>"><i class="fas fa-bed me-2"></i>Kelola Tipe Kamar</a>
                <a href="<?= base_url('admin/booking') ?>"><i class="fas fa-calendar-check me-2"></i>Data Booking</a>
                <a href="<?= base_url('admin/users') ?>" class="active"><i class="fas fa-users me-2"></i>Manajemen User</a>
                <a href="<?= base_url('admin/laporan') ?>"><i class="fas fa-file-pdf me-2"></i>Laporan</a>
            </aside>

             <div class="sidebar-overlay" id="sidebarOverlay"></div>
            
            <div class="content-area">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <h2 class="mb-4">
                    <i class="fas fa-users text-primary me-2"></i>
                    Manajemen User
                </h2>
                
                <!-- TABEL 1: ADMIN & PEGAWAI (EDITABLE) -->
                <div class="section-card">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="fas fa-user-tie me-2"></i>
                            Admin & Pegawai
                        </h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUserModal">
                            <i class="fas fa-plus me-2"></i>Tambah User
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Role</th>
                                    <th>Terdaftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $adminPegawai = array_filter($users, function($u) {
                                    return $u['role'] === 'admin' || $u['role'] === 'pegawai';
                                });
                                ?>
                                
                                <?php if(empty($adminPegawai)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            Belum ada data Admin atau Pegawai
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($adminPegawai as $u): ?>
                                        <tr>
                                            <td><strong><?= $u['id'] ?></strong></td>
                                            <td><?= esc($u['nama']) ?></td>
                                            <td><?= esc($u['email']) ?></td>
                                            <td><?= esc($u['no_telp'] ?? '-') ?></td>
                                            <td>
                                                <span class="role-badge role-<?= $u['role'] ?>">
                                                    <?= ucfirst($u['role']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    <?= date('d M Y', strtotime($u['created_at'])) ?>
                                                </small>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editModal<?= $u['id'] ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <a href="/ana/ManajementHotel_CI4_New/public/admin/users/delete/<?= $u['id'] ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus user <?= esc($u['nama']) ?>? Tindakan ini tidak dapat dibatalkan!')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editModal<?= $u['id'] ?>" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-warning">
                                                        <h5 class="modal-title">
                                                            <i class="fas fa-edit me-2"></i>
                                                            Edit User - <?= esc($u['nama']) ?>
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="/ana/ManajementHotel_CI4_New/public/admin/users/update" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                                        
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="nama" 
                                                                       value="<?= esc($u['nama']) ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                                <input type="email" class="form-control" name="email" 
                                                                       value="<?= esc($u['email']) ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">No. Telepon</label>
                                                                <input type="tel" class="form-control" name="no_telp" 
                                                                       value="<?= esc($u['no_telp']) ?>" 
                                                                       placeholder="08xxxxxxxxxx">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Password Baru (Opsional)</label>
                                                                <input type="password" class="form-control" name="password" 
                                                                       placeholder="Kosongkan jika tidak diubah">
                                                                <small class="text-muted">
                                                                    <i class="fas fa-info-circle me-1"></i>
                                                                    Password akan di-hash dengan bcrypt
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                <i class="fas fa-times me-2"></i>Batal
                                                            </button>
                                                            <button type="submit" class="btn btn-warning">
                                                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TABEL 2: PELANGGAN (READ ONLY) -->
                <div class="section-card">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="fas fa-users me-2"></i>
                            Pelanggan (Hanya Lihat / Read-Only)
                        </h5>
                        <span class="badge bg-info">
                            <?php 
                            $pelanggan = array_filter($users, function($u) {
                                return $u['role'] === 'pelanggan';
                            });
                            echo count($pelanggan);
                            ?> Pelanggan
                        </span>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Data pelanggan dapat dihapus oleh admin. Pelanggan tidak dapat diedit oleh admin.
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Role</th>
                                    <th>Terdaftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($pelanggan)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">
                                            Belum ada pelanggan terdaftar
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($pelanggan as $p): ?>
                                        <tr>
                                            <td><strong><?= $p['id'] ?></strong></td>
                                            <td><?= esc($p['nama']) ?></td>
                                            <td><?= esc($p['email']) ?></td>
                                            <td><?= esc($p['no_telp'] ?? '-') ?></td>
                                            <td>
                                                <span class="role-badge role-pelanggan">
                                                    Pelanggan
                                                </span>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    <?= date('d M Y', strtotime($p['created_at'])) ?>
                                                </small>
                                            </td>
                                            <td>
                                                <a href="/ana/ManajementHotel_CI4_New/public/admin/users/delete/<?= $p['id'] ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan <?= esc($p['nama']) ?>? Tindakan ini tidak dapat dibatalkan!')">
                                                    <i class="fas fa-trash"></i> Hapus
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
    
    <!-- MODAL TAMBAH USER -->
    <div class="modal fade" id="tambahUserModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-user-plus me-2"></i>
                        Tambah User Baru
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="/ana/ManajementHotel_CI4_New/public/admin/users/tambah" method="post" id="formTambahUser">
                    <?= csrf_field() ?>
                    
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Hanya dapat menambahkan user dengan role <strong>Admin</strong> atau <strong>Pegawai</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" 
                                   placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" 
                                   placeholder="contoh@hotelku.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No. Telepon <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="no_telp" 
                                   placeholder="08xxxxxxxxxx" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" 
                                   placeholder="Minimal 6 karakter" required>
                            <small class="text-muted">
                                <i class="fas fa-lock me-1"></i>
                                Password akan di-hash dengan bcrypt
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role <span class="text-danger">*</span></label>
                            <select class="form-select" name="role" required>
                                <option value="">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="pegawai">Pegawai</option>
                            </select>
                            <small class="text-muted">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                Pelanggan tidak dapat ditambahkan secara manual (hanya melalui registrasi)
                            </small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Tambah User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('formTambahUser').addEventListener('submit', function(e) {
            const password = this.querySelector('[name="password"]').value;
            const role = this.querySelector('[name="role"]').value;
            
            if (password.length < 6) {
                e.preventDefault();
                alert('Password minimal 6 karakter!');
                return false;
            }
            
            if (role === 'pelanggan') {
                e.preventDefault();
                alert('Tidak dapat menambahkan user dengan role Pelanggan!');
                return false;
            }
        });
    </script>
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