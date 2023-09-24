<?php
/* require_once('../../../config/path.php'); */

require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');

$prov = selectall('provincia');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\localidad\listado.php">Localidad</a>
    <span>/</span>
    <span>Alta de localidad</span>
</div>

<div class="dashboard">
    <h1>Localidad</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\localidad\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Alta de nueva localidad</h2>
            <form action="procesarAlta.php" method="POST">
                <label class="formulario-label" for="id_provincia">Selecione la provincia </label>
                <select class="formulario-select" name="id_provincia">
                    <option value="0">--Selecione--</option>
                    <?php foreach ($prov as $reg) : ?>
                        <option value="<?php echo $reg['id_provincia'] ?>"><?php echo $reg['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
                <label for="nombre" class="formulario-label">Nombre:</label>
                <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                <input class="formulario-submit" type="submit" value="Guardar">
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>