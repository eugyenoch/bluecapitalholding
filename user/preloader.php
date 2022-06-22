<?php
header("Refresh:5,url=login.php");
//Require my functions.php file
include 'function.php';
include 'header.php'; 


if(isset($_GET['fn']) && isset($_GET['em'])){
    $fn = $_GET['fn']; $em = $_GET['em']; 
     $toast= "success"; }
     
else{$toast= "fail";
        #echo "<script>location.href='login.php'</script>";
}
?>
<body class="page-user" style="background-color: #fff !important;">
    <div class="row">
 <div class="col-12">
    <p><big>Welcome to Bluecapital <span class="orange">Holdings</span>!<br>
Your verifications is complete. Login to continue</big></p>
</div></div>
 
    <!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 

<!-- jQuery UI 1.11.4 --> 
<script src="dist/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You will be redirected to login to continue.', 'Successful Verification')</script>";}

if(isset($toast) && $toast==='fail'){echo "<script>toastr.success('YWe could not verify your information.', 'Unsuccessful Verification')</script>";}
?>

