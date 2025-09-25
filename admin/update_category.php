<?php include "includes/header.php";
include "../db.php";


$idToBeUpdated = $_GET["index"];

$getCategoryDataQuery = mysqli_query($con, "SELECT * FROM categories WHERE category_id = $idToBeUpdated");

$categoryData = mysqli_fetch_assoc($getCategoryDataQuery);


// update:
if (isset($_POST["btnupdatecategory"])) {
    $categoryname = $_POST["categoryname"];

    $res = mysqli_query($con, "UPDATE `categories` SET `category_name`='$categoryname' WHERE category_id = $idToBeUpdated");
    if ($res) {
        echo "<script>window.location.href = 'show_category.php'</script>";
    } else {
        echo "<script>alert('Something went wrong')</script>";
                echo "<script>window.location.href = 'show_category.php'</script>";

    }
}
?>
<div class="container">

    <div class="card position-relative">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Category Below</h6>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="" class="form-label">Category Name</label>
                    <input type="text" class="form-control" placeholder="Enter category" name="categoryname" value="<?php echo $categoryData["category_name"] ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary mt-3" value="Update Category" name="btnupdatecategory">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>