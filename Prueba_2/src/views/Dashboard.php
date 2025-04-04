<?php
namespace views;

//unset($_SESSION["loggedIn"]);

?>

<a href="index.php?action=logout">Cerrar Sesión</a>
<a href="index.php?action=addUser">Añadir Usuario</a>
<table>
    <thead>
        <tr>
            <th>Nombre de usuario</th>
            <th>Host</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($users as $user) {

                echo '<tr>';
                echo "<td>" . $user['user'] . "</td>";
                echo "<td>" . $user['host'] . "</td>";
                ?>
                <td>
                    <?php echo '<a href="index.php?action=details&user=' . $user["user"] . '&host=' . $user["host"] . '"> Ver detalles </a>' ?>
                    <form method="POST" action="index.php?action=deleteUser">
                        <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['user']); ?>">
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