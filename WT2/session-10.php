<?php
session_start();

$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'set') {
            $username = htmlspecialchars(trim($_POST['username']));
            $email = htmlspecialchars(trim($_POST['email']));
            if ($username && $email) {
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
            }
        } elseif ($_POST['action'] === 'destroy') {
            session_unset(); 
            session_destroy(); 
        }
    }
}
$view = 'form'; 
if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
    $view = 'display'; 
} elseif (isset($_POST['action']) && $_POST['action'] === 'destroy') {
    $view = 'destroy';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Management Example</title>
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

<?php if ($view === 'form'): ?>
    <h1>Set Session Variables</h1>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <input type="hidden" name="action" value="set">
        <input type="submit" value="Set Session">
    </form>

<?php elseif ($view === 'display'): ?>
    <h1>Session Variables</h1>
    <p>Username: <?= htmlspecialchars($_SESSION["username"]) ?><br>
       Email: <?= htmlspecialchars($_SESSION["email"]) ?></p>
    <form action="" method="POST">
        <input type="hidden" name="action" value="destroy">
        <input type="submit" value="Destroy Session">
    </form>

<?php elseif ($view === 'destroy'): ?>
    <h1>Session Destroyed</h1>
    <p>All session variables are unset and the session is destroyed.</p>
    <form action="" method="POST">
        <input type="hidden" name="action" value="set">
        <input type="submit" value="Start a New Session">
    </form>
<?php endif; ?>

</body>
</html>
