<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
$username = $_SESSION['username'] ?? 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore the Soul of Basamo | Heritage & Ambience</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        @font-face {
            font-family: 'CherieDEMO';
            src: url('src/fonts/CherieDEMO.ttf') format('truetype');
        }

        :root {
            --emerald: #02332d;
            --gold: #eaac68;
            --cream: #f8f5f2;
            --white: #ffffff;
            --text-dark: #1a1a1a;
            --text-light: #555555;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--cream);
            color: var(--text-dark);
            line-height: 1.8;
            padding-top: 75px;
            overflow-x: hidden;
        }

        /* --- TYPOGRAPHY REFINED --- */
        h1 {
            font-family: 'CherieDEMO', serif;
            font-size: clamp(50px, 8vw, 90px);
            color: var(--gold);
            line-height: 1;
            letter-spacing: 2px;
        }

        h2 {
            font-family: 'CherieDEMO', serif;
            font-size: clamp(35px, 5vw, 55px);
            color: var(--emerald);
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        h3 {
            font-family: 'CherieDEMO', serif;
            font-size: 28px;
            color: var(--gold);
            margin-bottom: 0.5rem;
        }

        /* Mengunci font size p khusus di area konten agar tidak merusak navbar */
        .content-p {
            font-size: 18px;
            font-weight: 300;
            color: var(--text-light);
            max-width: 700px;
        }

        /* --- HERO SECTION (PARALLAX EFFECT) --- */
        .explore-hero {
            height: 80vh;
            background: linear-gradient(rgba(2, 51, 45, 0.7), rgba(2, 51, 45, 0.7)), 
                        url('src/explore-bg.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed; /* Parallax */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
            padding: 0 20px;
        }

        .hero-content span {
            text-transform: uppercase;
            letter-spacing: 5px;
            font-size: 14px;
            display: block;
            margin-bottom: 1rem;
            color: var(--gold);
        }

        /* --- STORY SECTION (ASYMMETRICAL LAYOUT) --- */
        .story-section {
            padding: 150px 54px;
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 100px;
        }

        .story-img {
            flex: 1.2;
            position: relative;
        }

        .story-img img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 40px 40px 0px -10px var(--gold); /* Offset border style */
            transition: transform 0.5s ease;
        }

        .story-img:hover img {
            transform: scale(1.02);
        }

        .story-content {
            flex: 1;
        }

        /* --- AMBIENCE SECTION (BENTO GRID STYLE) --- */
        .ambience-section {
            padding: 120px 54px;
            background: var(--white);
            text-align: center;
        }

        .ambience-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 80px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .ambience-card {
            position: relative;
            height: 550px;
            overflow: hidden;
            border-radius: 20px;
            cursor: pointer;
        }

        .ambience-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1.2s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .ambience-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(2, 51, 45, 0.9) 0%, transparent 60%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 50px;
            color: var(--white);
            text-align: left;
            opacity: 0.9;
            transition: opacity 0.4s ease;
        }

        .ambience-card:hover img {
            transform: scale(1.1);
        }

        /* --- MAIN FOOTER REFINED --- */
        .main-footer {
            background-color: #02332d; /* Deep Emerald */
            padding: 80px 54px 40px;
            color: #dfd0bd;
            font-family: 'Poppins', sans-serif;
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(234, 172, 104, 0.1);
            margin-bottom: 40px;
        }

        .footer-nav {
            display: flex;
            gap: 30px;
        }

        .footer-nav a {
            color: #dfd0bd;
            text-decoration: none;
            font-size: 14px;
            font-weight: 300;
            transition: color 0.3s ease;
        }

        .footer-nav a:hover {
            color: var(--gold);
        }

        .footer-socials {
            display: flex;
            gap: 20px;
        }

        .footer-socials a {
            color: var(--gold);
            font-size: 18px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .footer-socials a:hover {
            color: #fff;
            transform: translateY(-5px);
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-copy p {
            font-size: 13px;
            opacity: 0.6;
            color: #dfd0bd !important; /* Memastikan warna teks copy tetap krem */
        }

        .footer-logo h2 {
            font-family: 'CherieDEMO', serif;
            font-size: 35px;
            color: var(--gold);
            margin: 0;
        }

        .footer-legal {
            display: flex;
            gap: 20px;
        }

        .footer-legal a {
            color: #dfd0bd;
            text-decoration: none;
            font-size: 13px;
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .footer-legal a:hover {
            opacity: 1;
        }

        /* Responsive Footer */
        @media (max-width: 850px) {
            .footer-top, .footer-bottom {
                flex-direction: column;
                gap: 30px;
                text-align: center;
            }
            .footer-nav, .footer-legal {
                justify-content: center;
            }
        }

        /* --- REVEAL ANIMATION ON SCROLL --- */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .story-section {
                flex-direction: column;
                text-align: center;
                padding: 100px 30px;
                gap: 60px;
            }
            .story-img img { box-shadow: 20px 20px 0 var(--gold); }
            .ambience-grid { padding: 0 10px; }
        }
    </style>
</head>
<body>

    <?php include 'layout/_navbar.php'; ?>

    <header class="explore-hero">
        <div class="hero-content">
            <span class="reveal">Est. 2024</span>
            <h1 class="reveal">Heritage of Taste</h1>
            <p class="reveal" style="margin: 20px auto 0; color: rgba(255,255,255,0.8); font-size: 20px;">
                Elevating traditional flavors with a touch of modern culinary art.
            </p>
        </div>
    </header>

    <section class="story-section">
        <div class="story-img reveal">
            <img src="src/interior-basamo.png" alt="Basamo Interior">
        </div>
        <div class="story-content reveal">
            <h2>Our Philosophy</h2>
            <p class="content-p">Basamo is more than just a place to eat; it is a celebration of togetherness. We combine the richness of Indonesian spices with fine dining techniques to create unforgettable memories.</p>
            <p class="content-p" style="margin-top: 20px;">Every corner of the restaurant is designed for maximum comfort, ensuring every guest feels truly welcomed in the warmth of togetherness.</p>
        </div>
    </section>

    <section class="ambience-section">
        <h2 class="reveal">The Ambience</h2>
        <div class="ambience-grid">
            <div class="ambience-card reveal">
                <img src="src/corner-1.png" alt="Main Hall">
                <div class="ambience-overlay">
                    <h3>Main Dining Hall</h3>
                    <p style="font-size: 16px; opacity: 0.8;">A warm atmosphere for your most precious moments.</p>
                </div>
            </div>
            <div class="ambience-card reveal">
                <img src="src/corner-2.png" alt="VIP">
                <div class="ambience-overlay">
                    <h3>Private VIP Room</h3>
                    <p style="font-size: 16px; opacity: 0.8;">An exclusive space for intimate family gatherings.</p>
                </div>
            </div>
            <div class="ambience-card reveal">
                <img src="src/corner-3.png" alt="Lounge">
                <div class="ambience-overlay">
                    <h3>Lounge & Bar</h3>
                    <p style="font-size: 16px; opacity: 0.8;">The perfect spot to unwind with our signature drinks.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer">
        <div class="footer-top">
            <nav class="footer-nav">
                <a href="index.php">Home</a>
                <a href="explore.php">Explore</a>
                <a href="index.php#experience">The Experience</a>
                <a href="index.php#contact">Contact</a>
            </nav>
            <div class="footer-socials">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-copy">
                <p>© 2026 Basamo Fine Dining. All rights reserved.</p>
            </div>
            <div class="footer-logo">
                <h2>Basamo.</h2>
            </div>
            <div class="footer-legal">
                <a href="#">Terms of Service</a>
                <a href="#">Privacy Policy</a>
            </div>
        </div>
    </footer>

    <script>
        // Script untuk animasi muncul saat scroll (Reveal)
        window.addEventListener('scroll', reveal);

        function reveal() {
            var reveals = document.querySelectorAll('.reveal');
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var revealTop = reveals[i].getBoundingClientRect().top;
                var revealPoint = 150;
                if (revealTop < windowHeight - revealPoint) {
                    reveals[i].classList.add('active');
                }
            }
        }
        // Jalankan sekali saat load
        reveal();
    </script>
</body>
</html>