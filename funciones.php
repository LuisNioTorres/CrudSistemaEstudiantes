<?php

function conectardb(){
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "universidad_db";

    $conn = new mysqli($hostname,$username,$password,$database);

    if($conn->connect_error){
        die("Conexion fallida". $conn->connect_error);
    } 

    return $conn;

}

function obtenerCarreras () {

    //Conexion con DB
    $conn = conectardb();

    //Consulta SQL
    $sql = "SELECT c.nombre AS nombre_carrera,
    c.id_carrera AS id_carrera
    FROM carrera c 
    JOIN facultad f 
    ON c.id_facultad = f.id_facultad
    WHERE f.nombre = 'INGENIERIA';
    ";

    //Variable para guardar el resultado
    $resultado = $conn->query($sql);

    //Arreglo de carreras a retornar
    $carreras = [];


    //Leer cada registro con WHILE
    if($resultado->num_rows>0){
        while($carrera = $resultado->fetch_assoc()){
            array_push($carreras, [
                "id" => $carrera["id_carrera"],
                "nombre" => $carrera["nombre_carrera"]
            ]);
        }
    }

    return $carreras;

}

function obtenerEstudiante ($id) {
    $conn = conectardb();
    $sql = "SELECT * 
    FROM estudiante e
    WHERE e.id_estudiante = ".$id;
    $resultado = $conn->query($sql);
    $estudiante = $resultado->fetch_assoc();
    return $estudiante;
}
?>