<?php
include 'backend/website.php';
include 'backend/componets.php';
buildHeader("Home");
echo buildNavigation("Home");
echo buildBanner();
?>

<body>
<?php if (isset($_SESSION['id'])) { ?>
<div class="container py-4 text-center">
        <h3>Hello, <b><?= htmlspecialchars($_SESSION['username']); ?></b></h3>
    <div><img src="/assets/img/avatar/<?= $_SESSION["id"]; ?>.png" class="img-fluid" width="200" onerror="this.onerror=null;this.src='/assets/img/unavailable.webp';"></div>
</div>
    <?php } else { ?>
        <div class="bs-component">
            <div class="jumbotron text-center">
                <h1 class="display-3">Explore the world of old bricks.</h1>
                <p class="lead">Sign up to get started! You'll love it.</p>
                <p class="lead">
                    <a class="btn btn-success" href="login.php" role="button">Sign In</a>
                    <a class="btn btn-success" href="signup.php" role="button">Sign Up</a>
                </p>
            </div>
        </div>
    <?php } ?>
    <?= buildFooter(); ?>
</body>