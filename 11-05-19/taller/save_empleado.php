<?php include('db.php') ?>

<?php


  if($_POST){
    $cc = $_POST['cc'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    if($cc && $nombre && $direccion && $email && $celular){
      if($cc <= 0){
        $_SESSION['message'] = "Cedula debe ser mayor que 0";
        $_SESSION['message-color'] = "danger";
        header("Location: index.php");
        return false;
      }if($celular <= 0){
        $_SESSION['message'] = "Celular debe ser mayor que 0";
        $_SESSION['message-color'] = "danger";
        header("Location: index.php");
        return false;
      }
    }else{
      echo 'campos invalidos!';
      header("Location: index.php");
      return false;
    }
  }


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
