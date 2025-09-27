<?php
include "../db.php";
$idToBeDeleted = $_GET["index"];
$carImageData = mysqli_query($con, "SELECT car_image FROM cars WHERE car_id = $idToBeDeleted");
$carImageData = mysqli_fetch_assoc($carImageData);

$filePath = "carimages/" . $carImageData["car_image"];

if (file_exists($filePath)) {
    unlink($filePath);

    $res = mysqli_query($con, "DELETE FROM cars WHERE car_id = $idToBeDeleted");

    if ($res) {
        echo "<script>alert('Car Deleted')</script>";
        echo "<script>window.location.href = 'show_car.php'</script>";
    } else {
        echo "<script>alert('Delete Error')</script>";
        echo "<script>window.location.href = 'show_car.php'</script>";
    }
} else {
    echo "<script>alert('Image doesnt exists')</script>";
    echo "<script>window.location.href = 'show_car.php'</script>";
}
