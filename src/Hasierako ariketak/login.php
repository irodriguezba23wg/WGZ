<?php
session_start();

// Erabiltzaileak eta pasahitzak array batean (hashed)
$users = [
    "admin" => password_hash("admin123", PASSWORD_DEFAULT),
   
];

// Logout egitea
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Saioa hasi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Egiaztatu erabiltzailea existitzen den eta pasahitza zuzena den
    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        // Sesioa hasi
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Bideratu babestutako orrialdera
        header("Location: index.php");
        exit;
    } else {
        $error = "Erabiltzailea edo pasahitza okerra.";
    }
}
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistema</title>
</head>
<body>

<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
    <!-- Babestutako edukia -->
    <h2>Ongi etorri, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Orrialde babestua ikusten ari zara.</p>
    <a href="index.php?action=logout">Logout</a>

<?php else: ?>
    <!-- Login formularioa -->
    <h2>Saioa Hasi</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="">
        Erabiltzailea: <input type="text" name="username" required><br><br>
        Pasahitza: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
<?php endif; ?>

</body>
</html>
