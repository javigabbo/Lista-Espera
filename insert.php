<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "listaespera";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


$datosRecibidos = $_POST['datos'];
$datos = json_decode($datosRecibidos, true);


$usuario = $datos["usuario"];
$pregunta = $datos["pregunta"];
function getRealUserIp(){
   switch(true){
     case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
     case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
     case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
     default : return $_SERVER['REMOTE_ADDR'];
   }
}

$ip = getRealUserIp();
$abierto = 1;
$fechaInicio = date('Y-m-d H:i:s');
$fechaFin = "";


$sql = "INSERT INTO listaespera.peticiones (direccionIP, usuario, texto, abierta, fechaInicio, fechaFin) VALUES ('$ip','$usuario','$pregunta', '$abierto', '$fechaInicio', '$fechaFin')";

if ($conn->query($sql) === TRUE) {

    $last_id = $conn->insert_id;

    $respuesta = array('respuesta' => $last_id);

    //array_push($respuesta);
    echo json_encode($respuesta);


} else {
    echo "Error: " . $conn->error;
}

$conn->close();

 ?>
