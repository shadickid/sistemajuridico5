<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$conditional = [
    'activo' => 1
];
$records = selectall('perfil', $conditional);
?>
<div>
    <h1> PERFIL</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <a href="alta.php">Nuevo Perfil</a>
        <table>
            <tr>
                <th>ID Perfil</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Borrar</th>

            </tr>
            <?php foreach ($records as $reg) : ?>
            <tr>
                <td><?php echo $reg['id_perfil'] ?></td>
                <td><?php echo $reg['descripcion'] ?></td>
                <td>
                    <a href="modificar.php?id_perfil=<?php echo $reg['id_perfil'] ?>"><i class="fi fi-rr-edit"></i></a>
                </td>
                <td>
                    <a href="eliminar.php?id_perfil=<?php echo $reg['id_perfil'] ?>"><i class="fi-rr-eraser"></i></a>
                </td>

            </tr>
            <?php endforeach ?>
        </table>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>