<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');


$id_provincia = $_GET['id_provincia'];
$conditional_prov = [
    'id_provincia' => $id_provincia
];
$pais = selectAll('pais');
$provincia = selectall('provincia', $conditional_prov);
foreach ($provincia as $regprovincia) :
?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Domicilio</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\provincia\listado.php">Provincia</a>
        <span>/</span>
        <span>Modificacion de provincia</span>
    </div>
    <div class="dashboard">
        <h1>Provincia</h1>
        <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\provincia\listado.php" class="volver-atras-button">Volver
            Atr&aacute;s</a>
        <section class="inicio">
            <div class="contenido">
                <h2>Modificar Provincia</h2>
                <form method="POST" action="procesarModificacion.php">
                    <input type="hidden" name="id_provincia" value="<?php echo $id_provincia; ?>">
                    <label class="formulario-label" for="pais">Seleccione el pais:</label>
                    <select name="pais" class="formulario-select">
                        <option value="0">--Seleccione--</option>
                        <?php foreach ($pais as $regpais) : ?>
                            <option value="<?php echo $regpais['id_pais']; ?>" <?php if ($regprovincia['id_pais'] == $regpais['id_pais']) echo 'selected'; ?>>
                                <?php echo $regpais['nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <label class="formulario-label" for="nombre">Nombre:</label>
                    <input type="text" class="formulario-input" name="nombre" value="<?php echo $regprovincia['nombre'];  ?>" autocomplete="off">
                    <input type="submit" class="formulario-submit" value="Guardar">
                </form>
            </div>
        </section>
    </div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>