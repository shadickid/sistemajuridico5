<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');


$id_provincia = $_GET['id_provincia'];
$conditional_prov = [
    'id_provincia' => $id_provincia
];
$records = selectall('provincia', $conditional_prov);

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\provincia\listado.php">Provincia</a>
    <span>/</span>
    <span>Modificacion de provincia</span>
</div>
<div class="dashboard">
    <h1> Modificar Provincia</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\provincia\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <form method="POST" action="procesarModificacion.php">

                <?php foreach ($records as $reg) : ?>
                    Nombre: <input type="text" class="formulario-input" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                    <input type="hidden" name="id_provincia" value="<?php echo $reg['id_provincia'] ?>">
                    <label class="formulario-label" for="pais">Selecione el pais
                        <select class="formulario-select" name="pais">
                            <?php $conditional_pais = [
                                'id_pais' => $reg['id_pais']
                            ];
                            $pais = selectall('pais', $conditional_pais); ?>
                            <?php foreach ($pais as $reg) : ?>
                                <option value="<?php echo $reg['id_pais'] ?>"><?php echo $reg['nombre'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </label>
                    <input type="submit" class="formulario-submit" value="Guardar">
            </form>
        </div>
    </section>
</div>
<?php
                endforeach;
                include(ROOT_PATH . 'includes\footter.php');
?>