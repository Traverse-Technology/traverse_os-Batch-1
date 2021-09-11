<?php
include "header.php"
?>
<h1 class="text-center text-dark mt-5"><b>Login Form</b></h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-primary"><b>Email address</b></label>
                    <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="text-primary"><b>Password</b></label>
                    <input type="password" class="form-control " id="exampleInputPassword1" >
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label text-primary" for="exampleCheck1" ><b>Remember me</b></label>
                    <a class="float-right" href="register.php" >Register</a>
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