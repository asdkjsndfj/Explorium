<?php
include 'backend/website.php';
include 'backend/componets.php';

if (!isset($_SESSION['id'])) {
    redirect('/');
}

$failure = false;

$nameError = false;
$ipError = false;
$yearError = false;
$portError = false;

$nameDescription = false;
$ipDescription = false;
$yearDescription = false;
$portDescription = false;

buildHeader("Upload Game");
echo buildNavigation("Games");
echo buildBanner();

if (isset($_POST['game']) && isset($_POST['name']) && isset($_POST['ip']) && isset($_POST['port']) && isset($_POST['year']) && isset($_POST['csrf'])) {

    if (isset($_POST['csrf']) == $_SESSION['csrf']) {

        if (!$_POST['name']) {
            $nameError = true;
            $nameDescription = 'Please input a valid name';
            $failure = true;
        }

        if (!filter_var($_POST['ip'], FILTER_VALIDATE_IP)) {
            $ipError = true;
            $ipDescription = 'Please input a valid ip';
            $failure = true;
        }

        if(!(int)$_POST['port'] && strlen($_POST['port']) < 6){
            $portError = true;
            $portDescription = 'Please input a valid port';
            $failure = true;
        }

        if($_POST['year'] != 2008 && $_POST['year'] != 2009 && $_POST['year'] != 2010 && $_POST['year'] != 2011 && $_POST['year'] != 2012){
            $yearError = true;
            $yearDescription = 'Please input a valid year';
            $failure = true;
        }

        if(!$failure){

            $sql = "INSERT INTO servers (name, creator, year, ip, port) VALUES (:name, :creator, :year, :ip, :port)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $_POST['name']);
            $stmt->bindValue(':creator', $_SESSION['id']);
            $stmt->bindValue(':year', $_POST['year']);
            $stmt->bindValue(':ip', $_POST['ip']);
            $stmt->bindValue(':port', $_POST['port']);
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
                        Upload Game
                    </div>
                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="name">Game Name</label>
                                <input type="name" class="form-control <?php if ($nameDescription) { ?>border-danger<?php } ?>" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter name">
                                <?php if ($nameError) { ?><small id="nameHelp" class="form text-danger"><b><?= $nameDescription; ?></b></small><?php } else { ?><small id="nameHelp" class="form text-muted">3 - 20 characters long, No special characters</small><?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="ip">IP</label>
                                <input type="ip" class="form-control <?php if ($ipError) { ?>border-danger<?php } ?>" id="ip" name="ip" placeholder="Enter ip">
                                <?php if ($ipError) { ?><small id="ipHelp" class="form text-danger"><b><?= $ipDescription; ?></b></small><?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="port">Port</label>
                                <input type="port" class="form-control <?php if ($portError) { ?>border-danger<?php } ?>" id="port" name="port" placeholder="Enter port">
                                <?php if ($portError) { ?><small id="portHelp" class="form text-danger"><b><?= $portDescription; ?></b></small><?php } ?>
                            </div>
                            <input type="hidden" name="csrf" id="csrf" value="<?= $_SESSION['csrf']; ?>">
                            <div class="form-group">
                                <select class="form-select" name="year" id="year">
                                    <option value="2012" selected>2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                </select>
                                <?php if ($yearError) { ?><small id="yearHelp" class="form text-danger"><b><?= $yearDescription; ?></b></small><?php } ?>

                            </div>
                            <button type="submit" name="game" class="btn btn-success">Upload Game</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>