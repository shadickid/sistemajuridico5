<?php
/* require_once('../../../config/path.php'); */

require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');

$pais = selectall('pais');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\provincia\listado.php">Provincia</a>
    <span>/</span>
    <span>Alta de provincia</span>
</div>
<div class="dashboard">
    <h1> Nueva Provincia</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\provincia\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Alta de nueva provincia</h2>
            <form action="procesarAlta.php" method="POST">
                <div class="input-control">
                    <label class="formulario-label" for="id_pais">Selecione el pais </label>
                    <select name="id_pais" class="formulario-select">
                        <?php foreach ($pais as $reg) : ?>
                        <option value="<?php echo $reg['id_pais'] ?>"><?php echo $reg['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                    Nombre:<input type="text" class="formulario-input" name="nombre" autocomplete="off">
                    <input type="submit" class="formulario-submit" value="Guardar">
                </div>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>