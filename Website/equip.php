<?php
include 'backend/website.php';
include 'backend/componets.php';

$failure;
/*
    Errors:
    401: item does not exist 
    402: Max amount of this item type equipped

    Successful Operations:
    200: item has been deleted
    201: item has been equipped

*/
if (isset($_GET['id']) && isset($_GET['csrf']) && isset($_SESSION['id'])) {
    //check csrf & if id is valid
    if ($_GET['csrf'] === $_SESSION['csrf'] && is_numeric($_GET['id'])) {

        if (isset($_GET['dequipall'])) {
            $sql = "DELETE FROM inventory WHERE uid = :uid";
            $stmt = $GLOBALS["pdo"]->prepare($sql);
            $stmt->bindValue(':uid', $_SESSION['id']);
            $result = $stmt->execute();
            echo 200;
            redirect("/character.php");

        } else {

            $id = $_GET['id'];

            //check if item exists
            $sql = 'SELECT * FROM catalog WHERE id = ' . $id . '';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $item = $stmt->fetch(PDO::FETCH_ASSOC);
            $itemcount = $stmt->rowCount();

            if ($itemcount > 0) {

                //item does exist

                $sql = 'SELECT * FROM inventory WHERE uid = ' . $_SESSION['id'] . ' AND aid = ' . $id . ' ';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    //Already has it equipped, lets remove it
                    $sql = "DELETE FROM inventory WHERE aid = :aid AND uid = :uid AND type = :type";
                    $stmt = $GLOBALS["pdo"]->prepare($sql);
                    $stmt->bindValue(':uid', $_SESSION['id']);
                    $stmt->bindValue(':aid', $id);
                    $stmt->bindValue(':type', $item['type']);
                    $result = $stmt->execute();
                    echo 200;
                    redirect("/character.php");
                } else {

                    //Does not have this item equipped, lets check how many of this type of item do they have equipped
                    $sql = 'SELECT * FROM inventory WHERE uid = ' . $_SESSION['id'] . ' AND type = ' . $item['type'] . ' ';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    switch ($item['type']) {
                        default:
                            if ($stmt->rowCount() > 1) {
                                echo 402;
                                $failure = true;
                            }
                            break;
                        case 1:
                            if ($stmt->rowCount() > 3) {
                                echo 402;
                                $failure = true;
                            }
                            break;
                    }

                    if (!isset($failure)) {
                        $sql = "INSERT INTO inventory (uid, aid, type) VALUES (:uid, :aid, :type)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':uid', $_SESSION['id']);
                        $stmt->bindValue(':aid', $_GET['id']);
                        $stmt->bindValue(':type', $item['type']);
                        $result = $stmt->execute();
                        echo 201;
                    }
                }
            } else {
                echo 401;
            }
        }
    }
}
