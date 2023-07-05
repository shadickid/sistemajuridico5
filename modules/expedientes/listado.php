<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$expediente = listadoExpediente();

?>
<div>
    <h1> Expediente</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <a href="">Nueva alta de expediente</a>
        <table border=1px>
            <tr>
                <th>Caratula</th>
                <th>Fecha de inicio</th>
                <th>Fecha de finalizacion</th>
                <th>Cliente</th>
                <th>Tipo de proceso</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>pdf</th>
            </tr>
            <tr>
                <?php foreach ($expediente as $reg): ?>
                <td>
                    <?php echo $reg['expediente_nro'] . " " . $reg['expediente_nombre'] ?>
                </td>
                <td>
                    <?php echo $reg['expediente_fecha_inicio'] ?>
                </td>
                <td>
                    <?php echo $reg['expediente_fecha_fin'] ?>
                </td>
                <td>
                    <?php echo $reg['persona_nombre'] . " " . $reg['persona_apellido'] ?>
                </td>
                <td>
                    <?php echo $reg['expediente_tipo_nombre'] . " " . $reg['subtipo_exp'] ?>
                </td>
                <td>
                    <?php echo $reg['expediente_descripcon'] ?>
                </td>
                <td>
                    <?php echo $reg['expediente_estado_nombre'] ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>