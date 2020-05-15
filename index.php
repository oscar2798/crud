<?php include("db.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">CRUD EN DEBIAN</a>
            </div>
        </nav>
        
        <div class="jumbotron">
            <div class="container">
                <h2 class="display-4">CRUD MYSQL</h2>
                <p class="lead">Subida a google cloud SQL y visualizandolo 
                con debian como maquina virtual</p>
            </div>
        </div>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php 
        
                    if(isset($_SESSION['message'])){ ?>
                        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                <?php session_unset(); } ?>

            <div class="card card-body">
                 <form action="guardar.php" method="POST">
                   <div class="form-group">
                        <input type="text" name="titulo" class="form-control"
                        placeholder="Titulo de la Tarea" autofocus>
                   </div>
                   <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" 
                        placeholder="Descripcion de la tarea"></textarea>
                   </div>
                   <input type="submit" class="btn btn-success btn-block"
                   name="guardar_task" value="Guardar">
                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table  table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM task";
                            $resultado = mysqli_query($con, $query);
                            while($row = mysqli_fetch_assoc($resultado)){?>
                                <tr>
                                    <td><?php echo $row['titulo'] ?></td>
                                    <td><?php echo $row['descripcion'] ?></td>
                                    <td><?php echo $row['fecha'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="editar.php?id=<?php echo $row['id'] ?>">Editar</a>
                 
                                        <a class="btn btn-danger" href="eliminar.php?id=<?php echo $row['id'] ?>">Eliminar</a>
                                    </td>
                                </tr>

                          <?php  }?>
                    </tbody>
            </table>

           
        </div>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>