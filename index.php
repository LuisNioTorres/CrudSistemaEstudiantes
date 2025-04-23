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
            <tr>
                <td>hola.png</td>
                <td>Computacion</td>
                <td>1</td>
                <td>0953559192</td>
                <td>Torres Pereira Luis Antonio</td>
                <td>
                    <button class="btn btn-success" value="editar">Editar</button>
                    <button class="btn btn-danger" value="editar">Eliminar</button>
                </td>
            </tr>
            <tr>
                <td>hola.png</td>
                <td>Computacion</td>
                <td>1</td>
                <td>0953559192</td>
                <td>Torres Pereira Luis Antonio</td>
                <td>
                    <button class="btn btn-success" value="editar">Editar</button>
                    <button class="btn btn-danger" value="editar">Eliminar</button>
                </td>
            </tr>
            <tr>
                <td>hola.png</td>
                <td>Computacion</td>
                <td>1</td>
                <td>0953559192</td>
                <td>Torres Pereira Luis Antonio</td>
                <td>
                    <button class="btn btn-success" value="editar">Editar</button>
                    <button class="btn btn-danger" value="editar">Eliminar</button>
                </td>
            </tr>
            <tr>
                <td>hola.png</td>
                <td>Computacion</td>
                <td>1</td>
                <td>0953559192</td>
                <td>Torres Pereira Luis Antonio</td>
                <td>
                    <button class="btn btn-success" value="editar">Editar</button>
                    <button class="btn btn-danger" value="editar">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>

<?php
include('./footer.php')
?>