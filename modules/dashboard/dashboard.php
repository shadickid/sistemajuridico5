<?php
require_once('../../config/path.php');
include(ROOT_PATH . 'config\database\functions\expediente.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$connect->query("SET lc_time_names = 'es_ES'");
$datosGrafico = obtenerDatosExpedientesParaGrafico();
$resultados2022 = $datosGrafico['2022'];
$resultados2023 = $datosGrafico['2023'];
$dataPoints1 = [];
$dataPoints2 = [];

foreach ($resultados2022 as $cantidadMensual) {
    $dataPoints1[] = array("label" => $cantidadMensual['nombre_mes'], "y" => $cantidadMensual['cantidad_expedientes']);
}
foreach ($resultados2023 as $cantidadMensual) {
    $dataPoints2[] = array("label" => $cantidadMensual['nombre_mes'], "y" => $cantidadMensual['cantidad_expedientes']);
}

?>

<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Bienvenido al sistema</span>
</div>

<div class="dashboard">

    <h1>Bienvenido al sistema</h1>

    <section class="inicio">
        <div class="contenido">
            <?php if ($mostrarModal): ?>
                <div id="modalCambiarContrasena" title="Cambiar Contraseña">
                    <p>Se ha restablecido la contraseña, por favor ingrese la nueva</p>

                    <form action="cambiarContrasena.php" method="post" id="cambiarContrasenaForm">
                        <label for="nuevaContrasena">Nueva Contraseña:</label>
                        <input type="password" id="nuevaContrasena" name="nuevaContrasena" required>

                        <label for="confirmarContrasena">Confirmar Contraseña:</label>
                        <input type="password" id="confirmarContrasena" name="confirmarContrasena" required>
                        <input type="hidden" name="idUsuario" value=<?php echo $_SESSION['id_usuario'] ?>>
                        <button type="submit" name="submit" id="guardar" class="formulario-submit"> Guardar </button>
                    </form>
                </div>

            <?php endif; ?>
            <div id="chartContainer" style="height:370px;width:500px"></div>

        </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>
<script>
    $(document).ready(function () {
        let chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Comparacion de expedientes",
            },
            axisY: {
                title: "Cantidad de expediente del mes",
            },
            axisX: {
                title: "Mes",
                interval: 1,
            },
            data: [{
                type: "column",
                name: "2022",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }, {
                type: "column",
                name: "2023",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });

        chart.render();
    });
</script>