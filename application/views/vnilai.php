<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>js/jnilai.js"></script>
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
                        | Semester Aktif : <b><?php echo $semester_aktif;?></b>
                    </h3>
                <table class="table table-striped table-bordered table-hover" id="tb_list">
                    <thead>
                        <tr>
                            <!-- <th style="text-align:center">ID</th> -->
                            <th style="text-align:center">Tahun Ajar</th>
                            <th style="text-align:center">Semester</th>
                            <th style="text-align:center">Tingkat</th>
                            <th style="text-align:center">Tipe Kelas</th>
                            <th style="text-align:center">Santri</th>
                            <th style="text-align:center">Kode Kelas</th>
                            <th style="text-align:center">Nama Kelas</th>
                            <!-- <th style="text-align:center">ID Guru</th> -->
                            <th style="text-align:center">Nama Guru</th>
                            <!-- <th style="text-align:center">ID Mata Pelajaran</th> -->
                            <th style="text-align:center">Mata Pelajaran</th>
                            <th style="text-align:center">Kategori Kelas</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td colspan="10" align="center">
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
<!-- modal EDIT SANTRI -->
    <div class="modal fade draggable-modal" id="Modal_add_nilai" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">LIST SANTRI</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_nilai">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <input type="text" class="hidden" name="id" id="id">
                                                    <input type="text" class="hidden" name="id_thn_ajar" id="id_thn_ajar">
                                            <div class="row">
                                                <!--span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Tahun Ajar
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" readonly="true">
                                                            </div>
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
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="semester" id="semester" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span-->
                                            </div>
                                            <div class="row">
                                                <!--span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Santri
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="santri" id="santri" readonly="true">
                                                            </div>
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
                                                                Kode Kelas
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span-->
                                            </div>
                                            <div class="row">
                                                <!--span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                ID Guru
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="id_guru" id="id_guru" readonly="true">
                                                            </div>
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
                                                                ID Mata Pelajaran
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="id_mapel" id="id_mapel" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span-->
                                            </div>
                                            <!--end inputbox-->
                                            <!-- List Table Santri -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                        <div class="portlet box green-jungle">
                                                        <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-database"></i>LIST SANTRI
                                                                </div>
                                                                <div class="tools">
                                                                <div class="btn-group pull-right">
                                                                    
                                                                </div>
                                                                </div>
                                                                <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                                                                    <!-- <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                                                                        <i class="fa fa-search"></i>&nbsp;Search
                                                                    </button> -->
                                                                </div>
                                                            </div>
                                                            <input type="text" class="hidden" name="hid_param_listsantri" id="hid_param_listsantri" />
                                                            <div class="portlet-body">
                                                                <table class="table table-striped table-bordered table-hover" id="tb_list_listsantri">
                                                                    <thead>
                                                                        <tr>
                                                                            <!-- <th style="text-align:center">ID</th> -->
                                                                            <th style="text-align:center">No Registrasi</th>
                                                                            <th style="text-align:center">Nama Santri</th>
                                                                            <th style="text-align:center">Nama Arab</th>
                                                                            <th style="text-align:center">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                        <td colspan="4" align="center">
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
                                            <!-- END List Table Santri -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
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
<!-- end of EDIT SANTRI-->
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
<!-- modal LIST NILAI SANTRI -->
    <div class="modal fade draggable-modal" id="Modal_add_nilai_santri" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">LIST NILAI</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_nilai_santri">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <input type="text" class="hidden" name="id_nilai_santri" id="id_nilai_santri">
                                                    <input type="text" class="hidden" name="id_thn_ajar_nilai_santri" id="id_thn_ajar_nilai_santri">
                                            <div class="row">
                                                <!--span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Tahun Ajar
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="deskripsi_nilai_santri" id="deskripsi_nilai_santri" readonly="true">
                                                            </div>
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
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="semester_nilai_santri" id="semester_nilai_santri" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span-->
                                            </div>
                                            <div class="row">
                                                <!--span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Santri
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="santri_nilai_santri" id="santri_nilai_santri" readonly="true">
                                                            </div>
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
                                                                Kode Kelas
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="kode_kelas_nilai_santri" id="kode_kelas_nilai_santri" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span-->
                                            </div>
                                            <div class="row">
                                                <!--span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                ID Guru
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="id_guru_nilai_santri" id="id_guru_nilai_santri" readonly="true">
                                                            </div>
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
                                                                ID Mata Pelajaran
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="id_mapel_nilai_santri" id="id_mapel_nilai_santri" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span-->
                                            </div>
                                            <div class="row">
                                                <!--span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                No Registrasi
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" readonly="true">
                                                            </div>
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
                                                                Nama
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" readonly="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span-->
                                            </div>
                                            <!--end inputbox-->
                                            <!-- List Table Santri -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                        <!-- table -->
                                                        <div class="portlet box green-jungle">
                                                            <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-database"></i>DATA NILAI
                                                                    </div>
                                                                    <div class="tools">
                                                                    <div class="btn-group pull-right">
                                                                        
                                                                    </div>
                                                                    </div>
                                                                    <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                                                                        <button class="btn btn-default " type="button" onclick="addPenilaian()">
                                                                            <i class="fa fa-edit"></i>&nbsp;Tambah Penilaian&nbsp;
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <input type="text" id="hid_jumlah_item_Penilaian" CLASS="hidden" value="0" />
                                                                <input type="text" name="hid_table_item_Penilaian" class="hidden" id="hid_table_item_Penilaian" />
                                                                <div class="portlet-body">
                                                                    <table class="table table-striped table-bordered table-hover" id="tb_list_Penilaian">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align:center">NO</th>
                                                                                <th style="text-align:center">NAMA PENILAIAN</th>
                                                                                <th style="text-align:center">KATEGORI</th>
                                                                                <th style="text-align:center">NILAI</th>
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
                                                      <!-- table end -->
                                                        <!-- END EXAMPLE TABLE PORTLET-->
                                                    </div>
                                                </div>
                                            <!-- END List Table Santri -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svnilaiX ()">Save</button>
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
<!-- end of LIST NILAI SANTRI-->
<!-- modal add bulan -->
    <div class="modal fade draggable-modal" id="Modal_add_Penilaian" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">TAMBAH NILAI</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_Penilaian">
                                            <!--inputbox-->
                                                <!--span-->
                                                <div class="form-group">
                                                    <label class="control-label"></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Kategori
                                                        </span>
                                                        <select class="form-control" name="kategori" id="kategori" required>
                                                            <option value=""></option>
                                                            <option value="ULANGAN_HARIAN">ULANGAN HARIAN</option>                                                    
                                                            <option value="ULANGAN_BULANAN">ULANGAN BULANAN</option>                                                    
                                                            <option value="UJIAN">UJIAN</option>                                                    
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--span-->
                                                <!--span-->
                                                <div class="form-group">
                                                    <label class="control-label"></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Penilaian
                                                        </span>
                                                        <div class="input-icon right">
                                                                <i class="fa"></i>
                                                        <input type="text" class="form-control" name="nama_penilaian" id="nama_penilaian" onkeydown="OtomatisKapital(this)" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span-->
                                                <!--span-->
                                                <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Nilai
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="number" class="form-control" name="nilai" id="nilai" required>
                                                            </div>
                                                        </div>
                                                </div>
                                                <!--span-->
                                                     <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green" id="add_button" onclick="TambahPenilaian()">Add</button>
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
<!-- modal Cari santri-->
    <div class="modal fade draggable-modal" id="Modal_cari_listsantri" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                                            <input type="text" class="form-control" name="s_kode_kelas_listsantri" id="s_kode_kelas_listsantri" onkeydown="OtomatisKapital(this)" required></div>
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
<!-- end of modal cari santri-->
