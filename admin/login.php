<?php
include_once './controllers/AuthController.php';

$auth = new AuthController($connect);
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $error = $auth->login($email, $password);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, rgb(255, 255, 255), rgb(255, 255, 255));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #fff;
            border-bottom: none;
            text-align: center;
            padding: 2rem 1rem;
        }

        .card-header h3 {
            font-weight: 700;
            color: rgb(204, 224, 24);
        }

        .card-body {
            padding: 2rem;
            background-color: #f8f9fc;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: rgb(12, 14, 44);
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: rgb(219, 216, 27);
        }

        .toggle-password {
            background: transparent;
            border: none;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #f0f0f0;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-user-shield me-2"></i>Login Admin</h3>
                        <p class="text-muted mb-0">Silakan masuk untuk melanjutkan</p>
                    </div>
                    <div class="card-body">
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="admin@example.com" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="••••••••" required>
                                    <button type="button" class="btn toggle-password">
                                        <i class="fa fa-eye text-muted"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa fa-sign-in-alt me-2"></i>Masuk
                            </button>
                        </form>
                    </div>
                </div>
                <div class="footer mt-4">
                    &copy; 2025 Rassid Risda Sulpa. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.querySelector('.toggle-password').addEventListener('click', function () {
            const input = document.getElementById('password');
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>

</body>

</html>