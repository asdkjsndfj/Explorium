<?php
include 'backend/website.php';
include 'backend/componets.php';


function hex2body($hex) {

    switch ($hex) {
      case "#F2F3F3":
        return "1";
        break;
      case "#E5E4DF":
        return "208";
        break;
      case "#A3A2A5":
        return "194";
        break;
      case "#635F62":
        return "199";
        break;
      case "#1B2A35":
        return "26";
        break;
      case "#C4281C":
        return "21";
        break;
      case "#F5CD30":
        return "24";
        break;
      case "#FDEA8D":
        return "226";
        break;
      case "#0D69AC":
        return "23";
        break;
      case "#008F9C":
        return "107";
        break;
      case "#6E99CA":
        return "102";
        break;
      case "#80BBDB":
        return "11";
        break;
      case "#B4D2E4":
        return "45";
        break;
      case "#74869D":
        return "135";
        break;
      case "#E29B40":
        return "105";
        break;
      case "#27462D":
        return "141";
        break;
      case "#4B974B":
        return "37";
        break;
      case "#A4BD47":
        return "119";
        break;
      case "#A1C48C":
        return "29";
        break;
      case "#789082":
        return "151";
        break;
      case "#A05F35":
        return "38";
        break;
      case "#694028":
        return "192";
        break;
      case "#6B327C":
        return "104";
        break;
      case "#E8BAC8":
        return "9";
        break;
      case "#DA867A":
        return "101";
        break;
      case "#D7C59A":
        return "5";
        break;
      case "#957977":
        return "153";
        break;
      case "#7C5C46":
        return "217";
        break;
      case "#CC8E69":
        return "18";
        break;
      case "#EAB892":
        return "125";
        break;
  
      case "#287F47":
        return "28";
        break;
      case "#DA8541":
        return "106";
        break;
      case "#F8F8F8":
        return "1001";
        break;
      case "#CDCDCD":
        return "1002";
        break;
      case "#111111":
        return "1003";
  
        break;
      case "#FF0000":
        return "1004";
  
        break;
      case "#FFAF00":
        return "1005";
  
        break;
      case "#B480FF":
        return "1006";
  
        break;
      case "#A34B4B":
        return "1007";
  
        break;
      case "#C1BE42":
        return "1008";
  
        break;
      case "#FFFF00":
        return "1009";
  
        break;
      case "#0000FF":
        return "1010";
  
        break;
      case "#002060":
        return "1011";
  
        break;
      case "#2154B9":
        return "1012";
        break;
      case "#04AFEC":
  
        return "1013";
  
        break;
      case "#AA5500":
        return "1014";
        break;
      case "#AA00AA":
        return "1015";
        break;
      case "#FF66CC":
        return "1016";
  
        break;
      case "#FFAF00":
        return "1017";
  
        break;
      case "#12EED4":
        return "1018";
  
        break;
      case "#00FFFF":
        return "1019";
  
        break;
      case "#00FF00":
        return "1020";
  
        break;
      case "#3A7D15":
        return "1021";
  
        break;
      case "#7F8E64":
        return "1022";
  
        break;
      case "#6225D1":
        return "1031";
  
        break;
      case "#FF00BF":
        return "1032";
  
        break;
      case "#8C5B9F":
        return "1023";
  
        break;
      case "#AFDDFF":
        return "1024";
  
        break;
      case "#FFC9C9":
        return "2025";
        break;
      case "#9FF3E9":
        return "1027";
  
        break;
      case "#CCFFCC":
        return "1028";
  
        break;
      case "#FFFFCC":
        return "1029";
  
        break;
      case "#FFCC99":
        return "1030";
        break;
    }
  
  }
  


if (isset($_GET['id'])) {
    if (is_numeric($_GET['id'])) {
        $sql = 'SELECT * FROM bodycolors WHERE uid = ' . $_GET['id'] . '';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
?>

<?xml version="1.0" encoding="utf-8" standalone="yes"?>
	<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
	<External>null</External>
	<External>nil</External>
	<Item class="BodyColors">
		<Properties>
			<int name="HeadColor"><?= hex2body($user['head']); ?></int>
			<int name="LeftArmColor"><?= hex2body($user['leftarm']); ?></int>
			<int name="LeftLegColor"><?= hex2body($user['leftleg']); ?></int>
			<string name="Name">Body Colors</string>
			<int name="RightArmColor"><?= hex2body($user['rightarm']); ?></int>
			<int name="RightLegColor"><?= hex2body($user['rightleg']); ?></int>
			<int name="TorsoColor"><?= hex2body($user['torso']); ?></int>
			<bool name="archivable">true</bool>
		</Properties>
	</Item>
</roblox>