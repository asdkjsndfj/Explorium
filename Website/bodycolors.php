<?php
include 'backend/website.php';
include 'backend/componets.php';
if (isset($_GET['csrf']) == $_SESSION['csrf'] && isset($_SESSION['id']) && isset($_GET['color']) && isset($_GET['bodypart'])) {
    if ($_GET['bodypart'] != 'head' && $_GET['bodypart'] != 'torso' && $_GET['bodypart'] != 'rightarm' && $_GET['bodypart'] != 'leftarm' && $_GET['bodypart'] != 'rightleg' && $_GET['bodypart'] != 'leftleg') {
    } else {
        $color;
        $bodyPart = $_GET['bodypart'];

        switch ($_GET['color']) {
            case "1":
                $color = "#F2F3F3";
                break;
            case "208":
                $color = "#E5E4DF";
                break;
            case "194":
                $color = "#A3A2A5";
                break;
            case "199":
                $color = "#635F62";
                break;
            case "26":
                $color = "#1B2A35";
                break;
            case "21":
                $color = "#C4281C";
                break;
            case "24":
                $color = "#F5CD30";
                break;
            case "226":
                $color = "#FDEA8D";
                break;
            case "23":
                $color = "#0D69AC";
                break;
            case "107":
                $color = "#008F9C";
                break;
            case "102":
                $color = "#6E99CA";
                break;
            case "11":
                $color = "#80BBDB";
                break;
            case "45":
                $color = "#B4D2E4";
                break;
            case "135":
                $color = "#74869D";
                break;
            case "105":
                $color = "#E29B40";
                break;
            case "141":
                $color = "#27462D";
                break;
            case "37":
                $color = "#4B974B";
                break;
            case "119":
                $color = "#A4BD47";
                break;
            case "29":
                $color = "#A1C48C";
                break;
            case "151":
                $color = "#789082";
                break;
            case "38":
                $color = "#A05F35";
                break;
            case "192":
                $color = "#694028";
                break;
            case "104":
                $color = "#6B327C";
                break;
            case "9":
                $color = "#E8BAC8";
                break;
            case "101":
                $color = "#DA867A";
                break;
            case "5":
                $color = "#D7C59A";
                break;
            case "153":
                $color = "#957977";
                break;
            case "217":
                $color = "#7C5C46";
                break;
            case "18":
                $color = "#CC8E69";
                break;
            case "125":
                $color = "#EAB892";
                break;
            case "28":
                $color = "#287F47";
                break;
            case "106":
                $color = "#DA8541";
                break;
            case "1001":
                $color = "#F8F8F8";
                break;
            case "1002":
                $color = "#CDCDCD";
                break;
            case "1003":
                $color = "#111111";
                break;
            case "1004":
                $color = "#FF0000";
                break;
            case "1005":
                $color = "#FFAF00";
                break;
            case "1006":
                $color = "#B480FF";
                break;
            case "1007":
                $color = "#A34B4B";
                break;
            case "1008":
                $color = "#C1BE42";
                break;
            case "1009":
                $color = "#FFFF00";
                break;
            case "1010":
                $color = "#0000FF";
                break;
            case "1012":
                $color = "#002060";
                break;
            case "1013":
                $color = "#2154B9";
                break;
            case "1011":
                $color = "#04AFEC";
                break;
            case "1014":
                $color = "#AA5500";
                break;
            case "1015":
                $color = "#AA00AA";
                break;
            case "1016":
                $color = "#FF66CC";
                break;
            case "1017":
                $color = "#FFAF00";
                break;
            case "1018":
                $color = "#12EED4";
                break;
            case "1019":
                $color = "#00FFFF";
                break;
            case "1020":
                $color = "#00FF00";
                break;
            case "1021":
                $color = "#3A7D15";
                break;
            case "1022":
                $color = "#7F8E64";
                break;
            case "1031":
                $color = "#6225D1";
                break;
            case "1032":
                $color = "#FF00BF";
                break;
            case "1023":
                $color = "#8C5B9F";
                break;
            case "1024":
                $color = "#AFDDFF";
                break;
            case "2025":
                $color = "#FFC9C9";
                break;
            case "1027":
                $color = "#9FF3E9";
                break;
            case "1028":
                $color = "#CCFFCC";
                break;
            case "1029":
                $color = "#FFFFCC";
                break;
            case "1030":
                $color = "#FFCC99";
                break;
			default:
				$color = "#F2F3F3";

        }

        $sql = "UPDATE bodycolors SET $bodyPart=? WHERE uid=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$color, $_SESSION['id']]);
        $result = $stmt->execute();
    }
}
