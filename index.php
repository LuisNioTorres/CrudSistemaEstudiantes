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
            $sql = 'SELECT * FROM estudiante';
            $resultados = $conn->query($sql);
            while($estudiante = $resultados->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $estudiante["foto"];?></td>
                <td><?php echo $estudiante["id_carrera"];?></td>
                <td><?php echo $estudiante["id_estudiante"];?></td>
                <td><?php echo $estudiante["cedula"];?></td>
                <td><?php echo $estudiante["nombre"]." ".$estudiante["apellido"];?></td>
                <td>
                    <input type="button" value="Editar" class="btn btn-success" name="boton_editar">
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