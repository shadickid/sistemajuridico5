<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_tipo_contacto = $_GET['id_tipo_contacto'];
$conditional = [
    'id_tipo_contacto' => $id_tipo_contacto
];
$records = selectall('tipo_contacto', $conditional);
foreach ($records as $reg) :

?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\contacto\listado.php">Contacto</a>
        <span>/</span>
        <span>Modificar Contacto</span>
    </div>
    <div class="dashboard">
        <h1> Contacto</h1>
        <a href="<?php echo BASE_URL ?>modules\sistema\contacto\listado.php" class="volver-atras-button">Volver Atrás</a>
        <section class="inicio">
            <div class="contenido">
                <div class="formulario-container">
                    <h2>Modificacion tipo de contacto</h2>
                    <form method="POST" action="procesarModificacion.php">
                        Nombre: <input class="formulario-input" type="text" name="nombre" value="<?php echo $reg['tipo_contacto_nombre'] ?>" autocomplete="off">
                        <input class="formulario-input" type="hidden" name="id_tipo_contacto" value="<?php echo $reg['id_tipo_contacto'] ?>">
                        <input class="formulario-submit" type="submit" value="Guardar">
                    </form>
                </div>
        </section>
    </div>

<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>