<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'config/database/functions/empleado.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$idPersonaFisica = $_GET['idPersonaFisica'];
$datosEmpleado = selectModificarDatosPersonalesEmpleado($idPersonaFisica);
foreach ($datosEmpleado as $regemp):
    ?>
<div class="dashboard">
    <h1>Listado de abogados</h1>
    <section class="inicio">
        <div class="contenido">
            <section class="modal">
                <div class="modal_container">
                    <img src="<?php echo BASE_URL ?>assets\img\maxresdefault2-removebg-preview.png" class="modal_img">
                    <h2 class="modal_title">Atencion!</h2>
                    <p class="modal_parrafo">Estas por dar de baja al abogado
                        <b>
                            <?php echo $regemp['persona_nombre'] . ' ' . $regemp['persona_apellido'] ?>
                        </b>
                    </p>
                    <div class="btn-modal-posisionamientoterritorial">
                        <a href="<?php echo BASE_URL ?>modules\abogado\listado.php" class="modal_close">Cerrar</a>
                        <a href="<?php echo BASE_URL ?>modules\abogado\procesarBorrar.php?&idEmpleado=<?php echo $regemp['id_empleado'] ?>"
                            class="modal_aceptar">Hola</a>
                    </div>
                </div>
            </section>
        </div>

    </section>

</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>