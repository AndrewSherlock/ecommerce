<?php
?>

<main>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="index.php?action=login" method="post">
                    <h2 class="text-center">Login</h2>
                    <div class="form-group col-md-12">
                        <label class="col-md-3">Email : </label>
                        <input type="email" name="user_email" class="form-control col-md-6">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3">Password : </label>
                        <input type="password" name="user_password" class="form-control col-md-6">
                    </div>
                    <div class="col-md-12 form-group text-center">
                        <input type="submit" value="Log In" class="btn btn-success btn-lg">
                        <a href="index.php?action=index" class="btn-lg btn btn-danger">Return</a>
                    </div>
                </form>
                <hr>
                <div class="col-md-12 text-center">
                    <a href="index.php?action=adduser" class="btn-lg btn btn-primary">Join Now</a>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</main>
