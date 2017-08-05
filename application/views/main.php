<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Akademik | <?php echo $title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <?php include_once('include/css.php'); ?>
        <?php include_once('include/js.php'); ?>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <?php include_once('include/header.php'); ?>
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <?php include_once('include/sidebar.php'); ?>
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                            <?php if(isset($content)) echo $content; ?>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; TMI Darussalam</div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>



    </body>

</html>
