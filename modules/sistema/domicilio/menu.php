<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div>
    <h1>DOMICILIO</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <div class="menu">
            <div class="menu-items">
                <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/pais/listado.php">Pais</a>
                <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/provincia/listado.php">Provincia</a>
            </div>
            <div class="menu-items">
                <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/localidad/listado.php">Localidad</a>
                <a href="#">Barrio</a>
            </div>
            <div class="menu-items">
                <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/atributo_de_domicilio/listado.php">Atributos de
                    domicilio</a>
                <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/tipo_de_domicilio/listado.php">Tipo
                    domicilio</a>
            </div>
        </div>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>