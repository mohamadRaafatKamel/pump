<?php
require_once('asset/layout/header.php');
require_once 'AdminController.php';
$Acon=new AdminController();
$Acon->checkAdmin();
?>

<section class="user-dashboard page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline dashboard-menu text-center">
                    <li><a class="active" href="panel.php">Solar Panel</a></li>
                    <li><a href="addpanel.php">Add Solar Panel</a></li>
                </ul>
                <div class="dashboard-wrapper user-dashboard">

                    <form class="checkout-form" method="post">
                        <div class="form-group">
                            <label for="full_name">Search By Name</label>
                            <input type="text" class="form-control" name="name" id="full_name" placeholder="">
                        </div>
                        <button type="submit" name="btnAddCategory" class="btn btn-main">Search</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table">
                            <?php

                            $fliter="";
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                if (isset($_POST['name'])) {
                                    $fliter=$_POST['name'];
                                }

                            }else {
                                $fliter="";
                            }

                            echo $Acon->displayPanel($fliter);
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('asset/layout/footer.php'); ?>
