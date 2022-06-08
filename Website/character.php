<?php
include 'backend/website.php';
include 'backend/componets.php';
buildHeader("Character");
echo buildNavigation("Character");
echo buildBanner();

$sql = 'SELECT * FROM bodycolors WHERE uid = ' . $_SESSION['id'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$bodycolors = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose your <span id="part"></span>'s color</h5>
            </div>
            <div class="modal-body">
                <div class="ColorPickerContainer text-left mx-auto" data-body-part="" id="colorPallet" style="max-width:351px">
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1" onclick="updateColor(this.value)" style="background:#F2F3F3;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="208" onclick="updateColor(this.value)" style="background:#E5E4DF;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="194" onclick="updateColor(this.value);" style="background:#A3A2A5;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="199" onclick="updateColor(this.value);" style="background:#635F62;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="26" onclick="updateColor(this.value);" style="background:#1B2A35;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="21" onclick="updateColor(this.value);" style="background:#C4281C;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="24" onclick="updateColor(this.value);" style="background:#F5CD30;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="226" onclick="updateColor(this.value);" style="background:#FDEA8D;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="23" onclick="updateColor(this.value);" style="background:#0D69AC;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="107" onclick="updateColor(this.value);" style="background:#008F9C;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="102" onclick="updateColor(this.value);" style="background:#6E99CA;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="11" onclick="updateColor(this.value);" style="background:#80BBDB;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="45" onclick="updateColor(this.value);" style="background:#B4D2E4;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="135" onclick="updateColor(this.value);" style="background:#74869D;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="105" onclick="updateColor(this.value);" style="background:#E29B40;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="141" onclick="updateColor(this.value);" style="background:#27462D;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="37" onclick="updateColor(this.value);" style="background:#4B974B;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="119" onclick="updateColor(this.value);" style="background:#A4BD47;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="29" onclick="updateColor(this.value);" style="background:#A1C48C;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="151" onclick="updateColor(this.value);" style="background:#789082;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="38" onclick="updateColor(this.value);" style="background:#A05F35;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="192" onclick="updateColor(this.value);" style="background:#694028;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="104" onclick="updateColor(this.value);" style="background:#6B327C;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="9" onclick="updateColor(this.value);" style="background:#E8BAC8;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="101" onclick="updateColor(this.value);" style="background:#DA867A;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="5" onclick="updateColor(this.value);" style="background:#D7C59A;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="153" onclick="updateColor(this.value);" style="background:#957977;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="217" onclick="updateColor(this.value);" style="background:#7C5C46;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="18" onclick="updateColor(this.value);" style="background:#CC8E69;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="125" onclick="updateColor(this.value);" style="background:#EAB892;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="106" onclick="updateColor(this.value);" style="background:#DA8541;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="28" onclick="updateColor(this.value);" style="background:#287F47;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="106" onclick="updateColor(this.value);" style="background:#DA8541;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1001" onclick="updateColor(this.value);" style="background:#F8F8F8;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1002" onclick="updateColor(this.value);" style="background:#CDCDCD;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1003" onclick="updateColor(this.value);" style="background:#111111;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1004" onclick="updateColor(this.value);" style="background:#FF0000;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1005" onclick="updateColor(this.value);" style="background:#FFAF00;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1006" onclick="updateColor(this.value);" style="background:#B480FF;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1007" onclick="updateColor(this.value);" style="background:#A34B4B;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1008" onclick="updateColor(this.value);" style="background:#C1BE42;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1009" onclick="updateColor(this.value);" style="background:#FFFF00;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1010" onclick="updateColor(this.value);" style="background:#0000FF;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1011" onclick="updateColor(this.value);" style="background:#002060;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1012" onclick="updateColor(this.value);" style="background:#2154B9;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1013" onclick="updateColor(this.value);" style="background:#04AFEC;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1014" onclick="updateColor(this.value);" style="background:#AA5500;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1015" onclick="updateColor(this.value);" style="background:#AA00AA;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1016" onclick="updateColor(this.value);" style="background:#FF66CC;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1017" onclick="updateColor(this.value);" style="background:#FFAF00;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1018" onclick="updateColor(this.value);" style="background:#12EED4;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1019" onclick="updateColor(this.value);" style="background:#00FFFF;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1020" onclick="updateColor(this.value);" style="background:#00FF00;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1021" onclick="updateColor(this.value);" style="background:#3A7D15;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1022" onclick="updateColor(this.value);" style="background:#7F8E64;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1031" onclick="updateColor(this.value);" style="background:#6225D1;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1032" onclick="updateColor(this.value);" style="background:#FF00BF;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1023" onclick="updateColor(this.value);" style="background:#8C5B9F;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1024" onclick="updateColor(this.value);" style="background:#AFDDFF;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="2025" onclick="updateColor(this.value);" style="background:#FFC9C9;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1027" onclick="updateColor(this.value);" style="background:#9FF3E9;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1028" onclick="updateColor(this.value);" style="background:#CCFFCC;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1029" onclick="updateColor(this.value);" style="background:#FFFFCC;height:32px;width:32px;"></button>
                    <button type="submit" class="shadow-card color-box  rounded-circle" value="1030" onclick="updateColor(this.value);" style="background:#FFCC99;height:32px;width:32px;"></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 col-md-4 p-1">
                <div class="card text-center shadow-sm">
                    <div class="card-header">
                        <h3><b>Character</b></h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="/assets/img/avatar/<?= $_SESSION['id']; ?>.png" width="200" class="img-fluid" alt="<?= htmlspecialchars($_SESSION['username']); ?>" onerror="this.onerror=null;this.src='/assets/img/unavailable.webp';">
                    </div>
                </div>
                &nbsp;
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <div class="body-container text-center">
                            <div class="body-part body-head rounded" data-body-part="head" onclick="selectPart(this)" data-toggle="modal" id="head" style="background-color: <?= $bodycolors['head']; ?>"></div>
                            <div class="body-part body-larm rounded" id="leftarm" data-toggle="modal" data-body-part="leftarm" onclick="selectPart(this)" style="background-color: <?= $bodycolors['leftarm']; ?>"></div>
                            <div class="body-part body-torso rounded" id="torso" data-toggle="modal" data-body-part="torso" onclick="selectPart(this)" style="background-color: <?= $bodycolors['torso']; ?>"></div>
                            <div class="body-part body-rarm rounded" id="rightarm" data-toggle="modal" data-body-part="rightarm" onclick="selectPart(this)" style="background-color: <?= $bodycolors['rightarm']; ?>"></div>
                            <div class="body-part body-lleg rounded" id="leftleg" data-toggle="modal" data-body-part="leftleg" onclick="selectPart(this)" style="background-color: <?= $bodycolors['leftleg']; ?>"></div>
                            <div class="body-part body-rleg rounded" id="rightleg" data-toggle="modal" data-body-part="rightleg" onclick="selectPart(this)" style="background-color: <?= $bodycolors['rightleg']; ?>"></div>
                            <script>
                                function openModal() {
                                    document.getElementById("backdrop").style.display = "block"
                                    document.getElementById("exampleModal").style.display = "block"
                                    document.getElementById("exampleModal").className += "show"
                                }

                                function closeModal() {
                                    document.getElementById("backdrop").style.display = "none"
                                    document.getElementById("exampleModal").style.display = "none"
                                    document.getElementById("exampleModal").className += document.getElementById("exampleModal").className.replace("show", "")
                                }
                                var modal = document.getElementById('exampleModal');

                                window.onclick = function(event) {
                                    if (event.target == modal) {
                                        closeModal()
                                    }
                                }

                                function selectPart(part) {
                                    var partType = part.getAttribute("data-body-part");
                                    var myModal = document.getElementById('exampleModal');

                                    switch (partType) {
                                        case "torso":
                                            document.getElementById("part").innerHTML = "Torso";
                                            break;
                                        case "rightarm":
                                            document.getElementById("part").innerHTML = "Right Arm";
                                            break;
                                        case "leftarm":
                                            document.getElementById("part").innerHTML = "Left Arm";
                                            break;
                                        case "head":
                                            document.getElementById("part").innerHTML = "Head";
                                            break;
                                        case "rightleg":
                                            document.getElementById("part").innerHTML = "Right Leg";
                                            break;
                                        case "leftleg":
                                            document.getElementById("part").innerHTML = "Left Leg";
                                            break;
                                    }
                                    var element = document.getElementById("colorPallet");
                                    element.setAttribute("data-body-part", partType);
                                    openModal();
                                }

                                function updateColor(code) {
                                    var myModal = document.getElementById('exampleModal');
                                    var partType = document.getElementById("colorPallet").getAttribute("data-body-part");
                                    fetch('/bodycolors.php?csrf=<?= $_SESSION['csrf']; ?>&color=' + code + '&bodypart=' + partType).then(data => {
                                        if (data['status'] === 200) {
                                            switch (code) {
                                                case "1":
                                                    document.getElementById(partType).style.backgroundColor = '#F2F3F3';
                                                    break;
                                                case "208":
                                                    document.getElementById(partType).style.backgroundColor = '#E5E4DF';
                                                    break;
                                                case "194":
                                                    document.getElementById(partType).style.backgroundColor = '#A3A2A5';
                                                    break;
                                                case "199":
                                                    document.getElementById(partType).style.backgroundColor = '#635F62';
                                                    break;
                                                case "26":
                                                    document.getElementById(partType).style.backgroundColor = '#1B2A35';
                                                    break;
                                                case "21":
                                                    document.getElementById(partType).style.backgroundColor = '#C4281C';
                                                    break;
                                                case "24":
                                                    document.getElementById(partType).style.backgroundColor = '#F5CD30';
                                                    break;
                                                case "226":
                                                    document.getElementById(partType).style.backgroundColor = '#FDEA8D';
                                                    break;
                                                case "23":
                                                    document.getElementById(partType).style.backgroundColor = '#0D69AC';
                                                    break;
                                                case "107":
                                                    document.getElementById(partType).style.backgroundColor = '#008F9C';
                                                    break;
                                                case "102":
                                                    document.getElementById(partType).style.backgroundColor = '#6E99CA';
                                                    break;
                                                case "11":
                                                    document.getElementById(partType).style.backgroundColor = '#80BBDB';
                                                    break;
                                                case "45":
                                                    document.getElementById(partType).style.backgroundColor = '#B4D2E4';
                                                    break;
                                                case "135":
                                                    document.getElementById(partType).style.backgroundColor = '#74869D';
                                                    break;
                                                case "105":
                                                    document.getElementById(partType).style.backgroundColor = '#E29B40';
                                                    break;
                                                case "141":
                                                    document.getElementById(partType).style.backgroundColor = '#27462D';
                                                    break;
                                                case "37":
                                                    document.getElementById(partType).style.backgroundColor = '#4B974B';
                                                    break;
                                                case "119":
                                                    document.getElementById(partType).style.backgroundColor = '#A4BD47';
                                                    break;
                                                case "29":
                                                    document.getElementById(partType).style.backgroundColor = '#A1C48C';
                                                    break;
                                                case "151":
                                                    document.getElementById(partType).style.backgroundColor = '#789082';
                                                    break;
                                                case "38":
                                                    document.getElementById(partType).style.backgroundColor = '#A05F35';
                                                    break;
                                                case "192":
                                                    document.getElementById(partType).style.backgroundColor = '#694028';
                                                    break;
                                                case "104":
                                                    document.getElementById(partType).style.backgroundColor = '#6B327C';
                                                    break;
                                                case "9":
                                                    document.getElementById(partType).style.backgroundColor = '#E8BAC8';
                                                    break;
                                                case "101":
                                                    document.getElementById(partType).style.backgroundColor = '#DA867A';
                                                    break;
                                                case "5":
                                                    document.getElementById(partType).style.backgroundColor = '#D7C59A';
                                                    break;
                                                case "153":
                                                    document.getElementById(partType).style.backgroundColor = '#957977';
                                                    break;
                                                case "217":
                                                    document.getElementById(partType).style.backgroundColor = '#7C5C46';
                                                    break;
                                                case "18":
                                                    document.getElementById(partType).style.backgroundColor = '#CC8E69';
                                                    break;
                                                case "125":
                                                    document.getElementById(partType).style.backgroundColor = '#EAB892';
                                                    break;
                                                case "28":
                                                    document.getElementById(partType).style.backgroundColor = '#287F47';
                                                    break;
                                                case "106":
                                                    document.getElementById(partType).style.backgroundColor = '#DA8541';
                                                    break;
                                                case "1001":
                                                    document.getElementById(partType).style.backgroundColor = '#F8F8F8';
                                                    break;
                                                case "1002":
                                                    document.getElementById(partType).style.backgroundColor = '#CDCDCD';
                                                    break;
                                                case "1003":
                                                    document.getElementById(partType).style.backgroundColor = '#111111';
                                                    break;
                                                case "1004":
                                                    document.getElementById(partType).style.backgroundColor = '#FF0000';
                                                    break;
                                                case "1005":
                                                    document.getElementById(partType).style.backgroundColor = '#FFAF00';
                                                    break;
                                                case "1006":
                                                    document.getElementById(partType).style.backgroundColor = '#B480FF';
                                                    break;
                                                case "1007":
                                                    document.getElementById(partType).style.backgroundColor = '#A34B4B';
                                                    break;
                                                case "1008":
                                                    document.getElementById(partType).style.backgroundColor = '#C1BE42';
                                                    break;
                                                case "1009":
                                                    document.getElementById(partType).style.backgroundColor = '#FFFF00';
                                                    break;
                                                case "1010":
                                                    document.getElementById(partType).style.backgroundColor = '#0000FF';
                                                    break;
                                                case "1012":
                                                    document.getElementById(partType).style.backgroundColor = '#002060';
                                                    break;
                                                case "1013":
                                                    document.getElementById(partType).style.backgroundColor = '#2154B9';
                                                    break;
                                                case "1011":
                                                    document.getElementById(partType).style.backgroundColor = '#04AFEC';
                                                    break;
                                                case "1014":
                                                    document.getElementById(partType).style.backgroundColor = '#AA5500';
                                                    break;
                                                case "1015":
                                                    document.getElementById(partType).style.backgroundColor = '#AA00AA';
                                                    break;
                                                case "1016":
                                                    document.getElementById(partType).style.backgroundColor = '#FF66CC';
                                                    break;
                                                case "1017":
                                                    document.getElementById(partType).style.backgroundColor = '#FFAF00';
                                                    break;
                                                case "1018":
                                                    document.getElementById(partType).style.backgroundColor = '#12EED4';
                                                    break;
                                                case "1019":
                                                    document.getElementById(partType).style.backgroundColor = '#00FFFF';
                                                    break;
                                                case "1020":
                                                    document.getElementById(partType).style.backgroundColor = '#00FF00';
                                                    break;
                                                case "1021":
                                                    document.getElementById(partType).style.backgroundColor = '#3A7D15';
                                                    break;
                                                case "1022":
                                                    document.getElementById(partType).style.backgroundColor = '#7F8E64';
                                                    break;
                                                case "1031":
                                                    document.getElementById(partType).style.backgroundColor = '#6225D1';
                                                    break;
                                                case "1032":
                                                    document.getElementById(partType).style.backgroundColor = '#FF00BF';
                                                    break;
                                                case "1023":
                                                    document.getElementById(partType).style.backgroundColor = '#8C5B9F';
                                                    break;
                                                case "1024":
                                                    document.getElementById(partType).style.backgroundColor = '#AFDDFF';
                                                    break;
                                                case "2025":
                                                    document.getElementById(partType).style.backgroundColor = '#FFC9C9';
                                                    break;
                                                case "1027":
                                                    document.getElementById(partType).style.backgroundColor = '#9FF3E9';
                                                    break;
                                                case "1028":
                                                    document.getElementById(partType).style.backgroundColor = '#CCFFCC';
                                                    break;
                                                case "1029":
                                                    document.getElementById(partType).style.backgroundColor = '#FFFFCC';
                                                    break;
                                                case "1030":
                                                    document.getElementById(partType).style.backgroundColor = '#FFCC99';
                                                    break;
                                            }
                                            closeModal();
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 p-1">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3><b>Items Equipped</b></h3>
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

                            $show  = "SELECT * FROM inventory WHERE uid = " . $_SESSION['id'] . " ORDER BY id DESC";
                            $stmt = $pdo->prepare($show);
                            $stmt->execute();
                            if ($stmt->rowCount() === 0) echo '<b class="text-muted" style="padding: 10px;">You have nothing equipped, check out the <a href="/catalog.php" class="text-success text-decoration-none">catalog</a>!</b>';
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                            ?>
                                <div class="col-lg-2 mb-4">
                                    <img src="<?= getThumbnail($row['aid']); ?>" width="100" class="img-fluid" onerror="this.onerror=null;this.src='/assets/img/unavailable.webp';">
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php
                        $show  = "SELECT * FROM inventory WHERE uid = " . $_SESSION['id'] . " ORDER BY id DESC";
                        $stmt = $pdo->prepare($show);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) echo '<div class="text-center"><a class="btn btn-success" href="equip.php?csrf=' . $_SESSION['csrf'] . '&id=0&dequipall=true">unequip ALL</a></div>';
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>