<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <link rel="stylesheet" href="estilosregistros.css">
</head>

<body>
    <?php
    //CONEXIÓN BD
    $host = "localhost";
    $user = "root";
    $passwd = "iaw";
    $enlace = mysqli_connect($host, $user, $passwd);
    $bd = "bdAlejandroMartin";

    session_start();
    //EQUIPOS 
    if ($_SESSION['rol'] == 'equipo') {
    ?>
    <header>
        <h1>EQUIPOS</h1>
    </header>
    <main>
    <div class="equipos">
        <form action="" method="post">
            <p>Código
            <input type="number" name="codigo" required></p><br>
            <p>Nombre
            <input type="text" name="nombre"></p><br>
            <p>Ciudad
            <input type="text" name="ciudad"></p><br>
            <p>Entrenador
            <input type="text" name="entrenador"></p><br>
            <p>Estadio
            <input type="text" name="estadio"></p><br>
            <p>Fecha Fundación
            <input type="date" name="fecha"></p><br>
            <p><input type="submit" value="Insertar" name="insertar" class="botonf">
                <input type="submit" value="Modificar" name="modificar" class="botonf">
                <input type="submit" value="Eliminar" name="eliminar" class="botonf">
                <input type="submit" value="Mostrar" name="mostrar" class="botonf">
                <input type="reset" value="Limpiar" name="limpiar" class="botonf">
                <a href="final.php"><input type="button" value="Salir" name="salir" class="botonf"></a></p>
        </form>
    </div>
        <?php
        //BOTONERA FUNCIONAL
        //BOTON INSERTAR
        if (isset($_POST['insertar'])) {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $ciudad = $_POST['ciudad'];
            $entrenador = $_POST['entrenador'];
            $estadio = $_POST['estadio'];
            $fecha = $_POST['fecha'];
            mysqli_select_db($enlace, $bd);
            mysqli_query($enlace, "INSERT INTO EQUIPOS VALUES ('$codigo','$nombre','$ciudad','$entrenador','$estadio',
            '$fecha')");
        }

        //BOTON MODIFICAR
        if (isset($_POST['modificar'])) {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $ciudad = $_POST['ciudad'];
            $entrenador = $_POST['entrenador'];
            $estadio = $_POST['estadio'];
            $fecha = $_POST['fecha'];
            mysqli_select_db($enlace, $bd);
            if ($codigo) {
                mysqli_query($enlace, "UPDATE EQUIPOS SET NOMBRE='$nombre',CIUDAD='$ciudad',ENTRENADOR='$entrenador',
                ESTADIO='$estadio',FECHA_FUNDACION='$fecha' WHERE CODIGO like '$codigo'");
            } else {
                echo "El equipo con codigo " . $codigo . " no existe";
            }
        }

        //BOTON ELIMINAR
        if (isset($_POST['eliminar'])) {
            $codigo = $_POST['codigo'];
            mysqli_select_db($enlace, $bd);
            mysqli_query($enlace, "DELETE FROM EQUIPOS WHERE CODIGO LIKE '$codigo';");
        }

        //BOTON MOSTRAR
        if (isset($_POST['mostrar'])) {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            mysqli_select_db($enlace, $bd);
            $busc = mysqli_query($enlace, "SELECT * FROM EQUIPOS WHERE CODIGO LIKE '$codigo' AND NOMBRE LIKE '$nombre'");
            while ($tupla = mysqli_fetch_array($busc)) {
                $ciudad = $tupla[2];
                $entrenador = $tupla[3];
                $estadio = $tupla[4];
                $fecha = $tupla[5];
                echo "********** Empleados registrados con Código: " . $codigo . " y Nombre: " . $nombre . 
                " **********<br>";
                echo "Ciudad: " . $ciudad . "<br>";
                echo "Entrenador: " . $entrenador . "<br>";
                echo "Estadio: " . $estadio . "<br>";
                echo "Fecha: " . $fecha . "<br>";
            }
        }
        ?>
    <?php
        //PRESIDENTES 
    } elseif ($_SESSION['rol'] == 'presidente') {
    ?>
    <header>
        <h1>PRESIDENTES</h1>
    </header>
    <div class="presidentes">
        <form action="" method="post">
            <p>DNI
            <input type="text" name="dni" required></p><br>
            <p>Nombre
            <input type="text" name="nombre"></p><br>
            <p>Apellidos
            <input type="text" name="apellidos"></p><br>
            <p>Sexo
            <?php
            $sex = array(
                "H" => "Hombre",
                "M" => "Mujer"
            );
            foreach ($sex as $key => $value) {
                echo "<input type=radio value=" . $key . " name='sexo'>$value";
            }
            ?></p><br>
            <p>Fecha Nacimiento
            <input type="date" name="fecha"></p><br>
            <p>Equipo
            <select name="equipo">
                <option value="" disabled></option>
                <?php
                mysqli_select_db($enlace, $bd);
                $busc = mysqli_query($enlace, "SELECT * FROM EQUIPOS");
                while ($tupla = mysqli_fetch_row($busc)) {
                    $codigo = $tupla[0];
                    $nombre = $tupla[1];
                    echo "<option value=" . $codigo . ">" .$nombre. "</option>";
                }
                ?>
            </select></p><br>
            <p><input type="submit" value="Insertar" name="insertar" class="botonf">
                <input type="submit" value="Modificar" name="modificar" class="botonf">
                <input type="submit" value="Eliminar" name="eliminar" class="botonf">
                <input type="submit" value="Mostrar" name="mostrar" class="botonf">
                <input type="reset" value="Limpiar" name="limpiar" class="botonf">
                <a href="final.php"><input type="button" value="Salir" name="salir" class="botonf"></a></p>
        </form>
            </div>
        <?php
        //BOTONERA FUNCIONAL
        //BOTON INSERTAR
        if (isset($_POST['insertar'])) {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $sexo = $_POST['sexo'];
            $fecha = $_POST['fecha'];
            $equipo = $_POST['equipo'];
            mysqli_select_db($enlace, $bd);
            mysqli_query($enlace, "INSERT INTO PRESIDENTES VALUES ('$dni','$nombre','$apellidos','$sexo','$fecha',
            '$equipo')");
        }

        //BOTON MODIFICAR
        if (isset($_POST['modificar'])) {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $sexo = $_POST['sexo'];
            $fecha = $_POST['fecha'];
            $equipo = $_POST['equipo'];
            mysqli_select_db($enlace, $bd);
            if ($codigo) {
                mysqli_query($enlace, "UPDATE PRESIDENTES SET NOMBRE='$nombre',APELLIDOS='$apellidos',SEXO='$sexo',
                FECHA_NACIMIENTO='$fecha',EQUIPO='$equipo' WHERE DNI like '$dni'");
            } else {
                echo "El equipo con codigo " . $dni . " no existe";
            }
        }

        //BOTON ELIMINAR
        if (isset($_POST['eliminar'])) {
            $dni = $_POST['dni'];
            mysqli_select_db($enlace, $bd);
            mysqli_query($enlace, "DELETE FROM PRESIDENTES WHERE DNI LIKE '$dni';");
        }

        //BOTON MOSTRAR
        if (isset($_POST['mostrar'])) {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            mysqli_select_db($enlace, $bd);
            $busc = mysqli_query($enlace, "SELECT * FROM PRESIDENTES WHERE DNI LIKE '$dni' AND NOMBRE LIKE '$nombre';");
            while ($tupla = mysqli_fetch_array($busc)) {
                $apellidos = $tupla[2];
                $sexo = $tupla[3];
                $fecha = $tupla[4];
                $equipo = $tupla[5];
                echo "********** Empleados registrados con DNI: " . $dni . " , Nombre: " . $nombre . " y Apellidos: " . 
                $apellidos . " **********<br>";
                echo "Sexo: " . $sexo . "<br>";
                echo "Fecha Nacimiento: " . $fecha . "<br>";
                echo "Equipo: " . $equipo . "<br>";
            }
        }
        //JUGADORES
    } else {
        ?>
    <header>
        <h1>JUGADORES</h1>
    </header>
    <div class="jugadores">
        <form action="" method="post">
            <p>DNI
            <input type="text" name="dni" required></p><br>
            <p>Nombre
            <input type="text" name="nombre"></p><br>
            <p>Apellidos
            <input type="text" name="apellidos"></p><br>
            <p>Fecha Nacimiento
            <input type="date" name="fecha"></p><br>
            <p>Email
            <input type="email" name="email"></p><br>
            <p>Telefono
            <input type="number" name="telefono"></p><br>
            <p>Equipo
            <select name="equipo">
                <?php
                mysqli_select_db($enlace, $bd);
                $busc = mysqli_query($enlace, "SELECT * FROM EQUIPOS");
                while ($tupla = mysqli_fetch_row($busc)) {
                    $codigo = $tupla[0];
                    $nombre = $tupla[1];
                    echo "<option value=" . $codigo . ">" .$nombre. "</option>";
                }
                ?>
            </select></p><br>
            <p>Posición
            <?php
            $pos = array(
                "Base" => "Base", 
                "Escolta" => "Escolta", 
                "Alero" => "Alero", 
                "Pivot" => "Pivot", 
                "Ala-Pivot" => "Ala-Pivot", 
            );
            foreach ($pos as $key => $value) {
                echo "<input type=checkbox value=" . $key .  "name='posicion'>$value";
            }
            ?></p><br>

            <p><input type="submit" value="Insertar" name="insertar" class="botonf">
                <input type="submit" value="Modificar" name="modificar" class="botonf">
                <input type="submit" value="Eliminar" name="eliminar" class="botonf">
                <input type="submit" value="Mostrar" name="mostrar" class="botonf">
                <input type="reset" value="Limpiar" name="limpiar" class="botonf">
                <a href="final.php"><input type="button" value="Salir" name="salir" class="botonf"></a></p>
        </form>
        </div>
        <?php
        //BOTONERA FUNCIONAL
        //BOTON INSERTAR
        if (isset($_POST['insertar'])) {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fecha = $_POST['fecha'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $equipo = $_POST['equipo'];
            $posicion = $_POST['posicion'];
            mysqli_select_db($enlace, $bd);
            mysqli_query($enlace, "INSERT INTO JUGADORES VALUES ('$dni','$nombre','$apellidos','$fecha','$email',
            '$telefono','$equipo','$posicion')");
        }

        //BOTON MODIFICAR
        if (isset($_POST['modificar'])) {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fecha = $_POST['fecha'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $equipo = $_POST['equipo'];
            $posicion = $_POST['posicion'];
            mysqli_select_db($enlace, $bd);
            if ($dni) {
                mysqli_query($enlace, "UPDATE JUGADORES SET NOMBRE='$nombre',APELLIDOS='$apellidos',
                FECHA_NACIMIENTO='$fecha',EMAIL='$email',TELEFONO='$telefono',EQUIPO='$equipo',POSICION='$posicion' 
                WHERE DNI like '$dni'");
            } else {
                echo "El equipo con codigo " . $dni . " no existe";
            }
        }

        //BOTON ELIMINAR
        if (isset($_POST['eliminar'])) {
            $dni = $_POST['dni'];
            $email = $_POST['email'];
            mysqli_select_db($enlace, $bd);
            mysqli_query($enlace, "DELETE FROM JUGADORES WHERE DNI LIKE '$dni' AND EMAIL LIKE '$email';");
        }

        //BOTON MOSTRAR
        if (isset($_POST['mostrar'])) {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            mysqli_select_db($enlace, $bd);
            $busc = mysqli_query($enlace, "SELECT * FROM JUGADORES WHERE DNI LIKE '$dni' AND NOMBRE LIKE '$nombre'");
            while ($tupla = mysqli_fetch_array($busc)) {
                $apellidos = $tupla[2];
                $fecha = $tupla[3];
                $email = $tupla[4];
                $telefono = $tupla[5];
                $equipo = $tupla[6];
                $posicion =$tupla[7];
                echo "********** Empleados registrados con DNI: " . $dni . " y Nombre: " . $nombre . " **********<br>";
                echo "Apellidos: " . $apellidos . "<br>";
                echo "Fecha Nacimiento: " . $fecha . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Telefono: " . $telefono . "<br>";
                echo "Equipo: " . $equipo . "<br>";
                echo "Posicion: " . $posicion . "<br>";
            }
        }
    }
        ?>
</body>

</html>