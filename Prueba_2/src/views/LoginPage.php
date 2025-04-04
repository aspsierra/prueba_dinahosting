<?php
$err = isset($_SESSION["err"]) ? $_SESSION["err"] : "";
unset($_SESSION["err"]);
?>

<h1>Iniciar Sesión</h1>
<form action="/index.php?action=login" method="POST">
    <input type="text" name="user" placeholder="Usuario"><br>
    <input type="password" name="password" placeholder="Contraseña"><br>
    <button type="submit">Entrar</button>
    <?php if ($err) echo "<p style='color:red;'>$err</p>"; ?>
</form>