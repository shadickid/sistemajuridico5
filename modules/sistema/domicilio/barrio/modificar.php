<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');


$id_barrio = $_GET['id_barrio'];
$records = selectall('localidad');

?>
<div class="dashboard">
    <h1>Modificar Barrio</h1>
    <section class="inicio">
        <div class="contenido">
            <form method="POST" action="procesarModificacion.php">
                Nombre: <input type="text" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                <input type="hidden" name="id_localidad" value="<?php echo $reg['id_localidad'] ?>">
                <label for="provincia">Selecione la provincia
                    <select name="provincia">
                        <?php foreach ($records as $reg) : ?>
                        <?php $conditional_prov = [
                                'id_provincia' => $reg['id_provincia']
                            ];
                            $pais = selectall('provincia', $conditional_prov); ?>
                        <?php foreach ($pais as $reg) : ?>
                        <option value="<?php echo $reg['id_provincia'] ?>"><?php echo $reg['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </section>
</div>
<?php
                endforeach;
                include(ROOT_PATH . 'includes\footter.php');
?>