<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_modulo = $_GET['id_modulo'];
$conditional = [
    'id_modulo' => $id_modulo
];
$records = selectall('modulo', $conditional);
foreach ($records as $reg) :
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\modulo\listado.php">Modulo</a>
    <span>/</span>
    <span>Modificar Modulo </span>
</div>
<div class="dashboard">
    <h1>Modulo</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\modulo\listado.php"
        class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Modificacion de modulo</h2>
                <form action="procesarModificacion.php" method="POST">
                    <div>
                        <legend>
                            Nombre:
                            <input class="formulario-input" type="text" name="nombre"
                                value="<?php echo $reg['descripcion'] ?>" autocomplete="off">
                            <input type="hidden" name="id_modulo" value="<?php echo $reg['id_modulo'] ?>">
                            <input class="formulario-submit" type="submit" value="Guardar">
                        </legend>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>