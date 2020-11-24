<?php
require_once('asset/layout/header.php');
require_once 'Controller.php';
$cont=new Controller();
 ?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">cart</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
                <?php if(!empty($table = $cont->displayOrder())){ ?>
                  <form method="post">
                      <table class="table">
                          <?= $table; ?>
                      </table>
                    <a href="checkout.php" class="btn btn-main pull-right">Checkout</a>
                  </form>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('asset/layout/footer.php'); ?>
