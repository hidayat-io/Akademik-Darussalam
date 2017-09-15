<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>

<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jmata_pelajaran.js"></script>
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
                        <!-- <button class="btn btn-default " type="button" data-toggle="dropdown" onclick="addmata_pelajaran()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;<i class="fa fa-angle-down"></i>
                        </button> -->
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
                                <th style="text-align:center">ID Mata Pelajaran</th>
                                <th style="text-align:center">Nama Mata Pelajaran</th>
                                <th style="text-align:center">ID Bidang</th>
                                <th style="text-align:center">Kategori</th>
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
                                                                ID Bidang Studi
                                                            </span>
                                                            <div class="input" id= "hiddenidbid">
                                                            <?php
                                                                $att_item = 'id="hide_id_bidangstudi"  class="form-control
                                                                    select2" style="width:100%"  onchange="pilihItem()"';
                                                                echo form_dropdown('hide_id_bidangstudi', $id_bidangstudi, null, $att_item);
                                                            ?>
                                                                 </div>  
                                                            <input type="text" class="form-control" name="id_bidangstudi" id="id_bidangstudi"  required readonly>
                                                             <span class="input-group-btn" id="spansearch">
                                                                <button class="btn btn-default" type="button" onclick="idbidshow()">
                                                            <span class="glyphicon glyphicon-search" ></span>
                                                                </button>
                                                            </span>
                                                            <span class="input-group-btn" id="spansearchclose">
                                                                <button class="btn btn-default" type="button" onclick="closespan()">
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
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svmata_pelajaran()">Save</button>
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
                                                                Kode Mata Pelajaran
                                                            </span>
                                                            <input type="text" class="form-control" name="s_id_matpal" id="s_id_matpal" onkeydown="OtomatisKapital(this)" required></div>
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
