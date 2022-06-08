<?php
include 'backend/website.php';
include 'backend/componets.php';

if (isset($_SESSION['id'])) {
    redirect('/');
}

buildHeader("Sign In");
echo buildNavigation("Sign In");
echo buildBanner();

$failure = false;

$passwordError = false;
$usernameError = false;

$passwordDescription = false;
$usernameDescription = false;

if (isset($_POST['login'])) {

    //Check Username
    if (isset($_POST['username'])) {

        $username = $_POST['username'];

        if (!preg_match('/^[a-zA-Z0-9][\w\.]+[a-zA-Z0-9]$/', $username)) {
            $usernameError = true;
            $usernameDescription = 'Please input a valid username';
            $failure = true;
        }
    } else {
        $usernameError = true;
        $usernameDescription = 'Please input a username';
        $failure = true;
    }

    //Check Password
    if (isset($_POST['password'])) {

        $password = $_POST['password'];

        if (strlen($password) < 5) {
            $passwordError = true;
            $passwordDescription = 'Please input a valid password';
            $failure = true;
        }
    } else {
        $passwordError = true;
        $passwordDescription = 'Please input a password';
        $failure = true;
    }


    //Final Check
    if (!$failure) {
        $sql = 'SELECT * FROM users WHERE username = :username';
        $stmt = $GLOBALS["pdo"]->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['csrf'] = md5(uniqid(rand(), TRUE));
                if($user['admin'] > 0) $_SESSION['admin'] = true;
                redirect('/');
            } else {
                $usernameError = true;
                $usernameDescription = 'Your username or password are incorrect';

                $passwordError = true;
                $passwordDescription = 'Your username or password are incorrect';
                $failure = true;
            }
        } else {
            $usernameError = true;
            $usernameDescription = 'Your username or password are incorrect';

            $passwordError = true;
            $passwordDescription = 'Your username or password are incorrect';
            $failure = true;
        }
    }
}
?>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <div class="text-center"><img src="/assets/img/logo.webp" class="img-fluid" alt="Explorium"></div>
                        <form method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" class="form-control <?php if ($usernameDescription) { ?>border-danger<?php } ?>" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username">
                                <?php if ($usernameError) { ?><small id="usernameHelp" class="form text-danger"><b><?php echo $usernameDescription; ?></b></small><?php } ?>

                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control <?php if ($passwordError) { ?>border-danger<?php } ?>" id="password" name="password" placeholder="Enter Password">
                                <?php if ($passwordError) { ?><small id="passwordHelp" class="form text-danger"><b><?php echo $passwordDescription; ?></b></small><?php } ?>
                            </div>
                            <button type="submit" name="login" class="btn btn-success">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo buildFooter(); ?>
</body>