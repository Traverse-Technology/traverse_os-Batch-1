<?php
include "ulti/helpers.php";
include "header.php";
if (isset($_POST['btn_register'])){
    $error = array();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $img = $_FILES['image'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];

    $data = array(
        "name" => $name,
        "email" => $email,
        "password" => md5($password),
        "phone" => $phone,
        "address" => $address,
        "role" => "customer",
        "img" => time().$img['name']
    );

    if (!charCount($name,2)){
        $invalid = array("nameCountError"=>"Name must be filled at least 2 characters");
        $error += $invalid;
    }
    if (!charCount($email,5)){
        $invalid = array("emailCountError"=>"Email must be filled at least 5 characters");
        $error += $invalid;
    }
    if (!emailValidate($email)){
        $invalid = array("emailError"=>"Email format is wrong");
        $error += $invalid;
    }
    if (!charCount($phone,11)){
        $invalid = array("phoneCountError"=>"Phone must be filled at least 11 characters");
        $error += $invalid;
    }
    if (!charCount($address,3)){
        $invalid = array("addressCountError"=>"Address must be filled at least 3 characters");
        $error += $invalid;
    }
    if (empty($img['name'])){
        $invalid = array("imageError"=>"Image must be upload");
        $error += $invalid;
    }
    if (!isStrong($password)){
        $invalid = array("passwordError"=>"Password is invalid");
        $error += $invalid;
    }
    if (!charCount($con_password,8)){
        $invalid = array("con_passwordCountError"=>"Confirm Password must be filled at least 8 characters");
        $error += $invalid;
    }
    if ($password != $con_password){
        $invalid = array("con_passwordError"=>"Confirm Password must be same as Password");
        $error += $invalid;
    }
    if (empty($error)){
            upload($img['tmp_name'],$img['name']);
            insertData($db,"users",$data);
            if (isset($_POST['remember'])){
                setcookie("userData",json_encode($data),time()+3600);
            }else{
                $_SESSION['userData'] = $data;
            }
            echo "<script>alert('Register Success')</script>";
            header("Refresh:0 ; url=index.php");
    }

}
?>
<h1 class="text-center text-dark mt-5"><b>Register Form</b></h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="text-primary"><b>Name</b></label>
                    <input type="text"  class="form-control <?php
                    if (isset($_POST['btn_register'])) echo isset($error['nameCountError']) ? 'is-invalid' : 'is-valid';

                    ?>" id="name" name="name">
                    <?php
                    if (isset($error['nameCountError'])){
                        if (isset($_POST['btn_register'])) echo "<small class='text-danger'>".$error['nameCountError']."</small>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="email" class="text-primary"><b>Email</b></label>
                    <input type="email" class="form-control <?php if (isset($_POST['btn_register']))  echo ((isset($error['emailCountError'])) || (isset($error['emailError']))) ? 'is-invalid' : 'is-valid' ?>" id="email" name="email">
                    <?php
                    if (isset($error['emailCountError'])){
                        echo "<small class='text-danger'>".$error['emailCountError']."</small>";
                    }else{
                        if (isset($error['emailError'])){
                            echo "<small class='text-danger'>".$error['emailError']."</small>";
                        }

                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="phone" class="text-primary"><b>Phone</b></label>
                    <input type="text" class="form-control <?php if (isset($_POST['btn_register']))  echo isset($error['phoneCountError']) ? 'is-invalid' : 'is-valid' ?>" id="phone" name="phone">
                </div>
                <?php
                if (isset($error['phoneCountError'])){
                    echo "<small class='text-danger'>".$error['phoneCountError']."</small>";
                }
                ?>
                <div class="form-group">
                    <label for="address" class="text-primary"><b>Address</b></label>
                    <input type="text" class="form-control <?php if (isset($_POST['btn_register']))  echo isset($error['addressCountError']) ? 'is-invalid' : 'is-valid' ?>" id="address" name="address">
                </div>
                <?php
                if (isset($error['addressCountError'])){
                    echo "<small class='text-danger'>".$error['addressCountError']."</small>";
                }
                ?>
                <div class="form-group">
                    <label for="image" class="text-primary"><b>Choose Image</b></label>
                    <input type="file" class="form-control <?php if (isset($_POST['btn_register']))  echo isset($error['imageError']) ? 'is-invalid' : 'is-valid' ?>" id="image" name="image" >
                    <?php
                    if (isset($error['imageError'])){
                        echo "<small class='text-danger'>".$error['imageError']."</small>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password" class="text-primary"><b>Password</b></label>
                    <input type="password" class="form-control <?php if (isset($_POST['btn_register']))  echo isset($error['passwordError']) ? 'is-invalid' : 'is-valid' ?>" id="password" name="password">
                    <?php
                    if (isset($error['passwordError'])){
                        echo "<small class='text-danger'>".$error['passwordError']."</small>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="con_password" class="text-primary"><b>Confirm Password</b></label>
                    <input type="password" class="form-control <?php if (isset($_POST['btn_register']))  echo ((isset($error['con_passwordCountError'])) || (isset($error['con_passwordError']))) ? 'is-invalid' : 'is-valid' ?>" id="con_password" name="con_password">
                    <?php
                    if (isset($error['con_passwordCountError'])){
                        echo "<small class='text-danger'>".$error['con_passwordCountError']."</small>";
                    }else{
                        if (isset($error['con_passwordError'])){
                            echo "<small class='text-danger'>".$error['con_passwordError']."</small>";
                        }
                    }

                    ?>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                    <label class="form-check-label text-primary" for="exampleCheck1" ><b>Remember me</b></label>
                    <a class="float-right" href="login.php" >Login</a>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" name="btn_register" class="btn btn-outline-primary float-left">Submit</button>
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
