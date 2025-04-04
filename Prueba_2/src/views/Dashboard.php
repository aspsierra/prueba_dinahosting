<?php
namespace views;
$err = isset($_SESSION["err"]) ? $_SESSION["err"] : "";
unset($_SESSION["err"]);
$info = isset($_SESSION["info"]) ? $_SESSION["info"] : "";
unset($_SESSION["info"]);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Ususarios</title>
        <link rel="stylesheet" href="assets/style/style.css">
        
    </head>
<body>

    <?php if ($err){ ?> 

        <p class='error'><?php echo $err ?></p>" 

    <?php } ?>

    <?php if ($info) echo "<p class='toast success'>$info</p>"; ?>
    <?php if ($err) echo "<p class='toast error'>$err</p>"; ?>
        
    <div class="topBar">
        <a href="index.php?action=logout">Cerrar Sesión</a>
    </div>

    <div class=usersTable>
        <h1>Lista de usuarios</h1>
        <div class="tableActions">
            <a class="addUserBtn" href="index.php?action=addUser">Añadir Usuario</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nombre de usuario</th>
                    <th>Host</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($users as $user) {
        
                        echo '<tr>';
                        echo "<td>" . $user['user'] . "</td>";
                        echo "<td>" . $user['host'] . "</td>";
                        ?>
                        <td class="actions">
                            <?php echo '<a href="index.php?action=details&user=' . $user["user"] . '&host=' . $user["host"] . '"> Ver detalles </a>' ?>
                            <form method="POST" action="index.php?action=deleteUser">
                                <input type="hidden" name="user" value="<?php echo htmlspecialchars($user['user']); ?>">
                                <input type="hidden" name="host" value="<?php echo htmlspecialchars($user['host']); ?>">
                                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
                            </form>
                        </td>
                        <?php
        
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>