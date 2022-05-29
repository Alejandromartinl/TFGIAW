<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elección</title>
    <link rel="stylesheet" href="estiloseleccion.css">
</head>
<body>
    <?php
        session_start();
        echo "<div>";
        echo "<h2>Bienvenid/a " . $_SESSION['usuario'] . "</h2>"; 
        echo "<b>Indique la tabla que desea modificar.</b> <br>";
        ?>
        <br>
        <form action="" method="post" class="formulariofinal">
            <p><b><input type="radio" name="rol" value="equipo">Equipos</b></p><br>
            <p><b><input type="radio" name="rol" value="presidente">Presidentes</b></p><br>
            <p><b><input type="radio" name="rol" value="jugador">Jugadores</b></p><br>
            <p><input type="submit" name="siguiente" value="Siguiente" class="botonf"></p>
        </form>
    <?php
    if (isset($_POST['siguiente'])) {
        $_SESSION['rol'] = $_POST['rol'];
        header('Location: registros.php');
    }
    echo "</div>";

    ?>
</body>
</html>