<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "universidad_db";


$conn = new mysqli($hostname,$username,$password,$database);

if($conn->connect_error){
    die( "Error al conectar la base de datos");
} else {
    echo "Conexion Correcta SI";
}


?>