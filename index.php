<?php
include "header.php";
$products = selectData($db,'products','ORDER BY id DESC LIMIT 6');
?>
    <h1 class="text-center text-dark mt-5"><b>New Arrival Products</b></h1>
    <div class="container mt-5">
        <div class="row">
            <?php
            foreach ($products as $product){

                ?>
                <div class="col-md-4">
                    <div class="card mt-3 shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                        <img class="card-img-top product-img" src="upload_file/<?php echo $product['product_image']?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $product['product_name']?></h5>
                            <p class="card-text">$<?php echo $product['product_price']?></p>
                            <a href="#" class="btn btn-outline-primary float-left" onclick="addToCart(<?php echo changeQoute(json_encode(selectCustomData($db,'products','id,product_name,product_price,product_image','WHERE id='.$product[0])))?>)">Buy</a>
                            <a href="#" class="btn btn-outline-primary float-right">View</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>

    </div>
    <script>
        productArray = [];
        function addToCart(productData) {
            var isDuplicate = false;
            productData[0].qty=1;
            productArray.push(productData[0]);
            console.log(productArray);
            localStorage.setItem('productData',JSON.stringify(productArray));
            $("#count").html(productArray.length);
        }
    </script>
<?php
include "footer.php"
?>