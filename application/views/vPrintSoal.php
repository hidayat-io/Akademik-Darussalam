<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>SOAL UJIAN <?php echo  $dataheader['nama_matpal']; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Soal Ujian AKADEMIK PESANTREN" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <?php include_once('include/css.php'); ?>
        <style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" />  
    </head>
    <!-- END HEAD -->

    <body>
        <div class="page">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">
                <div class="m-grid">
                    <div class="m-grid-row">
                        <div class="m-grid-col m-grid-col-middle m-grid-col-left m-grid-col-md-4">
                            <!-- <div class="col-xs-6 invoice-logo-space">
                                <img src="<?php echo base_url(); ?>/assets/images/logo.png" class="img-responsive" style="float:left;width:100px;position:relative;padding:5px;" alt="" />
                            </div> -->
                        </div>
                        <div class="m-grid-col m-grid-col-middle m-grid-col-center m-grid-col-md-4">
                            <img src="<?php echo base_url(); ?>/assets/images/logo.png" class="img-responsive" style="float:left;width:100px;position:relative;padding:5px;" alt="" />
                            SOAL UJIAN <?php echo  $dataheader['nama_matpal']; ?>
                            <small>
                                <br>TAHUN AJARAN <?php echo  $dataheader['deskripsi']; ?>
                                <br>SEMESTER <?php echo  $dataheader['semester']; ?>
                                <br>TINGKAT <?php echo  $dataheader['tingkat']; ?>
                                <br>KODE SOAL <?php echo  $dataheader['kode_soal']; ?>
                            </small>
                        </div>
                        <div class="m-grid-col m-grid-col-middle m-grid-col-right m-grid-col-md-4"></div>
                    </div>
                </div>
                            
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
                            <tbody>
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
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>