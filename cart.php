<?php
include "header.php"
?>

<h1 class="text-center text-dark mt-5"><b>Add to Cart</b></h1>
<div class="container mt-4">
<div class="row">
    <div class="col-md-12">
        <div class="shadow-lg p-3 mb-5 bg-white rounded card">
            <div class="card-body">
        <table class="table">
            <thead style="background-color: #0a53be; color: white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>watch</td>
                <td>
                    <img class="cart-product" src="img/watch.png" alt="">
                </td>
                <td>
                    <button class="btn btn-outline-primary btn-sm" >+</button>
                    1
                    <button class="btn btn-outline-primary btn-sm" >-</button>
                </td>
                <td>$2000</td>
                <td><button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>watch</td>
                <td>
                    <img class="cart-product" src="img/watch.png" alt="">
                </td>
                <td>
                    <button class="btn btn-outline-primary btn-sm" >+</button>
                    1
                    <button class="btn btn-outline-primary btn-sm" >-</button>
                </td>
                <td>$2000</td>
                <td><button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>watch</td>
                <td>
                    <img class="cart-product" src="img/watch.png" alt="">
                </td>
                <td>
                    <button class="btn btn-outline-primary btn-sm" >+</button>
                    1
                    <button class="btn btn-outline-primary btn-sm" >-</button>
                </td>
                <td>$2000</td>
                <td><button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button></td>
            </tr>
          <tr>
              <th >Total Price</th>
              <td colspan="4"></td>
              <th >$6000</th>
          </tr>
            </tbody>
        </table>
                <div class="col text-center">
                <button class="btn btn-outline-primary">Check Out</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include "footer.php"
?>