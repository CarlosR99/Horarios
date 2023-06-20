<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asignacion de horarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <h1>Crear Espacio</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Asignatura</th>
                    <th scope="col">Codigo asignatura</th>
                    <th scope="col">Nombre asignatura</th>
                    <th scope="col">Codigo programa</th>
                    <th scope="col">Nombre programa</th>
                    <th scope="col">Periodo academico</th>
                    <th scope="col">Codigo inclusion</th>
                    <th scope="col">Nombre inclusion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require ('../conexion.php');
                $sql = $conexion->query("SELECT * FROM asignatura
                        INNER JOIN programa ON asignatura.codProg = programa.codProg
                        INNER JOIN inclusionsocial ON asignatura.codInclu = inclusionsocial.codInclu");

                while ($resultado = $sql->fetch_assoc()){
                ?>
                    <tr>
                        <th scope="row"><?php echo $resultado ['idAsig']?></th>
                        <th scope="row"><?php echo $resultado ['codAsig']?></th>
                        <th scope="row"><?php echo $resultado ['nombreAsig']?></th>
                        <th scope="row"><?php echo $resultado ['codProg']?></th>
                        <th scope="row"><?php echo $resultado ['nombreProg']?></th>
                        <th scope="row"><?php echo $resultado ['periodoAcade']?></th>
                        <th scope="row"><?php echo $resultado ['codInclu']?></th>
                        <th scope="row"><?php echo $resultado ['nombreInclu']?></th>
                        <th>
                            <a href="modificar.php?idAsig=<?php echo $resultado['idAsig']?>" class="btn btn-warning">Modificar</a>
                            <a href="eliminar.php?idAsig=<?php echo $resultado['idAsig']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="container">
            <a href="agregar.php" class="btn btn-success">Agregar asignatura</a>
            <a href="../admin.php" class="btn btn-success">inicio</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>