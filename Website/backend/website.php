<?php
session_start();

include 'config.php';

//Display Errors
ini_set('display_errors', 1);

//URL
$GLOBALS['url'] = 'http://' . $_SERVER['HTTP_HOST'];

//Functions
function redirect($link)
{
    header("location: $link");
    exit();
}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}
