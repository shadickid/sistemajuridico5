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
foreach ($records as $reg) :

?>
<div>
    <h1> Documento</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <form method="POST" action="procesarModificacion.php">
            Nombre: <input type="text" name="nombre" value="<?php echo $reg['expediente_tipo_nombre'] ?>"autocomplete="off">
            <input type="hidden" name="id_expediente_tipo" value="<?php echo $reg['id_expediente_tipo'] ?>">
            <input type="submit" value="Guardar">
        </form>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>