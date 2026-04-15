<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="nav1">
    <h2 class="logo">Basamo.</h2>

    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="index.php#explore">Explore</a>
        <a href="index.php#experience">The Experience</a>
        <a href="index.php#contact">Contact</a>

        <?php if (!empty($_SESSION['user_id'])): ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <button class="menu-toggle" type="button" aria-label="Open navigation menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>
