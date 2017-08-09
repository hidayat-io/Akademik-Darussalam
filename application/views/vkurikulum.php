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
                        <button class="btn btn-default " type="button" data-toggle="dropdown" onclick="addkurikulum()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;<i class="fa fa-angle-down"></i>
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
                                <th style="text-align:center">ID Tahun Ajar</th>
                                <th style="text-align:center">ID Kelas</th>
                                <th style="text-align:center">ID Mata Pelajaran</th>
                                <th style="text-align:center">SM1</th>
                                <th style="text-align:center">SM2</th>
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
<!-- modal add kurikulum -->
    <div class="modal fade draggable-modal" id="Modal_add_kurikulum" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA KURIKULUM</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_kurikulum">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                ID Tahun Ajar
                                                            </span>
                                                            <input type="text" class="form-control numbers-only" name="id_thn_ajar" id="id_thn_ajar" maxlength="11" required></div>
                                                    </div>
                                                     <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                ID Kelas
                                                            </span>
                                                            <div class="input" id= "hiddenkode_kelas">
                                                            <?php
                                                                $att_item = 'id="hide_kode_kelas"  class="form-control
                                                                    select2" style="width:100%"  onchange="pilihItemkode_kelas()"';
                                                                echo form_dropdown('hide_kode_kelas', $kode_kelas, null, $att_item);
                                                            ?>
                                                                 </div>  
                                                            <input type="text" class="form-control" name="kode_kelas" id="kode_kelas"  required readonly>
                                                             <span class="input-group-btn" id="spansearchkode_kelas">
                                                                <button class="btn btn-default" type="button" onclick="kode_kelasshow()">
                                                            <span class="glyphicon glyphicon-search" ></span>
                                                                </button>
                                                            </span>
                                                            <span class="input-group-btn" id="spansearchclosekode_kelas">
                                                                <button class="btn btn-default" type="button" onclick="kode_kelasclosespan()">
                                                            <span class="glyphicon glyphicon-remove-sign " ></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>    
                                                    <!--span-->
                                                    <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                ID Mata Pelajaran
                                                            </span>
                                                            <div class="input" id= "hiddenid_mapel">
                                                            <?php
                                                                $att_item = 'id="hide_id_mapel"  class="form-control
                                                                    select2" style="width:100%"  onchange="pilihItemid_mapel()"';
                                                                echo form_dropdown('hide_id_mapel', $id_matpal, null, $att_item);
                                                            ?>
                                                                 </div>  
                                                            <input type="text" class="form-control" name="id_mapel" id="id_mapel"  required readonly>
                                                             <span class="input-group-btn" id="spansearchid_mapel">
                                                                <button class="btn btn-default" type="button" onclick="id_mapelshow()">
                                                            <span class="glyphicon glyphicon-search" ></span>
                                                                </button>
                                                            </span>
                                                            <span class="input-group-btn" id="spansearchcloseid_mapel">
                                                                <button class="btn btn-default" type="button" onclick="id_mapelclosespan()">
                                                            <span class="glyphicon glyphicon-remove-sign " ></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>    
                                                    <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            SM 1
                                                        </span>
                                                        <input type="text" class="form-control" placeholder="BOBOT NILAI" name="sm_1" id="sm_1"  required></div>
                                                    </div>
                                                    <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            SM 2
                                                        </span>
                                                        <input type="text" class="form-control" placeholder="BOBOT NILAI" name="sm_2" id="sm_2"  required></div>
                                                    </div>   
                                            <!--end inputbox-->
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
<!-- end of modal kurikulum-->
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
