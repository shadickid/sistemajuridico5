<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_atri_dom = $_GET['id_atri_dom'];
$conditional = [
    'id_atri_dom' => $id_atri_dom
];
$records = selectall('atributo_domiclio', $conditional);
foreach ($records as $reg) :

?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\atributo_de_domicilio\listado.php">Atributo Domicilio</a>
        <span>/</span>
        <span>Modificaci&oacute; de atributo domicilio</span>
    </div>
    <div class="dashboard">
        <h1>Atributo de domicilio</h1>
        <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\atributo_de_domicilio\listado.php" class="volver-atras-button">Volver
            Atr&aacute;s</a>
        <section class="inicio">
            <div class="contenido">
                <form method="POST" action="procesarModificacion.php">
                    Nombre: <input type="text" class="formulario-input" name="nombre" value="<?php echo $reg['valor'] ?>" autocomplete="off">
                    <input type="hidden" name="id_atri_dom" value="<?php echo $reg['id_atri_dom'] ?>">
                    <input class="formulario-submit" type="submit" value="Guardar">
                </form>
            </div>
        </section>
    </div>

<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>