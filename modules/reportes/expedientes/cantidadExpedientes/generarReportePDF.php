<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/functions/expediente.php';
include(ROOT_PATH . 'config/database/functions/bd_functions.php');

// Obtener parámetros del filtro
$expTipo = isset($_GET['expTipo']) ? $_GET['expTipo'] : null;
$expSubTipo = isset($_GET['expSubTipo']) ? $_GET['expSubTipo'] : null;
if ($expTipo == 50) {
    $registro = obtenerListadoExpediente($expSubTipo, $expTipo);
    $registrosj = obtenerListadoExpedienteJ($expSubTipo, $expTipo);
    $tipo = 'Todos';
    $subtipo = 'Todos';

    $totalExpedientes = count($registro) + count($registrosj);
} else {
    // Obtener datos para el informe
    $registro = obtenerListadoExpediente($expSubTipo, $expTipo);
    $registrosj = obtenerListadoExpedienteJ($expSubTipo, $expTipo);

    foreach ($registro as $tipoysubtipo) {
        $tipo = $tipoysubtipo['expediente_tipo_nombre'];
        $subtipo = $tipoysubtipo['subtipo_exp'];
    }
    // Total de expedientes
    $totalExpedientes = count($registro) + count($registrosj);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Expedientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #informe {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            position: relative;
        }

        #logo {
            position: absolute;
            top: -20px;
            left: -100px;
            max-width: 80px;
        }

        #filtros {
            background-color: #7EC8E3;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        #filtros-info {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            margin-top: 10px;
        }

        #logo img {
            max-width: 100%;
            height: auto;
        }

        @media print {
            body {
                font-family: Arial, sans-serif;
            }

            #informe {
                width: 100%;
                margin: 0;
            }

            #logo img {
                display: block;
                position: absolute;
                top: -20px;
                left: -100px;
                max-width: 80px;
            }

            #filtros {
                background-color: #7EC8E3;
                color: white;
                padding: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 10px;
            }

            #filtros-info {
                display: flex;
                flex-direction: column;
                text-align: left;
            }

            #filtros-info p {
                margin: 0;
                color: black;
                /* Cambia el color del texto para mejorar la legibilidad */
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 20px;
            }

            th,
            td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }

            .total {
                text-align: right;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <div id="informe">
        <div id="logo">
            <img src="<?php echo BASE_URL; ?>assets\img\Logo_Renzo_Law.png" class="logo" />
        </div>

        <h1>Informe de Expedientes</h1>

        <div id="filtros">
            <div id="filtros-info">
                <p>Filtros Utilizados:</p>
                <p><strong>Tipo:</strong>
                    <?php echo $tipo; ?>
                </p>
                <p><strong>Subtipo:</strong>
                    <?php echo $subtipo; ?>
                </p>
            </div>
        </div>

        <h2>Expedientes:</h2>
        <table class="tablamodal">
            <thead>
                <tr>
                    <th>Nombre Persona/Razon Social</th>
                    <th>Número Expediente</th>
                    <th>Caratula</th>
                    <th>Fecha Inicio</th>
                    <th>Tipo Expediente</th>
                    <th>Subtipo Expediente</th>
                    <th>Estado Expediente</th>
                    <th>Descripción Expediente</th>
                    <th>Fecha Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registro as $reg): ?>
                    <tr>
                        <td>
                            <?php echo $reg['persona_nombre'] . ' ' . $reg['persona_apellido']; ?>
                        </td>
                        <td>
                            <?php echo $reg['expediente_nro']; ?>
                        </td>
                        <td>
                            <?php echo $reg['expediente_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $reg['expediente_fecha_inicio']; ?>
                        </td>
                        <td>
                            <?php echo $reg['expediente_tipo_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $reg['subtipo_exp']; ?>
                        </td>
                        <td>
                            <?php echo $reg['expediente_estado_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $reg['expediente_descripcon']; ?>
                        </td>
                        <td>
                            <?php echo $reg['expediente_fecha_fin']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($registrosj as $registrosj): ?>
                    <tr>
                        <td>
                            <?php echo $registrosj['razon_social'] ?>
                        </td>
                        <td>
                            <?php echo $registrosj['expediente_nro']; ?>
                        </td>
                        <td>
                            <?php echo $registrosj['expediente_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $registrosj['expediente_fecha_inicio']; ?>
                        </td>
                        <td>
                            <?php echo $registrosj['expediente_tipo_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $registrosj['subtipo_exp']; ?>
                        </td>
                        <td>
                            <?php echo $registrosj['expediente_estado_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $registrosj['expediente_descripcon']; ?>
                        </td>
                        <td>
                            <?php echo $registrosj['expediente_fecha_fin']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <div class="total">
            <p>Total de expedientes:
                <?php echo $totalExpedientes; ?>
            </p>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        window.print()
    })
</script>

</html>