<?php
session_start();

$message = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['set_cookie'])) {
        $username = htmlspecialchars(trim($_POST['username']));
        setcookie('username', $username, time() + 86400, '/'); 
        $message = "Cookie set successfully for $username!";
    } elseif (isset($_POST['delete_cookie'])) {
        setcookie('username', '', time() - 3600, '/');
        $message = "Cookie deleted successfully!";
    }
}
if (isset($_COOKIE['username'])) {
    $username = htmlspecialchars($_COOKIE['username']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Management Example</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background-color: #5cb85c; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #4cae4c; }
    </style>
</head>
<body>

<h1>Cookie Management Example</h1>

<?php if ($message): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?= $username ?>" required>

    <input type="submit" name="set_cookie" value="Set Cookie">
    <input type="submit" name="delete_cookie" value="Delete Cookie">
</form>

<?php if ($username): ?>
    <h2>Current Cookie Value:</h2>
    <p>Username: <?= $username ?></p>
<?php else: ?>
    <p>No cookie set.</p>
<?php endif; ?>

</body>
</html>
