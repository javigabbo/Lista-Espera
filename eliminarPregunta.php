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

$idPregunta = $_POST['datos'];
$datos = (json_decode($idPregunta, true));
$pregunta = $datos['idPeticion'];

  $sql = "UPDATE listaespera.peticiones SET abierta=0, fechaFin=NOW() WHERE idPeticion='$pregunta'";


  if ($conn->query($sql) === TRUE) {
      echo 'Correcto';
  } else {
      echo '<h2>ERR</h2>';
  }

  $conn->close();

 ?>
