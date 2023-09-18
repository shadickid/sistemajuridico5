<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\atributo_de_domicilio\listado.php">Atributo Domicilio</a>
    <span>/</span>
    <span>Alta de atributo domicilio</span>
</div>
<div class="dashboard">
    <h1>ATRIBUTO DE DOMICILIO</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\atributo_de_domicilio\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo atributo de domicilio</h2>
                <form action="procesarAlta.php" method="POST">
                    <div>
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