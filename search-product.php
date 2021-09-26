<?php
include "header.php";
if (isset($_GET['btn_search'])){
    $products = selectData($db,'products','WHERE product_name LIKE '.'\'%'.$_GET['keyword'].'%\'');
}

?>
<h1 class="text-center text-dark mt-5"><b>Search Product</b></h1>
<div class="container mt-5">
    <div class="row">

        <?php
        if (empty($products)){
            echo "<h3>No product found!</h3>";
        }
        foreach ($products as $product){

            ?>
            <div class="col-md-4">
                <div class="card mt-3 shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top product-img" src="upload_file/<?php echo $product['product_image']?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $product['product_name']?></h5>
                        <p class="card-text">$<?php echo $product['product_price']?></p>
                        <a href="#" class="btn btn-outline-primary float-left">Buy</a>
                        <a href="#" class="btn btn-outline-primary float-right">View</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
    <?php
    if (!empty($products)){

    ?>
    <div class="row mt-3">
        <div class="col-md-4">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
      <span class="page-link">
        2
        <span class="sr-only">(current)</span>
      </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <?php
    }
    ?>
</div>

<?php
include "footer.php"
?>
