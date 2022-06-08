<?php
include 'backend/website.php';
include 'backend/componets.php';

if (isset($_SESSION['id'])) {
    redirect('/');
}

buildHeader("Sign Up");
echo buildNavigation("Sign Up");
echo buildBanner();

$failure = false;

$passwordError = false;
$usernameError = false;
$ticketError = false;
$passwordverifyError = false;


$passwordDescription = false;
$usernameDescription = false;
$ticketDescription = false;

if (isset($_POST['signup'])) {
    //Check Username
    if (isset($_POST['username'])) {

        $username = $_POST['username'];

        if (!preg_match('/^[a-zA-Z0-9][\w\.]+[a-zA-Z0-9]$/', $username)) {
            $usernameError = true;
            $usernameDescription = 'Please input a valid username';
            $failure = true;
        }

        if (strlen($username) < 20 && strlen($username) > 3) {
            $sql = 'SELECT * FROM users WHERE username = :username';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':username', $username);
            $stmt->execute();
            $rowcount = $stmt->rowCount();
            if ($rowcount > 0) {
                $usernameError = true;
                $usernameDescription = 'This username is already taken';
                $failure = true;
            }
        }
    } else {
        $usernameError = true;
        $usernameDescription = 'Please input a username';
        $failure = true;
    }

    //Check Password
    if (isset($_POST['password']) && isset($_POST['verify'])) {

        $password = $_POST['password'];
        $passwordVerify = $_POST['verify'];

        if (strlen($password) < 5 || strlen($password) > 60) {
            $passwordError = true;
            $passwordDescription = 'Please input a valid password';
            $passwordverifyError = true;
            $passwordverifyDescription = 'Password verification failed';
            $failure = true;
        }

        if ($password === $username && strlen($password) > 5 && strlen($password) > 60) {
            $passwordError = true;
            $passwordDescription = 'You cannot make your username your password';
            $failure = true;
        }

        if ($passwordVerify != $password) {
            $passwordverifyError = true;
            $passwordverifyDescription = 'Password verification failed';
            $passwordError = true;
            $passwordDescription = 'Failed to verify password';
            $failure = true;
        }
    } else {
        $passwordverifyError = true;
        $passwordverifyDescription = 'Password verification failed';

        $passwordError = true;
        $passwordDescription = 'Please input a password';
        $failure = true;
    }

    //Check Ticket
    if (isset($_POST['ticket'])) {

        $ticket = $_POST['ticket'];

        $sql = 'SELECT * FROM tickets WHERE ticket = :ticket';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':ticket', $ticket);
        $stmt->execute();
        $rowcount = $stmt->rowCount();
        $ticket = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rowcount > 0) {
            if ($ticket['used'] === 1) {
                $ticketError = true;
                $failure = true;
            }
        } else {
            $ticketError = true;
            $failure = true;
        }
    } else {
        $ticketError = true;
        $failure = true;
    }

    if (!$failure) {

        $username = $_POST['username'];
        $ticket = $_POST['ticket'];
        $password = $_POST['password'];

        //Update to used ticket
        $sql = 'UPDATE tickets SET used = 0 WHERE ticket = :ticket';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':ticket', $_POST['ticket']);
        $stmt->execute();


        //Create user
        $passwordHash = password_hash($password, PASSWORD_ARGON2ID, array("cost" => 12));

        $sql = "INSERT INTO users (username, password, joindate) VALUES (:username, :password, :joindate)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $passwordHash);
        $stmt->bindValue(':joindate', time());
        $stmt->execute();

        //Get user data
        $sql = 'SELECT * FROM users WHERE username = :username';
        $stmt = $GLOBALS["pdo"]->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //Create bodycolors
        $sql = "INSERT INTO bodycolors (head, torso, leftarm, rightarm, leftleg, rightleg, uid) VALUES (:head, :torso, :leftarm, :rightarm, :leftleg, :rightleg, :uid)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':head', '#F5CD2F');
        $stmt->bindValue(':torso', '#0d69ab');
        $stmt->bindValue(':leftarm', '#F5CD2F');
        $stmt->bindValue(':rightarm', '#F5CD2F');
        $stmt->bindValue(':leftleg', '#A4BD46');
        $stmt->bindValue(':rightleg', '#A4BD46');
        $stmt->bindValue(':uid', $user['id']);
        $result = $stmt->execute();

        //Create new avatar thumbnail
        $file = 'assets/img/avatar/default.png';
        $newfile = 'assets/img/avatar/' . $user['id'] . '.png';
        copy($file, $newfile);

        redirect('login.php');
    }
}
?>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-header">
                        Sign Up
                    </div>
                    <div class="card-body">
                        <div class="text-center"><img src="/assets/img/logo.webp" class="img-fluid" alt="Explorium"></div>
                        <form method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" class="form-control <?php if ($usernameDescription) { ?>border-danger<?php } ?>" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username">
                                <?php if ($usernameError) { ?><small id="usernameHelp" class="form text-danger"><b><?= $usernameDescription; ?></b></small><?php } else { ?><small id="usernameHelp" class="form text-muted">3 - 20 characters long, No special characters</small><?php } ?>

                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control <?php if ($passwordError) { ?>border-danger<?php } ?>" id="password" name="password" placeholder="Enter Password">
                                <?php if ($passwordError) { ?><small id="passwordHelp" class="form text-danger"><b><?= $passwordDescription; ?></b></small><?php } else { ?><small id="passwordHelp" class="form text-muted">5 - 60 characters long</small><?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="passwordVerify">Verify Password</label>
                                <input type="password" class="form-control <?php if ($passwordverifyError) { ?>border-danger<?php } ?>" id="verify" name="verify" placeholder="Verify Password">
                                <?php if ($passwordverifyError) { ?><small id="passwordVerifyHelp" class="form text-danger"><b>Password verification failed</b></small><?php } else { ?><small id="passwordVerifyHelp" class="form text-muted">Please retype password</small><?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="ticket">Register Ticket</label>
                                <input type="text" class="form-control <?php if ($ticketError) { ?>border-danger<?php } ?>" id="ticket" name="ticket" placeholder="Enter Ticket">
                                <?php if ($ticketError) { ?><small id="ticketHelp" class="form text-danger"><b>This ticket is either invalid or taken</b></small><?php } ?>
                            </div>
                            <button type="submit" name="signup" class="btn btn-success">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>