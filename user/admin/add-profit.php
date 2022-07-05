<?php
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
 
if(isset($_POST['addProfit'])){
  //Extract variables from user input
  $mail = $_POST['email'];
  $ptxn = $_POST['ptxn'];
  $eamount = floatval($_POST['eamount']);
  $currency_id = $_POST['currency_id'];
  #$sql_update_fund_amount = "UPDATE `fund` SET `amount`='$eamount' WHERE `ftxn`='$etxn'";

  $sql_profit = "INSERT INTO profit(user_email,ptxn,currency,amount)VALUES('$mail','$ptxn','$currency_id','$eamount')";

  if($con->query($sql_profit) === TRUE){
    $toast = "success";
    echo "<script>location.href='view-profits.php'</script>";
  }
  else{$toast = "fail";}
}

?>
<?php include('header.php'); ?>

<body class="page-user">
<?php include('nav.php'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-xs-12">
 				
                  <div class="card-body">
                    <center>
                  		<h4 class="text-primary" style="color:steelblue !important;">Add Profit To User</h4>

                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="editAmount">
                      <div class="form-group has-feedback">
        <input type="text" name="ptxn" class="form-control sty1" value="<?= 'TXN'.mt_rand(100000,999999);?>" hidden></div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control sty1" value="<?php if(isset($_GET['ap']) && $_GET['ap']!==null){echo $_GET['ap'];}?>">
      </div>
       <div class="form-group has-feedback">
         <div class="select-wrapper">
         <select class="input-bordered" name="currency_id">
              <?php foreach($sql_addresses_exec as $addresses_info){extract($addresses_info);?>
                  <option value="<?= $addresses_info['wallets']?>"><?= $addresses_info['wallets']?></option><?php }?>
              </select>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="eamount" class="form-control sty1" placeholder="Enter profit" required>
      </div>
        <!-- /.col -->
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="addProfit">Add Profit</button>
        </div>
        <!-- /.col --> 
      </div> 
    </form>
  </center>
                  </div>
                </div>
<?php include('footer-menu.php');?>
                   <!-- jQuery 3 --> 
<script src="../dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="../dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="../dist/js/niche.js"></script> 

<!-- jQuery UI 1.11.4 --> 
<script src="../dist/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Toastr -->
<script src="../dist/js/toastr.min.js"></script>
<script type="text/javascript">
  toastr.info('Use this section to edit user finance details and add bonuses','Info');
</script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have changed user information, 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('That operation could not be carried out. Try again', 'Error')</script>";}

$con->close();
?>