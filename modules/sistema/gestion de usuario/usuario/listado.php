<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/usuario.php');

$usuario = consultarUsuarioPerfil();

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <span>Usuario</span>
</div>
<div class="dashboard">
    <h1>Usuario</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div>
                <a href="alta.php" class="a-alta">Nuevo usuario</a>
            </div>
            <div class="msj-container" id="msj-container">
                <?php switch ($vali):
                    case 1: ?>
                        <span class="msj-success show">Se ha agregado correctamente</span>
                        <?php
                        break;
                    case 2: ?>
                        <span class="msj-modify show">Se ha modificado correctamente</span>
                        <?php
                        break;
                    case 3: ?>
                        <span class="msj-delete show">Se ha borrado un correctamente</span>
                        <?php
                        break;
                    case 4: ?>
                        <span class="msj-error show">Se ha producido un error correctamente</span>
                <?php endswitch ?>
            </div>

            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Contrasena</th>
                        <th>Perfil</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <?php foreach ($usuario as $regusuarios): ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $regusuarios['id_usuario'] ?>
                            </td>
                            <td>
                                <?php echo $regusuarios['usuario_nombre'] ?>
                            </td>
                            <td><a href="contrasena.php?id_usuario=<?php echo $regusuarios['id_usuario'] ?>">
                                    <button class="greenButton">
                                        <i class="fi-rr-unlock"></i>
                                    </button>
                                </a>
                            </td>
                            </td>
                            <td>
                                <?php echo $regusuarios['descripcion'] ?>
                            </td>
                            <td><a href="modificar.php?id_usuario=<?php echo $regusuarios['id_usuario'] ?>">
                                    <button class="editarButton">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td><a href="eliminar.php?id_usuario=<?php echo $regusuarios['id_usuario'] ?>">
                                    <button class="darDeBajaButton">
                                        <i class="fi-rr-eraser"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>