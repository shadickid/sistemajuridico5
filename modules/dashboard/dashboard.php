<?php 
session_start();
?>

<html>
    <body>
        <h1>Hola <?php echo $_SESSION['usuario'] ?></h1>
    </body>
</html>