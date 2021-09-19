<?php
include '../../ulti/helpers.php';
include '../layouts/header.php';
if (isset($_POST['btn_save'])){
    $data  = [
            "name" => $_POST['name']
    ];
    insertData($db,'categories',$data);
}
?>

<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                    <div class="card-body">
                        <h2 class="text-center">Category Insert</h2>
                        <form method="post">
                            <div class="form-group">
                                <label for="name" class="text-primary"><b>Category Name</b></label>
                                <input type="text" name="name" class="form-control mt-2" id="name" >
                            </div>
                            <br>

                            <button type="submit" name="btn_save" class="btn btn-outline-primary float-left">Submit</button>
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
