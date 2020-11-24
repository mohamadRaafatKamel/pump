<?php
require_once('asset/layout/header.php');
require_once 'Controller.php';
$con=new Controller();
?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Shop</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">shop</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="products section">
	<div class="container">
		<div class="row">
            <?php
            $pumps = $con->shop();
            foreach ($pumps as $myPump){
            ?>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <?php if(isset($myPump['cover'])){ ?>
                            <img class="img-responsive" src="<?= $myPump['cover'] ?>" alt="product-img" />
                        <?php }else{ ?>
                            <img class="img-responsive" src="asset/images/shop/products/product-3.jpg" alt="product-img" />
                        <?php } ?>
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <a href="view.php?id=<?= $myPump['id'] ?>"><i class="tf-ion-ios-search-strong"></i></a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="#"><?= $myPump['name'] ?></a></h4>
                        <p class="price"><?= $myPump['price'] ?> $</p>
                    </div>
                </div>
            </div>
            <?php } ?>

		</div>
	</div>
</section>

<?php require_once('asset/layout/footer.php'); ?>
