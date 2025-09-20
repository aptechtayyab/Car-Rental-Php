<?php include "includes/header.php";
include "../db.php";
if (isset($_POST["btncategory"])) {
    $categoryname =  $_POST["categoryname"];
    $query = "INSERT INTO `categories`(`category_name`) VALUES ('$categoryname')";
    $response = mysqli_query($con, $query);
    if ($response) {
        echo "<script>window.location.href='show_category.php'</script>";
    } else {
        echo "<script>alert('Something went wrong ')</script>";
    }
}

?>
<div class="container">

    <div class="card position-relative">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Category Below</h6>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="" class="form-label">Category Name</label>
                    <input type="text" class="form-control" placeholder="Enter category" name="categoryname">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary mt-3" value="Add Category" name="btncategory">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>