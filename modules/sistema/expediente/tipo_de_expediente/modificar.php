<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_expediente_tipo = $_GET['id_expediente_tipo'];
$conditional = [
    'id_expediente_tipo' => $id_expediente_tipo
];
$records = selectall('expediente_tipo', $conditional);
foreach ($records as $reg):

    ?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\expediente\menu.php">Expediente</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\expediente\tipo_de_expediente\listado.php">Tipo de
            expediente</a>
        <span>/</span>
        <span>Modificar tipo de expedientes </span>
    </div>
    <div class="dashboard">
        <h1> TIPO DE EXPEDIENTE</h1>
        <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atr&aacute;s</a>
        <section class="inicio">
            <div class="contenido">
                <form method="POST" action="procesarModificacion.php">
                    Nombre: <input class="formulario-input" type="text" name="nombre"
                        value="<?php echo $reg['expediente_tipo_nombre'] ?>" autocomplete="off">
                    <input type="hidden" name="id_expediente_tipo" value="<?php echo $reg['id_expediente_tipo'] ?>">
                    <input class="formulario-submit" type="submit" value="Guardar">
                </form>
            </div>
        </section>
    </div>
    <?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>