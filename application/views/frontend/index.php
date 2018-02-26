<!-- <!--
	Author: WaguraMaurice
	Author URL: http://waguramaurice.co.ke
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
	<title>Responsive Item Cart Template :: Wagura Maurice</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="keywords" content="Responsive Item Cart Template">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Index-Page-CSS -->
	<link rel="stylesheet" href="<?= './assets/frontend/'; ?>css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- //Custom-Stylesheet-Links -->
	<!--fonts -->
	<link href="//fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //fonts -->

	<!-- Font-Awesome-File-Links -->
	<!-- CSS -->
	<link rel="stylesheet" href="<?= './assets/frontend/'; ?>css/font-awesome.css" type="text/css" media="all">
	<!-- //Font-Awesome-File-Links -->
</head>
<!-- //Head -->
<!-- Body -->

<body>
	<div class="banner">
		<div class="banner-layer">
			<h1 class="title-w3layouts">
				<span class="fa fa-cart-arrow-down" aria-hidden="true"></span>Item Cart</h1>
		</div>
		<!-- cart's-Product-Display -->
		<div class="wthreeproductdisplay">
			<div class="container">
				
				<div class="top-grid">
					<?php foreach ($view_data as $key => $value) { ?>
					    <!--Card-->
					    <div class="card cart-grid">
					        <!--Card image-->
					        <img class="img-fluid" src="<?= './uploads/' . $value['image']; ?>" alt="<?= ucwords($value['title']); ?>">
					        <!--Card content-->
					        <div class="card-body">
					            <!--Title-->
					            <h4 class="card-title"><?= ucwords($value['title']); ?></h4>
					            <span> KES <?= number_format($value['price'], 2); ?> /=</span>
					            <!--Text-->
					            <button type="button" class="button w3l-cart" data-toggle="modal" data-target="#cart-<?= $value['id']; ?>">Item Details</button>
					        </div>

					    </div>
					    <!--/.Card-->
						<!-- Modal -->
						<div id="cart-<?= $value['id']; ?>" class="modal fade">
						    <div class="modal-dialog">
						        <div class="modal-content">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                <h4 class="modal-title">ITEM DETAILS</h4>
						            </div>
						            <div class="modal-body">
						             <!--Card-->
								    <div class="card card-cascade wider reverse my-4">
								        <!--Card image-->
								        <div class="view overlay">
								            <img src="<?= './uploads/' . $value['image']; ?>" class="img-fluid">
								            <a href="#!">
								                <div class="mask rgba-white-slight"></div>
								            </a>
								        </div>
								        <!--/Card image-->
								        <!--Card content-->
								        <div class="card-body">
								            <!--Title-->
								            <h4 class="card-title"><strong><?= strtoupper($value['title']); ?></strong></h4>
					                        <h5 class="indigo-text"><strong>KES <?= number_format($value['price'], 2); ?> /=</strong></h5>
								            <p class="card-text"><?= ucwords($value['details']); ?></p>
								        </div>
								        <!--/.Card content-->
								    </div>
								    <!--/.Card-->
						            </div>
						            <div class="modal-footer">
						                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						            </div>
						        </div>
						    </div>
						</div>
					<?php } ?>

					<div class="clear"></div>
				</div>
			</div>
		</div>		
		<div class="copyright text-center">
			<p>© <?= date('Y'); ?> Responsive Item Cart Template. All rights reserved | Design by
				<a href="http://waguramaurice.co.ke" target="_blank">WaguraMaurice</a>
			</p>
		</div>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
<!-- //Body -->

</html>