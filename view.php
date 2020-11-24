<?php
require_once('asset/layout/header.php');
require_once 'Controller.php';
$cont=new Controller();
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $pump = $cont->view($id);
    if(!isset($pump['name'])){
        die("<script>location.href ='index.php'</script>");
    }
}else{
    die("<script>location.href ='index.php'</script>");
}
?>

<div class="container">
    <div class="row mt-20">
        <div class="col-md-5">
            <div class="single-product-slider">
                <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                    <div class='carousel-outer'>
                        <!-- me art lab slider -->
                        <?php if(!empty($pump['cover'])){ ?>
                            <div class='carousel-inner '>
                                <div class='item active'>
                                    <img src='<?= $pump['cover'] ?>' width="100%" height="100%" alt='No Image'" />
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="single-product-details">
                <h2><?= $pump['name'] ?></h2>

                <p>
                    <b>Pressure :</b> <?= $pump['pressure'] ?> V<br/>
                    <b>Price :</b> <?= $pump['price'] ?> $
                <form class="text-left clearfix" method="post">
                    <div class="text-center">
                        <select  name="panel" class="form-control" required>
                            <option value="">Select Solar Panel</option>
                            <?= $cont->selectSolarPanel(); ?>
                        </select>
                    </div>
                    <b>Are you need extra cable ? </b>
                    <input type="radio" name="gender" value="0" checked> No
                    <input type="radio" name="gender" value="1"> Yes <br/>

                    <div class="form-group" style="display: none" id="cableLength">
                        <input type="number" name="cableLength" id="cableLengthInput" class="form-control" value="" placeholder="Cable Length">
                    </div>
                    <div id="totalPrice">

                    </div>
                    <div class="text-center">
                        <button type="submit" name="btnBuy" id="btnBuy" class="btn btn-main text-center" >Buy</button>
                    </div>
                    <?php
                    if(isset($_POST['btnBuy'])){
                        $cont->addOrder($id);
                    }
                    ?>
                </form>


                </p>

            </div>
        </div>
    </div>
</div>

<?php require_once('asset/layout/footer.php'); ?>
