<?php
include('../../config/database/connect.php');
require_once('../../config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_empleado = $_GET['id_empleado'];
?>
<div class="dashboard">
    <h1>Registro de Usuario</h1>

    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <fieldset>
                    <form class="formulario-form" action="procesar_usuario.php" method="post">
                        <input type="hidden" value="<?php echo $id_empleado ?>" name="id_empleado">
                        <input type="hidden" value="3" name="perfil">
                        <legend>Datos de usuario</legend>
                        <label class="formulario-label" for="usuario">Ingrese un usuario:</label>
                        <input class="formulario-input" type="text" name="usuario" id="usuario" autocomplete="off">
                        <label class="formulario-label">Ingrese una contrase&ntilde;a:</label>
                        <input class="formulario-input" type="password" name="password" id="password"
                            autocomplete="off">
                        <button class="formulario-submit" type="submit">Confirmar</button>
                    </form>
            </div>
        </div>
        </fieldset>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>