<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('cookie.php');
//$sessEmail = $_SESSION['email'];
include('./include/referral.php');

$sql_active_transact = "SELECT * FROM `transact` WHERE `user_email`='$session_email' AND `status`='approved'";
$sql_active_exec = $con->query($sql_active_transact);
$sql_count_active_exec = mysqli_num_rows($sql_active_exec);

#SQL Count fund
$sql_factive_transact = "SELECT * FROM `fund` WHERE `user_email`='$session_email' AND `status`='approved'";
$sql_factive_exec = $con->query($sql_factive_transact);
$sql_count_factive_exec = mysqli_num_rows($sql_factive_exec);


$sql_profit_transact = "SELECT * FROM `profit` WHERE `user_email`='$session_email'";
$sql_profit_exec = $con->query($sql_profit_transact);
$sql_count_profit_exec = mysqli_num_rows($sql_profit_exec);

$USER = getUser($_SESSION['email'], $con);
// REMEMBER TO CHANGE THE URL VARIABLE

// Local
//$DOMAIN = "http://localhost/dave";

// Online
$DOMAIN = "https://bluecapitalholding.com";
$REF_CODE = generateReferralCode($USER['id_no']);


if(!isset($_SESSION['email'])){header('Location:login.php');}
?>
<?php include('header.php'); ?>
<body class="page-user">

<?php include('nav.php'); ?>

<div>
<div class="page-content">
<div class="container">
    <div class="row">
<div class="col-lg-12 col-12">
<!-- <div class="token-information card card-full-height" style="border-radius: 20px;">
<div class="token-info"> -->
<!-- <h1 class="token-info-head text-light">Select Trading Plan</h1>
<div class="gaps-2x"></div>
<h5 class="token-info-sub"> <a href="#starter-pack" data-toggle="modal" data-target="#starter-pack" class="btn btn-sm btn-outline btn-light">
                                <span class="icon-s"><i data-feather="file"></i></span>
                                <span>Classic Plan</span>
                            </a> <a href="#premium-pack" data-toggle="modal" data-target="#premium-pack" class="btn btn-sm btn-outline btn-light">
                                <span class="icon-s"><i data-feather="file"></i></span>
                                <span>Deluxe Plan</span>
                            </a> <a href="#gold-pack" data-toggle="modal" data-target="#gold-pack" class="btn btn-sm btn-outline btn-light">
                                <span class="icon-s"><i data-feather="file"></i></span>
                                <span>Master Plan</span>
                            </a>
                            <a href="#gold-plus" data-toggle="modal" data-target="#gold-plus" class="btn btn-sm btn-outline btn-light">
                                <span class="icon-s"><i data-feather="file"></i></span>
                                <span>Gold Plus</span>
                            </a>
                        </h5> -->
<!-- </div>
</div> -->
</div>
</div>

<div class="row">
<div class="col-lg-6 col-6 col-sm-12 col-xs-12">
<div class="token-information card card-full-height" style="border-radius: 20px;">
<div class="token-info">
<h1 class="token-info-head text-light">Total Profit</h1>
<div class="gaps-2x"></div>
<h5 class="token-info-sub"><?php 
$sql_profit_bal="SELECT amount FROM profit WHERE user_email='$session_email'";
$sql_profit_bal_check = $con->query($sql_profit_bal);
$sql_profit_assoc = mysqli_fetch_assoc($sql_profit_bal_check);

if($sql_profit_assoc){
    $sql_profit_assoc_row = $sql_profit_assoc['amount'];
    echo "${$sql_profit_assoc_row}";
} else{echo "$0.00";}?></h5>
</div>
</div>
<!-- .card -->
</div><!-- .col -->
<div class="col-lg-6 col-6 col-sm-12 col-xs-12">
<div class="token-information card card-full-height" style="border-radius:20px;">
<div class="token-info">
<h1 class="token-info-head text-light">Total Withdrawal</h1>
<div class="gaps-2x"></div>
<h5 class="token-info-sub"><?php $sql_withdrawals = "SELECT sum(wamount) AS swd FROM withdraw WHERE user_email='$session_email' AND wstatus='approved'";
$sql_withdrawals_exec = $con->query($sql_withdrawals);
$sql_withdrawals_assoc = mysqli_fetch_assoc($sql_withdrawals_exec);
if($sql_withdrawals_assoc){
    $withdrawn_row = $sql_withdrawals_assoc['swd'];
     //if(isset($withdraw_info['wamount'])&& $withdraw_info['wamount']!==null){
                  echo "$".$withdrawn_row;
                }else{echo "$0.00";}//}
                ?>
