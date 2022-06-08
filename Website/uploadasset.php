<?php
include 'backend/website.php';
include 'backend/componets.php';

if (!isset($_SESSION['id'])) {
    redirect('/');
}

if (!isset($_SESSION['admin'])) {
    redirect('/');
}

$failure = false;

$nameError = false;
$thumbnailError = false;
$assetError = false;
$typeError = false;

$nameDescription = false;
$thumbnailDescription = false;
$assetDescription = false;
$typeDescription = false;

buildHeader("Upload Asset");
echo buildNavigation("Catalog");
echo buildBanner();

if (isset($_POST['upload']) && isset($_POST['name']) && isset($_POST['thumbnail']) && isset($_POST['asset']) && isset($_POST['type'])) {

    if (isset($_POST['csrf']) == $_SESSION['csrf']) {


        if (!filter_var($_POST['thumbnail'], FILTER_VALIDATE_URL)) {
            $thumbnailError = true;
            $thumbnailDescription = 'Please input a valid thumbnail';
            $failure = true;
        }

        if(is_int($_POST['type']) && $_POST['type'] < 5){
            $portError = true;
            $portDescription = 'Please input a valid type';
            $failure = true;
        }

        if (!filter_var($_POST['asset'], FILTER_VALIDATE_URL)) {
            $assetError = true;
            $assetDescription = 'Please input a valid asset';
            $failure = true;
        }

        if(!$failure){

            $sql = "INSERT INTO catalog (name, creator, thumbnail, asset, type) VALUES (:name, :creator, :thumbnail, :asset, :type)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $_POST['name']);
            $stmt->bindValue(':creator', $_SESSION['id']);
            $stmt->bindValue(':thumbnail', $_POST['thumbnail']);
            $stmt->bindValue(':asset', $_POST['asset']);
            $stmt->bindValue(':type', $_POST['type']);
            $stmt->execute();
            
        }
    }
}
?>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-header">
                        Upload Asset
                    </div>
                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="name">Asset Name</label>
                                <input type="name" class="form-control <?php if ($nameDescription) { ?>border-danger<?php } ?>" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter name">
                                <?php if ($nameError) { ?><small id="nameHelp" class="form text-danger"><b><?= $nameDescription; ?></b></small><?php } else { ?><small id="nameHelp" class="form text-muted">3 - 20 characters long, No special characters</small><?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="thumbnail" class="form-control <?php if ($thumbnailError) { ?>border-danger<?php } ?>" id="thumbnail" name="thumbnail" placeholder="Enter thumbnail">
                                <?php if ($thumbnailError) { ?><small id="thumbnailHelp" class="form text-danger"><b><?= $thumbnailDescription; ?></b></small><?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="asset">Asset URL</label>
                                <input type="asset" class="form-control <?php if ($assetError) { ?>border-danger<?php } ?>" id="asset" name="asset" placeholder="Enter Asset URL" value="<?= $GLOBALS['url']; ?>/asset?id=">
                                <?php if ($assetError) { ?><small id="assetHelp" class="form text-danger"><b><?= $assetDescription; ?></b></small><?php } ?>
                            </div>
                            <input type="hidden" name="csrf" id="csrf" value="<?= $_SESSION['csrf']; ?>">
                            <div class="form-group">
                                <select class="form-select" name="type" id="type">
                                    <option value="1" selected>Hat</option>
                                    <option value="2">Shirt</option>
                                    <option value="3">Pants</option>
                                    <option value="4">Face</option>
                                </select>
                                <?php if ($typeError) { ?><small id="typeHelp" class="form text-danger"><b><?= $typeDescription; ?></b></small><?php } ?>

                            </div>
                            <button type="submit" name="upload" class="btn btn-success">Upload Asset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>