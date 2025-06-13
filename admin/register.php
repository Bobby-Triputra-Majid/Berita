<?php
echo "Script berjalan<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {


    // Ambil data dari form
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $created_at = date('Y-m-d H:i:s');

    // Validasi password dan konfirmasi
    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan konfirmasi password tidak sama!');</script>";
        exit;
    }

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $query_check = "SELECT * FROM tb_users WHERE email = ?";
    $stmt_check = $connect->prepare($query_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "<script>alert('Email mu sudah terdaftar');</script>";
    } else {
        // Insert data ke database
        $query_insert = "INSERT INTO tb_users (namalengkap, email, password, created_at) 
                         VALUES (?, ?, ?, ?)";
        $stmt_insert = $connect->prepare($query_insert);
        $stmt_insert->bind_param("ssss", $namalengkap, $email, $hashed_password, $created_at);

        if ($stmt_insert->execute()) {
            echo "<script>alert('Akun Berhasil dibuat');window.location.href='index.php?page=login';</script>";
        } else {
            echo "<script>alert('Gagal mendaftar, silakan coba lagi.');</script>";
        }

        $stmt_insert->close();
    }

    $stmt_check->close();
    $connect->close();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: rgb(19, 26, 59);
            text-align: center;
            padding: 2rem 1rem;
            border-bottom: 1px solid #eee;
        }

        .card-header h3 {
            color: rgb(175, 173, 20);
            font-weight: 700;
        }

        .card-body {
            background-color: #ffffff;
            padding: 2rem;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-register {
            background-color: rgb(11, 23, 43);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-register:hover {
            background-color: rgb(217, 198, 26);
        }

        .password-toggle {
            cursor: pointer;
        }

        .strength-meter {
            height: 6px;
            background-color: #e9ecef;
            margin-top: 4px;
            border-radius: 3px;
        }

        .strength-meter-fill {
            height: 100%;
            width: 0%;
            background-color: #28a745;
            border-radius: 3px;
            transition: width 0.4s ease;
        }

        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
        }

        a {
            color: #2575fc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-user-shield me-2"></i>Register Admin</h3>
                        <p class="mb-0 text-white">Buat akun administrator baru</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="?page=regis" id="registerForm" novalidate>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="namalengkap" id="username" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    <span class="input-group-text password-toggle" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <div class="strength-meter">
                                    <div class="strength-meter-fill" id="strengthMeter"></div>
                                </div>
                                <div class="form-text">Minimal 8 karakter, kombinasi huruf & simbol</div>
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirmPassword"
                                    required>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                                <label class="form-check-label" for="agreeTerms">Saya menyetujui syarat dan
                                    ketentuan</label>
                            </div>

                            <button type="submit" name="register" class="btn btn-register w-100">
                                <i class="fas fa-user-plus me-2"></i>Daftar
                            </button>

                            <div class="text-center mt-3">
                                <p class="mb-0">Sudah punya akun? <a href="?page=login">Login disini</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Password strength meter
        document.getElementById('password').addEventListener('input', function () {
            const password = this.value;
            const meter = document.getElementById('strengthMeter');
            let strength = 0;

            // Check password length
            if (password.length >= 8) strength += 25;
            if (password.length >= 12) strength += 15;

            // Check for uppercase letters
            if (/[A-Z]/.test(password)) strength += 20;

            // Check for lowercase letters
            if (/[a-z]/.test(password)) strength += 20;

            // Check for numbers
            if (/[0-9]/.test(password)) strength += 15;

            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;

            // Update meter
            meter.style.width = strength + '%';

            // Update color
            if (strength < 50) {
                meter.style.backgroundColor = '#dc3545'; // Red
            } else if (strength < 75) {
                meter.style.backgroundColor = '#fd7e14'; // Orange
            } else {
                meter.style.backgroundColor = '#28a745'; // Green
            }
        });

        // Form validation
        (function () {
            'use strict';

            const form = document.getElementById('registerForm');

            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                // Check if passwords match
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirmPassword').value;

                if (password !== confirmPassword) {
                    alert('Password dan konfirmasi password tidak sama!');
                    event.preventDefault();
                }

                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>

</html>