<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\bd_functions.php');
$idsexo = $_GET['idsexo'];

$conditional = [
    'id_sexo' => $idsexo
];
$sexos = selectall('sexo', $conditional);
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\menu.php">Usuario</a>
    <span>/</span>
    <span>Listado de sexo</span>
</div>
<div class="dashboard">
    <h1> Sexo</h1>
    <a href="listado.php" class="volver-atras-button">Volver Atr&aacute;s</a>

    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Modificar tipo de sexo</h2>
                <form id="form-sex" action="procesarModificacion.php" method="POST">
                    <div>
                        <?php foreach ($sexos as $regsex) : ?>
                            <legend> Nombre:
                                <input type="hidden" name="idsexo" value="<?php echo $regsex['id_sexo'] ?>" />
                                <input class="formulario-input" type="text" name="nombre" id="nombre" autocomplete="off" value="<?php echo $regsex['nombre'] ?>">
                                <button onclick="validar()" id="formulario-submit" class="formulario-submit" type="button" value="Guardar">Guardar</button>
                            </legend>
                        <?php endforeach ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>