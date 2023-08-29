<?php
include('../../config/database/connect.php');
require_once('../../config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_empleado = $_GET['id_empleado'];
?>
<div>
    <h1>Registro de Usuario</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <div class="formulario-container">
            <fieldset>
                <form class="formulario-form" action="procesar_usuario.php" method="post">
                    <input type="hidden" value="<?php echo $id_empleado ?>" name="id_empleado">
                    <input type="hidden" value="3" name="perfil">
                    <legend>Datos de usuario</legend>
                    <label class="formulario-label" for="usuario">Ingrese un usuario:</label>
                    <input class="formulario-input" type="text" name="usuario" id="usuario">
                    <label class="formulario-label">Ingrese una contrase&ntilde;a:</label>
                    <input class="formulario-input" type="password" name="password" id="password">
                    <button class="formulario-submit" type="submit">Confirmar</button>
                </form>
        </div>
        </fieldset>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>