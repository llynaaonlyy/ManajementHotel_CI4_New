<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Hotelku</title>
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
            font-size: 27px;
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

        .profile-container {
            max-width: 700px;
            margin: 100px auto;
        }
        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            margin: 0 auto 30px;
        }
        .form-label {
            font-weight: 600;
            color: #2563eb;
        }

        .logout-wrapper {
            margin-top: 28px;
            display: flex;
            justify-content: center;
        }

        .logout-btn {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: #fff;
            border: none;
            padding: 12px 28px;
            border-radius: 25px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(37, 99, 235, 0.35);
        }

        .logout-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1200;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        .logout-modal.active {
            display: flex;
        }

        .logout-modal-content {
            background: #fff;
            width: 100%;
            max-width: 420px;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.2);
        }

        .logout-modal-title {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .logout-modal-body {
            color: #4b5563;
            margin-bottom: 18px;
        }

        .logout-modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .btn-logout-secondary {
            background: #e5e7eb;
            color: #374151;
            border: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-logout-secondary:hover {
            background: #d1d5db;
        }

        .btn-logout-primary {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-logout-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(37, 99, 235, 0.25);
        }

        @media (max-width: 768px) {
            .top-bar {
                height: 56px;
                padding: 0 16px;
            }

            .logo {
                font-size: 20px;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                white-space: nowrap;
            }

            .logo i {
                font-size: 20px;
            }
            
            .text-white {
                padding: 6px 12px;
                font-size: 12px;
                border-radius: 16px;
            }

            .text-white i {
                margin-right: 6px;
            }

            .profile-container {
                max-width: 100%;
                margin: 80px 12px 24px;
            }

            .profile-card {
                padding: 20px;
                border-radius: 12px;
            }

            .avatar {
                width: 90px;
                height: 90px;
                font-size: 36px;
                margin-bottom: 20px;
            }

            .profile-card h3 {
                font-size: 18px;
                margin-bottom: 16px;
            }

            .form-label {
                font-size: 13px;
            }

            .form-control-plaintext {
                font-size: 14px;
                margin-bottom: 4px;
            }

            .logout-wrapper {
                margin-top: 20px;
            }

            .logout-btn {
                width: 100%;
                justify-content: center;
                padding: 12px 16px;
                font-size: 14px;
            }

            .logout-modal-actions {
                flex-direction: column-reverse;
            }

            .btn-logout-secondary,
            .btn-logout-primary {
                width: 100%;
                text-align: center;
            }
            
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <a href="<?= base_url('staff/dashboard') ?>" class="logo">
                        <i class="fas fa-hotel"></i> Hotelku
                    </a>
                </div>
                <div class="col-6 text-end">
                    <a href="<?= base_url('staff/dashboard') ?>" class="text-white">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="profile-container">
        <div class="profile-card">
            <div class="avatar">
                <i class="fas fa-user"></i>
            </div>
            
            <h3 class="text-center mb-4">Profil Pegawai</h3>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <p class="form-control-plaintext">
                        <?= esc($user['nama']) ?>
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <p class="form-control-plaintext">
                        <?= esc($user['email']) ?>
                    </p>
                </div>

                <div class="mb-4">
                    <label class="form-label">No. Telepon</label>
                    <p class="form-control-plaintext">
                        <?= esc($user['no_telp']) ?>
                    </p>
                </div>

                <div class="logout-wrapper">
                    <button type="button" class="logout-btn" onclick="confirmLogout()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </div>
        </div>
    </div>

    <div id="logoutModal" class="logout-modal">
        <div class="logout-modal-content">
            <div class="logout-modal-title">Yakin mau logout?</div>
            <div class="logout-modal-body">
                Kamu akan keluar dari akun ini dan diarahkan ke halaman login.
            </div>
            <div class="logout-modal-actions">
                <button class="btn-logout-secondary" type="button" onclick="closeLogoutModal()">Batal</button>
                <button class="btn-logout-primary" type="button" onclick="doLogout()">Ya, Logout</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmLogout() {
            document.getElementById('logoutModal').classList.add('active');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.remove('active');
        }

        function doLogout() {
            window.location.href = "<?= base_url('auth/logout') ?>";
        }

        window.addEventListener('click', function (event) {
            const modal = document.getElementById('logoutModal');
            if (event.target === modal) {
                closeLogoutModal();
            }
        });
    </script>
</body>
</html>
