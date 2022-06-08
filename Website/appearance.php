<?php
include 'backend/website.php';
include 'backend/componets.php';

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

function getAssetURL($aid)
{
    $sql = 'SELECT * FROM catalog WHERE id = ' . $aid . '';
    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->execute();
    $thumbnail = $stmt->fetch(PDO::FETCH_ASSOC);
    return $thumbnail['asset'];
}
?>
<?= $GLOBALS['url']; ?>/charactercolors.php?id=<?= $user['id']; ?>;<?php $show  = "SELECT * FROM inventory WHERE uid = " . $_GET['id'] . "";$stmt = $pdo->prepare($show);$stmt->execute();while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :?><?= getAssetURL($row['aid']) ?>;<?php endwhile; ?>