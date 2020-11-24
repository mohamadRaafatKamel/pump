<?php
require_once 'asset/layout/header.php';
require_once 'Controller.php';
$con=new Controller();
?>


<section class="signin-page account">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    <a class="logo" href="index.html">
                        <img src="images/logo.png" alt="">
                    </a>
                    <h2 class="text-center">Registration</h2>
                    <form class="text-left clearfix" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control"  placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btnCreate" class="btn btn-main text-center" >Create</button>
                        </div>
                    </form>
                    <p class="mt-20">Have account ?<a href="login.php"> Login</a></p>
                    <?php
                        if(isset($_POST['btnCreate'])){
                            $con->registration();
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('asset/layout/footer.php'); ?>
