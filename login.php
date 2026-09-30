<?php
session_start();

function canLogin($p_email, $p_password) {
    if ($p_email === "jensse@login.com" && $p_password === "12345lol") {
        return true;
    } else {
        return false;
    }
}

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (canLogin($email, $password)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        $error = "Ongeldige combinatie van e-mail en wachtwoord.";
    }
}
?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="email">E-mail:</label><br>
        <input type="text" id="email" name="email"><br><br>

        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Inloggen">
    </form>

    <p>Nog geen account? <a href="#">Registreer hier</a></p>
</body>
</html>