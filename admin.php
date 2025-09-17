<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="site-header js-site-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12" style="display: flex; align-items: center; justify-content: space-between;">
                    <div class="site-logo" data-aos="slide" style="margin-right: 24px;"><a href="index.php">Sweet Peach</a></div>
                    <div style="display: flex; align-items: center; gap: 600px;">
                        <button id="bookingBtn"
                            style="border:2px solid #000; background:transparent; color:#000; border-radius:2px; padding:8px 28px; margin:0; font-weight:700; cursor:pointer; transition:background 0.2s, color 0.2s, border-color 0.2s; text-transform:uppercase; letter-spacing:1px; font-size:16px; min-width:120px;"
                            onclick="window.location.href='booking.php'">Book Your Stay</button>
                        <div class="site-menu-toggle js-site-menu-toggle" data-aos="slide">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="container mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! This is your admin dashboard.</p>
        <!-- Add admin features here -->
    </main>
</body>
</html>
