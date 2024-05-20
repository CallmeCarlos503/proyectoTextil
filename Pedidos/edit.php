<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de pedidos</title>
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
  
    <?php include_once('../templates/footer.php'); ?>
</body>

</html>