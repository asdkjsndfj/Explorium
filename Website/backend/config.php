<?php
$dbpw = '';
$dbname = 'explorium';
$dbserver = 'localhost';
$dbus = 'user';

define('MYSQL_USER', '' . $dbus . '');
define('MYSQL_PASSWORD', '' . $dbpw . '');
define('MYSQL_HOST', '' . $dbserver . '');
define('MYSQL_DATABASE', '' . $dbname . '');
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
$GLOBALS['pdo'] = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, 
    MYSQL_USER,
    MYSQL_PASSWORD, 
    $pdoOptions 
);

?>