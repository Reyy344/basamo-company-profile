<?php
require_once 'config.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$errors = [];
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (strlen($password) < 6) { $errors[] = 'Password minimal 6 karakter.'; }
    if ($password !== $confirm) { $errors[] = 'Konfirmasi password tidak cocok.'; }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :u OR email = :e LIMIT 1');
            $stmt->execute([':u' => $username, ':e' => $email]);
            if ($stmt->fetch()) {
                $errors[] = 'Username atau Email sudah terdaftar.';
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $insert = $pdo->prepare('INSERT INTO users (username, email, password_hash, role) VALUES (:u, :e, :p, "customer")');
                $insert->execute([':u' => $username, ':e' => $email, ':p' => $passwordHash]);
                header('Location: login.php?status=success');
                exit;
            }
        } catch (PDOException $e) { $errors[] = 'Terjadi kesalahan sistem.'; }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Basamo Restaurant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @font-face { font-family: "CherieDEMO"; src: url("font/Cherie_DEMO.ttf"); }
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: #f8f5f2; overflow: hidden; }

        .login-wrapper { display: flex; height: 100vh; width: 100%; }

        .image-side {
            flex: 1.2;
            position: relative;
            background-color: #01302a;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-side img {
            width: 100%; height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .image-overlay {
            position: absolute;
            bottom: 60px; left: 60px;
            color: #dfd0bd; z-index: 2;
        }

        .image-overlay h2 {
            font-family: "CherieDEMO", serif;
            font-size: 48px; margin-bottom: 10px;
        }

        .form-side {
            flex: 1;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 8%;
            position: relative;
        }

        .back-btn {
            position: absolute; top: 40px; right: 40px;
            text-decoration: none; color: #333; font-size: 14px;
            font-weight: 500; transition: 0.3s;
        }
        .back-btn:hover { color: #01302a; }

        .form-container { width: 100%; max-width: 400px; }

        .form-container h1 {
            font-family: "CherieDEMO", serif;
            font-size: 42px; color: #01302a; margin-bottom: 8px;
        }

        .form-container p { color: #666; font-size: 14px; margin-bottom: 30px; }

        .form-group { margin-bottom: 15px; } /* Sedikit lebih rapat karena input lebih banyak */
        .form-group label {
            display: block; font-size: 13px; font-weight: 600;
            margin-bottom: 8px; color: #333;
        }

        .form-group input {
            width: 100%; padding: 12px;
            border: 1px solid #ddd; border-radius: 8px;
            font-size: 14px; background-color: #fafafa; transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #01302a; background-color: #fff;
            outline: none; box-shadow: 0 0 0 4px rgba(1, 48, 42, 0.05);
        }

        .btn-login {
            width: 100%; padding: 16px;
            background-color: #01302a; color: #dfd0bd;
            border: none; border-radius: 8px;
            font-size: 15px; font-weight: 600;
            cursor: pointer; transition: 0.3s; margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #004d41; transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(1, 48, 42, 0.15);
        }

        .footer-text { margin-top: 20px; text-align: center; font-size: 14px; color: #666; }
        .footer-text a { color: #01302a; font-weight: 600; text-decoration: none; }

        @media (max-width: 850px) {
            .image-side { display: none; }
            .form-side { padding: 0 40px; }
            body { overflow-y: auto; } /* Biar bisa scroll di HP */
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slowZoom {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }

        .form-container h1, 
        .form-container p, 
        .form-group, 
        .form-options, 
        .btn-login, 
        .auth-footer {
            opacity: 0; /* Mulai dari transparan */
            animation: fadeInUp 0.8s ease-out forwards;
        }

        /* Delay agar elemen muncul bergantian (Sequencing) */
        .form-container h1 { animation-delay: 0.2s; }
        .form-container p    { animation-delay: 0.3s; }
        .form-group:nth-child(1) { animation-delay: 0.4s; }
        .form-group:nth-child(2) { animation-delay: 0.5s; }
        .form-options { animation-delay: 0.6s; }
        .btn-login    { animation-delay: 0.7s; }
        .auth-footer  { animation-delay: 0.8s; }

        /* Animasi Gambar di Sisi Kiri */
        .image-side img {
            animation: slowZoom 15s ease-in-out infinite alternate;
        }

        @keyframes floating {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        .image-overlay {
            animation: floating 4s ease-in-out infinite;
        }

        .btn-login {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-login:hover {
            letter-spacing: 2px; /* Teks sedikit melebar saat di-hover */
            background-color: #004d41;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(1, 48, 42, 0.2);
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="image-side">
            <img src="./src/image 2.png" alt="Basamo Interior">
            <div class="image-overlay">
                <h2>Join Us.</h2>
                <p>"Where tradition meets modern culinary precision."</p>
            </div>
        </div>

        <div class="form-side">
            <a href="index.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Back to Site</a>
            <div class="form-container">
                <h1>Register</h1>
                <p>Create your account to experience Basamo.</p>

                <?php if (!empty($errors)): ?>
                    <div style="color: #c61d0f; font-size: 13px; margin-bottom: 15px;">
                        <i class="fa-solid fa-circle-exclamation"></i> <?= $errors[0] ?>
                    </div>
                <?php endif; ?>

                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" placeholder="Choose username" required>
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="email@example.com" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Min. 6 characters" required>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" placeholder="Repeat your password" required>
                    </div>

                    <button type="submit" class="btn-login">Create Account</button>
                </form>

                <p class="footer-text">Already a member? <a href="login.php">Log In</a></p>
            </div>
        </div>
    </div>

</body>
</html>