<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_tipo_proceso = $_GET['id_tipo_proceso'];
$conditional = [
    'id_tipo_proceso' => $id_tipo_proceso
];
$records = selectall('movimiento_tipo_proceso', $conditional);
foreach ($records as $reg) :

?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Expediente</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\movimientos\listado.php">Movimiento de expedientes</a>
        <span>/</span>
        <span>Modificar movimiento de expediente</span>
    </div>
    <div class="dashboard">
        <h1>MOVIMIENTO DE EXPEDIENTE</h1>
        <a href="<?php echo BASE_URL ?>modules\sistema\movimientos\listado.php" class="volver-atras-button">Volver
            Atr&aacute;s</a>
        <section class="inicio">
            <div class="contenido">
                <div class="formulario-container">
                    <h2>Modificacion de movimineto de expediente</h2>
                    <form method="POST" action="procesarModificacion.php">
                        <label for="nombre" class="formulario-label">Nombre:</label>
                        <input type="text" class="formulario-input" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                        <input type="hidden" name="id_tipo_proceso" value="<?php echo $reg['id_tipo_proceso'] ?>">
                        <input type="submit" class="formulario-submit" value="Guardar">
                    </form>
                </div>
            </div>
        </section>
    </div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>