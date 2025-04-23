<?php
include('./header.php');
?>

<main>

<form action="" method="post" class="formulario">
    <div class="formulario__grupo" id="grupo__imagen">
        <div class="grupo__input">
            <label for="imagen">Foto:</label>
            <input type="file" name="imagen" id="imagen">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__nombre">
        <div class="grupo__input">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__apellido">
        <div class="grupo__input">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__fecha">
        <div class="grupo__input">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha">
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__grupo" id="grupo__carrera">
        <div class="grupo__input">
            <label for="carrera">Carrera:</label>
            <select>
                <option value="1">Ingenieria</option>
                <option value="2">Civil</option>
            </select>
            <div class="mensaje__error">Coloca bien la informacion</div>
        </div>
    </div>

    <div class="formulario__mensaje_error">
        <p>Rellena Correctamente todos los campos</p>
    </div>

    <div class="formulario__grupo formulario__boton_enviar">
        <input type="submit" value="Enviar" class="boton_enviar">
        <div class="formulario__mensaje_exito"><p>El formulario se envió correctamente</p></div>
    </div>

</form>


</main>


<?php
include('./footer.php');
?>