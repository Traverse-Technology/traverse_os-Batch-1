<?php
include "header.php"
?>
<h1 class="text-center text-dark mt-5"><b>Contact Form</b></h1>
<div class="container mt-5">
<div class="row">
    <div class="col-md-6">

            <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d237511.30311222468!2d96.19794412214453!3d16.783737510957703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1597761138251!5m2!1sen!2smm" height="425px"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>
    <div class="col-md-6">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1" class="text-primary"><b>Email address</b></label>
                <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="message" class="text-primary"><b>Type Message</b></label>
                <textarea class="form-control" id="message" rows="3"></textarea>
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


<?php
include "footer.php"
?>