<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<style type="text/css">#myBar {
    width:0%;
    height: 30px;
    background-color: #4B77BE;
    text-align: center; /* To center it horizontally (if you want) */
    line-height: 30px; /* To center it vertically */
    color: white; 
}</style>
<style type="text/css">
            .control{width:200px}
            #execute{border:1px solid #000;width:100%;background:none;cursor:pointer}
            #progressbar{border:none !important;height:3px !important;text-align:center !important}
            .ui-progressbar-value{margin-right:auto !important;margin-left:auto !important}
            .ui-widget-header{background:red !important}
        </style>
<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jmsconfig.js"></script>
<!-- page -->
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
                        <!-- <button class="btn btn-default " type="button" onclick="addmsconfig()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                        </button> -->
                    </div>
                </div>
                <input type="hidden" name="hid_param" id="hid_param" />
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="tb_list">
                        <thead>
                            <tr>
                                <!-- <th style="text-align:center">ID</th> -->
                                <th style="text-align:center">Nomor Statistik</th>
                                <th style="text-align:center">NPSN</th>
                                <th style="text-align:center">Nama Satuan Pendidikan</th>
                                <th style="text-align:center">Jenis Lembaga</th>
                                <th style="text-align:center">Alamat</th>
                                <th style="text-align:center" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td colspan="5" align="center">
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
        <!-- table kurikulum -->
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
            <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i><?php echo $title2;?>
                    </div>
                    <div class="tools">
                    <div class="btn-group pull-right">
                        
                    </div>
                    </div>
                    <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                        <!-- <button class="btn btn-default " type="button" onclick="addmsconfig()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                        </button> -->
                    </div>
                </div>
                <input type="hidden" name="hid_param2" id="hid_param2" />
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="tb_list2">
                        <thead>
                            <tr>
                                <!-- <th style="text-align:center">ID</th> -->
                                <th style="text-align:center">Tahun Ajar Aktif</th>
                                <th style="text-align:center">Semester Aktif</th>
                                <th style="text-align:center" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td colspan="5" align="center">
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
        <!-- table LimitPengeluaran -->
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
            <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i>SETTING LIMIT PENGELUARAN GLOBAL
                    </div>
                    <div class="tools">
                    <div class="btn-group pull-right">
                        
                    </div>
                    </div>
                    <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                        <!-- <button class="btn btn-default " type="button" onclick="addmsconfig()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                        </button> -->
                    </div>
                </div>
                <input type="hidden" name="hid_param3" id="hid_param3" />
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="tb_list3">
                        <thead>
                            <tr>
                                <!-- <th style="text-align:center">ID</th> -->
                                <th style="text-align:center">Limit Pengeluaran</th>
                                <th style="text-align:center" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td colspan="2" align="center">
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
        <!-- table generate Rapor -->
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
            <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i>GENERATE REPORT
                    </div>
            </div>
                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="FormGenerateRapor">
                                        <div class="m-grid">
                                            <div class="m-grid-row">
                                                <div class="m-grid-col m-grid-col-top m-grid-col-center m-grid-col-md-4"></div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center m-grid-col-md-4">
                                                    <input type="text" class="hidden" name="id_thn_ajar_GR" id="id_thn_ajar_GR" value="<?php echo $id_thn_ajar_gen; ?>"/>
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Tahun Ajar
                                                                </span>
                                                                <input type="text" class="form-control input-medium" name="thn_ajar_GR" id="thn_ajar_GR" readonly="true" value="<?php echo $thn_ajargen; ?>"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Semester
                                                                </span>
                                                                <input type="text" class="form-control input-medium" name="semester_GR" id="semester_GR"  readonly="true" value="<?php echo $smstgen; ?>" ></div>
                                                            </div>
                                                            <div class="form-group">
                                                               <div id="myProgress">
                                                                    <div id="myBar">0%</div>
                                                                </div>
                                                                <!-- <div class="progress progress-striped active" id="myProgress">
                                                                    <div class="progress-bar progress-bar-info progress-lg" role="progressbar"  id="myBar">0%
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                                <button type="button" class="btn blue btn-circle btn-lg " id="generate_rapor" onclick="genRAPOR()">
                                                                    Generate Rapor
                                                                    <!-- <div id="myProgress">
                                                                        <div id="myBar">0%</div>
                                                                    </div> -->
                                                                </button>
                                                                 <div id="progressbar"></div>
                                                                  <div id="message"></div>
                                                                
                                                    <!-- <div class="modal-footer"> -->
                                                    <!-- </div> -->
                                                </div>
                                                <div class="m-grid-col m-grid-col-bottom m-grid-col-center m-grid-col-md-4"></div>
                                            </div>
                                        </div>  
                                         
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
<!-- page end -->
<!-- modal add msconfig -->
    <div class="modal fade draggable-modal" id="Modal_add_msconfig" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA msconfig</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_msconfig">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Nomor Statistik
                                                            </span>
                                                            <input type="text" class="form-control numbers-only" name="nomor_statistik" id="nomor_statistik" maxlength="12"></div>
                                                            <input type="hidden" class="form-control numbers-only" name="id_config" id="id_config" maxlength="12">
                                                    </div>
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            NPSN
                                                        </span>
                                                        <input type="text" class="form-control" name="NPSN" id="NPSN" maxlength="25" required></div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Satuan Pendidikan
                                                        </span>
                                                        <input type="text" class="form-control" name="nama" id="nama" maxlength="50" required></div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Jenis Lembaga
                                                            </span>
                                                            <input type="text" class="form-control" name="jenis_lembaga" id="jenis_lembaga" maxlength="15" required>
                                                        </div>
                                                    </div>
                                                  <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Alamat
                                                            </span>
                                                            <!-- <input type="text" class="form-control" name="alamat" id="alamat" maxlength="15" required> -->
                                                            <textarea class="form-control" name="alamat" id="alamat" maxlength="250" required></textarea>
                                                        </div>
                                                    </div>
                                                  <!--span-->
                                                   <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svmsconfig()">Save</button>
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
<!-- end of modal msconfig-->
<!-- modal add Kurikulum -->
    <div class="modal fade draggable-modal" id="Modal_add_kurikulum" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">SETTING DATA TAHUN AJAR & KURIKULUM AKTIF</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_kurikulum">
                                            <!--inputbox-->
                                                <!--span-->
                                                <input type="text" class="hidden" name="param_id" id="param_id" />
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Tahun Ajaran
                                                            </span>
                                                            <?php
                                                                $att_item = ' type="text" class="form-control
                                                                    select input-lg" id="thn_ajar"  name="thn_ajar"';
                                                                echo form_dropdown('select_thnajar', $kode_deskripsikelas, null, $att_item);
                                                            ?>                                                           
                                                        </div>
                                                    </div>   
                                                      <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Semester
                                                                </span>
                                                                <select class="form-control input-lg" name="semester_aktif" id="semester_aktif">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                </select>
                                                            </div>
                                                        </div>   
                                                      <!--span-->
                                                      <!--span-->
                                                   <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svkurikulum()">Update</button>
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
<!-- end of modal kurikulum-->
<!-- modal add LimitPengeluaran -->
    <div class="modal fade draggable-modal" id="Modal_add_LimitPengeluaran" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">SETTING LIMIT PENGELUARAN GLOBAL</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_LimitPengeluaran">
                                            <!--inputbox-->
                                                <!--span-->
                                               <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Limit Pengeluaran
                                                        </span>
                                                        <input type="text" class="hidden" name="id" id="id" >
                                                        <input type="text" class="hidden" name="limit_lama" id="limit_lama" >
                                                        <input type="number" class="form-control" name="limit" id="limit"  required></div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                   <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button_pengeluaran" onclick="svLimitPengeluaran()">Update</button>
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
<!-- end of modal LimitPengeluaran-->

