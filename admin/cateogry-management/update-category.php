<?php
ob_start();
include '../../ulti/helpers.php';
include '../layouts/header.php';
$id =  $_GET['id'];
$category = selectData($db,'categories', 'WHERE id ='.$id);

if (isset($_POST['btn_update'])){
    $data  = [
        "name" => $_POST['name']
    ];
    updateData($db,'categories',$data,$id);

    header("Refresh:0; url=view-category.php");
}
?>

<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                    <div class="card-body">
                        <h2 class="text-center">Category Updated</h2>
                        <form method="post">
                            <div class="form-group">
                                <label for="name" class="text-primary"><b>Category Name</b></label>
                                <input type="text" name="name" class="form-control mt-2" id="name" value="<?php echo $category[0]['name'] ?>">
                            </div>
                            <br>

                            <button type="submit" o name="btn_update" class="btn btn-outline-primary float-left">Update</button>
                            <button type="reset" class="btn btn-outline-danger float-right">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
include '../layouts/footer.php'
?>
