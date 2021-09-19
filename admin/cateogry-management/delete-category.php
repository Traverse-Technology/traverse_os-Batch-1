<?php
include '../../ulti/helpers.php';
$id = $_GET['id'];
deleteData($db,'categories','WHERE id ='.$id);
echo "<script>alert('Delete Success')</script>";
header("Refresh:0 ; url=view-category.php");
?>