<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>tabla</title>
        <style>
            body {
                background-color: #f0f0f0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="mt-3">
                <h3 class="text-center">godgonzalomr</h3> 
            </div>
            <div class="card mt-3">
                <div class="card-header bg-danger text-white">platillos</div>
                <div class="card-body bg-secondary">
                <a href="ingresar.php" class="btn btn-danger mb-3">ingresar</a>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>id</th> 
                            <th>foto</th> 
                            <th>nombre</th> 
                            <th>descripcion</th> 
                            <th>precio</th>    
                            <th>funciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM platillos"; 
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><img src='" . $row['foto'] . "' class='img-fluid' style='max-width: 150px;'></td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['descripcion'] . "</td>";
                            echo "<td>" . $row['precio'] . "</td>";
                            echo "<td><a href='editar.php?id=" . $row["id"] . "' class='btn btn-info mb-3' style='margin-right: 10px'>editar</a>";
                            echo "<a href='eliminar.php?id=" . $row["id"] . "' class='btn btn-warning mb-3'>eliminar</a></td>";
                            echo "</tr>";
                            }
                        } else {
                            echo "<script>alert('0 Results')</script>";
                        }
                        mysqli_close($conn);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>