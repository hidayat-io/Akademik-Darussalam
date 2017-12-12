<link href="<?=base_url()?>assets/css/v_guru.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">

<script src="<?=base_url()?>assets/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/jguru.js"></script>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green-jungle">
        <div class="portlet-title">
                <div class="caption">
                    <i class="icon-user"></i>&nbsp;<span><?php echo $title;?></span>
                </div>
                <div class="tools">
                  <div class="btn-group pull-right">

                  </div>
                </div>
                <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                    <button class="btn btn-default " type="button" data-toggle="dropdown" onclick="modalNew()">
                        <i class="icon-note"></i>&nbsp;Tambah Data&nbsp;
                    </button>
                    <button type="button" class="btn btn-default" title="Search Data" onclick="modalSearch()">
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
                            <th>No.Regis.</th>
                            <th>Nama Lengkap</th>
                            <th>NIG</th>
                            <th>Mulai Mengajar</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="7" align="center">Tidak ada data ditemukan.</td></tr>
                    </tbody>
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
                    <form id="form_editing" enctype="multipart/form-data">

                        <input type="text" id="hid_id_data" name="hid_id_data" class="hidden" />
                        <input type="text" id="hid_anak" name="hid_anak" value="[]" class="hidden" />
                        <input type="text" id="hid_sk_angkat" name="hid_sk_angkat" value="[]" class="hidden" />
                        <input type="text" id="hid_pformal_edu" name="hid_pformal_edu" value="[]" class="hidden" />
                        <input type="text" id="hid_pnonformal_edu" name="hid_pnonformal_edu" value="[]" class="hidden" />
                        <input type="text" id="hid_old_gapok" name="hid_old_gapok" class="hidden" value="" />
                        <input type="text" id="hid_no_statistik" name="hid_no_statistik" class="hidden" value="<?=$nomor_statistik?>">

                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <i class="fa fa-exclamation-triangle"></i>&nbsp;Mohon cek kembali data yang Anda input, masih ada form yang wajib diisi.
                        </div>
                        <div class="tabbable-custom">

                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#data_guru" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;Biodata Guru</a>
                                </li>
                                <li>
                                    <a href="#data_akademik" data-toggle="tab"><i class="fa fa-university"></i>&nbsp;Data Akademik</a>
                                </li>
                                <li>
                                    <a href="#data_anak" data-toggle="tab"><i class="fa fa-child"></i>&nbsp;Data Anak</a>
                                </li>
                                <li>
                                    <a href="#data_pendidikan" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&nbsp;Data Pendidikan</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="data_guru">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <div class="fileinput fileinput-new" data-provides="fileinput" style="padding-bottom: 5px;">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="" alt="" id="img_foto" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new">Pilih Foto</span>
                                                            <span class="fileinput-exists"> Ubah </span>
                                                            <input type="file" name="file_foto" id="file_foto" accept="image/*">
                                                        </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.Registrasi</span>
                                                    <input type="text" class="form-control input-small" placeholder="No.Registrasi" name="txt_noreg" id="txt_noreg" readonly>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        Nama Lengkap
                                                        <span class="required">*</span>
                                                    </span>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i><input type="text" class="form-control" name="txt_nama_lengkap" id="txt_nama_lengkap" placeholder="Nama Lengkap" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Arab</span>
                                                    <input type="text" class="form-control" placeholder="Nama Arab" name="txt_nama_arab" id="txt_nama_arab">
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">NUPTK</span>
                                                    <input type="text" class="form-control input-medium" placeholder="NUPTK" name="txt_nuptk" id="txt_nuptk">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Tempat Lahir</span>
                                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="txt_tmp_lahir" id="txt_tmp_lahir">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">NIG</span>
                                                    <input type="text" class="form-control medium-width" placeholder="NIG" name="txt_no_nig" id="txt_no_nig" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Tgl.Lahir</span>
                                                    <div class="input-group input-medium date datepicker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="dtp_tgl_lahir" id="dtp_tgl_lahir">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.KTP<span class="required">*</span></span>
                                                    <div class="input-icon right input-medium">
                                                        <i class="fa"></i><input type="text" class="form-control medium-width" name="txt_no_ktp" id="txt_no_ktp" placeholder="No.KTP" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Jenis Kelamin</span>
                                                    <select name="opt_gender" id="opt_gender" class="form-control input-small"> 
                                                        <option value="l">Laki-laki</option>
                                                        <option value="p">Perempuan</option>
                                                    </select>
                                                </div>                                                
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.KK</span>
                                                    <input type="text" class="form-control input-medium" name="txt_no_kk" id="txt_no_kk" placeholder="No.KK" />
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">                       
                                                <div class="input-group">
                                                    <span class="input-group-addon">Kewarganegaraan</span>
                                                    <input type="text" class="form-control" placeholder="Kewarganegaraan" name="txt_kewarganegaraan" id="txt_kewarganegaraan">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Alamat Lengkap</span>
                                                    <textarea name="txa_alamat" id="txa_alamat" rows="4" cols="50" class="form-control" placeholder="Alamat Lengkap"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Email</span>
                                                    <input type="text" class="form-control input-medium" placeholder="Email" name="txt_email" id="txt_email">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.Telp / HP.</span>
                                                    <input type="text" class="form-control" placeholder="No.Telp / HP." name="txt_notelp" id="txt_notelp">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Ayah</span>
                                                    <input type="text" class="form-control" placeholder="Nama Ayah" name="txt_nama_ayah" id="txt_nama_ayah">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Ibu</span>
                                                    <input type="text" class="form-control" placeholder="Nama Ibu" name="txt_nama_ibu" id="txt_nama_ibu">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Status Pernikahan</span>
                                                    <select name="opt_pernikahan"  id="opt_pernikahan" class="form-control input-medium">
                                                        <option value="s">Belum Menikah</option>
                                                        <option value="m">Menikah</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Pasangan</span>
                                                    <input type="text" class="form-control" placeholder="Nama Pasangan" name="txt_nama_pasangan" id="txt_nama_pasangan">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Jumlah Anak</span>
                                                    <input type="text" class="form-control small-width numbers-only input-medium" placeholder="Jumlah Anak" name="txt_jml_anak" id="txt_jml_anak" readonly="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Tgl.Lahir Pasangan</span>
                                                    <div class="input-group input-medium date datepicker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="dtp_tgllahir_pasangan" id="dtp_tgllahir_pasangan">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="data_akademik">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.Stambuk
                                                        <small style="color:grey;font-style:italic">&nbsp;(*Jika alumni)</small>
                                                    </span>
                                                    <input type="text" class="form-control input-medium" placeholder="No.Stambuk Alumni" name="txt_stambuk_alumni" id="txt_stambuk_alumni">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Mengajar Sejak</span>
                                                    <input type="text" class="form-control datepicker" placeholder="Tgl.Mulai" name="dtp_ajar_mulai" id="dtp_ajar_mulai" readonly>
                                                    <span class="input-group-addon" style="text-align: center;">s/d</span>
                                                    <input type="text" class="form-control datepicker" placeholder="Tgl.Selesai" name="dtp_ajar_akhir" id="dtp_ajar_akhir" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Status</span>
                                                    <select name="opt_status" id="opt_status" class="form-control input-medium">
                                                        <option value="">- Belum Dipilih -</option>
                                                        <option value="Pengabdian">Pengabdian</option>
                                                        <option value="Tetap">Tetap</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Jabatan Struktural</span>
                                                    <?php

                                                        $att_jabatan = 'class="form-control select2-multiple input-xlarge" id="opt_jabatan" multiple';
                                                        echo form_dropdown('opt_jabatan[]', $opt_jabatan, null, $att_jabatan);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Kesra / Gapok</span>
                                                    <input type="text" class="form-control input-medium numbers-only" placeholder="Gapok" name="txt_gapok" id="txt_gapok">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Masa Pengabdian</span>
                                                    <input type="text" class="form-control numbers-only input-small" placeholder="Masa Pengabdian" name="txt_masa_pengabdian" id="txt_masa_pengabdian">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Ijazah Terakhir</span>
                                                    <select class="form-control select2 input-medium" id="opt_ijazah_terakhir" name="opt_ijazah_terakhir"></select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Gelar Akademik</span>
                                                    <input type="text" class="form-control input-medium" placeholder="Gelar Akademik" name="txt_gelar" id="txt_gelar">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Materi yang diampu</span>
                                                    <?php

                                                        $att_mapel = 'class="form-control select2 input-medium" id="opt_mapel"';
                                                        echo form_dropdown('opt_mapel', $opt_mapel, null, $att_mapel);
                                                    ?>
                                                    <!-- <textarea name="txa_materi" id="txa_materi" rows="4" cols="50" class="form-control" placeholder="Materi yang diampu"></textarea> -->
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="form-section">SK Pengangkatan</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.SK Pengangkatan</span>
                                                    <input type="text" class="form-control input-medium" placeholder="No.SK Pengangkatan" name="txt_sk_angkat" id="txt_sk_angkat">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Tanggal SK.</span>
                                                    <div class="input-group input-medium date datepicker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="dtp_tgl_sk" id="dtp_tgl_sk">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">File SK Pengangkatan</span>
                                                    <input type="file" class="form-control" name="file_sk_pengangkatan" />
                                                </div>
                                                <a href="#" class="btn btn-primary btn-xs hide" style="margin-top: 5px" id="link_sk" target="_blank">
                                                    <i class="fa fa-files-o"></i>&nbsp;Lihat Lampiran
                                                </a>
                                            </div>
                                        </div>

                                        <h5 class="form-section">
                                            SK Pemberian Tugas
                                            <a href="javascript:;" class="btn btn-xs btn-circle blue-soft pull-right" onclick="modalFormSK()">
                                                <i class="fa fa-plus"></i>&nbsp;Tambah SK
                                            </a>
                                        </h5>
                                        <div class="row">
                                            <table class="table table-bordered" id="tb_data_sk_tugas">
                                                <thead>
                                                    <tr class="active">
                                                        <th width="5%">No</th>                         
                                                        <th width="30%">No.SK Pemberian Tugas</th>
                                                        <th>Tgl.SK</th>
                                                        <th width="10%">File SK</th>    
                                                        <th width="10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <h5 class="form-section">Sertifikasi</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Sertifikasi</span>
                                                    <input type="text" class="form-control input-medium" placeholder="Sertifikasi" name="txt_sertifikasi" id="txt_sertifikasi">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">File Sertifikasi</span>
                                                    <input type="file" class="form-control" name="file_sertifikasi" id="att_pformal" />
                                                </div>
                                                <a href="#" class="btn btn-primary btn-xs hide" style="margin-top: 5px" id="link_sertifikasi" target="_blank">
                                                    <i class="fa fa-files-o"></i>&nbsp;Lihat Lampiran
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="data_anak">
                                    <a href="javascript:;" class="btn btn-xs btn-circle blue-soft pull-right" style="margin-bottom: 5px" onclick="modalAddAnak()">
                                        <i class="fa fa-plus"></i>&nbsp;Tambah Data
                                    </a>
                                    <table class="table table-bordered" id="tb_data_anak">
                                        <thead>
                                            <tr class="active">
                                                <th width="5%">No</th>
                                                <th>Nama</th>
                                                <th width="30%">Pendidikan</th>
                                                <th width="15%">Tgl.Lahir</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="data_pendidikan">
                                    <h4  class="form-section">
                                        Pendidikan Formal
                                        <a href="javascript:;" class="btn btn-xs btn-circle blue-soft pull-right" onclick="modalAddEduFormal()">
                                            <i class="fa fa-plus"></i>&nbsp;Tambah Data
                                        </a>
                                    </h4>
                                    <table class="table table-bordered" id="tb_data_pformal">
                                        <thead>
                                            <tr class="active">
                                                <th width="5%">No</th>
                                                <th width="30%">Pendidikan</th>
                                                <th>Tempat</th>
                                                <th width="10%">Lulus Tahun</th>
                                                <th width="10%">Lampiran</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>
                                        </tbody>
                                    </table>

                                    <h4  class="form-section">
                                        Pendidikan Non Formal
                                        <a href="javascript:;" class="btn btn-xs btn-circle blue-soft pull-right" onclick="modalAddEduNonFormal()">
                                            <i class="fa fa-plus"></i>&nbsp;Tambah Data
                                        </a>
                                    </h4>
                                    <table class="table table-bordered" id="tb_data_pnonformal">
                                        <thead>
                                            <tr class="active">
                                                <th width="5%">No</th>
                                                <th width="30%">Pendidikan</th>
                                                <th>Tempat</th>
                                                <th width="10%">Lulus Tahun</th>
                                                <th width="10%">Lampiran</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer modal-footer-form">
                <a href="javascript:;" class="btn btn-sm default" data-dismiss="modal">
                    <i class="glyphicon glyphicon-minus-sign"></i>&nbsp;CLOSE
                </a>
                <a href="javascript:;" class="btn btn-sm green-jungle" onclick="validateForm()" id="cmd_save">
                    <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;SIMPAN
                </a>
                <img id="load_save" style="margin-left:5px;display: none"
                    src="<?php echo base_url(); ?>images/pre_loader.gif" />
            </div>
        </div>
    </div>
