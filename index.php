<?php
include_once('./Conexion/conexion.php');
include('./header.php');
?>

<div class="container">
    <h2>Sistema Gestion Estudiante</h2>
    <table class="container__tabla table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Carrera</th>
                <th>ID</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //NECESITO UNA CONSULTA SQL, UNA VARIABLE PARA GUARDAR LOS RESULTADOS, Y UN WHILE
            //Recuperar solo estudiantes de ingenieria
            $sql = "SELECT e.*, f.nombre AS nombre_facultad, c.nombre as nombre_carrera FROM estudiante e INNER JOIN carrera c ON e.id_carrera = c.id_carrera INNER JOIN facultad f ON f.id_facultad = c.id_facultad WHERE f.nombre = 'Ingenieria'";

            $resultados = $conn->query($sql);
            while($estudiante = $resultados->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $estudiante["foto"];?></td>
                <td><?php echo $estudiante["nombre_carrera"];?></td>
                <td><?php echo $estudiante["id_estudiante"];?></td>
                <td><?php echo $estudiante["cedula"];?></td>
                <td><?php echo $estudiante["nombre"]." ".$estudiante["apellido"];?></td>
                <td>
                    <a href="formulario.php?id=<?php echo $estudiante["id_estudiante"]; ?>" class="btn btn-success">
                        Editar
                    </a>
                    <input type="button" value="Eliminar" class="btn btn-danger" name="boton_eliminar">
                </td>
            </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>

<?php
include('./footer.php')
?>