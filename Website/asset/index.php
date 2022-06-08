<?php
ob_start();
$id = int()$_GET["id"];
$file = $id;
if (!file_exists($file)) {
    $file = "https://www.roblox.com/asset/?id=" . $id;
    header("location:" . $file);
}
header("content-type:" . finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file));
echo "%" . $id . "%";
readfile($file);
$data = ob_get_clean();
$signature;
$key = file_get_contents("../privatekey.pem");
openssl_sign($data, $signature, $key, OPENSSL_ALGO_SHA1);
echo sprintf("%%%s%%%s", base64_encode($signature), $data);
?>