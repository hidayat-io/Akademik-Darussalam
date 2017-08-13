<link href="<?=base_url()?>assets/css/v_guru.css" rel="stylesheet" type="text/css">

<script src="<?=base_url()?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
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
                            <th>No.Registrasi</th>
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
                    <form id="form_editing">
                        <div class="tabbable-custom ">
                            <ul class="nav nav-tabs ">
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
                                <div class="tab-pane" id="data_guru">
                                    <div class="form-body">                                
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <div class="fileinput fileinput-new" data-provides="fileinput" style="padding-bottom: 5px;">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new">Pilih Foto</span>
                                                            <span class="fileinput-exists"> Ubah </span>
                                                            <input type="file" name="..."> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.Registrasi</span>
                                                    <input type="text" class="form-control medium-width" placeholder="No.Registrasi" name="txt_noreg">
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Lengkap</span>
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="txt_nama_lengkap">
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Arab</span>
                                                    <input type="text" class="form-control" placeholder="Nama Arab" name="txt_nama_arab">
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">NUPTK</span>
                                                    <input type="text" class="form-control medium-width" placeholder="NUPTK" name="txt_nuptk">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Tempat Lahir</span>
                                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="txt_tmp_lahir">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">NIG</span>
                                                    <input type="text" class="form-control medium-width" placeholder="NIG" name="txt_no_nig">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Tgl.Lahir</span>
                                                    <input type="text" class="form-control medium-width" placeholder="Tgl.Lahir" name="dtp_tgl_lahir">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.KTP</span>
                                                    <input type="text" class="form-control medium-width" placeholder="No.KTP" name="txt_no_ktp">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Kewarganegaraan</span>
                                                    <input type="text" class="form-control" placeholder="Kewarganegaraan" name="txt_kewarganegaraan">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Alamat Lengkap</span>
                                                    <textarea rows="4" cols="50" class="form-control" placeholder="Alamat Lengkap"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Email</span>
                                                    <input type="text" class="form-control" placeholder="Email" name="txt_email">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.Telp / HP.</span>
                                                    <input type="text" class="form-control" placeholder="No.Telp / HP." name="txt_notelp">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Ayah</span>
                                                    <input type="text" class="form-control" placeholder="Nama Ayah" name="txt_nama_ayah">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Ibu</span>
                                                    <input type="text" class="form-control" placeholder="Nama Ibu" name="txt_nama_ibu">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Status Pernikahan</span>
                                                    <select name="opt_pernikahan" class="form-control">
                                                        <option>- Belum Dipilih -</option>
                                                        <option value="s">Belum Menikah</option>
                                                        <option value="m">Menikah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Nama Pasangan</span>
                                                    <input type="text" class="form-control" placeholder="Nama Pasangan" name="txt_nama_pasangan">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Jumlah Anak</span>
                                                    <input type="text" class="form-control small-width numbers-only" placeholder="Jumlah Anak" name="txt_jml_anak" readonly="">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Usia Pasangan</span>
                                                    <input type="text" class="form-control small-width numbers-only" placeholder="Usia Pasangan" name="txt_usia_pasangan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane active" id="data_akademik">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.Stambuk
                                                        <small style="color:grey;font-style:italic">&nbsp;(*Jika alumni)</small>
                                                    </span>
                                                    <input type="text" class="form-control input-medium" placeholder="No.Stambuk Alumni" name="txt_stambuk_alumni">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Mengajar Sejak</span>
                                                    <input type="text" class="form-control numbers-only" placeholder="Tahun Mulai" name="txt_tahun_mulai">
                                                    <span class="input-group-addon" style="text-align: center;">s/d</span>
                                                    <input type="text" class="form-control numbers-only" placeholder="Tahun Selesai" name="txt_tahun_akhir">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">No.SK Pengangkatan</span>
                                                    <input type="text" class="form-control input-medium" placeholder="No.SK Pengangkatan" name="txt_sk_angkat">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Tanggal SK.</span>
                                                    <div class="input-group input-medium date datepicker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="dtp_tgl_sk">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Kesra / Gapok</span>
                                                    <input type="text" class="form-control input-medium" placeholder="Gapok" name="txt_gapok">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Masa Pengabdian</span>
                                                    <input type="text" class="form-control numbers-only input-small" placeholder="Masa Pengabdian" name="txt_masa_pengabdian">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Ijazah Terakhir</span>
                                                    <input type="text" class="form-control numbers-only input-medium" placeholder="Ijazah Terakhir" name="txt_ijazah)terakhir">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Sertifikasi</span>
                                                    <input type="text" class="form-control input-medium" placeholder="Sertifikasi" name="txt_sertifikasi">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Status</span>
                                                    <select name="opt_status" class="form-control">
                                                        <option>- Belum Dipilih -</option>
                                                        <option value="s">Pengabdian</option>
                                                        <option value="m">Tetap</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Jabatan Struktural</span>
                                                    <?php

                                                        $att_jabatan = 'class="form-control select2-multiple input-xlarge" id="opt_jabatan" multiple';
                                                        echo form_dropdown('opt_jabatan', $opt_jabatan, null, $att_jabatan);
                                                    ?>                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <h4  class="form-section">Struktural</h4>
                                    </div>
                                </div>
                                <div class="tab-pane" id="data_anak">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Pendidikan</th>
                                                <th>Usia</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Adong</td>
                                                <td>Sarjana</td>
                                                <td>28</td>
                                                <td>- BUTTON -</td>
                                            </tr>
                                        </tbody>
                                    </table>                                    
                                </div>
                                <div class="tab-pane" id="data_pendidikan">
                                    <h4  class="form-section">Pendidikan Formal<i class="fa fa-plus pull-right"></i></h4>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pendidikan</th>
                                                <th>Tempat</th>
                                                <th>Lulus Tahun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Adong</td>
                                                <td>Sarjana</td>
                                                <td>28</td>
                                                <td>- BUTTON -</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h4  class="form-section">Pendidikan Non Formal</h4>
                                    <table class="table table-bordered table-hover">                                        
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pendidikan</th>
                                                <th>Tempat</th>
                                                <th>Lulus Tahun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Adong</td>
                                                <td>Sarjana</td>
                                                <td>28</td>
                                                <td>- BUTTON -</td>
                                            </tr>
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
