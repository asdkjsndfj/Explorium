<?php
include '../backend/website.php';
include '../backend/componets.php';
header("content-type:text/plain");

if (isset($_GET['token'])) {
	$sql = 'SELECT * FROM jointokens WHERE token = :token';
	$stmt = $GLOBALS["pdo"]->prepare($sql);
	$stmt->bindValue(':token', $_GET['token']);
	$stmt->execute();
	$token = $stmt->fetch(PDO::FETCH_ASSOC);
	$row_count = $stmt->rowCount();
	if ($row_count === 0) {
		redirect('/not-found');
	}
} else {
	redirect('/not-found');
}

$sql = 'SELECT * FROM servers WHERE id = ' . $token['gid'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$server = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM users WHERE id = ' . $token['uid'] . '';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($server['ip'] == getUserIP()) { 
	$ip = '127.0.0.1';
}else{
	$ip = $server['ip'];
}
?>

--coke's super cool joinscript 
--credit to this epic madlad

nc = game:GetService("NetworkClient")
nc:PlayerConnect(<?= $user['id']; ?>, "<?= $ip; ?>", <?= $server['port']; ?>)
game:SetMessage("Connecting to server...")

plr = game.Players.LocalPlayer
plr.Name = "<?= htmlspecialchars($user['username']); ?>"
plr.CharacterAppearance = "<?= $GLOBALS['url']; ?>/appearance.php?id=<?= $user['id'] ?>"

game:GetService("Visit"):SetUploadUrl("")
game.Players:SetChatStyle("ClassicAndBubble")

nc.ConnectionAccepted:connect(function(peer, repl)
    game:SetMessageBrickCount()
    
    local mkr = repl:SendMarker()
    mkr.Received:connect(function()
        game:SetMessage("requesting char")
        repl:RequestCharacter()
        
        game:SetMessage("waiting 4 char")
        --because a while loop didnt work
        chngd = plr.Changed:connect(function(prop)
            if prop == "Character" then chngd:disconnect() end
        end)
        game:ClearMessage()
    end)
    
    repl.Disconnection:connect(function()
        game:SetMessage("you disconnected")
    end)
end)
nc.ConnectionFailed:connect(function() game:SetMessage("Ah Shucks! Failed to join game.") end)
nc.ConnectionRejected:connect(function() game:SetMessage("Sorry, we don't serve your player type here") end)
<?php
$data = ob_get_clean();
$signature;
$key = file_get_contents("../privatekey.pem");
openssl_sign($data, $signature, $key, OPENSSL_ALGO_SHA1);
echo sprintf("%%%s%%%s", base64_encode($signature), $data);
?>
