<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes/nav.php');
$expedienteF = listadoExpedienteFisico();
$expedieneJ = listadoExpedienteJ();

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Reporte</span>
    <span>/</span>
    <span>Expedientes</span>
</div>
<div class="dashboard">
    <h1>Reportes de Expedientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\dashboard\dashboard.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">

        <div class="btn-filtro-container">
            <p>Cantidad de expedientes</p>
        </div>

    </section>
</div>


<?php
include(ROOT_PATH . 'includes\footter.php');
?>