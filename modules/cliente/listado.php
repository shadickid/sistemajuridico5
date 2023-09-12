<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');

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
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres y Apellidos</th>
                        <th>Tipo de Cliente</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tfoot>
            </table>
        </div>
    </section>
</div>