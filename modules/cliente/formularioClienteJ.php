<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');

include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');

$conditional = [
    'estado' => 1
];
$tipodocumento = selectall('documento', $conditional);

$contratoconstitutivo = selectall('contrato_constitutivo');
$atributoDomicilio = selectall('atributo_domiclio');
$metodocontacto = selectall('tipo_contacto', $conditional);
$pais = selectall('pais');
$tipoDom = selectall('tipo_dom');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\cliente\listado.php">Cliente</a>
    <span>/</span>
    <span>Registro de Cliente</span>
</div>
<div class="dashboard">
    <h1>Listado de clientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\cliente\listado.php" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <div class="msj-container" id="msj-container">
                <?php switch ($vali):
                    case 1: ?>
                        <span class="msj-error show">El cliente ya está registrado</span>
                        <?php break;
                    case 2: ?>
                        <span class="msj-modify show">Se ha modificado correctamente</span>
                <?php endswitch ?>
            </div>
            <h2>Registro de Cliente</h2>

            <div>
                <button type="submit" name="submit" class="formulario-submit">Guardar</button>
            </div>
            </form>
        </div>
</div>
</section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>