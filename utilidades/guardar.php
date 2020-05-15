<?php

include("db.php");

if(isset($_POST['guardar_task'])){
    $titulo = $_POST['titulo'];
    $descrip = $_POST['descripcion'];

    $query = "INSERT INTO task(titulo, descripcion) VALUES ('$titulo', '$descrip')";
    $result = mysqli_query($con, $query);
    if(!$result){
        die("Fallo en la query");
    }

    $_SESSION['message']= 'Tarea guardada correctamente';
   header("Location: index.php ");
}
?>