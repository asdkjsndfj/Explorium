<?php
include '../backend/website.php';
include '../backend/componets.php';
header("content-type:text/plain");

if (isset($_GET['id'])) {
    $sql = 'SELECT * FROM servers WHERE id = ' . $_GET['id'] . '';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $server = $stmt->fetch(PDO::FETCH_ASSOC);
	$row_count = $stmt->rowCount();
	if ($row_count === 0) {
		redirect('/not-found');
	}
} else {
	redirect('/not-found');
}
?>

Port = <?= $server['port']; ?>

Server = game:GetService("NetworkServer")
RunService = game:GetService("RunService")
Server:start(Port, 20)
RunService:run()
function onJoined(newPlayer)
print ("An new connection was accepted.")
newPlayer:LoadCharacter()
while true do 
wait(0.001) 
if newPlayer.Character.Humanoid.Health == 0
then print ("Player died") wait(5) newPlayer:LoadCharacter() print("Player respawned")
elseif newPlayer.Character.Parent == nil then wait(5) newPlayer:LoadCharacter() -- to make sure nobody is deleted.
end
end
end

game.Players.PlayerAdded:connect(onJoined)
-- You can adjust SendRate in the Studio settings to make the server run faster.