</div>
<!-- End Modal Form Editing -->

<!-- Modal add data anak -->
<div class="modal fade" id="modal_data_anak" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Anak</h4>
            </div>
            <div class="modal-body">
                <form id="form_data_anak">
                    <input type="text" id="id_detail_anak" class="hidden" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Nama Anak
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control" name="txt_da_nama" id="txt_da_nama" placeholder="Nama Anak" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Pendidikan
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control" name="txt_da_pendidikan" id="txt_da_pendidikan" placeholder="Pendidikan Anak" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Tanggal Lahir
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right" data-date-format="dd-mm-yyyy">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control input-small datepicker" data-date-format="dd-mm-yyyy"
                                            readonly="" name="dtp_da_birth" id="dtp_da_birth" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn green-jungle" onclick="simpanDataAnak()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal add data anak -->

<!-- Modal add data pendidikan formal -->
<div class="modal fade" id="modal_data_pformal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Pendidikan Formal</h4>
            </div>
            <div class="modal-body">
                <form id="form_data_pformal">
                    <input type="text" id="id_detail_pformal" class="hidden" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Nama Pendidikan
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control" name="txt_pformal_nama" id="txt_pformal_nama" placeholder="Nama Pendidikan" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Tempat
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control" name="txt_pformal_tempat" id="txt_pformal_tempat" placeholder="Tempat Pedidikan" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Lulus Tahun
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control numbers-only" name="txt_pformal_lulus" id="txt_pformal_lulus" placeholder="Tahun Lulus" maxlength="4" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Lampiran</span>
                                    <input type="file" class="form-control" name="att_file" id="att_pformal" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn green-jungle" onclick="simpanDataPformal()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal add data pendidikan formal -->

