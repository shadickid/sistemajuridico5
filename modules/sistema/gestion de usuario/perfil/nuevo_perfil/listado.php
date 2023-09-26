<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$conditional = [
    'activo' => 1
];
$records = selectall('perfil', $conditional);
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <span>Perfil</span>
</div>
<div class="dashboard">
    <h1>Perfil</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div>
                <a href="alta.php" class="a-alta">Nuevo perfil</a>
            </div>
            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                        <th>Asignar Modulo</th>
                    </tr>
                </thead>
                <?php foreach ($records as $regperf) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $regperf['id_perfil'] ?></td>
                        <td><?php echo $regperf['descripcion'] ?></td>
                        <td><a href="modificar.php?id_perfil=<?php echo $regperf['id_perfil'] ?>">
                                <button class="editarButton">
                                    <i class="fi fi-rr-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td><a href="eliminar.php?id_perfil=<?php echo $regperf['id_perfil'] ?>">
                                <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                </button>
                            </a>
                        </td>
                        <td><a
                                href="asignarModulo.php?id_perfil=<?php echo $regperf['id_perfil'] ?>&descripcion=<?php echo $regperf['descripcion'] ?>">
                                <button class="darDeAltaModuloButton">
                                    <i class="fi fi-rr-add"></i>
                                </button>
                            </a>
                        </td>
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