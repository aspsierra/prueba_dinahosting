<?php
namespace views;

//unset($_SESSION["loggedIn"]);


var_dump($users)
?>

<a href="index.php?action=logout">Cerrar Sesión</a>
<table>
    <thead>
        <tr>
            <th>Nombre de usuario</th>
            <th>Host</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($users as $user) {

                echo '<tr>';
                echo "<td>" . $user['user'] . "</td>";
                echo "<td>" . $user['host'] . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>