<!-- Modal add data pendidikan formal -->
<div class="modal fade" id="modal_data_pnonformal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Pendidikan Non Formal</h4>
            </div>
            <div class="modal-body">
                <form id="form_data_pnonformal">
                    <input type="text" id="id_detail_pnonformal" class="hidden" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Nama Pendidikan
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control" name="txt_pnonformal_nama" id="txt_pnonformal_nama" placeholder="Nama Pendidikan" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Tempat
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control" name="txt_pnonformal_tempat" id="txt_pnonformal_tempat" placeholder="Tempat Pedidikan" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Lulus Tahun
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control numbers-only" name="txt_pnonformal_lulus" id="txt_pnonformal_lulus" placeholder="Tahun Lulus" maxlength="4" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Lampiran</span>
                                    <input type="file" class="form-control" name="att_file" id="att_pnonformal" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn green-jungle" onclick="simpanDataPnonformal()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal add data pendidikan formal -->

<!-- Modal add data pendidikan formal -->
<div class="modal fade" id="modal_data_sk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data SK Pemberian Tugas</h4>
            </div>
            <div class="modal-body">
                <form id="form_data_sk">
                    <input type="text" id="id_detail_sk" class="hidden" />
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">No.SK
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i><input type="text" class="form-control" name="txt_no_sk" id="txt_no_sk" placeholder="No.SK" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Tgl.SK
                                        <span class="required">*</span>
                                    </span>
                                    <div class="input-icon right" data-date-format="dd-mm-yyyy">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control input-small datepicker" data-date-format="dd-mm-yyyy"
                                            readonly="" name="dtp_tgl_sk" id="dtp_tgl_sk" placeholder="Tanggal SK">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Lampiran</span>
                                    <input type="file" class="form-control" name="att_file" id="att_file" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn green-jungle" onclick="simpanDataSK()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal add data pendidikan formal -->

