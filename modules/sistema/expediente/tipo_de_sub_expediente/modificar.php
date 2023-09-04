<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_expsubtipo = $_GET['id_expsubtipo'];
$conditional = [
    'id_expsubtipo' => $id_expsubtipo
];
$records = selectall('expediente_subtipo', $conditional);
foreach ($records as $reg) :

?>
<div class="dashboard">
    <h1> SUB TIPO DE EXPEDIENTE</h1>
    <section class="inicio">
        <div class="contenido">
            <form method="POST" action="procesarModificacion.php">
                Nombre: <input type="text" name="nombre" value="<?php echo $reg['subtipo_exp'] ?>" autocomplete="off">
                <input type="hidden" name="id_expsubtipo" value="<?php echo $reg['id_expsubtipo'] ?>">
                <input type="submit" value="Guardar">
            </form>
        </div>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>