</h5>
</div>
</div>
<!-- .card -->
</div><!-- .col -->
<div class="col-lg-4 col-12 col-md-6 col-sm-12 col-xs-12">
<div class="token-information card card-full-height " style="border-radius: 20px;">
<div class="token-info">
<h1 class="token-info-head text-light">Completed Trades</h1>
<div class="gaps-2x"></div>
<h5 class="token-info-sub"><?php if(isset($sql_count_factive_exec) && $sql_count_factive_exec > 0){echo $sql_count_factive_exec;}?></h5>
</div>
</div>
<!-- .card -->
</div><!-- .col -->
<div class="col-lg-8 col-12 col-md-6 col-sm-12 col-xs-12">
<div class="token-statistics card card-token height-auto" style="border-radius: 20px;">
<div class="card-innr">
<div class="token-balance token-balance-with-icon">

</div>
<div class="token-balance token-balance-s2">
<h3 class="card-sub-title">Summary of deposits</h3>
<ul class="token-balance-list row">
<li class="token-balance-sub col-md-12 col-lg-6 mb-3" hidden><?php
    foreach($sql_withdraw_exec as $withdraw_info){extract($withdraw_info);?>
<span class="lead"><?php if(isset($withdraw_info['wstatus']) && $withdraw_info['wstatus']==="approved"){} ?></span>
<span class="sub"><?php if(isset($withdraw_info['wstatus']) && $withdraw_info['wstatus']==="approved"){}?></span>

<?php } ?>
</li>

<li class="token-balance-sub col-md-12 col-lg-6 mb-3">
    <?php 

    $disp_bal = "SELECT sum(amount) AS psum,currency AS cur FROM fund WHERE user_email ='$session_email' AND status='pending'";
    $display_pending_balance = $con->query($disp_bal);
    $display_pending_balance2 = mysqli_fetch_assoc($display_pending_balance);
    if($display_pending_balance2){echo "<span>Latest Requested Deposit:<br>". $display_pending_balance2['cur'] . ' '.$display_pending_balance2['psum']. "</span><br>";}
    // if(isset($fund_info['amount']) && isset($fund_info['currency']) && $fund_info['status']=='pending'){
    // echo "<span>Latest Requested Deposit: ".$fund_info['amount']." ".$fund_info['currency']. "</span><br>";}else{echo "No requested deposits yet<br>";}

    //echo "<br><big><strong>Fund Totals</strong></big><br>";
    $r_deposit = "SELECT sum(amount) AS rsum,currency AS cur FROM fund WHERE user_email ='$session_email' AND status = 'approved'";
    $r_depo_2 = $con->query($r_deposit);
    $r_depo_3 = mysqli_fetch_assoc($r_depo_2);
    if($r_depo_3){if($fund_info['currency']==="BTC"){echo $r_depo_3['cur'] . ' '.$r_depo_3['rsum'] .' <br>';}}

    $r_eth = "SELECT sum(amount) AS rsum,currency AS cur FROM fund WHERE user_email ='$session_email' AND (status = 'approved' AND currency = 'ETH')";
    $r_eth_2 = $con->query($r_eth);
    $r_eth_3 = mysqli_fetch_assoc($r_eth_2);
    if($r_eth_3){echo $r_eth_3['cur'] . ' '.$r_eth_3['rsum'] .' ';}

    $r_Flow = "SELECT sum(amount) AS rsum,currency AS cur FROM fund WHERE user_email ='$session_email' AND (status = 'approved' AND currency = 'Flow')";
    $r_Flow_2 = $con->query($r_Flow);
    $r_Flow_3 = mysqli_fetch_assoc($r_Flow_2);
    if($r_Flow_3){echo $r_Flow_3['cur'] . ' '.$r_Flow_3['rsum'] .' ';}

    $r_bnb = "SELECT sum(amount) AS rsum,currency AS cur FROM fund WHERE user_email ='$session_email' AND (status = 'approved' AND currency = 'BNB')";
    $r_bnb_2 = $con->query($r_bnb);
    $r_bnb_3 = mysqli_fetch_assoc($r_bnb_2);
    if($r_bnb_3){echo $r_bnb_3['cur'] . ' '.$r_bnb_3['rsum'] .'<br>';}
    
    ?>
    <?php
    $total_deposit = "SELECT sum(amount) AS totalsum FROM fund WHERE user_email='$session_email' AND status='approved'";
    $total_deposit_query = $con->query($total_deposit);
    $total_deposit_display = mysqli_fetch_assoc($total_deposit_query);
    
   if($total_deposit_display){
    $sum_of_rows = $total_deposit_display['totalsum'];
    echo "<br><a class='btn btn-lg btn-outline-warning' href='user-transactions.php'>Transaction History</a><br>";
   // echo "<span>Approved deposits: ". $sum_of_rows. " </span><br>";
    if(isset($withdraw_info['wstatus']) && $withdraw_info['wstatus']==="approved"){
   //foreach($total_deposit_display as $total){extract($total)?>

    <!-- Approved Balance-->
     

<span><?= "Fund Totals($): ".$sum_of_rows; ?></span>
<span class="sub"></span>
<span></span>
<?php }else{echo "Total transactions will appear here";} }?>
</li>
                        </ul>
