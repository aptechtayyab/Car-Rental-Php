<?php include "includes/header.php";
include "../db.php";
$idToBeUpdated = $_GET["index"];
// categories fecth kri hain sari
$categoryData = mysqli_query($con, "SELECT * FROM categories");


$carData = mysqli_query($con, "SELECT * FROM cars WHERE car_id = $idToBeUpdated");
$carData = mysqli_fetch_assoc($carData);

//update:

if (isset($_POST["btnupdatecar"])) {
    $carname = $_POST["carname"];
    $carcategory = $_POST["carcategory"];
    $carrent = $_POST["carrent"];
    $cardesc = $_POST["cardesc"];

    $carImageInDb = $carData["car_image"];
    if (!empty($_FILES["carimage"]["name"])) {
        $newImageName = $_FILES["carimage"]["name"];
        $newImageTempName = $_FILES["carimage"]["tmp_name"];
        move_uploaded_file($newImageTempName, "carimages/" . $newImageName);

        $oldImagePath = "carimages/" . $carImageInDb;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    } else {
        $newImageName = $carImageInDb;
    }

    $updateCarQuery = "UPDATE `cars` SET `car_name`='$carname',`car_category`= $carcategory,`car_image`='$newImageName',`car_rent`=$carrent,`car_description`='$cardesc' WHERE car_id = $idToBeUpdated";

    $res = mysqli_query($con, $updateCarQuery);
    if ($res) {
        echo "<script>alert('Car Updated Successfully')</script>";
        echo "<script>window.location.href = 'show_car.php'</script>";
    } else {
        echo "<script>alert('Update Error')</script>";
        echo "<script>window.location.href = 'show_car.php'</script>";
    }
}
?>
<div class="container">

    <div class="card position-relative">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Car Below</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="" class="form-label">Car Name</label>
                    <input type="text" class="form-control" placeholder="Enter Car Name" name="carname" value="<?php echo $carData["car_name"] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Car Category</label>
                    <select name="carcategory" id="" class="form-control">
                        <option disabled>-- Select Category --</option>
                        <?php foreach ($categoryData as $category) { ?>
                            <option <?php if ($carData["car_category"] == $category["category_id"]) echo "selected" ?> value="<?php echo $category["category_id"] ?>"><?php echo $category["category_name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Car Current Image:</label> <br>
                    <img width="200" src="carimages/<?php echo $carData["car_image"] ?>" alt="">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Car Image</label>
                    <input type="file" name="carimage" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Car Rent Per Day</label>
                    <input type="number" name="carrent" placeholder="Enter Car rent per day" class="form-control" value="<?php echo $carData["car_rent"] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Car Description</label>
                    <textarea name="cardesc" style="resize: none;" placeholder="Enter Car Description" class="form-control"><?php echo $carData["car_description"] ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary mt-3" value="Update Car" name="btnupdatecar">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>