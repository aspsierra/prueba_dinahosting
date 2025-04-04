<?php
$err = isset($_SESSION["err"]) ? $_SESSION["err"] : "";
unset($_SESSION["err"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <div class='loginPage'>
        <h1>Iniciar Sesión</h1>
        <form action="/index.php?action=login" method="POST">
            <input type="text" name="user" placeholder="Usuario" value="<?php echo htmlspecialchars($_POST['user'] ?? '', ENT_QUOTES); ?>">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit">Entrar</button>
            <?php if ($err) echo "<p class='errorMsg'>$err</p>"; ?>
        </form>

    </div>
</body>
</html>
