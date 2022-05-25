<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilosindex.css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_POST['acceder'])) {
    ?>
    <div class="primera">
    <header>
        <img src="nba.png" alt="">
        <h2 class="iniciar">Iniciar sesión</h2>
    </header>
    <main>
            <form action="" method="post" class="formularioinicio">
            <p><b>Usuario</b></p> 
            <input type="text" name="usuario" required>
            <br><br>
            <!--Lo establecido pattern será la contraseña correcta -->
            <p><b>Contraseña</b></p> 
            <input type="password" name="contraseña" pattern="UsuarioNBA(.)" required>
            <br><br>
            <p><input type="submit" value="Acceder" name="acceder" class="boton"></p>
        </form>
    </main>
    </div>

    </body>
    <!-- SEGUNDA PÁGINA -->
    <footer>
    <?php
    } else {
        echo "<div>";
        $_SESSION['usuario'] = $_POST['usuario'];
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
    }
    if (isset($_POST['siguiente'])) {
        $_SESSION['rol'] = $_POST['rol'];
        header('Location: registros.php');
    }
    echo "</div>";
    ?>
    </footer>

</html>