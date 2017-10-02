<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jsemester.js"></script>
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
                        <!-- <button class="btn btn-default " type="button" onclick="addsemester()">
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
                                <th style="text-align:center">Semester</th>
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
    </div>
<!-- page end -->
<!-- modal add semester -->
    <div class="modal fade draggable-modal" id="Modal_add_semester" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA semester</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_semester">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                SEMESTER
                                                            </span>
                                                            <input type="text" class="form-control numbers-only" name="txt_semester" id="txt_semester" maxlength="12"></div>
                                                    </div>
                                                      <!--span-->
                                                      <!-- table -->
                                                        <div class="portlet box green-jungle">
                                                            <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-database"></i>Data List Bulan
                                                                    </div>
                                                                    <div class="tools">
                                                                    <div class="btn-group pull-right">
                                                                        
                                                                    </div>
                                                                    </div>
                                                                    <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                                                                        <button class="btn btn-default " type="button" onclick="addBulan()">
                                                                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <input type="text" id="hid_jumlah_item_bulan" CLASS="hidden" value="0" />
                                                                <input type="text" name="hid_table_item_bulan" class="hidden" id="hid_table_item_bulan" />
                                                                <div class="portlet-body">
                                                                    <table class="table table-striped table-bordered table-hover" id="tb_list_bulan">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align:center">No</th>
                                                                                <th style="text-align:center">BULAN</th>
                                                                                <th style="text-align:center" width="10%">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                            <td colspan="3" align="center">
                                                                                Tidak ada data ditemukan.
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                        <!-- <tfoot>
                                                                            <tr>
                                                                            </tr>
                                                                        </tfoot> -->
                                                                    </table>
                                                            </div>
                                                        </div>
                                                      <!-- table end -->
                                                    <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svsemester()">Save</button>
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
<!-- end of modal semester-->
<!-- modal add bulan -->
    <div class="modal fade draggable-modal" id="Modal_add_bulan" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT BULAN</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_bulan">
                                            <!--inputbox-->
                                                <!--span-->
                                                <div class="form-group">
                                                <label class="control-label"></label>
                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    Tingkat
                                                </span>
                                                <select class="form-control" name="bulan" id="bulan" required>
                                                    <option value=""></option>
                                                    <option value="JANUARI">JANUARI</option>
                                                    <option value="FEBRUARI">FEBRUARI</option>
                                                    <option value="MARET">MARET</option>
                                                    <option value="APRIL">APRIL</option>
                                                    <option value="MEI">MEI</option>
                                                    <option value="JUNI">JUNI</option>
                                                    <option value="JULI">JULI</option>
                                                    <option value="AGUSTUS">AGUSTUS</option>
                                                    <option value="SEPTEMBER">SEPTEMBER</option>
                                                    <option value="OKTOBER">OKTOBER</option>
                                                    <option value="NOVEMBER">NOVEMBER</option>
                                                    <option value="DESEMBER">DESEMBER</option>
                                                </select>
                                                </div>
                                            </div>
                                                <!--span-->
                                                     <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green" id="save_button" onclick="TambahBulan()">Add</button>
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
<!-- end of modal mata_pelajaran-->
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
                                                                nama semester
                                                            </span>
                                                            <input type="text" class="form-control" name="s_nomor_statistik" id="s_nomor_statistik" onkeydown="OtomatisKapital(this)" required></div>
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
