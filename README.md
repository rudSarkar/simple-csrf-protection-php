# simple-csrf-protection-php
Simple CSRF Protection PHP

# How it work

1. Start session
2. Generate uniqid
3. validate uniqid
4. Add CSRF token in hidden input of `HTML Form`

### Start session

```php
session_start();
```

### Generate a uniqid

```php
$_SESSION['key'] = md5(uniqid(rand(), TRUE));
```

### Validate uniqid

```php
if (isset($_POST['csrf']) && $_SESSION['key'] === $_SESSION['key'])
  {
      echo "Your name is: " . $_POST['username'];
  } else
      echo "CSRF Token Failed !";
```

### Add CSRF token in hidden input of `HTML Form`

```HTML
<input type="hidden" name="csrf" value="<?php echo $_SESSION['key']; ?>">
```

### Full Code

```PHP
<?php
    // Start a session
    //session_start();

    if (empty($_SESSION['key'])) {
        $_SESSION['key'] = md5(uniqid(rand(), TRUE));
    }

    if (isset($_POST['submit'])) {
        if (isset($_POST['csrf']) && $_SESSION['key'] === $_SESSION['key'])
        {
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
```

[N.B: I am disable `SESSION_START` because when i am disable it, It will starting to generate random `uniqid`]


If you are still confused knock me on [Facebook](https://facebook.com/r.sark4r)
