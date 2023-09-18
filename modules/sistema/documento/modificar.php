<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_tipo_documento = $_GET['id_tipo_documento'];
$conditional = [
    'id_tipo_documento' => $id_tipo_documento
];
$records = selectall('documento', $conditional);
foreach ($records as $reg) :

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\contacto\listado.php">Documento</a>
    <span>/</span>
    <span>Modificar documento</span>
</div>
<div class="dashboard">
    <h1> Documento</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">

            <form method="POST" action="procesarModificacion.php">
                Nombre:<input class="formulario-input" type="text" name="nombre"
                    value="<?php echo $reg['descripcion'] ?>" autocomplete="off">
                <input type="hidden" name="id_tipo_documento" value="<?php echo $reg['id_tipo_documento'] ?>">
                <input class="formulario-submit" type="submit" value="Guardar">
            </form>
        </div>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>