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



        $sql = "SELECT * FROM listaespera.peticiones";
        $result = $conn->query($sql);


  $arr = array();



        if ($result->num_rows > 0) {


           while($row = $result->fetch_assoc()) {

             $arrayPreguntas = array('idPeticion'=> $row['idPeticion'],
                            'direccionIP' => $row['direccionIP'],
                            'usuario' => $row['usuario'],
                            'texto' => $row['texto'],
                            'abierta' => $row['abierta'],
                            'fechaInicio' => $row['fechaInicio'],
                            'fechaFin' => $row['fechaFin']);


                            array_push($arr, $arrayPreguntas);

           }

           echo json_encode($arr);


        } else {
           echo "0 results";
        }


        $conn->close();

 ?>
