<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');


$id_localidad = $_GET['id_localidad'];
$conditional = [
    'id_localidad' => $id_localidad
];
$records = selectall('localidad', $conditional);

?>
<div>
    <h1> LOCALIDAD</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <form method="POST" action="procesarModificacion.php">

            <?php foreach ($records as $reg) : ?>
                Nombre: <input type="text" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                <input type="hidden" name="id_localidad" value="<?php echo $reg['id_localidad'] ?>">
                <label for="provincia">Selecione la provincia
                    <select name="provincia">
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
    </section>
</div>
<?php
            endforeach;
            include(ROOT_PATH . 'includes\footter.php');
?>