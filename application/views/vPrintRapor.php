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

 <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">
        <div class="page-wrapper">
            
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">                
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content" style="min-height: 481px;">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">
                            RAPORT NILAI EVALUASI MURNI<br>
                            UJIAN PERTENGAHAN TAHUN<br>
                            TAHUN PEMBELAJARAN <?php echo $tahun_ajar?>
                            <!-- <small> </small> -->
                        </h1>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="m-grid m-grid-responsive-xs">
                                        <div class="m-grid-row">
                                            <div class="m-grid-col m-grid-col-left m-grid-col-left"> 
                                                Nama:<br>
                                                NO Stambuk:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kelas:
                                            </div>
                                            <div class="m-grid-col m-grid-col-leftx m-grid-col-left">
                                                    Wali:<br>
                                                    Konsulat:
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align:middle; text-align:center"> No </th>
                                                <th rowspan="2" style="vertical-align:middle; text-align:center"> BIDANG STUDI </th>
                                                <th rowspan="2" style="vertical-align:middle; text-align:center" width="10%" wrap> BATAS MINIMAL </th>
                                                <th colspan="2" style="vertical-align:middle; text-align:center"  width="20%"> NILAI </th>
                                            </tr>
                                            <tr>
                                                <th style="vertical-align:middle; text-align:center"  width="10%"> ANGKA </th>
                                                <th style="vertical-align:middle; text-align:center"  width="10%"> HURUF </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no =1; 
                                        foreach ($data_bid_studi as $row_data_bid_studi) { ?>
                                            <tr>
                                                <td colspan="5" align="center" style="font-weight:bold"> <?php echo $row_data_bid_studi['nama_bidang']; ?></td>
                                            </tr>                                           
                                            
                                            <?php ;
                                        foreach ($data_matpal as $row_data_matpal) { 
                                            if($row_data_bid_studi['id_bidang'] == $row_data_matpal['id_bidang']){
                                                    $tr_up = '<tr>';
                                                    $td_no = '<td width="2">'.$no++.'</td>';
                                                    $nm_matpal = '<td>'.$row_data_matpal['nama_matpal'].'</td>';
                                                    $td_batas_minimal = '<td  width="10%">hardware</td>';
                                                    $td_angka = '<td  width="10%">854</td>';
                                                    $td_huruf = '<td  width="10%">625</td>';
                                                    $trdw = '</tr>';
                                            }else{
                                                $tr_up = '';
                                                $td_no ='';
                                                $nm_matpal ='';
                                                $hidetd = 'hidden';
                                                $td_batas_minimal = '';
                                                $td_angka = '';
                                                $td_huruf = '';
                                                 $trdw = '';
                                            }
                                            ?> 
                                            <?php echo $tr_up; ?>                                              
                                                <?php echo $td_no; ?>
                                                <?php echo $nm_matpal; ?>
                                                <?php echo $td_batas_minimal; ?>
                                                <?php echo $td_angka; ?>
                                                <?php echo $td_huruf; ?>
                                            <?php echo $trdw; ?>
                                                <?php } ?>
                                             <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2016 © Metronic Theme By
                    <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
                    <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
                </div>
            </div>
            <!-- <!-- END FOOTER -->
        </div>          

</body>
</html>