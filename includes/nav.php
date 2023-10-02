<?php
$id_perfil = $_SESSION['id_perfil'];
function search($array, $key, $value)
{

    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }
    return $results;
}
//sql de la base de datos
$sql = "SELECT m.id_modulo,m.descripcion as modulo_desc ,
                nivel,
                orden,
                padre,
                ruta,
                id_perfil_modulo,
                pm.id_perfil,
                p.descripcion as perfil_desc ,
                id_usuario,usuario_nombre 
                FROM modulo m 
        inner join perfilxmodulo pm on m.id_modulo=pm.id_modulo
        inner join perfil p on p.id_perfil=pm.id_perfil 
        inner join usuario u on p.id_perfil=u.id_perfil
        where p.id_perfil=$id_perfil
        order by nivel,orden asc";
$menues = $connect->query($sql);
//Se setean arrays de cada nivel de menu
$menu_nivel1 = array();
$menu_nivel2 = array();

foreach ($menues as $menu) {
    switch ($menu['nivel']) {
        case "1":
            $menu_nivel1[$menu['id_modulo']] = $menu;
            break;
        case "2":
            $menu_nivel2[$menu['id_modulo']] = $menu;
            break;
    }
}
/* array_multisort(array_column($menu_nivel1, 'nivel'),  SORT_ASC,
                            array_column($menu_nivel1, 'orden'), SORT_ASC,
                            $menu_nivel1);

            array_multisort(array_column($menu_nivel2, 'nivel'),  SORT_ASC,
                            array_column($menu_nivel2, 'orden'), SORT_ASC,
                            $menu_nivel2); */
?>
<nav class="navbar-side">
    <a href="#" class="icon">
        <img src="<?php echo BASE_URL; ?>assets\img\Logo_Renzo_Law.png" class="logo" />
    </a>
    <div class="user-area">
        <span class="user-name">Hola
            <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] ?>
        </span>
        <span class="user-profile"> Perfil:
            <?php echo $_SESSION['perfil'] ?>
        </span>
        <span class="username"> Usuario:
            <?php echo $_SESSION['usuario'] ?>
        </span>
        <span class="user-edit">
            <a href="<?php echo BASE_URL ?>modules\usuario\datos\datos.php"><i class="fa fi-rr-pen-circle"></i></a>
        </span>
    </div>
    <ul>
        <!-- <li><a href="<?php echo BASE_URL ?>modules\usuario\datos\datos.php">Editar mis Datos</a></li> -->
        <?php
        foreach ($menu_nivel1 as $menu1) {
            $temp = array();
            $temp = search($menu_nivel2, 'padre', $menu1['id_modulo']); //Busca hijos del nivel 1   
            ?>
            <?php
            if (empty($temp)) { //No se encuentran hijos del nivel 1
                ?>
                <li><a href="<?php echo BASE_URL . $menu1['ruta'] ?>">
                        <?php echo $menu1['modulo_desc'] ?>
                    </a></li>
            <?php } else { // Si se encuentran hijos del nivel 1  
                ?>
                <li>
                    <a href="#">
                        <?php echo $menu1['modulo_desc'] ?>
                    </a>
                    <ul>
                        <?php foreach ($temp as $menu2) { ?>
                            <li><a href="<?php echo BASE_URL . $menu2['ruta'] ?>">
                                    <?php echo $menu2['modulo_desc'] ?>
                                </a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        <?php } ?>
        <li><a href="<?php echo BASE_URL ?>modules/login/logout.php">Cerrar Sesi&oacute;n</a></li>
    </ul>
</nav>