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
                <th scope="col">Unique Price</th>
                <th scope="col">Total Price</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody id="tbody">

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

<script>
    showCart();
function showCart() {
    var productData = JSON.parse(localStorage.getItem('productData'));
    var str = "";
    for (let i=0; i < productData.length; i++){
        let count = i+1;
        let totalPrice = productData[i].qty *  productData[i].product_price;
        str += `
            <tr>
                <td>`+count+`</td>
                <td>`+productData[i].product_name+`</td>
                <td>
                    <img class="cart-product" src="upload_file/`+productData[i].product_image+`" alt="">
                </td>
                <td>
                    <button class="btn btn-outline-primary btn-sm" onclick="increaseQty(${productData[i].qty},${productData[i].id})">+</button>
                    `+productData[i].qty+`
                    <button class="btn btn-outline-primary btn-sm" onclick="decreaseQty(${productData[i].qty},${productData[i].id})">-</button>
                </td>
                <td>$`+productData[i].product_price+`</td>
                <td>$`+totalPrice+`</td>
                <td><button  onclick="deleteitem(${productData[i].id})" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button></td>
            </tr>
            `;
    }
    $("#tbody").html(str);
}
    
    function increaseQty(qty,id) {
        var productData = JSON.parse(localStorage.getItem('productData'));
        for (let i=0; i < productData.length; i++){
            if (productData[i].id == id){
                productData[i].qty += 1;
                localStorage.setItem('productData',JSON.stringify(productData));
            }
        }
        showCart();
    }
    function decreaseQty(qty,id) {
        var productData = JSON.parse(localStorage.getItem('productData'));
        for (let i=0; i < productData.length; i++){
            if (productData[i].id == id){
                if (productData[i].qty > 1){
                    productData[i].qty -= 1;
                }
                localStorage.setItem('productData',JSON.stringify(productData));
            }
        }
        showCart();
    }
    function deleteitem(id) {
        var productData = JSON.parse(localStorage.getItem('productData'));
        for (let i=0; i < productData.length; i++){
            if (productData[i].id == id){
                productData.splice(i);
                 delete productData[i];
            }
        }
        localStorage.setItem('productData',JSON.stringify(productData));
        showCart();
    }

</script>
