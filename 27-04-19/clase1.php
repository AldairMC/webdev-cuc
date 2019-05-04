<html>
    <head>
        <title>Clase 1</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <h1>Clase 1 PHP</h1>
        <p>HTML no procesado por el servidor</p>
        <?php
            echo('Este mensaje será impreso cuando el servidor procese el tag PHP.');
        ?>
        <p>HTML no procesado por el servidor</p>

        <?php if (true): ?>
            <p>Este mensaje debe mostrarse.</p>
        <?php  else: ?>
            <p>Este mensaje NO debe mostrarse.</p>
        <?php endif; ?>

        <?php
            $n=10;
            $i=0;
            while ($i<$n) {
                echo('Mensaje repetido '.++$i.' veces. <br/>');
            }
        ?>

        <p>Tambien es posible usar esta forma de código php <?= 'imprimir esta cadena' ?></p>

        <h2>Variables</h2>

        <?php
            $nombre = 'Manuel';                                     //Asignación
            $puntero_nombre = &$nombre;                             //El valor $puntero_nombre a punta o referencia a $nombre
            $puntero_nombre = "Hola $puntero_nombre, es un gusto saludarte. <br/>";  //Asignación a $puntero_nombre que modifica a $nombre
            echo $nombre;
            echo $puntero_nombre;
        ?>
        <br />

        <h2>Variables variables</h2>

        <?php
            $a = 'mundo';
            $$a = 'Hola mundo 2 <br/>';

            $a = 'Hola mundo 1 <br/>';

            echo $a;
            echo $mundo;
        ?>

        <h2>Formularios</h2>
        <form id="form1" method="post" onsubmit="return validate()">
        <div class="form-group col-3">
            <input id="user" name="usuario" value="" class="form-control" placeholder="Usuario" />
        </div>
        <div class="form-group col-3">
            <input id="pw" name="password" value="" type="password" class="form-control" placeholder="Password" />
        </div>
        <div class="form-group col-3">
            <input id="pw_c" name="password_confirm" value="" type="password" class="form-control" placeholder="Password confirm" /> <br/>
        </div> <br>
        <div class="form-group col-3">
            <input id="n1" name="n1" type="number" class="form-control" placeholder="Number One" />
        </div>
        <div class="form-group col-3">
            <input id="n2" name="n2"  type="number" class="form-control" placeholder="Number Two" /> <br/>
        </div>
        <div class="form-group col-3">
          <select id="operation" class="" name="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
          </select>
        </div>

        <div class="form-group col-3">
            <input id="submit" type="submit" value="Enviar" class="btn btn-block btn-success" />
        </div>

        </form>
        <?php

            if ($_POST) {
              $n1 = $_POST['n1'];
              $n2 = $_POST['n2'];
              $operation = $_POST['operation'];
              switch ($operation) {
                case '+':
                  echo ($n1 + $n2);
                  break;
                case '-':
                  echo $n1 - $n2;
                  break;
                case '*':
                  echo $n1 * $n2;
                  break;
                case '/':
                  echo $n1 / $n2;
                  break;
              }

                echo '<pre>';
                echo htmlspecialchars(print_r($_POST, true));
                echo '</pre>';
            }
        ?>
    </div>

    <script type="text/javascript">
      function validate(){
          let user = document.getElementById('user').value
          let pw = document.getElementById('pw').value;
          let pw_c = document.getElementById('pw_c').value;
          let n1 = document.getElementById('n1').value;
          let n2 = document.getElementById('n2').value;
          let op = document.getElementById('operation').value;
          if(user && pw && pw_c && n1 && n2 && op){
            if(pw === pw_c){
              return true
            }
            alert('Las contraseñas no coinciden');
            return false

          }
          alert('rellene los campos');
          return false
      }

    </script>
    </body>
</html>
