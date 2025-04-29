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

    $conn->close();

}

function obtenerEstudiante ($id) {
    $conn = conectardb();
    $sql = "SELECT * 
    FROM estudiante e
    WHERE e.id_estudiante = ".$id;
    $resultado = $conn->query($sql);
    $estudiante = $resultado->fetch_assoc();
    return $estudiante;

    $conn->close();
}

function agregarEstudiante ($cedula,$foto,$nombre,$apellido,$fecha_nacimiento,$id_carrera) {
    $conn = conectardb();

    $fecha = new DateTime();
    $nombre_archivo = ($foto!=="")? $fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"profile.jpg";
    $temp_foto = $_FILES["imagen"]["tmp_name"];
    if($temp_foto!==""){
        move_uploaded_file($temp_foto,"./Imagenes/".$nombre_archivo);
    }

    
    $sql = "INSERT INTO `estudiante` 
            (`id_estudiante`, `cedula`, `foto`, `nombre`, `apellido`, `fecha_nacimiento`, `id_carrera`) 
            VALUES 
            (NULL, '".$cedula."', '".$nombre_archivo."', '".$nombre."', '".$apellido."', '".$fecha_nacimiento."', '".$id_carrera."')";

    //Simple Validacion
    if($conn->query($sql) === TRUE) echo "Estudiante Agregado correctamente";
    else echo "Error en Agregar estudiante".$conn->error; 

}

function editarEstudiante ($id,$cedula,$foto,$nombre,$apellido,$fecha_nacimiento,$id_carrera){
    $conn = conectardb();
    $sql = "UPDATE `estudiante` 
            SET `cedula`='".$cedula."',`nombre`='".$nombre."',
                `apellido`='".$apellido."',`fecha_nacimiento`='".$fecha_nacimiento."',`id_carrera`='".$id_carrera."' 
            WHERE `id_estudiante` = ".$id."";
    

    $fecha = new DateTime();
    $nombre_archivo = ($foto!=="")? $fecha->getTimestamp()."_".$foto : "profile.jpg";
    $temp_foto = $_FILES["imagen"]["tmp_name"];

    if($temp_foto!==""){
        $sql_foto = "SELECT estudiante.foto
                        FROM estudiante 
                        WHERE id_estudiante = ".$id."";
        
        $res = $conn->query($sql_foto);
        $estudiante = $res->fetch_object();
        $prefoto = $estudiante->foto;

        if(isset($prefoto)){
            if(file_exists("./Imagenes/".$prefoto)){
                if($prefoto!=="profile.jpg"){
                    unlink("./Imagenes/".$prefoto);
                }
            }
        }

        $sql_foto = "UPDATE `estudiante`
                     SET `foto`= '".$nombre_archivo."'
                     WHERE `id_estudiante` = ".$id."";

        move_uploaded_file($temp_foto,"./Imagenes/".$nombre_archivo);

        if($conn->query($sql_foto)=== TRUE) echo "IMAGEN EDITADA CORRECTAMENTE";
        else echo "ERROR AL EDITAR IMAGEN".$conn->error;
        
    }


    if($conn->query($sql)===TRUE) echo "Estudiante editado Correctamente";
    else echo "Error al editar estudiante";

    $conn->close();
}

function eliminarEstudiante($id){
    $conn = conectardb();

    $sql_foto= "SELECT estudiante.foto 
                FROM estudiante
                WHERE id_estudiante = ".$id."";
    //En $res se guardan todos los registros que devuelva la consulta;
    $res = $conn->query($sql_foto);

    $estudiante = $res->fetch_object();

    $foto = $estudiante->foto;

    if(isset($foto)){
        if(file_exists("./Imagenes/".$foto)){
            if($foto!=="profile.jpg"){
                unlink("./Imagenes/".$foto);
            }
        }
    }

    $sql = "DELETE FROM estudiante WHERE id_estudiante =".$id;

    if($conn->query($sql)===TRUE) echo "ESTUDIANTE ELIMINADO CORRECTAMENTE";
    else "ERROR AL ELIMINAR" . $conn->error;

    $conn->close();
}
?>