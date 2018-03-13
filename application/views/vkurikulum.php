<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>

<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jkurikulum.js"></script>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green-jungle">
            <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i><?php echo $title;?>
                    </div>
                    <div class="tools">
                    <div class="btn-group pull-right">
                        
                    </div>
                    </div>
                    <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                        <button class="btn btn-default " type="button" onclick="addkurikulum()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                        </button>
                        <!-- <ul class="dropdown-menu" role="menu">
                        <li><a href="#" onclick="addSantri('TMI')"> TMI </a></li>
                        <li><a href="#" onclick="addSantri('AITAM')"> AITAM </a></li>
                        </ul> -->
                        <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                            <i class="fa fa-search"></i>&nbsp;Search
                        </button>
                        <!-- <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                            <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                        </button> -->
                    </div>
                </div>
                <input type="hidden" name="hid_param" id="hid_param" />
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="tb_list">
                        <thead>
                            <tr>
                                <th style="text-align:center">ID</th>
                                <th style="text-align:center">Tahun Ajaran</th>
                                <th style="text-align:center" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td colspan="6" align="center">
                                Tidak ada data ditemukan.
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- modal nEW kURIKULUM -->
    <div class="modal fade draggable-modal" id="Modal_add_kurikulum" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog-LG">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <!--<h4 class="modal-title">Start Dragging Here</h4>-->
                </div>
                <div class="modal-body">
                     <!-- isi body modal mulai -->
                    <div class="row">
                        <div class="col-md-12">
                        <!-- BEGIN VALIDATION STATES-->
                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">STRUKTUR KURIKULUM DAN ALOKASI WAKTU DI TMI</span>
                                    </div>
                                </div>
                                <div class="portlet-body" >
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_kurikulum">
                                            <div class="portlet-title">
                                                <!-- <div class="caption">
                                                    <i class="fa fa-database"></i><?php echo $title;?> 
                                                </div> -->
                                            </div>
                                            <input type="hidden" name="hid_param_kurikulum" id="hid_param_kurikulum" />
                                            <div class="portlet-body"  style="overflow-x:auto;">
                                                <!--span-->
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Tahun Ajaran
                                                            </span>
                                                            <?php
                                                                $att_item = ' type="text" class="form-control
                                                                    select input-lg" id="id_thn_ajar" onclick="add_tohide()"  required';
                                                                echo form_dropdown('select_thnajar', $kode_deskripsikelas, null, $att_item);
                                                            ?>
                                                            <input type="hidden" class="form-control" name="hide_id_thn_ajar" id="hide_id_thn_ajar" >
                                                           
                                                        </div>
                                                    </div>    
                                                </div>
                                                    <!--span-->
                                                <table class="table table-striped table-bordered table-hover" id="tb_list_kurikulum" >
                                                    <thead>                                                                    
                                                    <tr>
                                                        <td width="173" rowspan="3">NO</td>
                                                        <td width="272" rowspan="3">Bidang Studi</td>
                                                        <td width="348" rowspan="3">Mata Pelajaran</td>
                                                            <?php  $nos =5;
                                                            foreach ($headertablekurikulum as $rowheader) { ?>
                                                        <?php $nos++; } ?>
                                                        <td colspan="<?php echo $nos?>">Kelas</td>
                                                    </tr>
                                                            <?php  $no =1;
                                                            foreach ($headertablekurikulum as $rowheader) { ?>
                                                            <td colspan="2"><?php echo $rowheader['tingkat'],' ',$rowheader['tipe_kelas'] ?></td>
                                                        <?php $no++; } ?>
                                                    <tr>
                                                        <?php  $no =1*2;
                                                            foreach ($headertablekurikulum as $rowheader) { ?>
                                                            <td width="80">SM1</td>
                                                            <td width="80">SM2</td>
                                                            <?php $no++; } ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  $no =1;
                                                                foreach ($bodytablekurikulum as $rowbody) { ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td colspan="<?php $no?>"><?php echo $rowbody['nama_bidang']; ?></td>
                                                            <td><?php echo $rowbody['id_matpal']; ?></td>
                                                            <?php  ;
                                                            foreach ($headertablekurikulum as $rowheader) { 
                                                            $sm1 = 'SM1_'.$rowbody['id_matpal'].'_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                            $sm2 = 'SM2_'.$rowbody['id_matpal'].'_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                            // $JKSM1 = 'JK_SM1_'.$rowheader['kode_kelas'];
                                                            // $JKSM2 = 'JK_SM2_'.$rowheader['kode_kelas'];
                                                            // $JPSM1 = 'JP_SM1_'.$rowheader['kode_kelas'];
                                                            // $JPSM2 = 'JP_SM2_'.$rowheader['kode_kelas'];
                                                            $mp1    = 'txt_mp1_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                            $mp2    = 'txt_mp2_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                            $kdkls  = $rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                            $tmp1    ='mp1';
                                                            $tmp2    ='mp2';
                                                            ?>                                                                
                                                                <td><?php echo '<input type="number" class="form-control" name="'.$mp1.'[]" id="'.$sm1.'"  value="0"  style="width:80px" onchange="loopMataPelajaran(\''.$mp1.'\',\''.$kdkls.'\',\''.$tmp1.'\')" required>'?></td>
                                                                <td><?php echo '<input type="number" class="form-control" name="'.$mp2.'[]" id="'.$sm2.'"  value="0"  style="width:80px" onchange="loopMataPelajaran(\''.$mp2.'\',\''.$kdkls.'\',\''.$tmp2.'\')" required>'?></td>
                                                            <?php } ?>                                                                            
                                                        </tr>
                                                            <?php $no++; } ?>
                                                        <tr>
                                                            <td width="80" colspan="3">Jumlah Khisos</td>
                                                                <?php  ;
                                                                foreach ($headertablekurikulum as $rowheader) { 
                                                                $JK_SM1 = 'JK_SM1_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                                $JK_SM2 = 'JK_SM2_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                                ?>
                                                                <td><?php echo '<input type="text" class="form-control" name="'.$JK_SM1.'" id="'.$JK_SM1.'" readonly="true"  style="width:80px" value="0">'?></td>
                                                                <td><?php echo '<input type="text" class="form-control"  name="'.$JK_SM2.'" id="'.$JK_SM2.'" readonly="true" style="width:80px" value="0">'?></td>
                                                            <?php } ?>   
                                                        </tr>
                                                        <tr>
                                                            <td width="80" colspan="3">Jumlah Pelajaran</td>
                                                                <?php  ;
                                                                foreach ($headertablekurikulum as $rowheader) { 
                                                                $JP_SM1 = 'JP_SM1_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                                $JP_SM2 = 'JP_SM2_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'];
                                                                ?>
                                                                <td><?php echo '<input type="text" class="form-control"  name="'.$JP_SM1.'" id="'.$JP_SM1.'" readonly="true" style="width:80px" value="0">'?></td>
                                                                <td><?php echo '<input type="text" class="form-control"  name="'.$JP_SM2.'" id="'.$JP_SM2.'" readonly="true" style="width:80px" value="0">'?></td>
                                                            <?php } ?>   
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!--end Table-->
                                            <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn green-jungle" id="save_button" onclick="svkurikulum()">Save</button>
                                            </div>
                                        </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                            </div>
                     </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- end of modal nEW kURIKULUM -->
<!-- modal Cari -->
    <div class="modal fade draggable-modal" id="Modal_cari" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <!--<h4 class="modal-title">Start Dragging Here</h4>-->
                </div>
                <div class="modal-body">
                     <!-- isi body modal mulai -->
                    <div class="row">
                        <div class="col-md-12">
                        <!-- BEGIN VALIDATION STATES-->
                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Form Cari</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="form_cari">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                ID Tahun Ajar
                                                            </span>
                                                            <input type="text" class="form-control" name="s_id_thn_ajar" id="s_id_thn_ajar" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                <!--span-->
                                                    <!-- <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Lengkap
                                                        </span>
                                                        <input type="text" class="form-control" name="s_namalengkap" id="s_namalengkap" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>      -->
                                            <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green" onclick="SearchAction()">Search</button>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- end of modal cari-->



