<link href="<?=base_url()?>assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css/v_absensi.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/plugins/moment-with-locales.min.js"></script>
<script src="<?php echo base_url(); ?>js/jabsensi.js"></script>
<input type="hidden" name="hid_param" id="hid_param" value='' />

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green-jungle">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar-check-o"></i><?php echo $title;?> 
                </div>
                <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">                    
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Report
                    </button>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tb-list">
                    <thead>
                        <tr>
                            <th>Kode Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Tipe Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Edit</th>                   
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->        
    </div>
</div>

<!-- Modal Form Editing -->
<div id="modal_editing" class="modal modal-form fade bs-modal-lg modal-fullscreen force-fullscreen"
    role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-form modal-lg" id="portlet_form_scan">
        <div class="modal-content modal-content-form">
            <div class="modal-body-form">
                <div class="portlet-form">
                    <form id="form_absensi" enctype="multipart/form-data">
						<input type="text" class="hidden" name="hid_list_siswa" id="hid_list_siswa" value="" />
						<input type="text" class="hidden" name="hid_id_absen_header" id="hid_id_absen_header" value="" />
						<input type="text" class="hidden" name="hid_id_jadwal" id="hid_id_jadwal" value="" />
						<input type="text" class="hidden" name="hid_id_guru" id="hid_id_guru" value="" />
                        <h4 style="font-size:90%">
                            <strong>Absensi Siswa</strong>
                            <table border="0" style="float:right;margin-right:25px;" id="tb-title">
                                <tr>                                   
                                    <td><strong>Tanggal : </strong>
                                        <input type="text" class="form-control datepicker input-sm input-small" 
                                            style="display:inline-block" readonly="" name="dtp_tgl_absensi" id="dtp_tgl_absensi"
                                            value="<?php echo date('d-m-Y')?>" onchange="getDayName(this.value);loadDataAbsensiSiswa()">
                                    </td>
									<td><strong>Hari : </strong><label id="lbl_hari"></label></td>
                                    <!-- <td>
                                        <strong>Tahun Ajaran : </strong><label id="lbl_tahun_ajar"></label>
                                    </td>
                                    <td><strong>Semester : </strong><label id="lbl_tahun_ajar"></label></td> -->
                                </tr>
                            </table>
                        </h4>
                        <hr style="margin: 20px 0px 0px;">
                        <div style="float:right;color:blue">
                            <strong>Guru :&nbsp;</strong><label id="lbl_nama_guru"></label>
                            <strong style="padding-left:10px">Kelas :&nbsp;</strong><label id="lbl_nama_kelas"></label>
                        </div>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="tb_absensi">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="cell-middle-left">No.</th>
                                    <th rowspan="2" class="cell-middle-left">No.Reg</th>
                                    <th rowspan="2" class="cell-middle-left">Nama Siswa</th>
                                    <th colspan="4" class="cell-middle-left">Absensi</th>
                                </tr>
                                <tr>
                                    <th class="cell-text-center">Hadir</th>
                                    <th class="cell-text-center">Ijin</th>
                                    <th class="cell-text-center">Sakit</th>
                                    <th class="cell-text-center">Alpa</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </form>                    
                </div>
            </div>
            <div class="modal-footer modal-footer-form">
                <a href="javascript:;" class="btn btn-sm default" data-dismiss="modal">
                    <i class="glyphicon glyphicon-minus-sign"></i>&nbsp;CLOSE
                </a>
				<a href="javascript:;" class="btn btn-sm green-jungle hidden" onclick="saveForm()" id="cmd_save">
                    <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;SIMPAN
                </a>
                <img id="load_save" style="margin-left:5px;display: none"
                    src="<?php echo base_url(); ?>images/pre_loader.gif" />
            </div>
        </div>
    </div>
</div>
<!-- End Modal Form Editing -->