<html>
<head>
<title>PHP y MariaDB</title>
</head>
<body>
<?php
    $server = "localhost:3306";
    $user = "root";
    $pwd = "";
    $bd = "prueba_bd";

    $conn = new mysqli($server,$user,$pwd, $bd);

    if ($conn->connect_errno) {
        ?> <p>ERROR: Ha ocurrido un error en la conexión. <?=$mysqli->connect_error ?></p> <?php
        exit;
    }else {
        ?> <p>La conexión es exitosa!!</p> <?php
    }
    
    $sql = "SELECT codigo_producto, nombre_producto FROM productos";
    if (!$result = $conn->query($sql)) {
        
        echo "Error al consultar la base de datos.";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }
    
    if ($result->num_rows === 0) {
        echo "No hay filas disponibles.";
        exit;
    }
    
    echo "<ul>\n";
    while ($productos = $result->fetch_assoc()) {
        echo '<li>';
        echo 'Código Producto: '.$productos['codigo_producto'] . ' / Nombre Producto: ' . $productos['nombre_producto'];
        echo "</li>\n";
    }
    echo "</ul>\n";

    $result->free();
    $conn->close();

?>
</body>
</html>