</div>
</div>
</div>
</div><!-- .col -->
</div><!-- .col -->

<div class="row">
                    <div class="col-12">
                        <div class="token-statistics card card-token height-auto" style="border-radius: 20px;">
                            <div class="card-innr">
                                <div class="token-balance token-balance-with-icon">

                                </div>
                                <div class="token-balance token-balance-s2">
                                    <h3 class="card-sub-title">Number of referrals</h3>
                                    <p class="text-light h2">
                                        <?= getReferralCount($USER['id_no'], $con) ?>
                                    </p>
                                    <ul class="token-balance-list row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="mt-4 input-group">
                                                <input type="text" data-ref-input class="form-control" readonly value="<?= "$DOMAIN/user/register.php?ref=" . $REF_CODE ?>">
                                                <button data-copy class="btn btn-sm btn-secondary px-1">Copy Link</button>
                                            </div>
                                            <div class="badge badge-success mt-2" data-ref-message hidden>Link Copied</div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div>

<div class="row">
<div class="col-xl-12 col-lg-12">
<div class="token-transaction card card-full-height" style="border-radius: 20px;">
<div class="card-innr">
<div class="card-head has-aside">
<h4 class="card-title">Live Market Data</h4>

</div>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
{
"width": "100%",
"height": 490,
"defaultColumn": "overview",
"screener_type": "crypto_mkt",
"displayCurrency": "USD",
"colorTheme": "light",
"locale": "en"
}
</script>
</div>
<!-- TradingView Widget END -->
</div> </div>
</div>

</div>
<!-- .row -->

</div>
</div>

<!-- .container -->
</div>

<!-- .page-content -->
</div>

<div class="footer-bar">
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="col-md-8">
<ul class="footer-links">

 <li><a href="https://Bluecapital Holding.org/docs/terms-of-use.php">Terms of Service</a></li>
        <li><a href="https://Bluecapital Holding.org/docs/about.php">About</a></li>
        <li><a href="https://Bluecapital Holding.org/docs/cookie-policy.php">Cookie Policy</a></li>
<!--         <li><a href="https://Bluecapital Holding.org/docs/refund-policy.php">Refund Policy</a></li> -->
        <li><a href="https://Bluecapital Holding.org/docs/privacy-policy.php">Privacy Policy</a></li>
</ul>
</div>
<!-- .col -->
<div class="col-md-4 mt-2 mt-sm-0">
<div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
<div class="copyright-text"><p><center><small>©&nbsp;<?= date('Y');?>&nbsp;<a href="#"><span class="">Bluecapital Holding</span></a> | All rights reserved.&nbsp;<!-- Bluecapital Holding - The easiest place to invest bitcoin. -->Bluecapital Holding is a registered investment platform providing digital asset investment management services to individuals, lending and investment, multicurrency and multifunctional online platform based on blockchain technology.</small></center></p></div>
</div>
</div>
<!-- .col -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .footer-bar -->

<!-- Modal Centered -->

<!-- Modal End -->
<!-- Modal Centered -->


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

 <!-- COPYING FUNCTIONALITY -->
    <script>
        const copyBtn = document.querySelector('[data-copy]')
        const messageBox = document.querySelector('[data-ref-message]')
        
        copyBtn.addEventListener('click', async (e) => {
            e.preventDefault()
            const refCode = document.querySelector('[data-ref-input]').value
            
            try {
                await navigator.clipboard.writeText(refCode)
                messageBox.removeAttribute('hidden')

                setTimeout(() => messageBox.setAttribute('hidden', true), 2000)

            } catch (e) {
                console.log(e.message);
            }
        })
    </script>
</body>

</html>
