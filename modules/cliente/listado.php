<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
$datosclientes = datosClientes();
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Cliente</span>
</div>
<div class="dashboard">
    <h1>Listado de clientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\dashboard\dashboard.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div>
                <a href="formularioCliente.php" class="a-alta">Nuevo Cliente</a>
            </div>
            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>Nombres y Apellidos/Razon Social</th>
                        <th>Tipo de Persona</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <?php foreach ($datosclientes as $regcliente) : ?>
                <tbody>
                    <tr>

                        <td><?php echo $regcliente['nombre'] .' '. $regcliente['apellido'] ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>