<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Reportes</span>
</div>

<div class="dashboard">
    <h1>REPORTES</h1>
    <a href="<?php echo BASE_URL; ?>index.php" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <div class="menu">
                <ul>
                    <li>
                        <a class="menu-item"
                            href="<?php echo BASE_URL; ?>modules\reportes\expedientes\listado.php">Expedientes</a>
                    </li>
                </ul>
            </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>
</div>
</section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>