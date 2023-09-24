<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');


$id_barrio = $_GET['id_barrio'];
$conditional = [
    'id_barrio' => $id_barrio
];
$barrio = selectall('barrio', $conditional);
$localidad = selectall('localidad');
foreach ($barrio as $regbarrio) :
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
    <span>Modificaci&oacute;n de barrio</span>
</div>

<div class="dashboard">
    <h1>Barrio</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\barrio\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Modificacion barrio</h2>
            <form method="POST" action="procesarModificacion.php">
                <label for="nombre" class="formulario-label">Nombre:</label>
                <input type="text" class="formulario-input" name="nombre" value="<?php echo $regbarrio['nombre'] ?>"
                    autocomplete="off">
                <input type="hidden" name="id_barrio" value="<?php echo $regbarrio['id_barrio'] ?>">
                <label for="localidad" class="formulario-label">Selecione la localidad</label>
                <select name="localidad" class="formulario-select">
                    <option value="0">--Seleccione--</option>
                    <?php foreach ($localidad as $reglocalidad) : ?>
                    <option value="<?php echo $reglocalidad['id_localidad']; ?>"
                        <?php if ($regbarrio['id_localidad'] == $reglocalidad['id_localidad']) echo 'selected'; ?>>
                        <?php echo $reglocalidad['nombre'] ?>
                    </option>
                    <?php endforeach ?>
                </select>

                <input type="submit" class="formulario-submit" value="Guardar">
            </form>
        </div>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>