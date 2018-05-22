<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>

<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jpembayaran.js"></script>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green-jungle">
        <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-database"></i><?php echo $title ?>
                </div>
                <div class="tools">
                  <div class="btn-group pull-right">
                      
                  </div>
                </div>
                <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                    <button class="btn btn-default  <?php echo $class_add;?>" type="button" onclick="addpembayaran()">
                        <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                    </button>
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
                            <th style="text-align:center">Tanggal</th>
                            <th style="text-align:center">No Registrasi</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Tipe Pembayaran</th>
                            <th style="text-align:center">Semester</th>
                            <th style="text-align:center">Keterangan</th>
                            <th style="text-align:center" width="10%">Action</th>
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
<!-- modal add pembayaran -->
    <div class="modal fade draggable-modal" id="Modal_add_pembayaran" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA PEMBAYARAN
                                            <h3>
                                            Kurikulum : <b><?php echo $thn_ajar_aktif;?></b>
                                            </h3>
                                        </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_pembayaran">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <input type="text" class="" name="kode_pembayaran" id="kode_pembayaran">
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                No Registrasi
                                                            </span>
                                                            <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" placeholder="Masukan No Registrasi Santri TMI" onkeydown="OtomatisKapital(this)" maxlength="10" required>
                                                        </div>                                                            
                                                    </div> 
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Santri
                                                        </span>
                                                        <input type="text" class="form-control" name="nama" id="nama" readonly required></div>
                                                    </div>   
                                                <!--span-->                                                     
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Tanggal
                                                        </span>
                                                        <input type="text" class="form-control" name="tgl_bayar" id="tgl_bayar" value="<?php echo date('d-m-Y');?>" readonly ></div>
                                                    </div>   
                                                 <!--span-->                                                     
                                                <!--span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Tipe Pembayaran
                                                            </span>
                                                            </div>
                                                            <div class="mt-radio-list">
                                                                <label class="mt-radio mt-radio">   
                                                                <input type="radio" class="chk" name="tipe_pembayaran" id="tipe_pembayaran_semester" value="S" checked="true" >SEMESTER                                                             
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio mt-radio">   
                                                                <input type="radio" class="chk" name="tipe_pembayaran" id="tipe_pembayaran_bulanan" value="B" >BULANAN                                                            
                                                                    <span></span>
                                                                </label>
                                                            </div>                                                        
                                                        </div>
                                                    </div>
                                                <!--span-->                                                     
                                                <!--span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Semester
                                                                </span>
                                                                </div>
                                                                <div class="mt-radio-list">
                                                                    <label class="mt-radio mt-radio">   
                                                                    <input type="radio" class="chk" name="semester" id="semester_satu" value="SEMESTER1" checked="true"  >1                                                             
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="mt-radio mt-radio">   
                                                                    <input type="radio" class="chk" name="semester" id="semester_dua" value="SEMESTER2" >2                                                            
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <!--span-->
                                                <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Keterangan   
                                                        </span>
                                                        <input type="text" class="form-control" name="keterangan" id="keterangan" ></div>
                                                    </div>   
                                                <!--span-->
                                                    <div class="form-group">
                                                        <span class="input-group-btn"
                                                            style="cursor: pointer;"
                                                                title="Cek Tagihan"
                                                                id="spansearchregis"
                                                            onclick="idregisshow()">
                                                            <button class="btn green" type="button" style="width:100%;">CEK TAGIHAN
                                                                <i class="fa fa-check-square"></i>
                                                            </button>
                                                        </span>
                                                        <span class="input-group-btn"
                                                            style="cursor: pointer;"
                                                                title="Batal"
                                                                id="spansearchcloseregis"
                                                            onclick="idregishide()">
                                                            <button class="btn red" type="button" style="width:100%;">BATAL
                                                                <i class="fa fa-remove"></i>
                                                            </button>
                                                        </span>  
                                                    </div>  
                                                <!--span-->                                                 
                                            <!--end inputbox-->
                                            <!-- Detail pembayaran semester -->
                                                <div id="data_pembayaran_semester" class="portlet box green-jungle">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-child"></i>Tagihan Semester
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <input type="text" class="hidden" name="id_tagihan" id="id_tagihan">
                                                        <!--span-->
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Total Tagihan
                                                                </span>
                                                                <input type="text" class="form-control" name="total_tagihan" id="total_tagihan" readonly required></div>
                                                            </div>   
                                                        <!--span-->
                                                        <!--span-->
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Sisa Tagihan
                                                                </span>
                                                                <input type="text" class="form-control" name="sisa_tagihan" id="sisa_tagihan" readonly required></div>
                                                            </div>   
                                                        <!--span-->
                                                        <!--span-->
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Jumlah Bayar   
                                                                </span>
                                                                <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar"   required></div>
                                                            </div>   
                                                        <!--span-->
                                                    </div>
                                                </div>
                                            <!-- End Detail pembayaran semester -->
                                            <!-- Detail pembayaran bulanan -->
                                                <div id="data_pembayaran_bulanan" class="portlet box green-jungle">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-child"></i>Tagihan Bulanan
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <!--span-->
                                                        <input type="text" id="hid_jumlah_item_semester" value="0" class="hidden"/>
                                                            <div class="portlet-body table-both-scroll">
                                                            <div class="table-responsive">
                                                            <table id="tb_list_semester" class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Bulan</th>
                                                                        <th>Status</th>
                                                                        <th>Bayar</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td colspan="3" align="center">
                                                                        Belum Ada Data.
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                    <!--<tfoot>
                                                                        <tr>
                                                                        </tr>
                                                                    </tfoot>-->
                                                            </table>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                    </div>
                                                </div>
                                            <!-- End Detail pembayaran bulanan -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svpembayaran()">Save</button>
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
<!-- end of modal pembayaran-->
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
