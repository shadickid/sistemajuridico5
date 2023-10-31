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
    <span>Expedientes</span>
</div>
<div class="dashboard">
    <h1>Listado de Expedientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\dashboard\dashboard.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">

        <div class="btn-filtro-container">
            <p></p>
        </div>

        <table class="tablamodal">
            <thead>
                <tr>
                    <th>Nombres y Apellidos/Raz&oacute;n Social</th>
                    <th>Nro de expediente</th>
                    <th>Car&aacute;tula</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Tipo</th>
                    <th>SubTipo</th>
                    <th>Estado</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <?php foreach ($expedienteF as $regExpF): ?>
                <tbody>

                    <tr class="clienteFisico">
                        <td>
                            <?php echo $regExpF['persona_nombre'] . ' ' . $regExpF['persona_apellido'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_nro'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_fecha_inicio'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_fecha_fin'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_tipo_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['subtipo_exp'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_estado_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_descripcon'] ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php foreach ($expedieneJ as $regExpJ): ?>
                    <tr class="clienteJuridico">
                        <td>
                            <?php echo $regExpJ['razon_social'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_nro'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_fecha_inicio'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_fecha_fin'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_tipo_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['subtipo_exp'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_estado_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_descripcon'] ?>
                        </td>

                    <?php endforeach ?>
                </tr>

            </tbody>
        </table>

    </section>
</div>


<?php
include(ROOT_PATH . 'includes\footter.php');
?>