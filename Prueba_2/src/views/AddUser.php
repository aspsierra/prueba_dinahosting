<?php
$err = isset($_SESSION["err"]) ? $_SESSION["err"] : "";
unset($_SESSION["err"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Usuario</title>
    <link rel="stylesheet" href="assets/style/style.css">

</head>
<body>

    <div class="topBar">
        <a href="index.php?action=logout">Cerrar Sesión</a>
    </div>


    <div class="addUserForm">
        <h1>Añadir Nuevo Usuario</h1>
        <form method="POST" action="index.php?action=addUser">
            <input type="text" name="username" placeholder="Usuario" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>">
            <input type="password" name="password" placeholder="Contraseña">
        
            <input type="text" name="host" placeholder="Host" value="<?php echo htmlspecialchars($_POST['host'] ?? '', ENT_QUOTES); ?>">
            <input type="text" name="privileges" value="<?php echo htmlspecialchars($_POST['privileges'] ?? '', ENT_QUOTES); ?>" placeholder="Ej. SELECT, INSERT">
            <button type="submit">Añadir Usuario</button>
        
            <?php if ($err) echo "<p style='color:red;'>$err</p>"; ?>
        </form>
    </div>
    
</body>
</html>