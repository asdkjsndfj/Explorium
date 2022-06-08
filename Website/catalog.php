<?php
include 'backend/website.php';
include 'backend/componets.php';
buildHeader("Catalog");
echo buildNavigation("Catalog");
echo buildBanner();

$type;

if (isset($_GET['type'])) {
    if ($_GET['type'] < 5 && is_numeric($_GET['type'])) {
        $type = $_GET['type'];
    } else {
        redirect('catalog.php?type=1');
    }
} else {
    redirect('catalog.php?type=1');
}
?>
<?php if (isset($_SESSION['id']) && isset($_SESSION['admin'])) { ?>
<div class="text-center">
    <a href="uploadasset.php" class="btn btn-success">Create Hat</a>
</div>
<?php } ?>

<body>
    <div class="container py-4">
        <h4 class="text-center">Catalog</h4>
        <div class="zcard shadow-sm">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link <?php if ($type == 1) { ?>active<?php } ?>" href="?type=1">Hats</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($type == 2) { ?>active<?php } ?>" href="?type=2">Shirts</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($type == 3) { ?>active<?php } ?>" href="?type=3">Pants</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($type == 4) { ?>active<?php } ?>" href="?type=4">Faces</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
                        $show  = "SELECT * FROM catalog WHERE type=" . $type . "";
                        $stmt = $pdo->prepare($show);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                            <div class="col-lg-3 mb-4">
                                <div class="card border-success">
                                    <div class="card-header text-center">
                                        <h4><?= htmlspecialchars($row['name']); ?></h4>
                                        <img src="<?= $row['thumbnail']; ?>" width="100" class="img-fluid"><a class='btn btn-success' href='/item.php?id=<?= $row['id']; ?>'>View Item</a>
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