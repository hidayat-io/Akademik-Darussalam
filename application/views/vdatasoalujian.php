<!-- بسم الله الرحمن الرحیم -->
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/icheck/icheck.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jdatasoalujian.js"></script>

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
                    <button class="btn btn-default " type="button" onclick="adddatasoalujian()">
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
                            <th style="text-align:center">Kode Soal</th>
                            <th style="text-align:center">Kurikulum</th>
                            <th style="text-align:center">Semester</th>
                            <th style="text-align:center">ID Mata Pelajaran</th>
                            <th style="text-align:center">Tingkat</th>
                            <th style="text-align:center">Pembuat</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td colspan="7" align="center">
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
<!-- modal add datasoalujian -->
    <div class="modal fade draggable-modal" id="Modal_add_datasoalujian" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
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
                                        <span class="caption-subject font-red sbold uppercase">
                                            INPUT DATA SOAL UJIAN
                                        </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_datasoalujian">
                                            <!--inputbox-->
                                                <!--span-->
                                                <input type="text" class="hidden" name="hide_d" id="hide_d">
                                                <!--span-->
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        KODE SOAL
                                                                    </span>                                                               
                                                                    <input type="Text" class="form-control" name="kode_soal" id="kode_soal" readonly="true" >                                                            
                                                                </div>
                                                            </div>
                                                <div class="row">
                                                    <!--span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        Kurikulum
                                                                    </span>
                                                                    <?php
                                                                        $att_item = 'class="form-control select " id="id_thn_ajar" name="id_thn_ajar" onchange="SearchBankSoal() required';
                                                                        echo form_dropdown('select_thnajar', $kode_deskripsi, null, $att_item);
                                                                    ?>
                                                                
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    <!--span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        Semester
                                                                    </span>
                                                                    <select class="form-control" name="semester" id="semester" onchange="SearchBankSoal()" required>
                                                                    <option value="">-Pilih Semester-</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    </select>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <!--span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Mata Pelajaran
                                                                        </span>
                                                                        <div class="input-icon right">
                                                                            <i class="fa"></i>
                                                                            <?php
                                                                                $att_item = 'id="id_matpal" name="id_matpal" class="form-control  select" style="width:100%"  onchange="SearchBankSoal()" required';
                                                                                echo form_dropdown('id_matpal', $mat_pal, null, $att_item);
                                                                            ?>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        Tingkat
                                                                    </span>
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <select class="form-control" name="tingkat" id="tingkat" onchange="SearchBankSoal()" required >
                                                                            <option value=""></option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                            <option value="6">6</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                </div>
                                            <!--end inputbox-->
                                            <!-- tabel data soal -->
                                                <div class="portlet box green-jungle">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-database"></i>Data Soal
                                                        </div>
                                                        <div class="tools">
                                                        <div class="btn-group pull-right">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <input type="text" class="hidden" name="hid_data_soal_ujian" id="hid_data_soal_ujian" />
                                                        <table class="table table-striped table-bordered table-hover" id="tb_datasoal"
                                                            data-toggle="table"
                                                            data-url="<?php echo base_url(); ?>Datasoalujian/get_list_banksoal"
                                                            data-height="500"
                                                            data-search="false"
                                                            data-pagination="true"
                                                            data-only-info-pagination="true"
                                                            data-click-to-select="true"
                                                            data-query-params="queryParamBankSoal">
                                                            <thead>
                                                                <tr>
                                                                    <th data-field="state" data-checkbox="true"></th>
                                                                    <th data-field="id_matpal" data-align="right" data-sortable="true" data-width="10%">
                                                                        ID Mata Pelajaran
                                                                    </th>
                                                                    <th data-field="tingkat" data-align="right" data-sortable="true" data-width="10%">
                                                                        TIngkat
                                                                    </th>
                                                                    <th data-field="id_soal" data-align="right" data-sortable="true" data-width="10%">
                                                                        ID Soal
                                                                    </th>
                                                                    <th data-field="soal" data-align="left" data-sortable="true">
                                                                        Soal
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            <!-- tabel data soal -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svdatasoalujian()">Save</button>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end of modal datasoalujian-->
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
                                                                ID Mata Pelajaran
                                                            </span>
                                                            <input type="text" class="form-control" name="s_idmatpal" id="s_idmatpal" onkeydown="OtomatisKapital(this)" required></div>
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
