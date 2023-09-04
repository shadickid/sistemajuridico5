<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_pais = $_GET['id_pais'];
$conditional = [
    'id_pais' => $id_pais
];
$records = selectall('pais', $conditional);
foreach ($records as $reg):

    ?>
<div class="dashboard">
    <h1>PAIS</h1>
    <section class="inicio">
        <div class="contenido">
            <form method="POST" action="procesarModificacion.php">
                Nombre: <input type="text" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                <input type="hidden" name="id_pais" value="<?php echo $reg['id_pais'] ?>">
                <input type="submit" value="Guardar">
            </form>
        </div>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>