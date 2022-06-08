<?php
include 'backend/website.php';
include 'backend/componets.php';
buildHeader("Item");
echo buildNavigation("Catalog");
echo buildBanner();

if (!isset($_SESSION['id'])) {
    redirect("/login.php");
}

if (isset($_GET['id'])) {
    if (is_numeric($_GET['id'])) {
        $sql = 'SELECT * FROM catalog WHERE id = ' . $_GET['id'] . '';
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

//get creator data
$sql = 'SELECT * FROM users WHERE id = ' . $item['creator'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

//get inventory data
$sql = 'SELECT * FROM inventory WHERE uid = ' . $_SESSION['id'] . ' AND aid = ' . $item['id'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$inventory_count = $stmt->rowCount();


$sql = 'SELECT * FROM inventory WHERE uid = ' . $_SESSION['id'] . ' AND type = ' . $item['type'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$inventory_count_type = $stmt->rowCount();

/*
    Errors:
    401: item does not exist 
    402: Max amount of this item type equipped

    Successful Operations:
    200: item has been deleted
    201: item has been equipped

*/
?>

<script>
    function equip() {
        document.getElementById("button").classList.add("disabled");
        fetch("equip.php?id=<?= $item['id']; ?>&csrf=<?= $_SESSION['csrf']; ?>")
            .then((response) => response.text())
            .then((html) => {
                switch (html) {
                    case "401":
                        document.getElementById("errorBanner").innerHTML = "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button><div class='text-center'>This item does not exist</div></div>";
                        break;
                    case "402":
                        document.getElementById("errorBanner").innerHTML = "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button><div class='text-center'>You have reached the max amount of <?= $item['type']; ?>'s you can equip</div></div>";
                        document.getElementById("button").classList.add("disabled");
                        document.getElementById("button").innerHTML = '<button class="btn btn-danger" id="button">Max Amount Equipped</button>';
                        break;
                    case "200":
                        document.getElementById("button").classList.remove("disabled");
                        document.getElementById("button").innerHTML = '<button onclick="equip()" id="button" class="btn btn-success">Equip</button>';
                        break;
                    case "201":
                        document.getElementById("button").classList.remove("disabled");
                        document.getElementById("button").innerHTML = '<button onclick="equip()" id="button" class="btn btn-danger">Dequip</button>';
                        break;
                }
            })
            .catch((error) => {
                console.warn(error);
            });
    }
</script>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <?= htmlspecialchars($item['name']); ?>
                    </div>
                    <div class="card-body text-center">
                        <div id="errorBanner"></div>
                        <img src="<?= htmlspecialchars($item['thumbnail']); ?>" width="150" class="img-fluid" alt="<?= htmlspecialchars($item['name']); ?>" onerror="this.onerror=null;this.src='/assets/img/unavailable.webp';">
                        <div class="text-success"><b>Creator:</b> <a href="profile.php?id=<?= $user['id']; ?>" class="text-decoration-none text-success"><?= htmlspecialchars($user['username']); ?></a></div>
                        <br>
                        <div id="button"><?php if ($inventory_count > 0) { ?><button onclick="equip()" id="button" class="btn btn-danger">Dequip</button><?php } else { ?>
                        <?php switch($item['type']) { 
                            case "1":
                                if($inventory_count_type > 2){
                                    echo "<button class='btn btn-danger' disabled>Limit Reached</button>";
                                }else{
                                    echo "<button onclick='equip()' class='btn btn-success'>Equip</button>";
                                }
                            break;
                            default:
                                if($inventory_count_type > 0){
                                    echo "<button class='btn btn-danger' disabled>Limit Reached</button>";
                                }else{
                                    echo "<button onclick='equip()' class='btn btn-success'>Equip</button>";
                                }
                            break;

                         } ?>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>