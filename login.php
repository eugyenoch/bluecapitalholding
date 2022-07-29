<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('cookie.php');

//Build the login script
if(isset($_POST['signin'])){
  //Extract the user input and assign to variables
  $user = sanitize($_POST['user']);
  $pass = md5($_POST['pwd']);

  //Search DB for the entered data above
  $sqlCheck = "SELECT * FROM users WHERE user_email = '$user' AND user_pass='$pass'";
  
  //Execute the mysqli query
  $sqlDo = $con->query($sqlCheck);

  //count the number of rows that contain the data
    $rowCount = mysqli_num_rows($sqlDo);

    //Check if there is no matching row with the user data
    if($rowCount<=0){
      $toast = "fail";
    }
    else{
      $toast = "success";
        //$_SESSION['email'] = $user;
        header("Refresh:1,url=./user-area.php");
    }
}
else{
  //header('Location:login.php');
}

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
    <title>Login | Bluecapital Holding</title>
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
</head>

<body class="hold-transition login-page sty1">
<div class="login-box sty1">
  <div class="login-box-body sty1">
  <div class="login-logo">
    <a href="../index.php"><span class="lead cursive">Bluecapital Holding</span></a></div>
                              <p class="">Enter correct login details to login to your trade account and begin your session</p>

                               <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post" name="loginForm">
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" placeholder="Username" name="user" title="Username is required" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>" required>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control sty1" placeholder="Password" name="pwd" title="Password is required" value="<?php if(isset($_COOKIE['pwd'])){echo $_COOKIE['pwd'];}?>" required>
      </div>
      <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="checkbox">
              Remember Me </label>
            <a name="checkEmail" href="check.php" class="pull-right" onclick=""><i class="fa fa-lock"></i> Forgot Password?</a> </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-lg btn-block btn-flat" style="background:#FF880E; color:#fff;" name="signin">Sign In</button>
        </div>
        <!-- /.col --> 
      </div>
 </form>
                                <div class="m-t-2">Don't have an account? <a href="register.php" class="text-center">Sign Up</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

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
  echo "<script>toastr.success('You will be redirected shortly', 'Success')</script>";
}

if(isset($toast) && $toast==='fail'){
  echo "<script>toastr.error('We cannot log you in', 'Wrong credentials')</script>";
}
?>