<?php

?>


<body>
    <h3>Nombre de ususario</h3>
    <?php echo '<p>' . $user["user"]. '</p>' ?>
    <h3>Host</h3>
    <?php echo '<p>' . $user["host"]. '</p>' ?>

    <h3>Privilegios</h3>
    <?php echo '<p>' . implode(' , ', $user["privileges"][0]) . '</p>' ?>

    <form method="POST" action="index.php?action=deleteUser">
        <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['user']); ?>">
        <input type="hidden" name="host" value="<?php echo htmlspecialchars($user['host']); ?>">
        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
    </form>

</body>