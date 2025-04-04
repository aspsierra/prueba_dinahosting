<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <link rel="stylesheet" href="assets/style/style.css">

</head>
<body>

    <div class="topBar">
        <a href="index.php?action=logout">Cerrar Sesión</a>
    </div>
    
    <div class="userDetails">
        <h3>Nombre de usuario</h3>
        <?php echo '<p>' . $user["user"]. '</p>' ?>
        <h3>Host</h3>
        <?php echo '<p>' . $user["host"]. '</p>' ?>
        
        <h3>Privilegios</h3>
        <?php echo '<p>' . implode(' , ', $user["privileges"][0]) . '</p>' ?>
        
        <form method="POST" action="index.php?action=deleteUser">
            <input type="hidden" name="user" value="<?php echo htmlspecialchars($user['user']); ?>">
            <input type="hidden" name="host" value="<?php echo htmlspecialchars($user['host']); ?>">
            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
        </form>
    </div>
</body>
</html>



