<?php
include "../../ulti/helpers.php";
$id = $_GET['id'];
echo $id;
deleteData($db,"products","WHERE id =".$id);
header("Refresh:0 ; url=view-product.php");
?>