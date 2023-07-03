<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');


$id_provincia = $_GET['id_provincia'];
$conditional_prov = [
    'id_provincia' => $id_provincia
];
$records = selectall('provincia', $conditional_prov);

?>
<div>
    <h1> PROVINCIA</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <form method="POST" action="procesarModificacion.php">

            <?php foreach ($records as $reg) : ?>
                Nombre: <input type="text" name="nombre" value="<?php echo $reg['nombre'] ?>" autocomplete="off">
                <input type="hidden" name="id_provincia" value="<?php echo $reg['id_provincia'] ?>">
                <label for="pais">Selecione el pais
                    <select name="pais">
                        <?php $conditional_pais = [
                            'id_pais' => $reg['id_pais']
                        ];
                        $pais = selectall('pais', $conditional_pais); ?>
                        <?php foreach ($pais as $reg) : ?>
                            <option value="<?php echo $reg['id_pais'] ?>"><?php echo $reg['nombre'] ?></option>
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