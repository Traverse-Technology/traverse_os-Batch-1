<?php
include 'layouts/header.php'
?>
<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded card">
                    <div class="card-body">
                        <h2 class="text-center">Profile Edit</h2>
                        <form>
                            <div class="form-group">
                                <label for="name" class="text-primary"><b>Name</b></label>
                                <input type="text" class="form-control mt-2" id="name" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="email" class="text-primary"><b>Email</b></label>
                                <input type="email" class="form-control mt-2" id="email" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="text-primary"><b>Phone</b></label>
                                <input type="text" class="form-control mt-2" id="phone">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="address" class="text-primary"><b>Address</b></label>
                                <input type="text" class="form-control mt-2" id="address" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="image" class="text-primary"><b>Choose Image</b></label>
                                <input type="file" class="form-control mt-2" id="image" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="password" class="text-primary"><b>Password</b></label>
                                <input type="password" class="form-control mt-2" id="password" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="con_password" class="text-primary"><b>Confirm Password</b></label>
                                <input type="password" class="form-control mt-2" id="con_password" >
                            </div>

                            <br>

                            <button type="submit" class="btn btn-outline-primary float-left">Submit</button>
                            <button type="submit" class="btn btn-outline-danger float-right">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include 'layouts/footer.php'
?>

