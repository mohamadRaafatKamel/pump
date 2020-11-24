<?php
require_once('asset/layout/header.php');
require_once 'Controller.php';
$cont=new Controller();
$cont->checkOut();
?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8" style="text-align: center; font-size: 75px">
                Thank You For Pay

            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">

                     <div class="verified-icon">
                        <img src="asset/images/shop/verified.png">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php require_once('asset/layout/footer.php'); ?>
