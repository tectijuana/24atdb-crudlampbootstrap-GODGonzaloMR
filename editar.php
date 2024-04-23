<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM platillos WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['editar'])) {
    $foto = $_FILES['foto']['name'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    if ($foto == "") {
        $fotos = $row['foto'];
    } else {
        $fotos = 'guardar/' . $foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $fotos);
    }

    $sql = "UPDATE platillos SET foto = '$fotos', nombre = '$nombre', descripcion = '$descripcion', precio = '$precio' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('datos actualizados')</script>";
    } else {
        echo "<script>console.log('Error: " . $sql . "<br>" . mysqli_error($conn) . "')</script>";
    }
    mysqli_close($conn);
}
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>editar</title>
        <style>
        body{
            background-color: #f0f0f0;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="mt-3">
                <h3 class="text-center">editar platillos</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-3">
                        <div class="card-header bg-danger text-white">editar datos</div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">foto</label>
                                    <input type="file" class="form-control" name="foto">
                                    <img src="<?php echo $row['foto']; ?>" alt="foto" class="img-fluid mt-2">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">descripcion</label>
                                    <input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">precio</label>
                                    <input type="number" class="form-control" name="precio" value="<?php echo $row['precio']; ?>">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info" name="editar">editar</button>
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