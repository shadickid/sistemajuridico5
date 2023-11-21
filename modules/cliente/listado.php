<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
$datosclientesFisicos = datosClientesFisicos();
$datosClientesJuridico = datosClientesJuridicos();
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Cliente</span>
</div>
<div class="dashboard">
    <h1>Listado de clientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\dashboard\dashboard.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
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
                        <span class="msj-delete show">Se ha borrado el cliente correctamente</span>
                        <?php
                        break;
                    case 4: ?>
                        <span class="msj-error show">Se ha producido un error correctamente</span>
                <?php endswitch ?>
            </div>
            <div class="btn-filtro-container">
                <a href="formularioCliente.php" class="a-alta">Nuevo Cliente</a>
                <button type="button" id="btnMostrarTodos" class="btn-filtro">Ver Todos</button>
                <button type="button" id="btnFisicos" class="btn-filtro">Ver Persona F&iacute;sica</button>
                <button type="button" id="btnJuridicos" class="btn-filtro">Ver Persona Jur&iacute;dica</button>
                <button type="button" id="btnBaja" class="btn-filtro">Ver Personas dados de baja</button>

                <div>
                    <a href="formularioClienteF.php" class="a-alta">Nuevo cliente fisico</a>
                    <a href="formularioClienteJ.php" class="a-alta">Nuevo cliente Juridico</a>
                </div>
            </div>

            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>Nombres y Apellidos/Raz&oacute;n Social</th>
                        <th>Tipo de Persona</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datosclientesFisicos as $regclientefisico): ?>
                        <tr class="clienteFisico">
                            <td>
                                <?php echo $regclientefisico['persona_nombre'] . ' ' . $regclientefisico['persona_apellido'] ?>
                            </td>
                            <td>F&iacute;sica</td>
                            <td> <a
                                    href="<?php echo BASE_URL ?>modules\cliente\modificarClienteF.php?idPersona=<?php echo $regclientefisico['id_persona'] ?>&idPersonaFisica=<?php echo $regclientefisico['id_persona_fisica'] ?>">
                                    <button class="editarButton">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a
                                    href="<?php echo BASE_URL ?>modules\cliente\borrarClienteF.php?idPersona=<?php echo $regclientefisico['id_persona'] ?>&idPersonaFisica=<?php echo $regclientefisico['id_persona_fisica'] ?>">
                                    <button class="darDeBajaButton">
                                        <i class="fi-rr-eraser"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php foreach ($datosClientesJuridico as $regClienteJuridico): ?>
                        <tr class="clienteJuridico">
                            <td>
                                <?php echo $regClienteJuridico['razon_social'] ?>
                            </td>
                            <td>Jur&iacute;dica</td>
                            <td> <a
                                    href="<?php echo BASE_URL ?>modules\cliente\modificarClienteJ.php?idPersona=<?php echo $regClienteJuridico['id_persona'] ?>&idPersonaJuridica=<?php echo $regClienteJuridico['id_persona_juridica'] ?>">
                                    <button class="editarButton">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a
                                    href="<?php echo BASE_URL ?>modules\cliente\borrarClienteJ.php?idPersona=<?php echo $regClienteJuridico['id_persona'] ?>&idPersonaJuridica=<?php echo $regClienteJuridico['id_persona_juridica'] ?>">
                                    <button class="darDeBajaButton">
                                        <i class="fi-rr-eraser"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>


<?php
include(ROOT_PATH . 'includes\footter.php');
?>