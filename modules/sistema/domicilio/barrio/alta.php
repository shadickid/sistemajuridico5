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
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\barrio\listado.php">Barrio</a>
    <span>/</span>
    <span>Alta de Barrio</span>

</div>
<div class="dashboard">
    <h1>Nuevo Barrio</h1>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo barrio</h2>
                <form action="procesarAlta.php" method="POST">
                    <div class="input-control">
                        <label class="formulario-label" for="id_localidad">Selecione la localidad </label>
                        <select class="formulario-select" name="id_localidad">
                            <?php foreach ($localidad as $reg) : ?>
                                <option value="<?php echo $reg['id_localidad'] ?>"><?php echo $reg['nombre'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <legend> Nombre:
                            <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                            <input class="formulario-submit" type="submit" value="Guardar">
                        </legend>
                    </div>
            </div>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>