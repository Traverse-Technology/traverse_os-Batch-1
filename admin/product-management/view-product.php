<?php
include '../../ulti/helpers.php';
include '../layouts/header.php';
$select_query = "SELECT * FROM products JOIN categories ON products.category_id = categories.id";
$data =  $db->query($select_query);
$products= $data->fetchAll();

?>

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
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>inStock</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $counter = 0;
                                foreach ($products as $product){
                                    $counter++;
                                    echo "<tr>";
                                    echo "<td>".$counter."</td>";
                                    echo "<td>".$product['product_name']."</td>";
                                    echo "<td>".$product['product_name']."</td>";
                                    echo "<td>".$product['name']."</td>";
                                    echo "<td>".$product['inStock']."</td>";
                                    echo '<td>
  <button onclick="showModal('.$counter.')"  class="btn btn-outline-primary">
   <i class="bi bi-eye"></i>
  </button>
</td>';
                                    echo "<td> <img width='100px' src='../../upload_file/$product[product_image]' alt=''></td>";
                                    echo "<td>".$product['created_at']."</td>";
                                    echo "<td>".$product['updated_at']."</td>";
                                    echo "<td>
<a href='update-category.php?id=".$product[0]."' class='btn btn-outline-danger'>
<i class='bi bi-pen'></i>
</a>
<a href='delete-category.php?id=".$product[0]."' class='btn btn-outline-danger'>
<i class='bi bi-trash'></i>
</a>
</td>";
                                    echo "</tr>";
                                    echo '
                                       <!-- Modal -->
    <div class="modal fade" id="description'.$counter.'" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Description</h5>
                
                </div>
                <div class="modal-body">
                   '.$product['description'].'
                </div>
                <div class="modal-footer">
                    <button onclick="hideModal('.$counter.')" type="button" class="btn btn-secondary" >Close</button>
                 
                </div>
            </div>
        </div>
    </div>
                                    ';

                                }

                                ?>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>inStock</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
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

<script>
    function showModal(id) {
        $('#description'+id).modal('show')
    }
    function hideModal(id) {
        $('#description'+id).modal('hide')
    }
</script>

<?php
include '../layouts/footer.php'
?>
