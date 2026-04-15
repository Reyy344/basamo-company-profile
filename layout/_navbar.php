<?php
// Pastikan session sudah start agar variabel user terbaca
$is_logged_in = isset($_SESSION['user_id']);
$username = $_SESSION['username'] ?? 'Guest';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    /* --- FONTS --- */
    @font-face {
        font-family: 'CherieDEMO';
        src: url('src/fonts/CherieDEMO.ttf') format('truetype');
    }

    /* --- NAVBAR BASE --- */
    .nav1 {
        display: flex;
        position: fixed; /* Menggunakan fixed agar bisa hide on scroll */
        top: 0;
        left: 0;
        width: 100%;
        height: 75px;
        background-color: #02332d;
        justify-content: space-between;
        align-items: center;
        padding: 0 54px;
        z-index: 9999;
        transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    /* Class untuk menyembunyikan navbar saat scroll ke bawah */
    .nav-hide {
        transform: translateY(-110%);
    }

    .nav1 .logo {
        font-family: "CherieDEMO", sans-serif;
        font-size: 30px;
        color: #eaac68;
        font-weight: 500;
        cursor: pointer;
        letter-spacing: 1px;
    }

    .nav1 .navbar {
        display: flex;
        align-items: center;
        gap: 54px; /* Menggunakan gap besar sesuai permintaan kedua */
    }

    .nav1 .navbar a {
        color: #fff;
        text-decoration: none;
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        font-weight: 400;
        opacity: 0.8;
        transition: 0.3s;
    }

    .nav1 .navbar a:hover {
        color: #eaac68;
        opacity: 1;
    }

    /* --- PROFILE BUTTON & DROPDOWN --- */
    .account-group {
        display: flex;
        align-items: center;
    }

    .menu-button {
        background: rgba(234, 172, 104, 0.15);
        color: #eaac68;
        border: 1px solid rgba(234, 172, 104, 0.4);
        padding: 8px 20px;
        border-radius: 50px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: 'Poppins', sans-serif;
        transition: 0.3s;
    }

    .menu-button:hover {
        background: rgba(234, 172, 104, 0.25);
    }

    /* Dropdown dikontrol koordinat via JS */
    #dropdownMenu {
        position: fixed;
        width: 200px;
        background: #ffffff;
        border-radius: 12px;
        padding: 10px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        z-index: 10000;
        border: 1px solid #ddd;
        display: none; 
    }

    .drop-header {
        padding: 8px 12px;
        border-bottom: 1px solid #eee;
        margin-bottom: 5px;
        font-family: 'Poppins', sans-serif;
    }

    .drop-header small { color: #888; font-size: 10px; text-transform: uppercase; display: block; }
    .drop-header strong { display: block; color: #02332d; font-size: 14px; }

    .drop-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        color: #333;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        border-radius: 8px;
        transition: 0.2s;
    }

    .drop-item:hover {
        background: #f8f5f2;
        color: #02332d;
        padding-left: 18px;
    }

    .menu-toggle {
        display: none; /* Hidden by default on desktop */
        width: 34px;
        height: 34px;
        background: transparent;
        border: none;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 4px;
    }

    .menu-toggle span {
        display: block;
        height: 4px;
        border-radius: 999px;
        background: #eaac68;
    }

    .menu-toggle span:nth-child(1) { width: 22px; }
    .menu-toggle span:nth-child(2) { width: 14px; margin-left: 8px; }
    .menu-toggle span:nth-child(3) { width: 8px; margin-left: 14px; }

    @media (max-width: 850px) {
        .nav1 .navbar { display: none; }
        .menu-toggle { display: inline-flex; }
    }

    .nav1 .navbar a {
        position: relative;
        padding-bottom: 5px;
        opacity: 0.8;
    }

    .nav1 .navbar a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: #eaac68;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        transform: translateX(-50%);
    }

    .nav1 .navbar a:hover {
        opacity: 1;
        color: #eaac68;
    }

    .nav1 .navbar a:hover::after {
        width: 100%;
    }

    .nav-clicked {
        animation: navPulse 0.5s ease-out;
    }

    @keyframes navPulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(0.9); opacity: 0.7; color: #eaac68; }
        100% { transform: scale(1); opacity: 1; }
    }

    .drop-item {
        transition: all 0.3s ease;
    }

    .drop-item:active {
        background: #f2d9c5;
        transform: scale(0.98);
    }
    .user-name-nav {
        font-family: 'Poppins', sans-serif !important;
        font-size: 14px !important; /* Ukuran standar navbar */
        font-weight: 400 !important;
    }
</style>

<nav class="nav1" id="mainNavbar">
    <div class="logo" onclick="window.location.href='index.php'">Basamo.</div>
    
    <div class="navbar" id="navLinks">
        <a href="index.php">Home</a>
        <a href="explore.php">Explore</a>
        <a href="index.php#experience">The Experience</a>
        <a href="index.php#contact">Contact</a>
    </div>

    <div class="account-group">
        <button class="menu-button" id="profileBtn" type="button">
            <i class="fa-solid fa-circle-user"></i>
            <span class="user-name-nav"><?= htmlspecialchars($username) ?></span>
            <i class="fa-solid fa-chevron-down" id="arrowIcon"></i>
        </button>
        
        <button class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

<div id="dropdownMenu">
    <div class="drop-header">
        <small>Signed in as</small>
        <strong><?= htmlspecialchars($username) ?></strong>
    </div>
    
    <a href="profile.php" class="drop-item">
        <i class="fa-solid fa-user-gear"></i> My Profile
    </a>

    <?php if($is_logged_in): ?>
        <a href="logout.php" class="drop-item" style="color: #c61d0f;">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    <?php else: ?>
        <a href="login.php" class="drop-item">
            <i class="fa-solid fa-right-to-bracket"></i> Login
        </a>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nav = document.getElementById('mainNavbar');
        const btn = document.getElementById('profileBtn');
        const menu = document.getElementById('dropdownMenu');
        const arrow = document.getElementById('arrowIcon');
        let lastScroll = window.scrollY;

        // Hitung posisi dropdown secara dinamis
        function updateMenuPosition() {
            const rect = btn.getBoundingClientRect();
            menu.style.top = (rect.bottom + 10) + 'px';
            menu.style.left = (rect.right - 200) + 'px';
        }

        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            updateMenuPosition();
            const isHidden = menu.style.display === 'none' || menu.style.display === '';
            menu.style.display = isHidden ? 'block' : 'none';
            arrow.style.transform = isHidden ? 'rotate(180deg)' : 'rotate(0deg)';
        });

        document.addEventListener('click', () => {
            menu.style.display = 'none';
            arrow.style.transform = 'rotate(0deg)';
        });

        // Logika Hide on Scroll
        window.addEventListener('scroll', () => {
            let currentScroll = window.scrollY;
            if (currentScroll > lastScroll && currentScroll > 100) {
                nav.classList.add('nav-hide');
                menu.style.display = 'none';
            } else {
                nav.classList.remove('nav-hide');
            }
            lastScroll = currentScroll;
        });

        window.addEventListener('resize', updateMenuPosition);
    });
</script>