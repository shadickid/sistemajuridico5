<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_expsubtipo = $_GET['id_expsubtipo'];
$conditional = [
    'id_expsubtipo' => $id_expsubtipo
];
$records = selectall('expediente_subtipo', $conditional);
foreach ($records as $reg) :

?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Expediente</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\expediente\tipo_de_sub_expediente\listado.php">subtipo de
            expediente</a>
        <span>/</span>
        <span>Modificar subtipo de expedientes </span>
    </div>
    <div class="dashboard">
        <h1> SUB TIPO DE EXPEDIENTE</h1>
        <a href="<?php echo BASE_URL; ?>modules\sistema\expediente\tipo_de_sub_expediente\listado.php" class="volver-atras-button">Volver Atr&aacute;s</a>
        <section class="inicio">
            <div class="contenido">
                <div class="formulario-container">
                    <h2>Modificacion de tipo de sub tipo</h2>
                    <form method="POST" action="procesarModificacion.php">
                        <label for="nombre" class="formulario-label">Nombre:</label>
                        <input type="text" class="formulario-input" name="nombre" value="<?php echo $reg['subtipo_exp'] ?>" autocomplete="off">
                        <input type="hidden" name="id_expsubtipo" value="<?php echo $reg['id_expsubtipo'] ?>">
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