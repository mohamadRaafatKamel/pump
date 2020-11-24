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
                <li><a href="cable.php">Cable</a></li>
                <li><a class="active" href="addcable.php">Add Cable</a></li>
            </ul>
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    <a class="logo" href="index.html">
                        <img src="images/logo.png" alt="">
                    </a>
                    <h2 class="text-center">Add Cable</h2>
                    <form class="text-left clearfix" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="number" step="0.1" name="diameter" class="form-control"  placeholder="Diameter" required>
                        </div>
                        <div class="form-group">
                            <input type="number" step="0.1" name="price" class="form-control" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="min" class="form-control" placeholder="Min" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="max" class="form-control" placeholder="Max" required>
                        </div>
                        <div class="form-group">
                            <select  name="pump" class="form-control" required>
                                <option value="">Select Solar Pump</option>
                                <?= $Acon->selectPumps(); ?>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btnAdd" class="btn btn-main text-center" >Add</button>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btnAdd'])){
                            $Acon->addCable();
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('asset/layout/footer.php'); ?>
