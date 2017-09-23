<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>

<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jbidstudi.js"></script>
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
                    <button class="btn btn-default " type="button" onclick="addbidstudi()">
                        <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                    </button>
                    <!-- <ul class="dropdown-menu" role="menu">
                      <li><a href="#" onclick="addSantri('TMI')"> TMI </a></li>
                      <li><a href="#" onclick="addSantri('AITAM')"> AITAM </a></li>
                    </ul> -->
                    <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                        <i class="fa fa-search"></i>&nbsp;Search
                    </button>
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                    </button>
                </div>
            </div>
            <input type="hidden" name="hid_param" id="hid_param" />
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tb_list">
                    <thead>
                        <tr>
                            <th style="text-align:center">ID Bidang Studi</th>
                            <th style="text-align:center">Nama Bidang Studi</th>
                            <th style="text-align:center">Kategori</th>
                            <th style="text-align:center" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td colspan="3" align="center">
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
<!-- modal add bidstudi -->
    <div class="modal fade draggable-modal" id="Modal_add_bidstudi" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA BIDANG STUDI</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_bidstudi">
                                        <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Kategori
                                                            </span>
                                                                <!-- <div class="mt-radio-inline"> -->
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="r_utama" value="UTAMA" checked="checked" onclick="RB_action()">Utama
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="r_sore" value="SORE" onclick="RB_action()">Sore
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="r_kitab" value="KITAB" onclick="RB_action()">Kitab
                                                                    <span></span>
                                                                </label>
                                                            <!-- </div> -->
                                                            </div>
                                                    </div>
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                ID Bidang Studi
                                                            </span>
                                                            <input type="text" class="form-control" name="id_bidang" id="id_bidang" onkeydown="OtomatisKapital(this)" maxlength="10" required></div>
                                                    </div>
                                                <!--span-->
                                                     <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Bidang Studi
                                                        </span>
                                                        <input type="text" class="form-control" name="nama_bidang" id="nama_bidang" onkeydown="OtomatisKapital(this)" maxlength="20" required></div>
                                                    </div>
                                        <!--end inputbox-->
                                        <!--kotak data kecakapan khusu mulai-->
                                            <div class="portlet box green-jungle">
                                                <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-database"></i>Data List Mata Pelajaran
                                                        </div>
                                                        <div class="tools">
                                                        <div class="btn-group pull-right">
                                                            
                                                        </div>
                                                        </div>
                                                        <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                                                            <button class="btn btn-default " type="button" onclick="addmata_pelajaran()">
                                                                <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="hid_jumlah_item_Matpal" value="0" />
                                                    <input type="hidden" name="hid_table_item_Matpal" id="hid_table_item_Matpal" />
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="tb_list_Matpal">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center">No</th>
                                                                    <th style="text-align:center">ID Mata Pelajaran</th>
                                                                    <th style="text-align:center">Nama Mata Pelajaran</th>
                                                                    <th style="text-align:center">Status</th>
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
                                                            <!-- <tfoot>
                                                                <tr>
                                                                </tr>
                                                            </tfoot> -->
                                                        </table>
                                                </div>
                                            </div>
                                        <!--kotak data kecakapan khusus End-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svbidstudi()">Save</button>
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
<!-- end of modal bidstudi-->
<!-- modal add mata_pelajaran -->
    <div class="modal fade draggable-modal" id="Modal_add_mata_pelajaran" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA MATA PELAJARAN</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_mata_pelajaran">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                ID Mata Pelajaran
                                                            </span>
                                                            <input type="text" class="form-control" name="id_matpal" id="id_matpal" onkeydown="OtomatisKapital(this)" maxlength="10" required></div>
                                                    </div>
                                                <!--span-->
                                                     <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Mata Pelajaran
                                                        </span>
                                                        <input type="text" class="form-control" name="nama_matpal" id="nama_matpal" onkeydown="OtomatisKapital(this)" maxlength="20" required></div>
                                                    </div>   
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Status
                                                        </span>
                                                       <select class="form-control" name="status" id="status" required >
                                                                    <option value="1">AKTIF</option>
                                                                    <option value="0">TIDAK AKTIF</option>
                                                                </select></div>
                                                    </div>    
                                            <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green" id="save_button" onclick="TambahMatpal()">Add</button>
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
                                                                ID Bidang Studi
                                                            </span>
                                                            <input type="text" class="form-control" name="s_id_bidang" id="s_id_bidang" onkeydown="OtomatisKapital(this)" required></div>
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
