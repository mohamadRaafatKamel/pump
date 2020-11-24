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
                    <li><a class="active" href="cable.php">Cable</a></li>
                    <li><a href="addcable.php">Add Cable</a></li>
                </ul>
                <div class="dashboard-wrapper user-dashboard">
                    <div class="table-responsive">
                        <table class="table">
                            <?= $Acon->displayCable(""); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('asset/layout/footer.php'); ?>
