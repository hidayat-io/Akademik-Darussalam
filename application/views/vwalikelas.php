<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>js/jwalikelas.js"></script>
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
                    <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                        <i class="fa fa-search"></i>&nbsp;Search
                    </button>
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                    </button>
                </div>
            </div>
            <input type="text" class="hidden" name="hid_param" id="hid_param" />
            <div class="portlet-body">
                    <h3>
                        Kurikum Aktif: <b><?php echo $thn_ajar_aktif;?></b>
                    </h3>
                <table class="table table-striped table-bordered table-hover" id="tb_list">
                    <thead>
                        <tr>
                            <!-- <th style="text-align:center">ID</th> -->
                            <th style="text-align:center">Tahun Ajar</th>
                            <th style="text-align:center">Kode_kelas</th>
                            <th style="text-align:center">No Registrasi Guru</th>
                            <th style="text-align:center">Nama Guru</th>
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
<!-- modal EDIT BEBAN GURU -->
    <div class="modal fade draggable-modal" id="Modal_add_walikelas" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT WALI KELAS</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_walikelas">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <input type="text" class="hidden" name="id" id="id">
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Kode Kelas
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" style="width: 20%;" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--span-->
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            NO Registrasi Guru
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <div class="input" id= "hiddenidmsguru">
                                                                    <?php
                                                                        $att_item = 'id="hide_id_msguru"  class="form-control select2" style="width: 88%;"  onchange="pilihItemmsguru()"';
                                                                        echo form_dropdown('hide_id_msguru', $msguru, null, $att_item);
                                                                    ?>
                                                                </div>
                                                                <input type="text" class="form-control" name="no_reg" id="no_reg" style="width: 15%;" readonly="true">
                                                                <input type="text" class="hidden" name="id_guru" id="id_guru" style="width: 15%;" readonly="true">
                                                                <span class="input-group-btn"
                                                                            style="cursor: pointer;"
                                                                            title="Cari msguru"
                                                                            id="spansearchmsguru"
                                                                            onclick="idmsgurushow()">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-search"></i>
                                                                        </button>
                                                                    </span>
                                                                    <span class="input-group-btn"
                                                                            style="cursor: pointer;"
                                                                            title="Cari msguru"
                                                                            id="spansearchclosemsguru"
                                                                            onclick="idmsguruhide()">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-times-circle"></i>
                                                                        </button>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            Nama Guru
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" style="width: 50%;" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <!--span-->
                                            <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svwalikelas()">Save</button>
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
<!-- end of EDIT BEBAN GURU-->
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
                                                                Kode Kelas
                                                            </span>
                                                            <input type="text" class="form-control" name="s_kode_kelas" id="s_kode_kelas" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
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
