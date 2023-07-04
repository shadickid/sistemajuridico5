<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
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
                <th>Cliente</th>
                <th>Tipo de proceso</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>pdf</th>

            </tr>
        </table>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>