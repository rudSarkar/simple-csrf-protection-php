<?php
    // Start a session
    //session_start();

    if (empty($_SESSION['key'])) {
        $_SESSION['key'] = md5(uniqid(rand(), TRUE));
    }

    if (isset($_POST['submit'])) {
        if (isset($_POST['csrf']) && $_SESSION['key'] === $_SESSION['key']) {
            echo "Your name is: " . $_POST['username'];
        } else
            echo "CSRF Token Failed !";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple CSRF Protection PHP</title>
</head>
<body>
    <form method="POST" action="index.php">
        <input type="text" name="username" placeholder="your name">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['key']; ?>">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>