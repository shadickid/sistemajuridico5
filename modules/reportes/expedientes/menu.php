<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>">algo</a>
    <span>/</span>
    <span>algo</span>
</div>
<div class="dashboard">
    <h1>Reportes</h1>
    <a href="<?php echo BASE_URL; ?>modules/reportes/menu.php" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div>
                <div>
                    <a href="<?php echo BASE_URL ?>modules\reportes\expedientes\cantidadExpedientes\listado.php">
                        <button type="button" class="generar">Cantidad de expedientes</button>
                    </a>
                </div>
                <div>
                    <a href="<?php echo BASE_URL ?>modules\reportes\expedientes\porEstado\listado.php">
                        <button type="button" class="generar">Por Estado</button>
                    </a>
                </div>
                <div>
                    <a href="<?php echo BASE_URL ?>modules\reportes\expedientes\porMovimiento\listado.php">
                        <button type="button" class="generar">Por Movimiento</button>
                    </a>
                </div>

            </div>
        </div>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>