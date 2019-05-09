<?php include('db.php') ?>

<?php

if(isset($_POST['empleado_submit'])):
  $cc = $_POST['cc'];
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $email = $_POST['email'];
  $celular = $_POST['celular'];


$query = "INSERT INTO empleados(
  cedula_empleado,
  nombre_empleado,
  direccion_empleado,
  email_empleado,
  celular_empleado
)
VALUE(
  '$cc',
  '$nombre',
  '$direccion',
  '$email',
  '$celular'
)";

$res = mysqli_query($connect, $query);

        if(!$res):
            die("Query fail");
        endif;

        $_SESSION['message'] = "Empleado guardado con éxito";
        $_SESSION['message-color'] = "success";

        header("Location: index.php");
endif;

 ?>
