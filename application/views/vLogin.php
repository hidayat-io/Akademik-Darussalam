<?php  
    $alert = '';

    if($this->session->flashdata('error')==null){

        $alert = 'hidden';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Akademik TMI Darussalam | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="author" />
        <?php include "include/css.php"; ?>
        <link href="<?php echo base_url(); ?>/assets/css/login-4.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/logo.png" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img width="150px" src="<?php echo base_url(); ?>/assets/images/logo.png" alt="logo" />
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="<?php echo base_url(); ?>/auth/login_act" method="post">
                <h3 class="form-title">Login</h3>

                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>Silahkan masukkan User ID dan Password dengan benar.</span>
                </div>

                <div class="alert alert-danger <?php echo $alert; ?>" id="div-login-failed">
                    <button class="close" data-close="alert"></button>
                    <span><i class="icon fa fa-warning"></i>&nbsp;User ID &amp; Password salah.</span>
                </div>

                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">User ID</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" 
                            placeholder="User ID" name="user_id" id="user_id" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" 
                            name="password" id="password" /> </div>
                </div>
                <div class="form-actions">                    
                    <button type="submit" class="btn green pull-right">Login&nbsp;<span aria-hidden="true" class="icon-arrow-right"></button>
                    <br>
                </div>                
            </form>
            <!-- END LOGIN FORM -->
            
        </div>
        <!-- END LOGIN -->
        
        <div class="copyright"> 2017 &copy; TMI Darussalam  </div>
        
        <?php include "include/js.php"; ?>
        <script src="<?php echo base_url(); ?>js/login-4.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
    </body>

</html>