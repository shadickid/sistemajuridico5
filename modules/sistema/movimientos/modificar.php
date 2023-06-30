<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_tipo_proceso = $_GET['id_tipo_proceso'];
$conditional = [
    'estado' => 1
];
$records = selectall('movimiento_tipo_proceso', $conditional);
foreach ($records as $reg) :

?>
    <div>
        <h1> MOVIMIENTO</h1>
    </div>
    <div class="contenedor">
        <section class="inicio">
            <form method="POST" action="procesarModificacion.php">
                Nombre: <input type="text" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                <input type="hidden" name="id_tipo_proceso" value="<?php echo $reg['id_tipo_proceso'] ?>">
                <input type="submit" value="Guardar">
            </form>
        </section>
    </div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>