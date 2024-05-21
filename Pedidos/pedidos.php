<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de Pedidos</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/357aae614a.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once('../templates/header.php');
    session_start();
    include_once('../templates/navbar.php');
    $userName = $_SESSION['username'];

    // Verificar si el usuario está autenticado
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        //echo "Bienvenido, " . $_SESSION['username'] . "!";
    } else {
        echo "No estás autorizado para ver esta página.";
    }
    ?>
    <div class="formulario">

        <div class="dimensiones">

            <form action="pedidos.php" method="post">
                <h1>Formulario de pedidos</h1>
                <i class="fa-solid fa-cart-plus" style="font-size: 100px; margin-top:20px"></i>

                <h3>Nombre del solicitante</h3>
                <input type="text" name="txtSolicitante" id="" required>
                <br>
                <h3>Tipo</h3>
                <input type="text" name="txtTipo" id="" required>
                <h3>
                    Fecha de entrega
                </h3>
                <input type="date" name="txtfecha" id="" required>
                <h3>
                    Telefono
                </h3>
                <input type="tel" name="txtTel" id="" required>
                <h3>
                    Descripcion
                </h3>
                <input type="text" name="txtDescripcion" id="" required>
                <h3>
                    Monto Total
                </h3>
                <input type="number" name="txtMonto" step="0.1" id="" required>
                <br>
                <input type="submit" value="Agregar Pedido" class="btn-generales" name="btn-encargo">
                
            </form>
            

        </div>
        
    </div>
    <?php
    //tabla donde mostrara los datos del formulario hecho en matrices, donde se podra modificar y eliminar

    if (isset($_POST['btn-encargo'])) {
        //llenado de datos para lista de pedidos
        $solicitante = $_POST['txtSolicitante'];
        $Tipo = $_POST['txtTipo'];
        $Fecha = $_POST['txtfecha'];
        $Telefono = $_POST['txtTel'];
        $Descripcion = $_POST['txtDescripcion'];
        $MontoTotal = $_POST['txtMonto'];
        $id_empleado = $_SESSION['id_empleado'];
        

        $lista_pedidos[] = array(
            "solicitante" => $solicitante,
            "Tipo" => $Tipo,
            "Fecha" => $Fecha,
            "Telefono" => $Telefono,
            "Descripcion" => $Descripcion,
            "MontoTotal" => $MontoTotal,
            "id_empleado" => $id_empleado,
        );
        //guardar la lista en una sesion para trasladarlo
        $_SESSION['lista_pedidos'] = $lista_pedidos;
        echo("<script> alert('Se logro la insercion de pedido') </script>" );



        //tabla donde mostrara los datos del formulario hecho en matrices, donde se podra modificar y eliminar, los datos son acumulativos, es decir se guardaran 
        echo "<div class=tabla>";
        echo "<table class='tabla-pedidos table-primary'>";
        echo "<tr>";
        echo "<th>Solicitante</th>";
        echo "<th>Tipo</th>";
        echo "<th>Fecha</th>";
        echo "<th>Telefono</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Monto Total</th>";
        echo "<th>Codigo de empleado</th>";
        echo "<th colspan='2'>Acciones</th>";
        echo "</tr>";
        foreach ($lista_pedidos as $pedidos) {
            echo "<tr>";
            echo "<td>". $pedidos['solicitante']. "</td>";
            echo "<td>". $pedidos['Tipo']. "</td>";
            echo "<td>". $pedidos['Fecha']. "</td>";
            echo "<td>". $pedidos['Telefono']. "</td>";
            echo "<td>". $pedidos['Descripcion']. "</td>";
            echo "<td>". $pedidos['MontoTotal']. "</td>";
            echo "<td>". $pedidos['id_empleado']. "</td>";
            echo "<td><a href='pedidos.php?id=". $pedidos['id_empleado']. "'>Eliminar</a></td>";
            //hacer un boton llamado editar, transportara todos los datos a edit.php, los mostrara y los modificara
            echo "<td><a href='edit.php?id=". $pedidos['id_empleado']. "&solicitante=". $pedidos['solicitante']."' >Editar</a></td>";
            

            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        //eliminar datos de la lista
        if (isset($_GET['id'])) {
            foreach ($lista_pedidos as $key => $pedidos) {
                if ($pedidos['id_empleado'] == $_GET['id']) {
                    unset($lista_pedidos[$key]);
                }
            }
        }
       

    }
    ?>
    print("")
    <?php include_once('../templates/footer.php'); ?>
</body>

</html>