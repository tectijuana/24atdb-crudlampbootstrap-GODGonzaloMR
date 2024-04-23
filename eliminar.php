<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM platillos WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('datos eliminados')</script>";
        header("location: tabla.php");
    } else {
        echo "<script>console.log('Error: " . $sql . "<br>" . mysqli_error($conn) . "')</script>";
    }

    mysqli_close($conn);
}
?>