<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');


$id_localidad = $_GET['id_localidad'];
$conditional = [
    'id_localidad' => $id_localidad
];
$localidad = selectall('localidad', $conditional);
$provincia = selectall('provincia');
foreach ($localidad as $reglocalidad) :
?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\localidad\listado.php">Localidad</a>
        <span>/</span>
        <span>Modificaci&oacute;n de localidad</span>
    </div>

    <div class="dashboard">
        <h1>Localidad</h1>
        <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\localidad\listado.php" class="volver-atras-button">Volver
            Atr&aacute;s</a>
        <section class="inicio">
            <div class="contenido">
                <h2>Modificacion de localidad</h2>
                <form method="POST" action="procesarModificacion.php">

                    <label for="nombre">Nombre:</label>
                    <input class="formulario-input" type="text" name="nombre" value="<?php echo $reglocalidad['nombre'] ?>" autocomplete="off">
                    <input type="hidden" name="id_localidad" value="<?php echo $reglocalidad['id_localidad'] ?>">
                    <label class="formulario-label" for="provincia">Selecione la provincia</label>
                    <select class="formulario-select" name="provincia">
                        <option value="0">--Seleccione--</option>
                        <?php foreach ($provincia as $regprovincia) : ?>
                            <option value="<?php echo $regprovincia['id_provincia']; ?>" <?php if ($regprovincia['id_provincia'] == $reglocalidad['id_provincia']) echo 'selected'; ?>>
                                <?php echo $regprovincia['nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>

                    <input class="formulario-submit" type="submit" value="Guardar">
                </form>
            </div>
        </section>
    </div>

<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>