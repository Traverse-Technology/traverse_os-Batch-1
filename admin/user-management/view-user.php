<?php
ob_start();
include '../../ulti/helpers.php';
include '../layouts/header.php';
$users= selectData($db,'users');
if (isset($_GET['user_id'])){
    if ($_GET['lock'] == "true"){

        $data = array(
                "status" => "unactive"
        );
        updateData($db,'users',$data,$_GET['user_id']);
        header("Refresh:0; url=view-user.php");
    }else{
        echo var_dump($_GET['lock']);
        $data = array(
            "status" => "active"
        );
        updateData($db,'users',$data,$_GET['user_id']);
        header("Refresh:0; url=view-user.php");
    }

}
?>
<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center"><b>View User</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                    id="example"
                                    class="table table-striped data-table"
                                    style="width: 100%"
                            >
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $counter = 0;
                                foreach ($users as $user){
                                    $counter += 1;
                                    echo "<tr>";
                                    echo "<td>".$counter."</td>";
                                    echo "<td>".$user['name']."</td>";
                                    echo "<td><img width='100px' src='../../upload_file/$user[img]' alt=''></td>";
                                    echo "<td>".$user['email']."</td>";
                                    echo "<td>".$user['phone']."</td>";
                                    echo "<td>".$user['address']."</td>";
                                    echo "<td>".$user['status']."</td>";
                                    if ($user['status'] == 'active'){
                                        echo "<td><a href='view-user.php?user_id=$user[id] & lock=true'><i class='bi bi-lock'></i></a></td>";
                                    }else{
                                        echo "<td><a href='view-user.php?user_id=$user[id] & lock=false'><i class='bi bi-unlock'></i></a></td>";
                                    }

                                    echo "<td>".$user['created_at']."</td>";
                                    echo "<td>".$user['updated_at']."</td>";
                                    echo "</tr>";
                                }
                                ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include '../layouts/footer.php'
?>