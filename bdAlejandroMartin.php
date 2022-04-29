<?php
$host="localhost";
$user="root";
$passwd="iaw";
$enlace=mysqli_connect($host,$user,$passwd);
$bd="bdAlejandroMartin";
if ($enlace){
    echo "Conexión realizada con exito <br>";
}

//CREAR BD
mysqli_query($enlace,"CREATE DATABASE bdAlejandroMartin");
mysqli_select_db($enlace,$bd);
echo "Has creado la base de datos $bd correctamente <br>";

//CREAR TABLA EQUIPOS
mysqli_select_db($enlace,$bd);
mysqli_query($enlace,"CREATE TABLE EQUIPOS (CODIGO INT(2) PRIMARY KEY,
                                            NOMBRE VARCHAR(50),
                                            CIUDAD VARCHAR(40),
                                            ENTRENADOR VARCHAR(40),
                                            ESTADIO VARCHAR(40),
                                            FECHA_FUNDACION VARCHAR(20))");
echo "Has creado la tabla EQUIPOS correctamente <br>";

//CREAR TABLA PRESIDENTES
mysqli_select_db($enlace,$bd);
mysqli_query($enlace,"CREATE TABLE PRESIDENTES (DNI CHAR(9) PRIMARY KEY,
                                            NOMBRE VARCHAR(20),
                                            APELLIDOS VARCHAR(40),
                                            SEXO VARCHAR(10),
                                            FECHA_NACIMIENTO VARCHAR(20),
                                            EQUIPO INT(2),
                                            FOREIGN KEY (EQUIPO) REFERENCES EQUIPOS (CODIGO))");
echo "Has creado la tabla PRESIDENTES correctamente <br>";

//CREAR TABLA JUGADORES
mysqli_select_db($enlace,$bd);
mysqli_query($enlace,"CREATE TABLE JUGADORES (DNI CHAR(9) PRIMARY KEY,
                                            NOMBRE VARCHAR(20),
                                            APELLIDOS VARCHAR(40),
                                            FECHA_NACIMIENTO VARCHAR(20),
                                            EMAIL VARCHAR(40),
                                            TELEFONO INT(10),
                                            EQUIPO INT(2),
                                            POSICION VARCHAR(20),
                                            FOREIGN KEY (EQUIPO) REFERENCES EQUIPOS (CODIGO))");
echo "Has creado la tabla JUGADORES correctamente <br>";

//INSERTAR DATOS EN TABLA EQUIPOS
mysqli_select_db($enlace,$bd);
$insert1=mysqli_query($enlace,"INSERT INTO EQUIPOS VALUES ('01','Boston Celtics','Boston','Ime Udoka','TD Garden','1946-06-06')");
$insert2=mysqli_query($enlace,"INSERT INTO EQUIPOS VALUES ('02','Brooklyn Nets','Nueva York','Steve Nash','Barclays Center','1967-09-03')");
$insert3=mysqli_query($enlace,"INSERT INTO EQUIPOS VALUES ('03','New York Knicks','Nueva York','Tom Thibodeau','Madison Square Garden','1946-11-13')");
$insert4=mysqli_query($enlace,"INSERT INTO EQUIPOS VALUES ('04','Philadelphia 76ers','Filadelfia','Doc Rivers','Wells Fargo Center','1946-03-21')");
