<?php
ob_start();
include '../../ulti/helpers.php';
include '../layouts/header.php';
$categories = selectData($db,"categories");
if (isset($_POST['product_insert'])){
  $name = $_POST['name'];
  $price = $_POST['price'];
  $inStock= $_POST['inStock'];
  $description= $_POST['description'];
  $category_id =  $_POST['category_id'];
  $product_image =  $_FILES['product_image'];

  $data = array(
        "product_name" => $name,
        "product_price" => $price,
        "inStock" => $inStock,
        "description" => $description,
        "category_id" => $category_id,
        "product_image" => time().$product_image['name']
  );
  insertData($db,'products',$data);
  upload($product_image['tmp_name'],$product_image['name'],"admin");
  header("Refresh:0;url=insert-product.php");
}
?>

<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                    <div class="card-body">
                        <h2 class="text-center">Product Insert</h2>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="text-primary"><b>Product Name</b></label>
                                <input name="name" type="text" class="form-control mt-2" id="name" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="price" class="text-primary"><b>Product Price</b></label>
                                <input name="price" type="number" class="form-control mt-2" id="price">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="inStock" class="text-primary"><b>Product InStock</b></label>
                                <input name="inStock" type="number" class="form-control mt-2" id="inStock" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label  class="text-primary"><b>Description</b></label>
                                <textarea class="form-control" name="description"></textarea>

                            </div>
                            <br>
                            <div class="form-group">
                                <label for="category" class="text-primary"><b>Category</b></label>
                                <select name="category_id" class="form-control" id="category">
                                    <?php
                                    foreach ($categories as $category){
                                            echo "<option value='$category[id]'>".$category['name']."</option>";
                                    }

                                    ?>

                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="image" class="text-primary"><b>Choose Image</b></label>
                                <input name="product_image" type="file" class="form-control mt-2" id="image" >
                            </div>
                            <br>


                            <button name="product_insert" type="submit" class="btn btn-outline-primary float-left">Submit</button>
                            <button type="submit" class="btn btn-outline-danger float-right">Reset</button>

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
