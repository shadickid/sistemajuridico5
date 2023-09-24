<?php
/* require_once('../../../config/path.php'); */

require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');

$localidad = selectall('localidad',);
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\barrio\listado.php">Barrio</a>
    <span>/</span>
    <span>Alta de Barrio</span>

</div>
<div class="dashboard">
    <h1>Barrio</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\barrio\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Alta de nuevo barrio</h2>
            <form action="procesarAlta.php" method="POST">
                <label class="formulario-label" for="id_localidad">Selecione la localidad </label>
                <select class="formulario-select" name="id_localidad">
                    <option value="0">--Selecione--</option>
                    <?php foreach ($localidad as $reg) : ?>
                        <option value="<?php echo $reg['id_localidad'] ?>"><?php echo $reg['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
                <label for="nombre" class="formulario-label"> Nombre:</label>
                <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                <input class="formulario-submit" type="submit" value="Guardar">
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>