<?php include('db.php') ?>

<?php

if(isset($_GET['id_empleado'])):
  $id = $_GET['id_empleado'];

$query = "DELETE FROM empleados WHERE id_empleado = $id";

$res = mysqli_query($connect, $query);

        if(!$res):
            die("Query fail");
        endif;

        $_SESSION['message'] = "Empleado eliminado con éxito";
        $_SESSION['message-color'] = "danger";

        header("Location: index.php");
endif;

 ?>
