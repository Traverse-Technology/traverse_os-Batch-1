<?php
ob_start();
include '../../ulti/helpers.php';
include '../layouts/header.php';
$id = $_GET['id'];
$select_query = "SELECT * FROM products JOIN categories ON products.category_id = categories.id WHERE products.id =".$id;
$data =  $db->query($select_query);
$products= $data->fetchAll();
$categories = selectData($db,"categories", "WHERE NOT id=".$products[0]['category_id']);

if (isset($_POST['product_update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $inStock= $_POST['inStock'];
    $description= $_POST['description'];
    $category_id =  $_POST['category_id'];
    $old_image=  $_POST['old_image'];
    $product_image =  $_FILES['product_image'];
    if (empty($product_image['name'])){
        $data = array(
                "product_name" => $name,
                "product_price" => $price,
                "category_id" => $category_id,
                "inStock" => $inStock,
                "description" => $description,
                "product_image" => $old_image
        );

    }else{
        unlink("../../upload_file/".$old_image);
        upload($product_image['tmp_name'],$product_image['name'],"admin");
        $data = array(
            "product_name" => $name,
            "product_price" => $price,
            "category_id" => $category_id,
            "inStock" => $inStock,
            "description" => $description,
            "product_image" => time().$product_image['name']
        );
    }
    updateData($db,"products",$data,$id);
    header("Refresh:0;url=view-product.php");
}

?>

<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                    <div class="card-body">
                        <h2 class="text-center">Product Update</h2>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="text-primary"><b>Product Name</b></label>
                                <input value="<?php echo $products[0]['product_name'] ?>" name="name" type="text" class="form-control mt-2" id="name" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="price" class="text-primary"><b>Product Price</b></label>
                                <input value="<?php echo $products[0]['product_price'] ?>" name="price" type="number" class="form-control mt-2" id="price">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="inStock" class="text-primary"><b>Product InStock</b></label>
                                <input value="<?php echo $products[0]['inStock'] ?>" name="inStock" type="number" class="form-control mt-2" id="inStock" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label  class="text-primary"><b>Description</b></label>
                                <textarea class="form-control" name="description"><?php echo $products[0]['description'] ?></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="category" class="text-primary"><b>Category</b></label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value="<?php echo $products[0]['category_id'] ?>"><?php echo $products[0]['name'] ?></option>
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
                                <input hidden name="old_image" type="text" value="<?php echo $products[0]['product_image'] ?>">
                                <input name="product_image" type="file" class="form-control mt-2" id="image" >
                            </div>
                            <br>


                            <button name="product_update" type="submit" class="btn btn-outline-primary float-left">Submit</button>
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
