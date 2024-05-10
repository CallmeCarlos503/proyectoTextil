<?php

session_start();

// INICIO MODULO LOGIN
// Verificar si se recibieron datos de usuario y contraseña
if (isset($_POST['username']) && isset($_POST['pass'])) {

    // Lista de usuarios y contraseñas
    $users = [
        'admin' => '123456',
        'empleado' => 'abc123',
        'jefe' => 'jef123'
    ];

    // Obtener datos de usuario y contraseña
    $username = $_POST['username'] ?? '';
    $pass = $_POST['pass'] ?? '';

    // Verificar si el usuario existe y si la contraseña es correcta
    if (array_key_exists($username, $users) && $users[$username] === $pass) {
        // Credenciales correctas, iniciar sesión y redirigir
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username; // Guardar el nombre de usuario en la sesión
        $_SESSION['id_empleado']=1;
        header("Location: ../login/inicio.php"); // Redirigir a una página de bienvenida
        exit; // Terminar el script para evitar ejecución adicional
    } else {
        // Credenciales incorrectas
       echo("<script> alert('Usuario o Contraseña Incorrectos') </script>" );
      // header("Location: login.php");
       /* echo("<script> 
        Swal.fire({
            icon: 'error',
            title: 'USUARIO INCORRECTO',            
        })/script>");*/

      //  echo "Usuario o contraseña incorrectos.";
    }
}
//Insercion de lista de pedidos
else if(isset($_POST['btn-encargo'])){
    //llenado de datos para lista de pedidos
    $solicitante=$_POST['txtSolicitante'];
    $Tipo=$_POST['txtTipo'];
    $Fecha=$_POST['txtfecha'];
    $Telefono=$_POST['txtTel'];
    $Descripcion=$_POST['txtDescripcion'];
    $MontoTotal=$_POST['txtMonto'];
    $id_empleado=$_SESSION['id_empleado'];
    //llenar datos en una lista con las variable
    $lista_pedidos[]=array(
        "solicitante"=>$solicitante,
        "Tipo"=>$Tipo,
        "Fecha"=>$Fecha,
        "Telefono"=>$Telefono,
        "Descripcion"=>$Descripcion,
        "MontoTotal"=>$MontoTotal,
        "id_empleado"=>$id_empleado
    );
    //guardar la lista en una sesion para trasladarlo
    $_SESSION['lista_pedidos']=$lista_pedidos;
    
    echo("<script> alert('Se logro la insercion de pedido') </script>" );
    header('Location: ../Pedidos/pedidos.php');
    /*
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Solicitante</th>";
    echo "<th>Tipo</th>";
    echo "<th>Fecha</th>";
    echo "<th>Telefono</th>";
    echo "<th>Descripcion</th>";
    echo "<th>MontoTotal</th>";
    echo "<th>id_empleado</th>";
    echo "</tr>";
    foreach($lista_pedidos as $pedidos){
        echo "<tr>";
        echo "<td>".$pedidos['solicitante']."</td>";
        echo "<td>".$pedidos['Tipo']."</td>";
        echo "<td>".$pedidos['Fecha']."</td>";
        echo "<td>".$pedidos['Telefono']."</td>";
        echo "<td>".$pedidos['Descripcion']."</td>";
        echo "<td>".$pedidos['MontoTotal']."</td>";
        echo "<td>".$pedidos['id_empleado']."</td>";
        echo "</tr>";
    }
    echo "</table>";  
    */  

}

else{
    echo("<script> alert('Usuario o Contraseña Incorrectos') </script>" );
  //  header("Location: login.php");
    
}
//FIN INICIO LOGIN



?>


