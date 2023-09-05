<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_tipo_dom = $_GET['id_tipo_dom'];
$conditional = [
    'id_tipo_dom' => $id_tipo_dom
];
$records = selectall('tipo_dom', $conditional);
foreach ($records as $reg):

    ?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\tipo_de_domicilio\listado.php">Tipo de domicilio</a>
        <span>/</span>
        <span>Modificar tipo de domicilio</span>
    </div>
    <div class="dashboard">
        <h1>TIPO DE DOMICILIO</h1>
        <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atr&aacute;s</a>
        <section class="inicio">
            <div class="contenido">
                <form method="POST" action="procesarModificacion.php">
                    Nombre: <input type="text" name="nombre" value="<?php echo $reg['valor'] ?>" autocomplete="off">
                    <input type="hidden" name="id_tipo_dom" value="<?php echo $reg['id_tipo_dom'] ?>">
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </section>
    </div>
    <?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>