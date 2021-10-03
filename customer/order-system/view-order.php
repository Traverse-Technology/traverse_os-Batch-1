<?php
include '../../ulti/helpers.php';
include '../layouts/header.php';
if (isset($_SESSION['userData']) || isset($_COOKIE['userData'])) {
    if (isset($_SESSION['userData'])){
        $userSession = $_SESSION['userData'];
        $uid = $userSession['id'];
        $role = $userSession['role'];
    }else{
        $userObject = json_decode($_COOKIE['userData']);
        $uid = $userObject->id;
        $role = $userObject->role;
    }

 if ($role == "customer"){
     $select_query = "SELECT orders.order_no,orders.total_qty,orders.final_price,orders.created_at,users.name AS user_name,users.email AS user_email FROM orders JOIN users on orders.user_id = users.id WHERE users.id = '$uid'  ORDER BY orders.id DESC";
     $orderObject = $db->query($select_query);
     $orderArrays = $orderObject->fetchAll();
 }else{
     header("Refresh:0; url=../../login.php");
 }
}else{
    header("Refresh:0; url=../../login.php");
}


?>
<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center"><b>View Order</b></h5>
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
                                    <th>Order No</th>
                                    <th>Final Qty</th>
                                    <th>Final Price</th>
                                    <th>Detail</th>
                                    <th>Order Date</th>
                                </tr>
                                </thead>
                               <tbody>
                               <?php
                               $counter = 0;
                               foreach ($orderArrays as $orderArray){
                                   $counter +=1;
                                   echo "<tr>";
                                   echo "<td>$counter</td>";
                                   echo "<td>$orderArray[order_no]</td>";
                                   echo "<td>$orderArray[total_qty]</td>";
                                   echo "<td>$orderArray[final_price]</td>";
                                   echo "<td>
<a href='order-detail.php?order_no=".$orderArray['order_no']."' class='btn btn-primary'><i class='bi bi-eye'></i></a>
</td>";
                                   echo "<td>$orderArray[created_at]</td>";
                                   echo "</tr>";
                               }
                               ?>
                               </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Order No</th>
                                    <th>Final Qty</th>
                                    <th>Final Price</th>
                                    <th>Detail</th>
                                    <th>Order Date</th>
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
