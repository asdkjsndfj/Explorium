<?php
include 'backend/website.php';
include 'backend/componets.php';
buildHeader("Users");
echo buildNavigation("Users");
echo buildBanner();
?>

<body>
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Users</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
                        $show  = "SELECT * FROM users ORDER BY id DESC";
                        $stmt = $pdo->prepare($show);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                            <div class="col-lg-2 mb-4">
                                <div class="card border-success">
                                    <div class="card-header text-center">
                                        <h4><?= htmlspecialchars($row['username']); ?></h4>
                                        <a href="profile.php?id=<?= $row['id']; ?>" class="btn btn-success">View</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>