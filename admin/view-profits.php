<?php
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
$folder_image = "../upload/";
?>
<?php include('header.php'); ?>

<body class="page-user">
<?php include('nav.php'); ?>

 
<div>     
  <div class="page-content">
      <div class="container">
            <div class="card content-area">
                                <div class="card-innr table-responsive">
                    <div class="card-head">
                        <h4 class="card-title">View Profits Added To Users</h4>
                    </div>
                                <table class="data-table table table-hover dt-init user-tnx">
                        <thead>
                            <tr class="data-item data-head">
                                <th class="data-col dt-tnxno">Txn ID</th>
                                 <th class="data-col dt-tnxno">User</th>
                                <th class="data-col dt-amount">Amount</th>
                                <th class="data-col dt-account">Currency</th>
                              <th class="data-col dt-type">
                                    <div class="dt-type-text">Status</div>
                                </th>
                               <!-- <th class="data-col data-actions">
                                    <div class="dt-type-text">Edit</div>
                                </th> -->
                                <th class="data-col data-actions">
                                    <div class="dt-type-text">Action</a></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $sql_profit_select = "SELECT * FROM `profit`";
                            $sql_profit_select_exec = $con->query($sql_profit_select);
                            foreach($sql_profit_select_exec as $profitInfo){extract($profitInfo);?>

                                                        <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                                                               <!--  <div class="data-state data-state-pending">
                                            <span class="d-none">waiting</span>
                                        </div> -->
                                            <div class="fake-class">
                                        <span class="lead tnx-id"><?php if(isset($ptxn) && $ptxn!==null){echo $ptxn;}?></span>
                                            <span class="sub sub-date"><?php if(isset($date_approved) && $date_approved!==null){echo $date_approved;}?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($profitInfo['user_email']) && $profitInfo['user_email']!==null){echo $profitInfo['user_email'];}?></span>
                                </td>
                                <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($profitInfo['amount']) && $profitInfo['amount']!==null){echo $profitInfo['amount'];}?></span></td>
                                    <td class="data-col dt-token">
                                    <span class="sub sub-symbol"><?php if(isset($profitInfo['currency']) && $profitInfo['currency']!==null){echo strtoupper($profitInfo['currency']);}?></span>
                                </td>
                               <!--  <td class="data-col dt-account" id="td_approve">
     <?php //if(isset($status) && $status!==null){if($status==="pending"){echo "<span class='lead user-info text-danger'>{$status}</span>";}else{echo "<span class='lead user-info text-success'>{$status}</span>";}}?>
                                                                    </td> -->
                                <td class="data-col dt-type">
                    <?php if(isset($date_approved)&&isset($profitInfo['amount'])&&isset($profitInfo['currency'])){echo "<span class='dt-type-md badge badge-outline badge-success badge-md'>Profited</span>";}?>
                                    <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">P</span>
                                                </td>
                                                <!--  <td class="data-col dt-type">
                            <a href="edit-amount.php?af=<?=$ftxn;?>" data-toggle="" data-target="" class="dt-type-md"><span class='badge badge-outline badge-info badge-md'>Edit</span></a>
                            <a href="edit-amount.php?af=<?=$ftxn;?>" data-toggle="" data-target="" class="dt-type-sm badge badge-sq badge-outline badge-info badge-md">E</a>
                        </td> -->

                        <td class="data-col dt-type">
                            <a name="delete" href="user.php?dpa=<?= $ptxn; ?>" class="dt-type-md"><span class='badge badge-outline badge-primary badge-md'>Delete</span></a>
                            <a href="user.php?dpa=<?= $ptxn; ?>" class="dt-type-sm badge badge-sq badge-outline badge-primary badge-md">Del</a>
                        </td>
                            </tr>
                        <?php }?>
                                                    </tbody>
                    </table>
                </div>
                              <!-- .card-innr -->
 
          <!-- .card -->
                </div>
                              <!-- .card-innr -->

        </div>
      <!-- .container -->
  </div>
  <!-- .page-content -->
</div>
<?php include('footer-menu.php');?>

    <div class="footer-bar">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <ul class="footer-links">
                        
                        <li><a href="https://bluecapitalholding.com/docs/terms-of-use.php">Terms of Service</a></li>
        <li><a href="https://bluecapitalholding.com/docs/about.php">About</a></li>
        <li><a href="https://bluecapitalholding.com/docs/cookie-policy.php">Cookie Policy</a></li>
        <li><a href="https://bluecapitalholding.com/docs/privacy-policy.php">Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- .col -->
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text"><p style="padding:10px 0 !important;"><center><small>©&nbsp;<?= date('Y');?>&nbsp;<a href="#"><span class="orange">Bluecapital Holding</span></a> | All rights reserved.&nbsp;Bluecapital Holding - The easiest place to invest bitcoin.<br>Bluecapital Holding is a registered investment platform providing digital asset investment management services to individuals, lending and investment, multicurrency and multifunctional online platform based on blockchain technology.</small></center></p></div>
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
    
    <!-- JavaScript (include all script here) -->
    <script src="https://transactright.com/js/app.js"></script>
<script src="../assets/js/jquery.bundle49f7.js"></script>
<script src="../assets/js/script49f7.js"></script>

<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated database', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('Database could not be updated', 'Error')</script>";}
?>