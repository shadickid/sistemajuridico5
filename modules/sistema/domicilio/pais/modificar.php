<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_pais = $_GET['id_pais'];
$conditional = [
    'id_pais' => $id_pais
];
$records = selectall('pais', $conditional);
foreach ($records as $reg) :

?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Domicilio</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\pais\listado.php">Pais</a>
        <span>/</span>
        <span>Modificar pais</span>
    </div>
    <div class="dashboard">
        <h1>PAIS</h1>
        <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\pais\listado.php" class="volver-atras-button">Volver
            Atr&aacute;s</a>

        <section class="inicio">
            <div class="contenido">
                <div class="formulario-container">
                    <h2>Modificacion de pais</h2>
                    <form method="POST" action="procesarModificacion.php">
                        <label for="nombre" class="formulario-label">Nombre:</label>
                        <input class="formulario-input" type="text" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                        <input type="hidden" name="id_pais" value="<?php echo $reg['id_pais'] ?>">
                        <input class="formulario-submit" type="submit" value="Guardar">
                    </form>
                </div>
            </div>
        </section>
    </div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>