<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\movimiento.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$id_expediente = $_GET['id_expediente'];
$conditional = [
    'id_expediente' => $id_expediente
];
$condicional = [
    'estado' => 1
];
$movimiento = selectall('movimiento_tipo_proceso', $condicional);
$expediente = selectall('expediente', $conditional);

foreach ($expediente as $regExp) {
    $caratula = $regExp['expediente_nombre'];
}
$empleado = datosEmpleadoAbogado();
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\expedientes\listado.php">Expediente</a>
    <span>/</span>
    <span>Movimientos
        <?php echo $caratula ?>
    </span>
</div>
<div class="dashboard">
    <h1>Movimiento de
        <?php echo $caratula ?>
    </h1>
    <a href="<?php echo BASE_URL; ?>modules\expedientes\movimiento_archivo\nuevo_mov.php?id_expediente=<?php echo $id_expediente ?>"
        class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Nuevo movimiento de
                <?php echo $caratula ?>
            </h2>
            <form action="" method="" id="">
                <div>
                    <label for="fechamov" class="formulario-label">Fecha y Hora:</label>
                    <input type="date" name="fechamov" id="fechamov" class="formulario-input">
                </div>
                <div>
                    <label for="descripcion" class="formulario-label">Descripcion:</label>
                    <textarea class="formulario-input" name="descripcion" id="descripcion"></textarea>
                </div>
                <div>
                    <label for="abogado" class="formulario-label">Responsable:</label>
                    <select name="abogado" id="abogado" class="formulario-select">
                        <option value="0">--Seleccione--</option>
                        <?php foreach ($empleado as $regempl): ?>
                            <option value="<?php echo $regempl['id_empleado'] ?>">
                                <?php echo $regempl['persona_nombre'] . " " . $regempl['persona_apellido'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <label for="movimiento" class="formulario-label">Tipo de movimiento:</label>
                    <select name="movimiento" id="movimiento" class="formulario-select">
                        <option value="0">--Seleccione--</option>
                        <?php foreach ($movimiento as $regmov): ?>
                            <option value="<?php echo $regmov['id_tipo_proceso'] ?>">
                                <?php echo $regmov['nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <label for="file" class="formulario-label">Archivo:</label>
                    <div class="file-input-container">
                        <input type="file" size="60" name="file" id="myfile" class="formulario-file">
                    </div>
                </div>
                <div>
                    <button type="submit" name="submit" id="guardar" class="formulario-submit"> Guardar </button>
                </div>
            </form>

        </div>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>