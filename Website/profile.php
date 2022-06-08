<?php
include 'backend/website.php';
include 'backend/componets.php';
buildHeader("Profile");
echo buildNavigation("Users");
echo buildBanner();

if (!isset($_SESSION['id'])) {
    redirect("/login.php");
}

if (isset($_GET['id'])) {
    if (is_numeric($_GET['id'])) {
        $sql = 'SELECT * FROM users WHERE id = ' . $_GET['id'] . '';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
        if ($row_count == 0) {
            redirect("/not-found");
        }
    } else {
        redirect("/not-found");
    }
} else {
    redirect("/not-found");
}

$sql = 'SELECT * FROM users WHERE id = ' . $_GET['id'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM inventory WHERE uid = ' . $_SESSION['id'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$inventory_count = $stmt->rowCount();
?>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 col-md-4 p-1">
                <div class="card text-center shadow-sm">
                    <div class="card-header">
                        <h3><b><?= htmlspecialchars($user['username']); ?></b></h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="/assets/img/avatar/<?= $user['id']; ?>.png" width="200" class="img-fluid" alt="<?= htmlspecialchars($user['username']); ?>" onerror="this.onerror=null;this.src='/assets/img/unavailable.webp';">
                    </div>
                    <div class="card-footer text-secondary">
                        <b>Joined:</b> <?= date("m/d/y", $user['joindate']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 p-1">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3><b>Inventory</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php

                            function getThumbnail($aid)
                            {
                                $sql = 'SELECT * FROM catalog WHERE id = ' . $aid . '';
                                $stmt = $GLOBALS['pdo']->prepare($sql);
                                $stmt->execute();
                                $thumbnail = $stmt->fetch(PDO::FETCH_ASSOC);
                                return $thumbnail['thumbnail'];
                            }

                            $id = $user["id"];
                            $show  = "SELECT * FROM inventory WHERE uid = $id ORDER BY id DESC";
                            $stmt = $pdo->prepare($show);
                            $stmt->execute();
                            if($stmt->rowCount() === 0) echo '<b class="text-muted" style="padding: 10px;">' . htmlspecialchars($user['username']) . ' has nothing equipped</b>';
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                            ?>
                                <div class="col-lg-2 mb-4">
                                    <img src="<?= getThumbnail($row['aid']); ?>" width="100" class="img-fluid" onerror="this.onerror=null;this.src='/assets/img/unavailable.webp';">
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3><b>Badges</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 mb-4 text-center">
                                <img src="/assets/img/badges/0.webp" width="100" class="img-fluid">
                                <b>Member</b>
                            </div>
                            <?php if ($user['id'] < 20) { ?>
                                <div class="col-lg-2 mb-4 text-center">
                                    <img src="/assets/img/badges/1.webp" width="100" class="img-fluid">
                                    <b>First 20</b>
                                </div>
                            <?php } ?>
                            <?php
                            $id = $user["id"];
                            $show  = "SELECT * FROM badges WHERE uid = $id ORDER BY id DESC";
                            $stmt = $pdo->prepare($show);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                            ?>
                                <div class="col-lg-2 mb-4 text-center">
                                    <img src="/assets/img/badges/<?= $row['bid']; ?>.png" width="100" class="img-fluid">
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>