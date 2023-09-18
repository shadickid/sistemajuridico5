<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');


$id_localidad = $_GET['id_localidad'];
$conditional = [
    'id_localidad' => $id_localidad
];
$records = selectall('localidad', $conditional);

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\localidad\listado.php">Localidad</a>
    <span>/</span>
    <span>Modificaci&oacute;n de localidad</span>
</div>

<div class="dashboard">
    <h1>Localidad</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\localidad\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <div class="dashboard">
        <h1> Modificaci&oacute;n localidad</h1>
        <section class="inicio">
            <div class="contenido">

                <form method="POST" action="procesarModificacion.php">

                    <?php foreach ($records as $reg) : ?>
                        Nombre: <input class="formulario-input" type="text" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                        <input type="hidden" name="id_localidad" value="<?php echo $reg['id_localidad'] ?>">
                        <label class="formulario-label" for="provincia">Selecione la provincia
                            <select class="formulario-select" name="provincia">
                                <?php $conditional_prov = [
                                    'id_provincia' => $reg['id_provincia']
                                ];
                                $pais = selectall('provincia', $conditional_prov); ?>
                                <?php foreach ($pais as $reg) : ?>
                                    <option value="<?php echo $reg['id_provincia'] ?>"><?php echo $reg['nombre'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </label>
                        <input class="formulario-submit" type="submit" value="Guardar">
                </form>
            </div>
        </section>
    </div>
<?php
                    endforeach;
                    include(ROOT_PATH . 'includes\footter.php');
?>