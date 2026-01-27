<!-- File: app/Views/auth/register.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Hotelku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated Background */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        animation: pulse 8s ease-in-out infinite;
        pointer-events: none;
        z-index: 0;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    .login-container,
    .register-container {
        max-width: 480px;
        width: 100%;
        position: relative;
        z-index: 1;
    }

    .login-card,
    .register-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        padding: 45px;
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        animation: slideUp 0.6s ease-out;
        transition: transform 0.3s ease;
    }

    .login-card:hover,
    .register-card:hover {
        transform: translateY(-5px);
        box-shadow: 
            0 25px 70px rgba(0, 0, 0, 0.35),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .logo {
        text-align: center;
        font-size: 42px;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        animation: logoFloat 3s ease-in-out infinite;
    }

    @keyframes logoFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .logo i {
        display: inline-block;
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .login-title,
    .register-title {
        text-align: center;
        color: #2d3748;
        margin-bottom: 35px;
        font-weight: 700;
        font-size: 24px;
    }

    .form-label {
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-control {
        padding: 14px 18px;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f7fafc;
    }

    .form-control:hover {
        border-color: #cbd5e0;
        background: #fff;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        background: #fff;
        transform: translateY(-2px);
    }

    .input-group-text {
        background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        border: 2px solid #e2e8f0;
        border-right: none;
        border-radius: 12px 0 0 12px;
        padding: 14px 15px;
        transition: all 0.3s ease;
    }

    .input-group:focus-within .input-group-text {
        border-color: #667eea;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .input-group .form-control {
        border-left: none;
        border-radius: 0 12px 12px 0;
    }

    .btn-login,
    .btn-register {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        color: white;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        position: relative;
        overflow: hidden;
    }

    .btn-login::before,
    .btn-register::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-login:hover::before,
    .btn-register:hover::before {
        left: 100%;
    }

    .btn-login:hover,
    .btn-register:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
    }

    .btn-login:active,
    .btn-register:active {
        transform: translateY(-1px);
    }

    .forgot-password {
        font-size: 14px;
        font-weight: 600;
        color: #667eea;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .forgot-password:hover {
        color: #764ba2;
        transform: translateX(3px);
    }

    .divider {
        text-align: center;
        margin: 25px 0;
        position: relative;
    }

    .divider::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
    }

    .divider span {
        background: rgba(255, 255, 255, 0.95);
        padding: 0 15px;
        position: relative;
        color: #a0aec0;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .alert {
        border-radius: 12px;
        border: none;
        padding: 15px 20px;
        font-weight: 500;
        animation: slideDown 0.4s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        color: white;
    }

    .alert-danger {
        background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
        color: white;
    }

    .password-strength {
        font-size: 12px;
        margin-top: 6px;
        font-weight: 500;
        color: #718096;
    }

    .is-invalid {
        border-color: #fc8181 !important;
        animation: shake 0.4s;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        75% { transform: translateX(10px); }
    }

    .invalid-feedback {
        display: block;
        color: #e53e3e;
        font-size: 13px;
        margin-top: 6px;
        font-weight: 600;
    }

    .text-danger {
        color: #e53e3e !important;
    }

    /* Link Styling */
    a {
        transition: all 0.3s ease;
    }

    .text-center a {
        color: #667eea;
        font-weight: 600;
        text-decoration: none;
        position: relative;
    }

    .text-center a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background: linear-gradient(90deg, #667eea, #764ba2);
        transition: width 0.3s ease;
    }

    .text-center a:hover::after {
        width: 100%;
    }

    /* Responsive Design */
    @media (max-width: 576px) {
        .login-card,
        .register-card {
            padding: 30px 25px;
            border-radius: 20px;
        }
        
        .logo {
            font-size: 36px;
        }
        
        .login-title,
        .register-title {
            font-size: 20px;
        }
        
        .form-control,
        .input-group-text {
            padding: 12px 15px;
            font-size: 14px;
        }
        
        .btn-login,
        .btn-register {
            padding: 12px;
            font-size: 15px;
        }
    }

    @media (max-width: 400px) {
        body {
            padding: 15px;
        }
        
        .login-card,
        .register-card {
            padding: 25px 20px;
        }
        
        .logo {
            font-size: 32px;
        }
    }

    /* Loading State */
    .btn-login:disabled,
    .btn-register:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Success State Animation */
    .form-control.is-valid {
        border-color: #48bb78;
    }

    .form-control.is-valid:focus {
        box-shadow: 0 0 0 4px rgba(72, 187, 120, 0.1);
    }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="logo">
                <i class="fas fa-hotel"></i> Hotelku
            </div>
            <h4 class="register-title">Daftar Akun Baru</h4>

            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/register/process') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="nama" id="nama"
                               placeholder="Masukkan nama lengkap" 
                               value="<?= old('nama') ?>" required>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="contoh@email.com" 
                               value="<?= old('email') ?>" required>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telepon <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="tel" class="form-control" name="no_telp" id="no_telp"
                               placeholder="62xxxxxxxxxx" 
                               value="<?= old('no_telp') ?>" required>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Minimal 6 karakter" required>
                    </div>
                    <div class="password-strength text-muted">
                        <small>Password harus minimal 6 karakter</small>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                               placeholder="Ulangi password" required>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>

                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                </button>
            </form>

            <div class="divider">
                <span>atau</span>
            </div>

            <div class="text-center">
                <p class="mb-0">
                    Sudah punya akun? 
                    <a href="<?= site_url('auth/login') ?>" style="color: #667eea; font-weight: 600; text-decoration: none;">
                        Login di sini
                    </a>
                </p>
                <p class="mt-3">
                    <a href="/" style="color: #999; text-decoration: none;">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Landing Page
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Client-side validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            let isValid = true;
            
            // Clear previous errors
            document.querySelectorAll('.form-control').forEach(input => {
                input.classList.remove('is-invalid');
            });
            
            // Validate nama
            const nama = document.getElementById('nama');
            if (nama.value.trim().length < 3) {
                showError(nama, 'Nama minimal 3 karakter');
                isValid = false;
            }
            
            // Validate email
            const email = document.getElementById('email');
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value)) {
                showError(email, 'Email tidak valid');
                isValid = false;
            }
            
            // Validate phone
            const noTelp = document.getElementById('no_telp');
            if (noTelp.value.length < 10 || !/^\d+$/.test(noTelp.value)) {
                showError(noTelp, 'No. telepon minimal 10 digit dan harus berupa angka');
                isValid = false;
            }
            
            // Validate password
            const password = document.getElementById('password');
            if (password.value.length < 6) {
                showError(password, 'Password minimal 6 karakter');
                isValid = false;
            }
            
            // Validate confirm password
            const confirmPassword = document.getElementById('confirm_password');
            if (confirmPassword.value !== password.value) {
                showError(confirmPassword, 'Konfirmasi password tidak cocok');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
        
        function showError(input, message) {
            input.classList.add('is-invalid');
            const feedback = input.parentElement.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.textContent = message;
            }
        }
        
        // Real-time password match check
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            if (this.value && this.value !== password) {
                this.classList.add('is-invalid');
                this.nextElementSibling.textContent = 'Password tidak cocok';
            } else {
                this.classList.remove('is-invalid');
            }
        });
    </script>
</body>
</html>