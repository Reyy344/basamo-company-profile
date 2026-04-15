<?php
require_once 'config.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$errors = [];
$identifier = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = trim($_POST['identifier'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
            $stmt->execute([':email' => $identifier]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header('Location: index.php');
                exit;
            } else {
                $errors[] = 'Email atau password salah.';
            }
        } catch (PDOException $e) {
            $errors[] = 'Terjadi kesalahan sistem.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Basamo Restaurant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @font-face { font-family: "CherieDEMO"; src: url("font/Cherie_DEMO.ttf"); }
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: #f8f5f2; overflow: hidden; }

        .login-wrapper {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* BAGIAN GAMBAR (SISI KIRI) */
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
            width: 100%;
            height: 100%;
            object-fit: cover; /* Gambar akan memenuhi area tanpa distorsi */
            filter: brightness(0.7); /* Membuat gambar sedikit gelap agar teks menonjol */
        }

        .image-overlay {
            position: absolute;
            bottom: 60px;
            left: 60px;
            color: #dfd0bd;
            z-index: 2;
        }

        .image-overlay h2 {
            font-family: "CherieDEMO", serif;
            font-size: 48px;
            margin-bottom: 10px;
        }

        /* BAGIAN FORM (SISI KANAN) */
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
            position: absolute;
            top: 40px;
            right: 40px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .back-btn:hover { color: #01302a; }

        .form-container { width: 100%; max-width: 400px; }

        .form-container h1 {
            font-family: "CherieDEMO", serif;
            font-size: 42px;
            color: #01302a;
            margin-bottom: 8px;
        }

        .form-container p {
            color: #666;
            font-size: 14px;
            margin-bottom: 40px;
        }

        .form-group { margin-bottom: 25px; }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: #fafafa;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #01302a;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(1, 48, 42, 0.05);
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background-color: #01302a;
            color: #dfd0bd;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #004d41;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(1, 48, 42, 0.15);
        }

        .error-msg {
            color: #c61d0f;
            font-size: 13px;
            margin-bottom: 20px;
            display: block;
        }

        /* Responsif untuk HP */
        @media (max-width: 850px) {
            .image-side { display: none; }
            .form-side { padding: 0 40px; }
        }
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 13px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }

        .remember-me input {
            cursor: pointer;
            accent-color: #01302a; /* Warna centang hijau Emerald */
        }

        .forgot-link {
            color: #01302a;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Footer link untuk Register */
        .auth-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .auth-footer a {
            color: #01302a;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .auth-footer a:hover {
            color: #c61d0f; /* Berubah jadi Terracotta saat hover */
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
            <img src="./src/bg_login.png" alt="Restaurant Interior">
            
            <div class="image-overlay">
                <h2>Basamo.</h2>
                <p>"Symphony of Feelings in the Warmth of Togetherness."</p>
            </div>
        </div>

        <div class="form-side">
            <a href="index.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Back to Site</a>
            
            <div class="form-container">
                <h1>Sign In</h1>
                <p>Welcome back! Please enter your details.</p>

                <?php if (!empty($errors)): ?>
                    <span class="error-msg"><?= $errors[0] ?></span>
                <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="identifier" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-login">Log In</button>
            </form>

            <p class="auth-footer">
                Don't have an account? <a href="register.php">Create one for free</a>
            </p>
            </div>
        </div>
    </div>

</body>
</html>