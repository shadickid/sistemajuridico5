<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_perfil = $_GET['id_perfil'];
$conditional = [
    'id_perfil' => $id_perfil
];
$records = selectall('perfil', $conditional);
foreach ($records as $reg) :

?>
<div>
    <h1> PERFIL</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <form method="POST" action="procesarModificacion.php">
            Nombre: <input type="text" name="nombre" value="<?php echo $reg['descripcion'] ?>" autocomplete="off">
            <input type="hidden" name="id_perfil" value="<?php echo $reg['id_perfil'] ?>">
            <input type="submit" value="Guardar">
        </form>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>