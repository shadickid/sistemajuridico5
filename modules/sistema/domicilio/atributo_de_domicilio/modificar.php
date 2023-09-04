<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_atri_dom = $_GET['id_atri_dom'];
$conditional = [
    'id_atri_dom' => $id_atri_dom
];
$records = selectall('atributo_domiclio', $conditional);
foreach ($records as $reg):

    ?>
<div class="dashboard">
    <h1>Atributo de domicilio</h1>
    <section class="inicio">
        <div class="contenido">
            <form method="POST" action="procesarModificacion.php">
                Nombre: <input type="text" name="nombre" value="<?php echo $reg['valor'] ?>" autocomplete="off">
                <input type="hidden" name="id_atri_dom" value="<?php echo $reg['id_atri_dom'] ?>">
                <input type="submit" value="Guardar">
            </form>
        </div>
    </section>
</div>

<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>