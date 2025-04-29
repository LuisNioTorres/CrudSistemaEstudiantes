<?php
include_once('./Conexion/conexion.php');
include('./header.php');
include('./funciones.php');

if(isset($_GET["accion"])){
    $id = $_POST["id_eliminar"];    
    //LOGICA DE ELIMINAR ESTUDIANTE AQUI
    eliminarEstudiante($id);
}

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
            while ($estudiante = $resultados->fetch_assoc()) {
            ?>
                <tr>
                    <td><img width="100px" src="./Imagenes/<?php echo $estudiante["foto"]; ?>" alt=""></td>
                    <td><?php echo $estudiante["nombre_carrera"]; ?></td>
                    <td><?php echo $estudiante["id_estudiante"]; ?></td>
                    <td><?php echo $estudiante["cedula"]; ?></td>
                    <td><?php echo $estudiante["nombre"] . " " . $estudiante["apellido"]; ?></td>
                    <td>
                        <a href="formulario.php?id=<?php echo $estudiante["id_estudiante"]; ?>" class="btn btn-success">
                            Editar
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        onclick="getIdEliminar(<?php echo $estudiante['id_estudiante']?>); ">
                            Eliminar
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="index.php?accion=eliminar" method="post">

                <div class="modal-body">
                    <input type="hidden" id="id_eliminar" name="id_eliminar">
                    ¿Estas seguro que deseas eliminar a estudiante?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        let getIdEliminar = (id) => {
            let id_eliminar = document.querySelector('#id_eliminar');
            id_eliminar.value = id;
        }
    </script>
    <?php
    include('./footer.php')
    ?>