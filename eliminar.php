<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $resultado = mysqli_query($con, $query);
    if(!$resultado){
        die("Fallo en la query");
    }

    $_SESSION['message']= 'Tarea eliminada correctamente';
    $_SESSION['message_type']= 'warning';

    header("Location: index.php");
}

?>