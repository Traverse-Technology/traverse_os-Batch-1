<?php
include "header.php";
date_default_timezone_set("Asia/Yangon");
if (isset($_POST['products'])){
    if (isset($_SESSION['userData']) || isset($_COOKIE['userData'])) {
        $products = $_POST['products'];
        $finalQty = 0;
        $fianlPrice = 0;
        $uid = 0;
        if (isset($_SESSION['userData'])){
            $userSession = $_SESSION['userData'];
            $uid = $userSession['id'];
        }else{
            $userObject = json_decode($_COOKIE['userData']);
            $uid = $userObject->id;
        }
        foreach ($products as $product){
            $data = array(
                "order_no" => md5(strval(time())),
                "product_id" =>$product['id'],
                "qty" =>$product['qty'],
                "unit_price" => $product['product_price'],
                "total_price" => $product['qty'] * $product['product_price']
            );
            $finalQty += $product['qty'];
            $fianlPrice += $product['product_price'];
            insertData($db,'order_detail',$data);
        }

        $orderData = array(
            "user_id" => $uid,
            "order_no" => md5(strval(time())),
            "total_qty" =>$finalQty,
            "final_price" =>$fianlPrice,
            "month" => date("M"),
            "year" => date("Y"),
        );
        insertData($db,'orders',$orderData);




    }else{
        echo "Need to login";
    }

}
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
            <tfooter >
                <tr id="tfooter">
                </tr>
            </tfooter>
        </table>
                <div class="col text-center">
                <button class="btn btn-outline-primary" onclick="checkout()">Check Out</button>
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
    finalPrice();
    function finalPrice() {
        var finalPrice = 0;
        var productData = JSON.parse(localStorage.getItem('productData'));
        for (let i=0; i < productData.length; i++){
            finalPrice += productData[i].qty * productData[i].product_price;
        }
var str = `

                    <td  colspan="6">Final Price</td>
                    <td>$`+finalPrice+`</td>

`
        $("#tfooter").html(str);

    }
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
        finalPrice();
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
        finalPrice();
    }
    function deleteitem(id) {
        var productData = JSON.parse(localStorage.getItem('productData'));
        for (let i=0; i < productData.length; i++){
            if (productData[i].id == id){
                productData.splice(i,1);
            }
        }
        localStorage.setItem('productData',JSON.stringify(productData));
        showCart();
        finalPrice();
        showCount();
    }

    function checkout() {
        var productData = JSON.parse(localStorage.getItem('productData'));
        $.ajax({
            url: "cart.php",
            type: "post",
            data:{
                products:productData
            },
            success:function (response) {
                console.log(response);
                let needLogin = response.match(/Need to login/g).length;
                console.log(needLogin);
                if (needLogin == 2){
                    alert("Need login first");
                }else {
                    alert("Order Success!");
                    localStorage.removeItem('productData');
                    window.location.replace('index.php');
                }
            },
            error:function (error) {
                console.log(error)
            }
        })
    }

</script>
