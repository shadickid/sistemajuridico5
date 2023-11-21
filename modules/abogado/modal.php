<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config/database/functions/empleado.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_empleado = $_GET['id_empleado'];

?>
<div class="dashboard">
    <h1>Listado de abogados</h1>
    <section class="inicio">
        <div class="contenido">
            <section class="modal">
                <div class="modal_container">
                    <img src="<?php echo BASE_URL ?>assets\img\user.png" class="modal_img">
                    <h2 class="modal_titlev2">Atencion!</h2>
                    <p class="modal_parrafo">¿Quieres asignar un usuario al empleado ahora?
                    </p>
                    <div class="btn-modal-posisionamientoterritorial">
                        <a href="<?php echo BASE_URL ?>modules\abogado\listado.php" class="modal_close">No</a>
                        <a href="<?php echo BASE_URL ?>modules/usuario/registro.php?id_empleado=<?php echo $id_empleado ?>"
                            ; class="modal_aceptar">Si</a>
                    </div>
                </div>
            </section>
        </div>

    </section>

</div>
<?php

include(ROOT_PATH . 'includes\footter.php');
?>