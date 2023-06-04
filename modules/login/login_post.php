<?php
include ('../../config/connect.php');
$user=$_POST['username'];
$pass=$_POST['password'];

$sql="SELECT * FROM sistemajuridico.usuario where usuario_nombre like '{$user}';";

$datos_user=$connect->query($sql);
if ($datos_user->num_rows == 1){
    $sql="SELECT * FROM sistemajuridico.usuario where usuario_contraseña = '{$pass}';";
    $datos_pass=$connect->query($sql);
    if($datos_pass->num_rows == 1 ){

        while ($reg = $datos_pass->fetch_assoc()) {
            $usuario=$reg['usuario_nombre'];
        }
        session_start();
        $_SESSION['usuario']=$usuario;
        header('location:../dashboard/dashboard.php');
        
    }else{
        header('location:../login/login.php?error=2');
        
    }
}else{
    header('location:../login/login.php?error=1');
    
}

?>