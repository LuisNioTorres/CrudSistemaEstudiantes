<?php
include('./header.php');
include('./funciones.php');

$carreras = obtenerCarreras();

$foto = isset($_FILES["imagen"]["name"]) ? $_FILES["imagen"]["name"] : "";
$cedula = isset($_POST["cedula"]) ? $_POST["cedula"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : " ";
$carrera = isset($_POST["carrera"]) ? $_POST["carrera"] : "";
$estudiante;



//AQUI SE DEBE OBTENER AL ESTUDIANTE;
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $estudiante = obtenerEstudiante($id);
}


if(isset($_POST["boton_enviar"])){
    if(isset($_GET["id"])){
        //AQUI LA LOGICA DE EDITAR ESTUDIANTE;
        editarEstudiante($id,
                         $cedula,
                         $foto,
                         $nombre,
                         $apellido,
                         $fecha,
                         $carrera);
        //Actualizar la informacion del estudiante en el formulario cuando lo edito;

        $estudiante = obtenerEstudiante($id);

    } else {
        echo "AGREGAR ESTUDIANTE";
        agregarEstudiante($cedula,
                          $foto,
                          $nombre,
                          $apellido,
                          $fecha,
                          $carrera);
    }
} 





?>

<main>

<form action="" method="post" class="formulario" enctype="multipart/form-data">
    <div class="formulario__grupo" id="grupo__imagen">
        <div class="grupo__input">
            <label for="imagen">Foto:</label>
            <img width="100px" src="./Imagenes/<?php echo $estudiante["foto"]; ?>" alt="" class="formulario_imagen">
            <input type="file" accept="image/*" name="imagen" id="imagen">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__cedula">
        <div class="grupo__input">
            <label for="cedula">cedula:</label>
            <input type="text" name="cedula" id="cedula" value="<?php echo (isset ($estudiante["cedula"])? $estudiante["cedula"] : "" ); ?>">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__nombre">
        <div class="grupo__input">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo (isset ($estudiante["nombre"])? $estudiante["nombre"] : "" ); ?>">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__apellido">
        <div class="grupo__input">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="<?php echo (isset ($estudiante["apellido"])? $estudiante["apellido"] : "" ); ?>">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__fecha">
        <div class="grupo__input">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha"  value="<?php echo (isset ($estudiante["fecha_nacimiento"])? $estudiante["fecha_nacimiento"] : "" ); ?>">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__carrera">
        <div class="grupo__input">
            <label for="carrera">Carrera:</label>
            <select name="carrera" required>
                <?php
                foreach ($carreras as $carrera) {
                ?>
                <option value="<?= $carrera['id']?>" 
                    <?php echo isset($estudiante['id_carrera']) 
                          && $carrera['id'] == $estudiante['id_carrera'] ? 
                          "selected" : ""; 
                    ?>>
                    <?php echo $carrera['id']." ".$carrera['nombre']; ?>
                </option>
                <?php
                }
                ?>
            </select>
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__mensaje_error">
        <p>Rellena Correctamente todos los campos</p>
    </div>

    <div class="formulario__grupo formulario__boton_enviar">
        <input type="submit" value="Enviar" class="boton_enviar" name="boton_enviar">
        <div class="formulario__mensaje_exito"><p>El formulario se envió correctamente</p></div>
    </div>

</form>


</main>


<?php
include('./footer.php');
?>