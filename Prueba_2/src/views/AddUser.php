<?php
$err = isset($_SESSION["err"]) ? $_SESSION["err"] : "";
unset($_SESSION["err"]);
?>


<h3>Añadir Nuevo Usuario</h3>
<form method="POST" action="index.php?action=addUser">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>">
    <label for="password">Contraseña:</label>
    <input type="password" name="password">

    <label for="host">Host:</label>
    <input type="text" name="host" value="<?php echo htmlspecialchars($_POST['host'] ?? 'localhost', ENT_QUOTES); ?>">
    <label for="privileges">Privilegios:</label>
    <input type="text" name="privileges" value="<?php echo htmlspecialchars($_POST['privileges'] ?? '', ENT_QUOTES); ?>" placeholder="Ej. SELECT, INSERT">
    <button type="submit">Añadir Usuario</button>

    <?php if ($err) echo "<p style='color:red;'>$err</p>"; ?>
</form>