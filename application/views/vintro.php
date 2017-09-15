<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>ALTIS SYSTEM</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for 500 page option 2" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" /> </head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <link href="<?=base_url();?>assets/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url();?>assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/animate.css" rel="stylesheet" type="text/css" />

        <!-- BEGIN PAGE LEVEL STYLES -->
        <!-- <link href="<?=base_url()?>assets/css/intro.css" rel="stylesheet" type="text/css" /> -->
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>

        <style type="text/css">

        html body{

            background-color: #098040;
        }

        h1{

            font-size: 200px;
            text-shadow: 4px 4px #000;
        }

        h2{

            letter-spacing: 50px;
            text-shadow: 2px 2px #000;
            font-weight: bold;
            color: #fbde6c;
            padding-left: 30px;
            font-size: 60px;
            line-height: 0px;
        }

        .vertical-center {

            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }

        #div-intro{

            position: relative;
            width: 100%;
            height: 100%;
        }



        </style>

    <!-- END HEAD -->

    <body">
        <div class="container container-table vertical-center">

                <div class="text-center" id="div-intro">
                    <img src="<?php echo base_url() ?>/assets/images/logo.png" style="width:200px" alt="docs-logo" />
                    <h1 class="font-white">ALTIS</h1>
                    <h2>SYSTEM</h2>
                </div>

        </div>

        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url();?>assets/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url()?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <script type="text/javascript">

            var base_url="<?=base_url();?>";

            $(document).keypress(function(e) {

                if(e.which == 13) {

                    goLogin();
                }
            });

            $('img').addClass('animated fadeInDown');
            $('h1').addClass('animated fadeInRight');
            $('h2').addClass('animated fadeInLeft');

            $('#div-intro').click(function(){

                goLogin();
            });

            function goLogin(){

                $('img').addClass('animated fadeOutUp');
                $('h1').addClass('animated fadeOutLeft');
                $('h2').addClass('animated fadeOutRight');

                $('h2').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){

                    window.location.replace(base_url+'auth');
                });
            }
        </script>
    </body>
</html>