<!-- Modal Search Data -->
<div id="modal_search" class="modal fade" tabindex="-1">
    <div class="modal-dialog" id="portlet_form_scan">
        <div class="portlet box green-jungle">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-search"></i>Search Data
                </div>                
            </div>
            <div class="portlet-body">
                <form class="form-horizontal" role="form" id="form_search">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label pull-left" style="text-align: left;">No.Regis</label>
                            <div class="col-md-4">
                                <input type="text" name="txt_snoregis" class="form-control numbers-only input-small" placeholder="No.Regis" maxlength="4">                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label pull-left" style="text-align: left;">NIG</label>
                            <div class="col-md-9">
                                <input type="text" name="txt_snig" class="form-control numbers-only input-medium" placeholder="NIG">                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" name="txt_snama_lengkap" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label pull-left" style="text-align: left;">Mulai Mengajar</label>
                            <div class="col-md-9">
                                <div class="input-group input-large datepicker input-daterange">
                                    <input type="text" class="form-control" name="dtp_sajar_start">
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="form-control" name="dtp_sajar_end">
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Gender</label>
                            <div class="col-md-9">
                                <select name="opt_sgender" id="opt_sgender" class="form-control input-small"> 
                                    <option value="">- Semua Gender-</option>
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Status</label>
                            <div class="col-md-9">
                                <select name="opt_sstatus" id="opt_sstatus" class="form-control input-medium">
                                    <option value="">- Semua Status -</option>
                                    <option value="Pengabdian">Pengabdian</option>
                                    <option value="Tetap">Tetap</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12" style="margin-left: 15px">
                                <button type="button" class="btn green-jungle" onclick="searchAct()">Search</button>
                                <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Search Data -->
