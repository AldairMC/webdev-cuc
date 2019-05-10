<?php

include('db.php');

if($_POST){
    $cc = $_POST['cc'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    if($cc && $nombre && $direccion && $email && $celular){
      if($cc <= 0){
        $_SESSION['message'] = "Campo no actualizado: Cedula debe ser mayor que 0";
        $_SESSION['message-color'] = "danger";
        header("Location: index.php");
        return false;
      }if($celular <= 0){
        $_SESSION['message'] = "Campo no actualizado: Celular debe ser mayor que 0";
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

if(isset($_GET['id_empleado'])){
    $id = $_GET['id_empleado'];

    $query = "SELECT
      cedula_empleado,
      nombre_empleado,
      email_empleado,
      direccion_empleado,
      celular_empleado
      FROM empleados
      WHERE id_empleado = $id";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_array($result);
        $cc = $row['cedula_empleado'];
        $nombre = $row['nombre_empleado'];
        $direccion = $row['direccion_empleado'];
        $email = $row['email_empleado'];
        $celular = $row['celular_empleado'];
    }
}

if(isset($_POST['update'])){
    $id_e = $_GET['id_empleado'];
    $cc_e = $_POST['cc'];
    $nombre_e = $_POST['nombre'];
    $email_e = $_POST['email'];
    $direccion_e = $_POST['direccion'];
    $celular_e = $_POST['celular'];

    $query = "UPDATE empleados
    set cedula_empleado = '$cc_e',
        nombre_empleado = '$nombre_e',
        email_empleado = '$email_e',
        direccion_empleado = '$direccion_e',
        celular_empleado = '$celular_e'

    WHERE id_empleado = $id_e";

    $res = mysqli_query($connect, $query);

    if(!$res):
        die("Query fail");
    endif;

    $_SESSION['message'] = "Empleado actualizado con éxito";
    $_SESSION['message-color'] = "info";
    header("Location: index.php");

}

?>

<?php include('include/header.php')?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_empleado.php?id_empleado=<?php echo $_GET['id_empleado']?>" method="POST">
                    <div class="form-group">
                        <input type="number" max="9999999999" name="cc" placeholder="Update Cedula"
                        class="form-control" value="<?php echo $cc; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre" placeholder="Update Nombre"
                        class="form-control" value="<?php echo $nombre; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" placeholder="Update Direccion"
                        class="form-control" value="<?php echo $direccion; ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Update Email"
                        class="form-control" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" max="9999999999" name="celular" placeholder="Update Celular"
                        class="form-control" value="<?php echo $celular; ?>">
                    </div>

                    <button class="btn btn-success btn-block" name="update">
                    Update
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include('include/footer.php')?>
