<?php
include "header.php";
$cat_id = $_GET['cat_id'];
$products = selectData($db,"products","WHERE category_id=".$cat_id);

?>
<h1 class="text-center text-dark mt-5"><b>Products</b></h1>
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
                  <a  class="btn btn-outline-primary float-left" onclick="addToCart(<?php echo $product[0] ?>)">Buy</a>
                  <a href="#" class="btn btn-outline-primary float-right">View</a>
              </div>
          </div>
      </div>
          <?php
      }
          ?>
  </div>
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
</div>

<?php
include "footer.php"
?>