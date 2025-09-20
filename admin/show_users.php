<?php include "includes/header.php";

include "../db.php";
$query = "SELECT * FROM users INNER JOIN roles ON users.role_id = roles.role_id;";
$users = mysqli_query($con, $query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Users</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All users below</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Role</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Role</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user["user_id"]?></td>
                                <td><?php echo $user["user_name"]?></td>
                                <td><?php echo $user["user_email"]?></td>
                                <td><?php echo $user["role_name"]?></td>
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