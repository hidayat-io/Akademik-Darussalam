<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<style type="text/css">.form-group .select2-container {
  position: relative;
  z-index: 2;
  float: left;
  width: 100%;
  margin-bottom: 0;
  display: table;
  table-layout: fixed;
}
</style>
<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jrpp.js"></script>
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
                    <button class="btn btn-default " type="button" onclick="addrpp()">
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
                            <th style="text-align:center">id_mapel</th>
                            <th style="text-align:center">Kurikulum</th>
                            <th style="text-align:center">Semester</th>
                            <th style="text-align:center">Guru</th>
                            <th style="text-align:center">Kode kelas</th>
                            <th style="text-align:center">Kelas</th>
                            <th style="text-align:center">Santri</th>
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
<!-- modal add rpp -->
    <div class="modal fade bs-modal-full in" id="Modal_add_rpp" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-full">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT RPP</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_rpp">
                                            <!--inputbox-->
                                                <div class="row">
                                                    <!--span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Mata Pelajaran
                                                                </span>
                                                                <?php
                                                                    $att_item = ' type="text" class="form-control select2"  style="width: 90%;" id="mt_pelajaran" onchange="kosong_table()" required';
                                                                    echo form_dropdown('select_mtpelajaran', $mat_pal, null, $att_item);
                                                                ?>
                                                                <!-- <input type="hidden" class="form-control" name="hide_Kurikulum" id="hide_Kurikulum" > -->
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
                                                                <select class="form-control select" style="width: 90%;" name="semester" id="semester" onchange="kosong_table()" required>
                                                                <option value=""></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                            </select>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="row">                                                   
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Kelas
                                                                </span>
                                                                <?php
                                                                    $att_item = ' type="text" class="form-control select2"  style="width: 90%;" id="id_kelas" onchange="kosong_table();add_tohidekelas()" required';
                                                                    echo form_dropdown('select_kelas', $kode_kelas, null, $att_item);
                                                                ?>
                                                            
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
                                                                    Kurikulum
                                                                </span>
                                                                <?php
                                                                    $att_item = ' type="text" class="form-control select" style="width: 90%;" id="id_thn_ajar" onchange="kosong_table();add_tohide()" required';
                                                                    echo form_dropdown('select_thnajar', $kode_deskripsi, null, $att_item);
                                                                ?>
                                                                <input type="hidden" class="form-control" name="hide_Kurikulum" id="hide_Kurikulum" >
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <!--span-->
                                                </div>
                                                <div class="row">  
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Guru
                                                                </span>
                                                                <?php
                                                                    $att_item = ' type="text" class="form-control select2" style="width: 90%;" id="id_guru" onchange="kosong_table()" required';
                                                                    echo form_dropdown('select_guru', $idguru, null, $att_item);
                                                                ?>
                                                                <input type="hidden" class="form-control" name="hide_Kurikulum" id="hide_Kurikulum" >
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
                                                                    Santri
                                                                </span>
                                                                <select class="form-control" style="width: 90%;"  name="santri" id="santri" onchange="kosong_table()" required>
                                                                <option value=""></option>
                                                                <option value="PUTRI">PUTRI</option>
                                                                <option value="PUTRA">PUTRA</option>
                                                            </select>
                                                            </div>
                                                        </div>    
                                                    </div>                                                
                                                    <!--span-->
                                                </div>
                                            <!--end inputbox-->                                            
                                            <!--kotak mata pelajaran-->
                             <input type="text" class="hidden" id="id_rpp_hide" name="id_rpp_hide"/>
                             <input type="text" class="hidden" id="kode_kelas" name="kode_kelas"/>
                             <input type="text" class="hidden" id="tingkat" name="tingkat"/>
                             <input type="text" class="hidden" id="tipe_kelas" name="tipe_kelas"/>
                            <div class="portlet box green-jungle">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> RPP LIST
                                    </div>
                                        <div class="tools">
                                             <button type="button" class="btn red-intense" id="button_refresh" onclick="refresh_table()">
                                                <i class="glyphicon glyphicon-asterisk "> </i> Refresh Tables
                                            </button>
                                            <a href="javascript:;" class="collapse"></a>
                                           
                                        </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <div class="form-body">
                                       
                                        <!--row begin-->
                                        <input type="hidden" id="hid_jumlah_item_KecakapanKhusus" value="0" />
                                        <input type="hidden" name="hid_table_item_KecakapanKhusus" id="hid_table_item_KecakapanKhusus" />
                                                <div class="portlet-body table-both-scroll">
                                                    <div class="table-responsive">
                                                        <table id="tb_list_rpp" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                <td>Bulan</td>
                                                                <td>Minggu</td>
                                                                <td>Hari/Hissoh</td>
                                                                <td>Materi Pokok</td>
                                                                <td>Waktu</td>
                                                                <td>TIU/TIK</td>
                                                                <td>Jenis Tagihan PR/UH HP / PK</td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td colspan="7" align="center">
                                                                    Belum Ada Data.
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                                <!--<tfoot>
                                                                    <tr>
                                                                        <td>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>-->
                                                        </table>
                                                    </div>
                                                </div>                           
                                        <!--/row-->
                                    </div>
                                <!-- END FORM-->
                                </div>
                            </div>
                            <!--table mata pelajaran-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svrpp()">Save</button>
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
<!-- end of modal rpp-->
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
                                                                Kode rpp
                                                            </span>
                                                            <input type="text" class="form-control" name="s_koderpp" id="s_koderpp" onkeydown="OtomatisKapital(this)" required></div>
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
