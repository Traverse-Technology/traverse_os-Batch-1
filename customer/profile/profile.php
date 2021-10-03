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
        $user = selectData($db,'users','WHERE id ='.$uid);
      if (isset($_POST['btn_update'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $old_image = $_POST['old_image'];
          $new_image = $_FILES['new_image'];
          if (empty($new_image['name'])){
              $data=array(
                  "name" => $name,
                  "email" => $email,
                  "phone" => $phone,
                  "address" => $address,
                  "img" => $old_image,
              );
          }else{
              unlink("../../upload_file/".$old_image);
              upload($new_image['tmp_name'],$new_image['name'],"customer");
              $data=array(
                  "name" => $name,
                  "email" => $email,
                  "phone" => $phone,
                  "address" => $address,
                  "img" => time().$new_image['name'],
              );
          }

          updateData($db,'users',$data,$uid);
          header("Refresh:0; url=profile.php");
      }

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
            <div class="col-md-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                    <div class="card-body">
                        <h2 class="text-center">Profile Edit</h2>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="text-primary"><b>Name</b></label>
                                <input name="name" value="<?php echo $user[0]['name']?>" type="text" class="form-control mt-2" id="name" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="email" class="text-primary"><b>Email</b></label>
                                <input name="email"  value="<?php echo $user[0]['email']?>" type="email" class="form-control mt-2" id="email" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="text-primary"><b>Phone</b></label>
                                <input name="phone"  value="<?php echo $user[0]['phone']?>" type="text" class="form-control mt-2" id="phone">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="address" class="text-primary"><b>Address</b></label>
                                <input name="address"  value="<?php echo $user[0]['address']?>" type="text" class="form-control mt-2" id="address" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="image" class="text-primary"><b>Choose Image</b></label>
                                <input name="old_image" value="<?php echo $user[0]['img']?>" type="text" hidden  class="form-control mt-2" id="image" >
                                <input name="new_image" type="file" class="form-control mt-2" id="image" >
                            </div>
                            <br>


                            <br>

                                <button name="btn_update" type="submit" class="btn btn-outline-primary float-left">Submit</button>
                                <button type="reset" class="btn btn-outline-danger float-right">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
</main>

<?php
include '../layouts/footer.php'
?>