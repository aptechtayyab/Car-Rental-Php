<?php 
include "../db.php";
$idToBeDeleted = $_GET["index"];
$deleteQeury = "DELETE FROM categories WHERE category_id = $idToBeDeleted";

$res=mysqli_query($con,$deleteQeury);
if($res){
    header("Location: show_category.php");
}
else{
    echo "<script>alert('Something went wrong')</script>";
    header("Location: show_category.php");

}
?>