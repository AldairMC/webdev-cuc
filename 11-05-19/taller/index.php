<?php include('db.php') ?>

<?php include('include/header.php') ?>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-4">
          <?php
           if(isset($_SESSION['message'])) : ?>
              <div class="alert alert-<?= $_SESSION['message-color']?> alert-dismissible fade show" role="alert">
              <?= $_SESSION['message']?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php session_unset();
          endif; ?>
          <div class="card card-body">
            <h3 class="text-center">Agregar empleados</h3><br>
              <!-- Formulario Empleados-->
                <form action="save_empleado.php" method="POST" onsubmit="return validate()">
                    <div class="form-group">
                        <input type="number" max="9999999999" id="cc" name="cc" class="form-control"
                        placeholder="Cedula" autofocus required />
                    </div>
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre"
                        class="form-control" placeholder="Nombre"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="text" id="direccion" name="direccion"
                        class="form-control" placeholder="Dirección"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email"
                        class="form-control" placeholder="Email"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="number" maxlength="10" id="celular" name="celular"
                        class="form-control" placeholder="Celular"
                         required />
                    </div>
                    <input type="submit" id="empleado_submit" class="btn btn-success btn-block" name="empleado_submit"
                    value="Agregar Empleado" />
                </form>
                <input type="text" id="hola" />
                <button type="button" id="btn" name="button">OK</button>
                <script type="text/javascript">

                      var btn = document.getElementById('btn');
                      var cc = document.getElementById('hola').value
                      btn.addEventListener('click', () => {
                        if(cc === 12){
                          alert(`La cedula es: ${cc}`);
                        }

                      });

                </script>
            </div>
        </div>
        <!-- Tabla Empleados-->
        <div class="col-md-8">
          <div class="card card-body">
            <table class="table table-bordered">
            <h3 class="text-center">Tabla Empleados</h3><br>
                <thead class="text-center">
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                        $query = ("SELECT
                          id_empleado,
                          cedula_empleado,
                          nombre_empleado,
                          email_empleado,
                          direccion_empleado,
                          celular_empleado
                          FROM empleados");
                        $result_empleado = mysqli_query($connect, $query);

                        while($row = mysqli_fetch_array($result_empleado)): ?>
                            <tr>
                                <td><?php
                                    echo $row['cedula_empleado'];
                                ?></td>
                                <td><?php
                                    echo $row['nombre_empleado'];
                                ?></td>
                                <td><?php
                                    echo $row['email_empleado'];
                                ?></td>
                                <td><?php
                                    echo $row['direccion_empleado'];
                                ?></td>
                                <td><?php
                                    echo $row['celular_empleado'];
                                ?></td>
                                <td>
                                <a href="edit_empleado.php?id_empleado=<?php echo $row['id_empleado']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_empleado.php?id_empleado=<?php echo $row['id_empleado']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                </td>
                            </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<?php include('include/footer.php') ?>
