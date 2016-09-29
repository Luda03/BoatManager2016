<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 27.09.2016
 * Time: 18:58
 */
session_start();
include('database/database.php');
include('api/credentials.php');


//Appel api pour le contrôle du login - mot de passe
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cred = new Credentials();
    $user_id = $cred->checkCredentials($username, $password);

    if ($user_id != false) {

        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['valid'] = 'valid';


        header('location: app/panel.php');
    } else {
        $error = 'Wrong login/password';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boats Manager</title>
    <link rel='stylesheet prefetch' href='sources/bootstrap-3.3.7-dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="sources/style.css">
</head>
<body>

<div class="wrapper">
    <form class="form-signin" method="post" name="login">
        <h2 class="form-signin-heading">Login to Boat Manager</h2>
        <input type="text" class="form-control" name="username" placeholder="User Name"/>
        <input type="password" class="form-control" name="password" placeholder="Password"/>
        <p><span style="color:#b20011"><?php $message = !empty($error) ? $error : '<br>';
                echo $message; ?></span></p>
        <input class="btn btn-lg btn-primary btn-block" name="login" type="submit">
    </form>
</div>

</body>
</html>
