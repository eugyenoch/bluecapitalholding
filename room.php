<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('cookie.php');

if(!isset($_POST['proceedRoom'])){
	header('Location:create-trade.php');
}
?>

<?php include('header.php'); ?>
<body class="page-user">

<?php include('nav.php'); ?>

<div>
<div class="page-content">
<div class="container">
    <div class="row">
<div class="col-lg-12 col-12">
<div class="token-information card card-full-height" style="border-radius: 20px; padding:10px;">
<div class="token-info">
<h2>Admin Message</h2>
<p class="lead">hello , Your Trade Is successfully created . For financial asset security purposes , you will recieve a mail from the escrow service containing the necessary information on the escrow 10% fee payment amount to be made so that you can successfully withdraw crypto currency that you buy and sell respectively!</p>

<section>
<center><a href="create-trade.php" class="btn btn-lg btn-danger"><i class="fa fa-backward"></i>&nbsp;Create another trade</a></center>
</section>
</div>
</div>
</div>
</div>
</div>
<!-- .modal-dialog -->
</div>
<!-- Modal End -->
<!-- JavaScript (include all script here) -->
<script src="https://transactright.com/js/app.js"></script>
<script src="./assets/js/jquery.bundle49f7.js"></script>
<script src="./assets/js/script49f7.js"></script>
<!--Tidio Chat-->
<script src="//code.tidio.co/qfulaxbsih2wsc1kve9zfoibire9rfs9.js" async></script>

</body>

</html>
