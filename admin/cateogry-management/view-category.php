<?php
include '../../ulti/helpers.php';
include '../layouts/header.php';
$categories = selectData($db,'categories');

?>

<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center"><b>View Categories</b></h5>
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
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

        <tbody>
        <?php
        $counter = 0;
        foreach ($categories as $category){
            $counter++;
            echo "<tr>";
            echo "<td>".$counter."</td>";
            echo "<td>".$category['name']."</td>";
            echo "<td>".$category['created_at']."</td>";
            echo "<td>".$category['updated_at']."</td>";
            echo "<td>
<a href='update-category.php?id=".$category['id']."' class='btn btn-outline-danger'>
<i class='bi bi-pen'></i>
</a>
<a href='delete-category.php?id=".$category['id']."' class='btn btn-outline-danger'>
<i class='bi bi-trash'></i>
</a>
</td>";
            echo "</tr>";
        }

        ?>
        </tbody>

                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
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
