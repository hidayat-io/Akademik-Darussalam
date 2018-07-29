<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>RAPORT NLAI <?php echo  $tahun_ajar; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="RAPORT NILAI EVALUASI MURNI" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <?php include_once('include/css.php'); ?>
        <style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
        <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" />   -->
    </head>
    <!-- END HEAD -->

    <body>
        <div class="page">
           <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="page-title">
                    RAPORT NILAI EVALUASI MURNI<br>
                    UJIAN PERTENGAHAN TAHUN<br>
                    TAHUN PEMBELAJARAN <?php echo $tahun_ajar?>
                                    
                    </h1>
                    Nama:_________________
                    <br> Kelas:_________________
                    <hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="">
                        <div class="row">
                            <div class="col-xs-12">
                                <table border="0">
                                    <!-- <tbody>
                                        <?php  $no =1;
                                                foreach ($databody as $row) { ?>
                                        <tr>
                                            <td><?php echo $no ?> </td>
                                            <td colspan="4"><?php echo $row['soal']; ?></td>
                                        </tr> 
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>A. <?php echo $row['jwb_a']; ?></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>B. <?php echo $row['jwb_b']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>C. <?php echo $row['jwb_c']; ?></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>D. <?php echo $row['jwb_d']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">&nbsp;</td>
                                        </tr>
                                    <?php $no++; } ?>
                                        </tbody> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>