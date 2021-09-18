<?php
session_start();
if ($_SESSION['userData'])
{
    unset($_SESSION['userData']);
}else{
    setcookie('userData','',time()-3600);
}
echo "<script>alert('Logout Success')</script>";
header("Refresh:0 ; url=index.php");

?>