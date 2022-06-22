<?php
    //Form validation
//Import my security function from function.php
include 'function.php';
//Define empty variables
$fname = $lname = $email = $pass = $cpass = "";

//Define empty error variables
$fnameErr = $lnameErr = $emailErr = $passErr = $cpassErr = $cpassesErr = $checkErr = ""; 

//Test for valid(empty) and invalid(non-empty) form fields
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(empty($_POST['fname'])){
    $fnameErr = "Firstname is required";
  }
  else{
    $fname = sanitize($_POST['fname']);
  }

  if(empty($_POST['lname'])){
    $lnameErr = "Lastname is required";
  }
  else{
    $lname = sanitize($_POST['lname']);
  }

  if(empty($_POST['email'])){
    $emailErr = "Email is required";
  }
  else{
    $email = sanitize($_POST['email']);
  }

  if(empty($_POST['pwd'])){
    echo "<style>.note{display:none !important;</style>";
    $passErr = "Password is required";
  }
  else{
    $pass = md5($_POST['pwd']);
  }

  if(empty($_POST['cpwd'])){
    echo "<style>.note{display:none !important;</style>";
    $cpassErr = "Confirm password is required";
  }
  else{
    $cpass = md5($_POST['cpwd']);
  }

  if($pass !== $cpass){
    $cpassesErr = "Both passwords do not match";
  }

  if(!isset($_POST['agreement'])){
    $checkErr = "Please agree to our terms";
  }
}
?>
<?php
if(isset($_POST['reg'])){
  $affid = $_POST['affid'];
  $ftxn = 'TXN'.mt_rand(100000,999999);
  if($pass===$cpass){
    $active = "<a href='https://Bluecapital Holding.org/user/admin/login.php'>Login</a>";
    $sql_check_email_exists = "SELECT * FROM users WHERE user_email = '$email'";
    $sql_check_email_exec = $con->query($sql_check_email_exists);
    if(mysqli_num_rows($sql_check_email_exec)>0){$toast = "email";}
    else{
  $sqlIns = "INSERT INTO users(firstname,lastname,user_email,user_pass,affid)VALUES('$fname','$lname','$email','$cpass','$affid')";
  $sqlC = $con->query($sqlIns);

  // $sqlIns2 = "INSERT INTO fund(user_email,ftxn,currency,amount,status)VALUES('$email','$ftxn','USD',0,'')";
  // $sqlC2 = $con->query($sqlIns2);
 if($sqlC){$toast = "success";header("Refresh:1,url=preloader.php?fn=$fname&em=$email");
}else{$toast = "fail";} 
}
} }
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="../assets/img/BLUE2.png">
    <!-- Site Title  -->
    <title>Register a new account | Bluecapital Holding</title>
    <!-- Bundle and Base CSS -->
   <!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/plugins/hmenu/ace-responsive-menu.css">
<link rel="icon" href="dist/img/p2pdarkicon.png">
<!--Toastr-->
<link rel="stylesheet" type="text/css" href="dist/css/toastr.css">

    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <style>
        .err{color:red;}
    </style>
</head>

<body class="hold-transition login-page sty1">
<div class="login-box sty1">
  <div class="login-box-body sty1">
  <div class="login-logo">
     <a href="../index.php"><span class="lead cursive">Bluecapital Holding</span></a>
  </div>
                                <p class="">Sign Up to Create a Bluecapital Holding Account</p>
                                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="regForm">
                                    <div class="field-item" hidden>
                                        <div class="field-wrap">
                                            <input type="text" name="affid" class="form-control sty1" value="<?= mt_rand(100000,999999);?>">
                                        </div>
                                    </div>
                                    <div class="field-item">
                                        <div class="field-wrap">
                                            <input type="text" name="fname" class="form-control sty1" placeholder="Firstname" required>
                                        </div>
                                        <span class="err"><?= $fnameErr; ?></span>
                                    </div>
                                    <div class="field-item">
                                        <div class="field-wrap">
                                            <input type="text" name="lname" class="form-control sty1" placeholder="Lastname" required>
                                        </div>
                                        <span class="err"><?= $lnameErr; ?></span>
                                    </div>
                                    <div class="field-item">
                                        <div class="field-wrap">
                                            <input type="text" class="form-control sty1"  name="email" placeholder="Email" title="Your email is your username" required>
                                        </div>
                                        <span class="err"><?= $emailErr; ?></span>  
                                    </div>
                                    <div class="field-item">
                                        <div class="field-wrap">
                                            <input name="pwd" type="password" class="form-control sty1" placeholder="Password" title="choose secure password" required>
                                        </div>
                                        <span class="err"><?= $passErr; ?></span>
                                    </div>
                                    <div class="field-item">
                                        <div class="field-wrap">
                                            <input name="cpwd" type="password" class="form-control sty1" placeholder="Repeat Password" title="confirm password must match password" required>
                                        </div>
                                         <span class="err"><?= $cpassErr; ?></span><br><span class="err"><?= $cpassesErr; ?></span>
                                    <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="agreement" required>
               I agree to the <a href="https://electrumfx.org/docs/terms-of-use.php" title="View terms of use" target="_blank" rel="noopener noreferrer">Terms Of Use</a></label><br>
               <span class="err"><?= $checkErr; ?></span>
             </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <div class="">Already have an account? <a href="login.php" class="text-center">Sign In</a></div>
          <button type="submit" class="btn btn-lg btn-block btn-flat" style="background:#FF880E; color:#fff;" name="reg">Sign Up</button>
        </div>
        <!-- /.col --> 
      </div> 
    </form>
  </div>  
   </div>
  </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <?php //include('footer.php');?>
    </div>
   <!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script>
<!--Toastr-->
<script type="text/javascript" src="dist/js/toastr.min.js"></script>
</body>

</html>
<?php
if(isset($toast) && $toast==='success'){
  echo "<script>toastr.success('Be patient while we verify and create your account', 'Notice')</script>";
}

if(isset($toast) && $toast==='fail'){
  echo "<script>toastr.error('You have not been successfully registered', 'Failure')</script>";
}

if(isset($toast) && $toast==='email'){
  echo "<script>toastr.error('The email already exists', 'Failure')</script>";
}
$con->close();
?>