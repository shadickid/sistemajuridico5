<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/functions/expediente.php';
include(ROOT_PATH . 'config/database/functions/bd_functions.php');

$expedienteId = isset($_GET['expedientes']) ? $_GET['expedientes'] : null;
$fechaInicio = isset($_GET['fechaInicio']) ? $_GET['fechaInicio'] : null;
$fechaFin = isset($_GET['fechaFin']) ? $_GET['fechaFin'] : null;

$listado = obtenerExpedienteporId($expedienteId, $fechaInicio, $fechaFin);

$totalExpedientes = count($listado);
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
                <p><strong>Fecha Desde:
                        <?php echo $fechaInicio ?>
                        <?php ?>
                    </strong>
                </p>
                <p><strong>Fecha Hasta:
                        <?php echo $fechaFin ?>
                        <?php ?>
                    </strong>
                </p>
            </div>
        </div>

        <h2>Expedientes:</h2>
        <table class="tablamodal">
            <thead>
                <tr>

                    <th>Número Expediente</th>
                    <th>Nombre Expediente</th>
                    <th>Fecha Inicio</th>
                    <th>Tipo de Movimiento</th>
                    <th>Descripción Movimiento</th>
                    <th>Responsable</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listado as $reg): ?>
                    <tr>
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
                            <?php echo $reg['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $reg['movimiento_descripcion']; ?>
                        </td>
                        <td>
                            <?php echo $reg['usuario_nombre']; ?>
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