<?php
include "header.php"
?>
<h1 class="text-center text-dark mt-5"><b>Register Form</b></h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="name" class="text-primary"><b>Name</b></label>
                    <input type="text" class="form-control " id="name" >
                </div>
                <div class="form-group">
                    <label for="email" class="text-primary"><b>Email</b></label>
                    <input type="email" class="form-control " id="email" >
                </div>
                <div class="form-group">
                    <label for="phone" class="text-primary"><b>Phone</b></label>
                    <input type="text" class="form-control " id="phone">
                </div>
                <div class="form-group">
                    <label for="address" class="text-primary"><b>Address</b></label>
                    <input type="text" class="form-control " id="address" >
                </div>
                <div class="form-group">
                    <label for="image" class="text-primary"><b>Choose Image</b></label>
                    <input type="file" class="form-control" id="image" >
                </div>
                <div class="form-group">
                    <label for="password" class="text-primary"><b>Password</b></label>
                    <input type="password" class="form-control " id="password" >
                </div>
                <div class="form-group">
                    <label for="con_password" class="text-primary"><b>Confirm Password</b></label>
                    <input type="password" class="form-control " id="con_password" >
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label text-primary" for="exampleCheck1" ><b>Remember me</b></label>
                    <a class="float-right" href="login.php" >Login</a>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary float-left">Submit</button>
                    <button type="submit" class="btn btn-outline-danger float-right">Reset</button>
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
