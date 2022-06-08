<?php
function buildHeader($location)
{
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Explorium | ' . $location . '</title>
    <link rel="shortcut icon" type="image/jpg" href="/assets/img/favicon.webp" />
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/explorium.css" rel="stylesheet">
    <link href="/assets/css/fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
    <script type="text/javascript" src="/assets/js/explorium.js"></script>
</head>';
}

function buildNavigation($location)
{

    $home = false;
    $games = false;
    $catalog = false;
    $users = false;
    $signin = false;
    $signup = false;
    $character = false;

    switch ($location) {
        case "Home":
            $home = "active";
            break;
        case "Games":
            $games = "active";
            break;
        case "Catalog":
            $catalog = "active";
            break;
        case "Users":
            $users = "active";
            break;
        case "Sign In":
            $signin = "active";
            break;
        case "Sign Up":
            $signup = "active";
            break;
        case "Character":
            $character = "active";
            break;
    }
    if (isset($_SESSION['id'])) {
        return '
        <nav class="navbar navbar-expand-md bg-light navbar-light">
            <div class="container">
                <a data-toggle="tooltip" title="Explorium" class="navbar-brand" href="/" data-original-title="Explorium"><img src="/assets/img/favicon.webp" width="30"></a>
        
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link ' . $home . '" href="/"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link '  . $games . '" href="/games.php"><i class="fas fa-gamepad"></i> Games</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link '  . $catalog . '" href="/catalog.php"><i class="fas fa-shopping-basket"></i> Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link '  . $users . '" href="/users.php"><i class="fas fa-users"></i> Users</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <a class="nav-link ' .  $character . '" href="/character.php"><i class="fas fa-user"></i> ' . htmlspecialchars($_SESSION['username']) . '</a>
                        <a class="nav-link text-danger" href="/logout.php?token=' . $_SESSION['csrf'] . '"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </ul>
                </div>
            </div>
        </nav>
        ';
    } else {
        return '
        <nav class="navbar navbar-expand-md bg-light navbar-light">
            <div class="container">
                <a data-toggle="tooltip" title="" class="navbar-brand" href="/" data-original-title="Explorium"><img src="/assets/img/favicon.webp" width="30"></a>
        
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link ' . $home . '" href="/"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link '  . $games . '" href="/games.php"><i class="fas fa-gamepad"></i> Games</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link '  . $catalog . '" href="/catalog.php"><i class="fas fa-shopping-basket"></i> Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link '  . $users . '" href="/users.php"><i class="fas fa-users"></i> Users</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <a class="nav-link ' .  $signin . '" href="/login.php"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                        <a class="nav-link '  . $signup . '" href="/signup.php"><i class="fas fa-user-plus"></i> Sign Up</a>
                    </ul>
                </div>
            </div>
        </nav>
        ';
    }
}

function buildBanner()
{
    return '<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <div class="text-center">Hi</div>
</div>
';
}

function buildFooter()
{
    return '
    <div class="text-center text-muted"><h4>Explorium</h4><small><a href="/rules.php">Rules</a></font> |  @ Explorium  2017 - 2019</small></div>
    <script type="text/javascript" src="/assets/js/jquery.js"></script><script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
';
}
