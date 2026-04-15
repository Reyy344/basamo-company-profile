<?php
require_once 'config.php';

$is_logged_in = isset($_SESSION['user_id']);
$username = $_SESSION['username'] ?? 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Basamo</title>
    <link rel="stylesheet" href="./styles/style.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php require_once "./layout/_navbar.php"; ?>

    <section class="hero-section">
        <div class="content">
            <div class="left">
                <h1>Enjoy &nbsp;&nbsp; a Symphony of Indonesian Flavors &nbsp;&nbsp; at Every Table.</h1>
                <p>Where Nusantara heritage meets modern culinary precision.</p>

                <a class="hero-cta" href="#taste-story">
                    <span>Check the best food</span>
                    <span class="link">
                        <img src="./src/Link Up.png" alt="Arrow icon">
                    </span>
                </a>
            </div>
            <div class="right">
                <img src="./src/Logo dashboard.png" alt="Basamo dining interior and signature dish">
            </div>
        </div>
    </section>

    <section id="about">
        <div class="about">
            <h2>Basamo.</h2>
            <p> "Basamo stems from a simple yet profound value: that true luxury is found in every moment spent together. Here, we redefine the richness of Indonesian cuisine through precise modern techniques, without forgetting the traditional roots that guide us.
                Every dish is a celebration of the carefully selected produce and the skilled hands that work behind the scenes. Basamo is more than just a place to dine; it is a space where taste, art, and soul meet at the same table."</p>

            <div class="button-wrapper">
                <a class="button" href="explore.php">Explore Detail</a>
            </div>
        </div>
    </section>
    
    <section class="displays" id="experience">
      <div class="displays-cards">
        <article class="display-card display-card-left">
          <div class="display-image">
            <img src="./src/image 1.png" alt="Exclusive Sensory Journey">
          </div>
          <h3>Exclusive Sensory Journey</h3>
          <p>
            Only available to a few tables each night, a dish that
            delights all five senses at once.
          </p>
        </article>

        <article class="display-card display-card-center">
          <div class="display-image">
            <img src="./src/image 2.png" alt="Reinventing Tradition">
          </div>
          <h3>Reinventing Tradition</h3>
          <p>
            Heritage recipes deconstructed with modern techniques. 
            Discover another side of the local flavors you love.
          </p>
        </article>

        <article class="display-card display-card-right">
          <div class="display-image">
            <img src="./src/image 3.png" alt="An Unrivaled Atmosphere">
          </div>
          <h3>An Unrivaled Atmosphere</h3>
          <p>
            A space where time seems to stand still. One table for a
            million precious stories.
          </p>
        </article>
      </div>
    </section>

    <section class="taste-story" id="taste-story">
      <div class="taste-story-header">
        <h2>Taste of Togetherness: Curated Narratives</h2>
        <p>
          More than just taste, it's about memories created around the dinner table.
          Let's celebrate the heritage of the archipelago in unforgettable harmony.
          Welcome to the home of taste, welcome to Basamo.
        </p>
      </div>

      <div class="taste-story-list">
        <article class="taste-item">
          <div class="taste-item-image">
            <img src="./src/image 4.png" alt="Rendang Deconstructed">
          </div>
          <div class="taste-item-content">
            <h3>Rendang Deconstructed: The Heritage Legacy</h3>
            <p>
              Our signature rendang, slow-cooked for 48 hours, served with a modern 
              coconut foam and cassava crisp for a multi-textured experience.
            </p>
            <a href="explore.php" class="taste-btn">Explore More</a>
          </div>
        </article>

        <article class="taste-item taste-item-reverse">
          <div class="taste-item-image">
            <img src="./src/image 5.png" alt="Sate Padang Gilded Gold">
          </div>
          <div class="taste-item-content">
            <h3>Sate Padang "Gilded Gold"</h3>
            <p>
              Selected beef tongue grilled over coffee wood embers, served with edible 
              24-karat gold leaf on top, symbolizing true luxury and respect.
            </p>
            <a href="explore.php" class="taste-btn">Explore More</a>
          </div>
        </article>

        <article class="taste-item">
          <div class="taste-item-image">
            <img src="./src/image 6.png" alt="Kalio Seabass">
          </div>
          <div class="taste-item-content">
            <h3>Kalio Seabass: Maritime Harmony</h3>
            <p>
              Sustainably caught wild sea bass, grilled to a crispy skin, drizzled 
              with a light yet rich Kalio sauce and kandis tamarind.
            </p>
            <a href="explore.php" class="taste-btn">Explore More</a>
          </div>
        </article>
      </div>
    </section>

    <section class="text-section">
        <div class="text">
            <h3>"Symphony of Feelings in the Warmth of Togetherness."</h3>
        </div>
    </section>

    <section class="rating-section">
      <div class="rating-shell">
        <h2>Rating Customer</h2>
        <div class="rating-cards">
          <article class="rating-card rating-card-side">
            <div class="rating-avatar">
              <img src="./src/image 1.png" alt="Customer Raihan">
            </div>
            <h3>Raihan</h3>
            <p>"The restaurant's atmosphere is very intimate and serene, truly the definition of luxury."</p>
            <div class="rating-stars"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
          </article>
          <article class="rating-card rating-card-featured">
            <div class="rating-avatar">
              <img src="./src/image 2.png" alt="Customer Nalendra">
            </div>
            <h3>Nalendra</h3>
            <p>"The presentation of Sate Padang 'Gilded Gold' is an extraordinary tribute to Indonesian spices."</p>
            <div class="rating-stars"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
          </article>

          <article class="rating-card rating-card-side">
            <div class="rating-avatar">
              <img src="./src/image 3.png" alt="Customer Aziland">
            </div>
            <h3>Aziland</h3>
            <p>"The deconstruction technique of Rendang is simply ingenious, bringing flavors to a new level."</p>
            <div class="rating-stars"><span>★</span><span>★</span><span>★</span><span>★</span><span class="muted-star">★</span></div>
          </article>
        </div>
      </div>
    </section>

    <section class="contact-section" id="contact">
      <div class="contact-container">
        <div class="contact-info">
          <h2>Get in Touch</h2>
          <div class="contact-details">
            <div class="contact-item">
              <h3>Address</h3>
              <p>Jl. Basamo No. 123<br>Central Jakarta, Indonesia</p>
            </div>
            <div class="contact-item">
              <h3>Opening Hours</h3>
              <p>Monday - Saturday<br>11:00 AM - 10:00 PM</p>
            </div>
            <div class="contact-item">
              <h3>Contact</h3>
              <p>Phone: +62 21 1234 5678<br>Email: info@basamo.com</p>
            </div>
          </div>
        </div>
        <div class="contact-map">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24131551829!2d106.75914614335938!3d-6.196555199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f436b8c7446d%3A0x498165d204780d6!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1712345678901!5m2!1sid!2sid" 
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </section>

    <footer class="main-footer">
        <div class="footer-top">
            <nav class="footer-nav">
                <a href="index.php">Home</a>
                <a href="explore.php">Explore</a>
                <a href="#experience">The Experience</a>
                <a href="#contact">Contact</a>
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
      function showRating(index) {
        const cards = document.querySelectorAll('.rating-card');
        const dots = document.querySelectorAll('.rating-dots span');
        
        // Remove active class from all cards and dots
        cards.forEach(card => card.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        // Add active class to selected card and dot
        cards[index].classList.add('active');
        dots[index].classList.add('active');
        
        // Scroll to the selected card
        cards[index].scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('show');
          }
        });
      });

      // Pilih semua section yang ingin diberi efek muncul
      document.querySelectorAll('section').forEach((el) => observer.observe(el));
      document.addEventListener('DOMContentLoaded', () => {
      const profileBtn = document.getElementById('profileBtn');
      const dropdownMenu = document.getElementById('dropdownMenu');
      const mobileToggle = document.getElementById('mobileToggle');
      const navLinks = document.getElementById('navLinks');

      // Toggle Dropdown Profile
      profileBtn.addEventListener('click', (e) => {
          e.stopPropagation();
          dropdownMenu.classList.toggle('active');
          profileBtn.classList.toggle('active');
      });

      // Toggle Mobile Menu
      mobileToggle.addEventListener('click', () => {
          navLinks.classList.toggle('active');
      });

      // Tutup semuanya jika klik di luar
      window.addEventListener('click', () => {
          dropdownMenu.classList.remove('active');
          profileBtn.classList.remove('active');
          navLinks.classList.remove('active');
      });
  });
    </script>
</body>
</html>
