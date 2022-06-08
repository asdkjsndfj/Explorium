<?php
include 'backend/website.php';
include 'backend/componets.php';
if (isset($_GET['token'])) {
    if ($_GET['token'] === $_SESSION['csrf']) {
        session_destroy();
        redirect('/');
    }
} else {
    redirect('/');
}
