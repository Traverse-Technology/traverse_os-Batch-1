<?php
include '../../ulti/helpers.php';
include '../layouts/header.php';
$order_no = $_GET['order_no'];
$select_query = "SELECT products.product_name,products.product_image,order_detail.qty,order_detail.unit_price,order_detail.total_price  FROM order_detail JOIN products ON order_detail.product_id = products.id WHERE order_no = '$order_no'";
$orderObject = $db->query($select_query);
$orderDetailArrays = $orderObject->fetchAll();

?>
<!-- offcanvas -->
<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center"><b>View Product</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                    id="example"
                                    class="table table-striped data-table"
                                    style="width: 100%"
                            >
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Qty</th>
                                    <th>Unite Price</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                             <tbody>
                             <?php
                             $counter = 0;
                             foreach ($orderDetailArrays as $orderDetailArray){
                                 $counter +=1;
                                 echo "<tr>";
                                 echo "<td>$counter</td>";
                                 echo "<td>$orderDetailArray[product_name]</td>";
                                 echo "<td><img width='100px' src='../../upload_file/$orderDetailArray[product_image]' alt=''></td>";
                                 echo "<td>$orderDetailArray[qty]</td>";
                                 echo "<td>$orderDetailArray[unit_price]</td>";
                                 echo "<td>$orderDetailArray[total_price]</td>";
                                 echo "</tr>";
                             }
                             ?>


                             </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Qty</th>
                                    <th>Unite Price</th>
                                    <th>Total Price</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include '../layouts/footer.php'
?>
