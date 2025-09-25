<?php include "includes/header.php";
include "../db.php";
// categories fecth kri hain sari
$categoryData = mysqli_query($con, "SELECT * FROM categories");


// car ka data add
if (isset($_POST["btncar"])) {
    $carimagename = $_FILES["carimage"]["name"];
    $carimageTempName = $_FILES["carimage"]["tmp_name"];
    $isMoved = move_uploaded_file($carimageTempName, "carimages/" . $carimagename);
    if ($isMoved) {
        $carname = $_POST["carname"];
        $carcategory = $_POST["carcategory"];
        $carrent = $_POST["carrent"];
        $cardesc = $_POST["cardesc"];

        $carinsertquery = "INSERT INTO `cars`(`car_name`, `car_category`, `car_image`, `car_rent`, `car_description`) VALUES ('$carname',$carcategory,'$carimagename','$carrent','$cardesc')";

        $res = mysqli_query($con,$carinsertquery);
        if($res){
            echo "<script>alert('Car Added Successfully')</script>";
            echo "<script>window.location.href = 'show_car.php'</script>";

        }
        else{
            echo "<script>alert('Error')</script>";
            echo "<script>window.location.href = 'show_car.php'</script>";

        }
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
                    <input type="text" class="form-control" placeholder="Enter Car Name" name="carname">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Car Category</label>
                    <select name="carcategory" id="" class="form-control">
                        <option selected disabled>-- Select Category --</option>
                        <?php foreach ($categoryData as $category) { ?>
                            <option value="<?php echo $category["category_id"] ?>"><?php echo $category["category_name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Car Image</label>
                    <input type="file" name="carimage" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Car Rent Per Day</label>
                    <input type="number" name="carrent" placeholder="Enter Car rent per day" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Car Description</label>
                    <textarea name="cardesc" style="resize: none;" placeholder="Enter Car Description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary mt-3" value="Add Car" name="btncar">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>