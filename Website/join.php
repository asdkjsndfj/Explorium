<?php
include 'backend/website.php';
include 'backend/componets.php';

if (!isset($_SESSION['id'])) {
    redirect("/login.php");
}

if (isset($_GET['id'])) {
    if (is_numeric($_GET['id'])) {
        $sql = 'SELECT * FROM servers WHERE id = ' . $_GET['id'] . '';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $server = $stmt->fetch(PDO::FETCH_ASSOC);
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

$sql = 'SELECT * FROM jointokens WHERE gid = ' . $_GET['id'] . ' AND uid=' . $_SESSION['id'] . ' AND used = 0';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row_count = $stmt->rowCount();
if ($row_count == 0) {
    $hash = md5(uniqid(rand(), TRUE));
    $sql = "INSERT INTO jointokens (gid, uid, token) VALUES (:gid, :uid, :token)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':gid', $server['id']);
    $stmt->bindValue(':uid', $_SESSION['id']);
    $stmt->bindValue(':token', $hash);
    $result = $stmt->execute();
    echo $hash;
} else {
    $sql = 'SELECT * FROM jointokens WHERE gid = ' . $_GET['id'] . ' AND uid = ' . $_SESSION['id'] . '';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $server = $stmt->fetch(PDO::FETCH_ASSOC);
    $row_count = $stmt->rowCount();
    echo $server['token'];
}
