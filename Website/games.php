<?php
include 'backend/website.php';
include 'backend/componets.php';
if (!isset($_SESSION['id'])) {
    redirect("/login.php");
}
buildHeader("Games");
echo buildNavigation("Games");
echo buildBanner();
?>
<?php if (isset($_SESSION['id'])) { ?>
<div class="text-center">
    <a href="uploadgame.php" class="btn btn-success">Create Server</a>
</div>
<?php } ?>

<body>
    <div class="container py-4">
        <h4 class="text-center">Games</h4>
        <div class="zcard shadow-sm">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link active">Servers</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
                        function getUsername($uid)
                        {
                            $sql = 'SELECT * FROM users WHERE id = ' . $uid . '';
                            $stmt = $GLOBALS['pdo']->prepare($sql);
                            $stmt->execute();
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                            return $user['username'];
                        }

                        $show  = "SELECT * FROM servers";
                        $stmt = $pdo->prepare($show);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                            <div class="col-lg-3 mb-4">
                                <div class="card border-success">
                                    <div class="card-header text-center">
                                        <?= htmlspecialchars($row['name']); ?>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4>Created By: <?= htmlspecialchars(getUsername($row['creator'])); ?></h4>
                                        <div><small><?= $row['year']; ?></small></div>
                                        &nbsp;
                                        <div>
                                            <a class="btn btn-success" href="game.php?id=<?= $row['id']; ?>">view game</a>
                                        </div>
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