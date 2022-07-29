<?php
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
include('../include/referral.php');

$REFERS = getAllRefers($con);

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
                            <h4 class="card-title">View all Refers</h4>
                        </div>
                        <table class="data-table table table-hover dt-init user-tnx">
                            <thead>
                                <tr class="data-item data-head">
                                    <th class="data-col dt-tnxno">User</th>
                                    <th class="data-col dt-tnxno">No of Refers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($REFERS)) : ?>
                                    <?php foreach ($REFERS as $refer) : ?>
                                        <tr>
                                            <td>
                                                <a href="./view-users.php" style="color: #333;">
                                                    <?= getUserById($refer['referral'], $con)['firstname'] . " " . getUserById($refer['referral'], $con)['lastname'] ?>
                                                </a>
                                            </td>
                                            <td> <?= getReferralCount($refer['referral'], $con); ?> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- .card-innr -->

                    <!-- .card -->
                </div>
                <!-- .card-innr -->
                <div class="modal fade sho d-bloc" id="" tabindex="-1">
                    <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
                        <div class="modal-content">
                            <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                            <div class="popup-body">
                                <?php

                                ?>
                                <form method="post" action="">

                                    <input type="text" name="idNo" value="<?= $id_no; ?>">
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- .container -->
        </div>
        <!-- .page-content -->
    </div>
    <?php include('footer-menu.php'); ?>
    <div class="footer-bar">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <ul class="footer-links">

                        <li><a href="https://blucapitalholding.com/docs/terms-of-use.php">Terms of Service</a></li>
                        <li><a href="https://blucapitalholding.com/docs/about.php">About</a></li>
                        <li><a href="https://blucapitalholding.com/docs/cookie-policy.php">Cookie Policy</a></li>
                        <li><a href="https://blucapitalholding.com/docs/privacy-policy.php">Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- .col -->
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text">
                            <p style="padding:10px 0 !important;">
                                <center><small>©&nbsp;<?= date('Y'); ?>&nbsp;<a href="#"><span class="orange">Bluecapital Holding</span></a> | All rights reserved.&nbsp;Bluecapital Holding - The easiest place to invest bitcoin.<br>Bluecapital Holding is a registered investment platform providing digital asset investment management services to individuals, lending and investment, multicurrency and multifunctional online platform based on blockchain technology.</small></center>
                            </p>
                        </div>
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
    <script src="../dist/js/toastr.min.js"></script>
    <script type="text/javascript">
        toastr.info('View referrals on this page', 'Info');
    </script>
</body>

</html>

<?php
if (isset($toast) && $toast === 'success') {
    echo "<script>toastr.success('You have updated database', 'Success')</script>";
}
if (isset($toast) && $toast === 'fail') {
    echo "<script>toastr.error('Database could not be updated', 'Error')</script>";
}
?>