<?php
include 'backend/website.php';
include 'backend/componets.php';
buildHeader("Server");
echo buildNavigation("Games");
echo buildBanner();

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

//get creator data
$sql = 'SELECT * FROM users WHERE id = ' . $server['creator'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$port = $server['port'];
if ($server['ip'] === getUserIP()) {
    $ip = '127.0.0.1';
} else {
    $ip = $server['ip'];
}

$jointoken =  base64_encode($ip . "|" . $server['port'] . "|" . htmlspecialchars($_SESSION['username']) . "|" . $_SESSION['id']); //bin2hex
?>
<script>
    function joinGame() {
        document.getElementById("button").classList.add("disabled");
        fetch("join.php?id=<?= $server['id']; ?>")
            .then((response) => response.text())
            .then((html) => {
                window.location.href = "explorium:<?= $server['year']; ?>-" + html;
                document.getElementById("button").classList.remove("disabled");

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
                        <?= htmlspecialchars($server['name']); ?>
                    </div>
                    <div class="card-body text-center">
                        <div id="errorBanner"></div>
                        <div><img src="/assets/img/thumbnail.webp" width="200" alt="<?= htmlspecialchars($server['name']); ?>"></div>
                        <br>
                        <h4>
                            <div class="text-success"><b>Creator:</b> <?= htmlspecialchars($user['username']); ?></div>
                        </h4>
                        <div><?php if($_SESSION['id'] === $server['creator']) { ?><code><?= $GLOBALS['url']; ?>/game/hostgame.php?id=<?= $server['id']; ?></code><?php } ?></div>
                        <button class="btn btn-success" id="button" onclick="joinGame()">Join</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>