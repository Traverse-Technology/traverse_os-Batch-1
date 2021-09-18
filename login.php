<?php
include "ulti/helpers.php";
include "header.php";
if(isset($_POST['btn_login'])){
    $email =  $_POST['email'];
    $password =  md5($_POST['password']);
    $where = "WHERE email = '".$email."' AND "."password = '".$password."'";
    $userData = selectData($db,'users',$where);
    if (empty($userData)){
        echo "<script>alert('Login Fail')</script>";
    }else{
        echo "<script>alert('Login Success')</script>";
        if (isset($_SESSION['userData'])){
            $_SESSION['userData'] = $userData[0];
        }else{
            setcookie("userData",json_encode($userData[0]),time()+3600);
        }

        header('Location:index.php');
    }
}

?>
<h1 class="text-center text-dark mt-5"><b>Login Form</b></h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-primary"><b>Email address</b></label>
                    <input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="text-primary"><b>Password</b></label>
                    <input type="password" name="password" class="form-control " id="exampleInputPassword1" >
                </div>
                <div class="form-check">
                    <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label text-primary" for="exampleCheck1" ><b>Remember me</b></label>
                    <a class="float-right" href="register.php" >Register</a>
                </div>
                <br>
                <div class="form-group">
                <button type="submit" name="btn_login" class="btn btn-outline-primary float-left">Submit</button>
                <button type="reset" class="btn btn-outline-danger float-right">Reset</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php"
?>