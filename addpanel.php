<?php
require_once('asset/layout/header.php');
require_once 'AdminController.php';
$Acon=new AdminController();
$Acon->checkAdmin();
?>


<section class="signin-page account">
    <div class="container">
        <div class="row">
            <ul class="list-inline dashboard-menu text-center">
                <li><a href="panel.php">Solar Panel</a></li>
                <li><a class="active" href="addpanel.php">Add Solar Panel</a></li>
            </ul>
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    <a class="logo" href="index.html">
                        <img src="images/logo.png" alt="">
                    </a>
                    <h2 class="text-center">Add Solar Panel</h2>
                    <form class="text-left clearfix" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control"  placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="watt" class="form-control" placeholder="watt" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" class="form-control" placeholder="Price" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btnAdd" class="btn btn-main text-center" >Add</button>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btnAdd'])){
                            $Acon->addPanel();
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('asset/layout/footer.php'); ?>
