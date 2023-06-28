<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_tipo_documento = $_GET['id_tipo_documento'];
$conditional = [
    'id_tipo_documento' => $id_tipo_documento
];
$records = selectall('documento', $conditional);
foreach ($records as $reg) :

?>
<div>
    <h1> Documento</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <form method="POST" action="procesarModificacion.php">
            Nombre: <input type="text" name="nombre" value="<?php echo $reg['descripcion'] ?>" autocomplete="off">
            <input type="hidden" name="id_tipo_documento" value="<?php echo $reg['id_tipo_documento'] ?>">
            <input type="submit" value="Guardar">
        </form>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>