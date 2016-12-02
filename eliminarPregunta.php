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

  $sql = "DELETE FROM listaespera.peticiones WHERE idPeticion='$pregunta'";


  if ($conn->query($sql) === TRUE) {
      echo '<h2>Correcto</h2>';
  } else {
      echo '<h2>ERR</h2>';
  }

  $conn->close();

 ?>
