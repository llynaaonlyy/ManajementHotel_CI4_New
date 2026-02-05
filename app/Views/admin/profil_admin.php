<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun - HotelKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></style>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            padding: -10px;
        }

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

        .top-bar .container {
            max-width: 87%;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e5e7eb;
        }

        .info-alert {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #1e40af;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #333;
            box-shadow: 0 0 0 3px rgba(51, 51, 51, 0.1);
        }

        .form-group input.error {
            border-color: #dc2626;
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .success-message {
            color: #10b981;
            font-size: 13px;
            margin-top: 5px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(37, 99, 235, 0.35);
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
            color: #111827;
        }

        .logout-section {
            margin-top: 10px;
        }

        .logout-btn {
            width: 100%;
            border: none;
            padding: 14px 16px;
            border-radius: 12px;
            font-weight: 600;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: #fff;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(37, 99, 235, 0.35);
        }

        .password-section {
            background: #f9fafb;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }

        .password-note {
            color: #6b7280;
            font-size: 13px;
            margin-top: 10px;
            line-height: 1.6;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 500px;
            width: 90%;
        }

        .modal-header {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #1f2937;
        }

        .modal-body {
            margin-bottom: 20px;
            color: #4b5563;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .modal-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .modal-btn-primary {
            background: #333;
            color: white;
        }

        .modal-btn-primary:hover {
            background: #555;
        }

        .modal-btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .modal-btn-secondary:hover {
            background: #d1d5db;
        }

        .logout-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1100;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        .logout-modal.active {
            display: flex;
        }

        .logout-modal-content {
            background: white;
            border-radius: 16px;
            padding: 24px;
            width: 100%;
            max-width: 420px;
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
            color: #111827;
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
            body {
                padding: 10px;
            }

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

            .card {
                padding: 20px;
            }

            .header {
                padding: 12px 15px;
            }

            .header-left {
                font-size: 20px;
            }

            .button-group {
                flex-direction: column;
            }

            .logout-btn {
                padding: 12px 14px;
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
                    <a href="<?= base_url('admin/dashboard') ?>" class="logo">
                        <i class="fas fa-hotel"></i> Hotelku
                    </a>
                </div>
                <div class="col-6 text-end">
                    <a href="<?= base_url('admin/dashboard') ?>" class="text-white">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Profil Card -->
        <div class="card">
            <div class="card-title">Profil</div>
            
            <div class="info-alert">
                <strong>Informasi Penting:</strong> Semua perubahan data profil Anda akan disimpan ke basis data kami. Pastikan informasi yang Anda masukkan benar dan akurat.
            </div>

            <form id="profileForm" method="POST" action="<?php echo base_url('admin/profil_admin/update'); ?>">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($user['nama'] ?? ''); ?>" required>
                    <span class="error-message" id="namaError"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="tel" id="no_telp" name="no_telp" value="<?php echo htmlspecialchars($user['no_telp'] ?? ''); ?>" pattern="^[0-9]{10,15}$">
                    <span class="error-message" id="teleponError"></span>
                </div>

                <div class="button-group">
                    <button type="button" class="btn btn-secondary" onclick="refreshPage()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>

        <!-- Info Pemilik Akun Card -->
        <div class="card">
            <div class="card-title">Info Pemilik Akun</div>

            <div class="form-group" style="margin-top: 20px;">
                <label>Tanggal Pembuatan Akun</label>
                <div style="padding: 12px; background: #f9fafb; border-radius: 8px; color: #6b7280;">
                    <?php echo date('d F Y', strtotime($user['created_at'] ?? date('Y-m-d'))); ?>
                </div>
            </div>
        </div>

        <div class="card logout-section">
            <button type="button" class="logout-btn" onclick="confirmLogout()">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
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


    <script>
        function refreshPage() {
            window.location.reload();
        }

        function confirmLogout() {
            document.getElementById('logoutModal').classList.add('active');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.remove('active');
        }

        function doLogout() {
            window.location.href = "<?= base_url('auth/logout') ?>";
        }

        document.getElementById('profileForm')?.addEventListener('submit', function(e) {
            let isValid = true;
            
            const nama = document.getElementById('nama').value.trim();
            const email = document.getElementById('email').value.trim();
            const no_telp = document.getElementById('no_telp').value.trim();

            if (nama.length < 3) {
                document.getElementById('namaError').textContent = 'Nama harus minimal 3 karakter';
                isValid = false;
            }

            if (!email.includes('@')) {
                document.getElementById('emailError').textContent = 'Email tidak valid';
                isValid = false;
            }

            if (no_telp && !/^[0-9]{10,15}$/.test(no_telp)) {
                document.getElementById('teleponError').textContent = 'Nomor telepon harus 10-15 digit';
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });

        window.addEventListener('click', function (event) {
            const modal = document.getElementById('logoutModal');
            if (event.target === modal) {
                closeLogoutModal();
            }
        });
    </script>
</body>
</html>
