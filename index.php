<?

define("APP_TITLE", "Basamo.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Basamo</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once "./layout/_navbar.php"; ?>

    <!-- HOMEPAGE -->
    <section class="hero-section">
        <div class="content">
            <div class="left">
                <h1>Enjoy a Symphony of Indonesian Flavors at Every Table.</h1>
                <p>Where Nusantara heritage meets modern culinary precision.</p>

                <a class="hero-cta" href="">
                    <span>make and a pointment</span>
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

    <!-- ABOUT -->
    <section>
        <div class="about">
            <h2>Basamo.</h2>
            <p> "Basamo stems from a simple yet profound value: that true luxury is found in every moment spent together. Here, we redefine the richness of Indonesian cuisine through precise modern techniques, without forgetting the traditional roots that guide us.
                Every dish is a celebration of the carefully selected produce and the skilled hands that work behind the scenes. Basamo is more than just a place to dine; it is a space where taste, art, and soul meet at the same table."</p>

            <div class="button-wrapper">
                <a class="button" href="#">Explore Detail</a>
            </div>
        </div>
    </section>
    
    <!-- DISPLAY -->
     <section class="displays">
  <div class="displays-cards">
    <article class="display-card display-card-left">
      <div class="display-image">
        <img src="./src/image 1.png" alt="Exclusive Sensory Journey">
      </div>
      <h3>Exclusive Sensory Journey</h3>
      <p>
        Only available to a few tables each night," or "A dish that
        delights all five senses at once.
      </p>
    </article>

    <article class="display-card display-card-center">
      <div class="display-image">
        <img src="./src/image 2.png" alt="Reinventing Tradition">
      </div>
      <h3>Reinventing Tradition</h3>
      <p>
        Heritage recipes deconstructed with modern techniques," or
        "Discover another side of the local flavors you love.
      </p>
    </article>

    <article class="display-card display-card-right">
      <div class="display-image">
        <img src="./src/image 3.png" alt="An Unrivaled Atmosphere">
      </div>
      <h3>An Unrivaled Atmosphere</h3>
      <p>
        A space where time seems to stand still," or "One table for a
        million precious stories.
      </p>
    </article>
  </div>
</section>

    <!-- PRODUCTS -->
     <section class="taste-story">
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
          More than just taste, it's about memories created around the dinner
          table. Let's celebrate the heritage of the archipelago in
          unforgettable harmony. Welcome to the home of taste, welcome to
          Basamo.
        </p>
        <a href="#" class="taste-btn">Explore More</a>
      </div>
    </article>

    <article class="taste-item taste-item-reverse">
      <div class="taste-item-image">
        <img src="./src/image 5.png" alt="Sate Padang Gilded Gold">
      </div>
      <div class="taste-item-content">
        <h3>Sate Padang "Gilded Gold"</h3>
        <p>
          Selected beef tongue grilled over coffee wood embers, served with a
          thick satay sauce enriched with selected turmeric and secret spices.
          What sets it apart is the touch of 24-karat edible gold leaf on top,
          symbolizing true luxury and respect for the guests.
        </p>
        <a href="#" class="taste-btn">Explore More</a>
      </div>
    </article>

    <article class="taste-item">
      <div class="taste-item-image">
        <img src="./src/image 6.png" alt="Kalio Seabass">
      </div>
      <div class="taste-item-content">
        <h3>Kalio Seabass: Maritime Harmony</h3>
        <p>
          Sustainably caught wild sea bass, grilled to a crispy skin, is
          drizzled with a light yet rich Kalio sauce made with pure coconut
          milk and kandis tamarind. The dish is complemented by purple sweet
          potato tule, providing a modern contrast in texture.
        </p>
        <a href="#" class="taste-btn">Explore More</a>
      </div>
    </article>
  </div>
</section>

<!-- TEXT SECTION -->
 <section class="text-section">
    <div class="text">
        <h3>"Symphony of Feelings in the Warmth of Togetherness."</h3>
    </div>
 </section>

</body>
</html>
