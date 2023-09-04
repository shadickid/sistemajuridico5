<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_tipo_contacto = $_GET['id_tipo_contacto'];
$conditional = [
    'id_tipo_contacto' => $id_tipo_contacto
];
$records = selectall('tipo_contacto', $conditional);
foreach ($records as $reg):

    ?>
<div class="dashboard">
    <h1> Contacto</h1>
    <section class="inicio">
        <div class="contenido">

            <form method="POST" action="procesarModificacion.php">
                Nombre: <input type="text" name="nombre" value="<?php echo $reg['tipo_contacto_nombre'] ?>"
                    autocomplete="off">
                <input type="hidden" name="id_tipo_contacto" value="<?php echo $reg['id_tipo_contacto'] ?>">
                <input type="submit" value="Guardar">
            </form>
    </section>
</div>

<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>