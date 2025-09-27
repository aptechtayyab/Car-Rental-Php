<?php include "includes/header.php";

include "../db.php";
$query = "SELECT * FROM cars INNER JOIN categories ON cars.car_category = categories.category_id;";
$carData = mysqli_query($con, $query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Cars</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All cars below</h6>
            <a href="add_car.php" class="btn btn-primary">Add New Car</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Car Id</th>
                            <th>Car Name</th>
                            <th>Car Category</th>
                            <th>Car Image</th>
                            <th>Car Rent</th>
                            <th>Car Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                         <tr>
                            <th>Car Id</th>
                            <th>Car Name</th>
                            <th>Car Category</th>
                            <th>Car Image</th>
                            <th>Car Rent</th>
                            <th>Car Description</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($carData as $car) { ?>
                            <tr>
                                <td><?php echo $car["car_id"] ?></td>
                                <td><?php echo $car["car_name"] ?></td>
                                <td><?php echo $car["category_name"] ?></td>
                                <td>
                                    <img width="200" src="carimages/<?php echo $car["car_image"]?>" alt="">
                                </td>
                                <td>$<?php echo $car["car_rent"] ?></td>
                                <td><?php echo $car["car_description"] ?></td>
                                <td>
                                    <a href="update_car.php?index=<?php echo $car["car_id"] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $car["car_id"]?>">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="exampleModal-<?php echo $car["car_id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Car Delete Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="delete_car.php?index=<?php echo $car["car_id"] ?>" class="btn btn-danger">Confirm Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include "includes/footer.php" ?>