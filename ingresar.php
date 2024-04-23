<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>insertar</title>
        <style>
            body {
                background-color: #f0f0f0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="mt-3">
                <h3 class="text-center">ingresar datos</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-3">
                        <div class="card-header bg-danger text-white">ingresar datos</div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">nombre</label>
                                    <input type="text" class="form-control" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">descripcion</label>
                                    <input type="text" class="form-control" name="descripcion">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">precio</label>
                                    <input type="number" class="form-control" name="precio">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info" name="ingresar">ingresar</button>
                                    <a href="tabla.php" class="btn btn-warning">regresar</a>
                                   </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>

<?php
include 'connect.php';

if (isset($_POST['ingresar']))
{
    $foto = $_FILES['foto']['name'];
    $fotos = 'guardar/' . $foto;
    move_uploaded_file($_FILES['foto']['tmp_name'], $fotos);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    
    
    $sql = "INSERT INTO platillos (foto, nombre, descripcion, precio) VALUES ('$fotos','$nombre','$descripcion','$precio')";
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('datos ingresados)</script>";
    } else {
        echo "<script>console.log('Error: " . $sql . "<br>" . mysqli_error($conn) . "')</script>";
    }
    mysqli_close($conn);
}
?>