    <form action="#" id="add_santri" class="form-horizontal">
                        <!--kotak data santri mulai-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>DATA SANTRI </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div class="form-body">
                                        <h3 class="form-section">Data Pribadi</h3>
                                        <!--row begin-->
                                        <!--inputbbox-->
                                        <div class="m-grid m-grid-responsive-xs">
                                        <div class="m-grid-row">
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                <div class="form-group"><label for="form_control_1">Kategori</label>
                                                    <input type="text" class="form-control" name="kategori_santri" id="kategori_santri" readonly="true">
                                                    
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-2">
                                                <div class="form-group"><label for="no_registrasi">No. Registrasi</label>
                                                    <input type="text" class="form-control" readonly name="no_registrasi" id="no_registrasi" onkeydown="OtomatisKapital(this)" >
                                                    
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                <div class="form-group"> <label for="form_control_1">No. Stambuk</label>
                                                    <input type="text" class="form-control numbers-only"  name="no_stambuk" id="no_stambuk" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                <div class="form-group"><label for="form_control_1">Tahun Masuk</label>
                                                    <input type="text" class="form-control datepicker" readonly name="thn_masuk" id="thn_masuk" required>
                                                    
                                                    </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-2">
                                                <div class="form-group"> <label for="form_control_1">Rayon</label>
                                                    <input type="text" class="form-control" name="rayon" id="rayon" onkeydown="OtomatisKapital(this)" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-2">
                                                <div class="form-group"><label for="form_control_1">Kamar</label>
                                                    <input type="text" class="form-control" name="kamar" id="kamar" onkeydown="OtomatisKapital(this)" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-2">
                                                <div class="form-group"><label for="form_control_1">Bagian</label>
                                                    <input type="text" class="form-control" name="bagian" id="bagian" onkeydown="OtomatisKapital(this)" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-center col-md-1">
                                                <div class="form-group"> <label for="form_control_1">Kelas Sekarang</label>
                                                    <input type="text" class="form-control" name="kel_sekarang" id="kel_sekarang" onkeydown="OtomatisKapital(this)" required>
                                                    
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">NISN</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control numbers-only" name="nisn" id="nisn" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">NISN LOKAL</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control numbers-only" name="nisnlokal" id="nisnlokal" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Nama Lengkap</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Nama Arab</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="nama_arab" id="nama_arab" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Nama Panggilan</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Hobi</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="hobi" id="hobi" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Uang Jajan Perbulan</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="uang_jajan_perbulan" id="uang_jajan_perbulan" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Nomor KK</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control numbers-only" name="no_kk" id="no_kk" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">NIK</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control numbers-only" name="nik" id="nik" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Tempat Lahir</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Tgl. Lahir</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" readonly="true" name="tgl_lahir" id="tgl_lahir" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Konsulat</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="konsulat" id="konsulat" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Suku</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="suku" id="suku" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Kewarganegaraan</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <h3 class="form-section">Alamat</h3>
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Jalan/Kompleks</label>
                                                    <div class="col-md-9">
                                                <input type="text" class="form-control" name="jalan" id="jalan" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">No Rumah, RT, RW</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="no_rumah" id="no_rumah" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Dusun/Kampung</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="dusun" id="dusun" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Desa/Keluraha</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="desa" id="desa" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Kecamatan</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Kabupaten/Kota</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="kabupaten" id="kabupaten" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                            <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Provinsi</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="provinsi" id="provinsi" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Kode Pos</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control numbers-only" name="kd_pos" id="kd_pos" onkeydown="OtomatisKapital(this)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">No Telepon</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control numbers-only" name="no_tlp" id="no_tlp" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">No HP</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control numbers-only" name="no_hp" id="no_hp" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">E-Mail</label>
                                                    <div class="col-md-9">
                                                    <input type="email" class="form-control" name="email" id="email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Facebook</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="fb" id="fb" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Dibesarkandi Kota</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" name="fb" id="fb" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--/row-->
                                </div>
                                <!-- END FORM-->
                            </div>
                        </div>
                        <!--kotak data santri selesai-->
                        <!--kotak data Pembiayaan mulai-->
                        <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>DATA PEMBIAYAAN</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <div class="form-body">
                                                    <h3 class="form-section">Pembiaya</h3>
                                                    <!--row begin-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Yang Membiayai</label>
                                                                <div class="col-md-9">
                                                            <select class="form-control" name="pembiaya" id="pembiaya" onchange="cek_jk()" required>
                                                                <option value=""></option>
                                                                <option value="AYAH">AYAH</option>
                                                                <option value="IBU">IBU</option>
                                                                <option value="WALI">WALI</option>
                                                                <option value="SAUDARA">SAUDARA</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Penghasilan Perbulan</label>
                                                                <div class="col-md-9">
                                                                <input type="text" class="form-control" name="penghasilan" id="penghasilan" onkeydown="OtomatisKapital(this)" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Minimum</label>
                                                                <div class="col-md-9">
                                                                <input type="text" class="form-control" name="biaya_perbulan_min" id="biaya_perbulan_min" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Maximum</label>
                                                                <div class="col-md-9">
                                                                <input type="text" class="form-control" name="biaya_perbulan_max" id="biaya_perbulan_max" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--/row-->
                                                </div>
                                        </div>
                                    </div>
                        <!--kotak data pembiayaan selesai-->
                        <!--kotak data sekolah mulai-->
                        <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i> DATA SEKOLAH (AITAM)</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <div class="form-body">
                                                    <h3 class="form-section">Sekolah</h3>
                                                    <!--row begin-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nama Sekolah</label>
                                                                <div class="col-md-9">
                                                                <input type="text" class="form-control" name="nama_sekolah_aitam" id="nama_sekolah_aitam" onkeydown="OtomatisKapital(this)" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Kelas</label>
                                                                <div class="col-md-9">
                                                                <input type="text" class="form-control" name="kelas_aitam" id="kelas_aitam" onkeydown="OtomatisKapital(this)" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Alamat Sekolah</label>
                                                                <div class="col-md-9">
                                                                <input type="text" class="form-control" name="alamat_sekolah_aitam" id="alamat_sekolah_aitam" onkeydown="OtomatisKapital(this)" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--/row-->
                                                </div>

                                            <!-- END FORM-->
                                        </div>
                                    </div>
                        <!--kotak data sekolah end-->
                        <!--kotak data fisik mulai-->
                        <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i> DATA FISIK</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <div class="form-body">
                                                    <h3 class="form-section">FISIK</h3>
                                                    <!--row begin-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Golongan Darah</label>
                                                                <div class="col-md-9">
                                                                <select class="form-control" name="gol_darah" id="gol_darah" required>
                                                                    <option value=""></option>
                                                                    <option value="A">A</option>
                                                                    <option value="B">B</option>
                                                                    <option value="A/B">A/B</option>
                                                                    <option value="O">O</option>
                                                                    <option value="TIDAK TAHU">TIDAK TAHU</option>
                                                                </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tinggi Badan (cm)</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control numbers-only" name="tinggi_badan" id="tinggi_badan"maxlength="3"  required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Khitan</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="khitan" id="khitan" required>
                                                                    <option value=""></option>
                                                                    <option value="SUDAH">SUDAH</option>
                                                                    <option value="BELUM">BELUM</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Berat Badan (kg)</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control numbers-only" name="berat_badan" id="berat_badan" maxlength="3" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Pengelihatan Mata</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="pengelihatan_mata" id="pengelihatan_mata" required>
                                                                    <option value=""></option>
                                                                    <option value="BAIK">BAIK</option>
                                                                    <option value="SEDANG">SEDANG</option>
                                                                    <option value="KURANG">KURANG</option>
                                                                </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Pakai Kaca Mata</label>
                                                                <div class="col-md-9">
                                                                <select class="form-control" name="kaca_mata" id="kaca_mata" required>
                                                                    <option value=""></option>
                                                                    <option value="TIDAK">TIDAK</option>
                                                                    <option value="YA">YA</option>
                                                                </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Pendengaran Telingan</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="pendengaran" id="pendengaran" required>
                                                                    <option value=""></option>
                                                                    <option value="BAIK">BAIK</option>
                                                                    <option value="SEDANG">SEDANG</option>
                                                                    <option value="KURANG">KURANG</option>
                                                                </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Kelainan Fisik</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="kelainan_fisik" id="kelainan_fisik" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Operasi</label>
                                                                <div class="col-md-9">
                                                                <select class="form-control" name="operasi" id="operasi" required>
                                                                    <option value=""></option>
                                                                    <option value="TIDAK">TIDAK</option>
                                                                    <option value="PERNAH">PERNAH</option>
                                                                </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Sebab</label>
                                                                <div class="col-md-9">
                                                                <input type="text" class="form-control" name="sebab" id="sebab" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Kecelakaan</label>
                                                                <div class="col-md-9">
                                                                <select class="form-control" name="kecelakaan" id="kecelakaan" required>
                                                                    <option value=""></option>
                                                                    <option value="TIDAK">TIDAK</option>
                                                                    <option value="PERNAH">PERNAH</option>
                                                                </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Akibat</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="akibat" id="akibat" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Alergi</label>
                                                                <div class="col-md-9">
                                                                <input type="text" class="form-control" name="alergi" id="alergi" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    <!--span-->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Dari Tahun</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="thn_fisik" id="thn_fisik" required>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    <!--end inputbox-->
                                                    <h3 class="form-section">Lingkungan Rumah</h3>
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Kondisi Pendidikan </label>
                                                    <div class="col-md-9">
                                                <select class="form-control" name="kondisi_pendidikan" id="kondisi_pendidikan" required>
                                                            <option value=""></option>
                                                            <option value="KETAT">KETAT</option>
                                                            <option value="SEDANG">SEDANG</option>
                                                            <option value="BEBAS">BEBAS</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Ekonomi Keluarga</label>
                                                    <div class="col-md-9">
                                                    <select class="form-control" name="ekonomi_keluarga" id="ekonomi_keluarga" required>
                                                            <option value=""></option>
                                                            <option value="MAMPU">MAMPU</option>
                                                            <option value="CUKUP">CUKUP</option>
                                                            <option value="KURANG">KURANG</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Situasi Rumah </label>
                                                    <div class="col-md-9">
                                                    <select class="form-control" name="situasi_rumah" id="situasi_rumah" required>
                                                            <option value=""></option>
                                                            <option value="PERKOTAAN">PERKOTAAN</option>
                                                            <option value="PEDESAAN">PEDESAAN</option>
                                                            <option value="PERKAMPUNGAN">PERKAMPUNGAN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Dekat Dengan</label>
                                                    <div class="col-md-9">
                                                    <select class="form-control" name="dekat_dengan" id="dekat_dengan" required>
                                                            <option value=""></option>
                                                            <option value="MASJID">MASJID</option>
                                                            <option value="SEKOLAH">SEKOLAH</option>
                                                            <option value="PASAR">PASAR</option>
                                                            <option value="PABRIK">PABRIK</option>
                                                            <option value="MALL">MALL</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end inputbox-->
                                        <!--inputbbox-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label col-md-3">Hidup Beragama </label>
                                                    <div class="col-md-9">
                                                    <select class="form-control" name="hidup_beragama" id="hidup_beragama" required>
                                                            <option value=""></option>
                                                            <option value="BAIK">BAIK</option>
                                                            <option value="SEDANG">SEDANG</option>
                                                            <option value="KURANG">KURANG</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <!--end inputbox-->
                                                    <!--/row-->
                                            </div>
                                        <!-- END FORM-->
                                        </div>
                                    </div>
                        <!--kotak data Fisik End-->
                        <!--kotak data Keluarga mulai-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> DATA KELUARGA </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i></a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div class="form-body">
                                    <h3 class="form-section">
                                        <button type="button" class="btn red" onclick="modalAddkeluarga()" required>
                                            <i class="fa fa-plus">  Tambah Keluarga / Wali / Saudara
                                            </i>
                                        </button></h3>
                                    <!--row begin-->
                                            <input type="hidden" id="hid_jumlah_item_keluarga" value="0" />
                                            <input type="hidden" id="hid_cek_ayah" value="0" />
                                            <input type="hidden" id="hid_cek_ibu" value="0" />
                                            <input type="hidden" id="hid_cek_wali" value="0" />
                                                <div class="portlet-body table-both-scroll">
                                                    <div class="table-responsive">
                                                        <table id="tb_list_keluarga" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th> No.</th>
                                                                    <th> Kategori</th>
                                                                    <th> Nama </th>
                                                                    <th> NIK </th>
                                                                    <th> Bin/Binti </th>
                                                                    <th> Jenis Kelamin </th>
                                                                    <th> Status Pernikahan </th>
                                                                    <th> Tgl. Wafat </th>
                                                                    <th> Umur </th>
                                                                    <th> Hari </th>
                                                                    <th> Sebab Wafat </th>
                                                                    <th> Status Perkawinan Ibu </th>
                                                                    <th> Pendapatan Ibu </th>
                                                                    <th> Sebab Tidak Bekerja </th>
                                                                    <th> Keahlian </th>
                                                                    <th> Jumlah Yang diasuh </th>
                                                                    <th> Pekerjaan </th>
                                                                    <th> Pendidikan Terakhir </th>
                                                                    <th> Agama </th>
                                                                    <th> Suku </th>
                                                                    <th> Kewarganegaraan </th>
                                                                    <th> Ormas </th>
                                                                    <th> Orpol </th>
                                                                    <th> Kedudukan diMasyarakat </th>
                                                                    <th> Tahun Lulus </th>
                                                                    <th> No. Stambuk </th>
                                                                    <th> Tempat Lahir </th>
                                                                    <th> Tgl. Lahir </th>
                                                                    <th> Hubungan Keluarga </th>
                                                                    <th visible"false"> Keterangan </th>
                                                                    <th> Ktp </th>
                                                                </tr>
                                                            </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="31" align="center">
                                                                            Belum Ada Data.
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                    <!--/row-->
                                </div>
                            <!-- END FORM-->
                            </div>
                        </div>
                        <!--kotak data Keluarga End-->
                        <!--kotak data Penyakit mulai-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> DATA PENYAKIT </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i></a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div class="form-body">
                                    <h3 class="form-section">
                                        <button type="button" class="btn red" onclick="modalAddPenyakit()" required>
                                            <i class="fa fa-plus">  Tambah List Penyakit
                                            </i>
                                        </button></h3>
                                    <!--row begin-->
                                        <input type="hidden" id="hid_jumlah_item_penyakit" value="0" />
                                            <div class="portlet-body table-both-scroll">
                                            <div class="table-responsive">
                                            <table id="tb_list_penyakit" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> No</th>
                                                        <th> Nama Penyakit</th>
                                                        <th> Tahun</th>
                                                        <th> Kategori Penyakit </th>
                                                        <th> Tipe Penyakit </th>
                                                        <th> Lampiran </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="6" align="center">
                                                        Belum Ada Data.
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                        </div>                            
                                    <!--/row-->
                                </div>
                            <!-- END FORM-->
                            </div>
                        </div>
                        <!--kotak data Penyakit End-->
                        <!--kotak data kecakapan khusu mulai-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> DATA KECAKAPAN KHUSUS </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"><i class="fa fa-unsorted"></i></a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div class="form-body">
                                    <h3 class="form-section">
                                        <button type="button" class="btn red" onclick="modalAddKecakapanKhusus()">
                                            <i class="fa fa-plus">  Tambah List Kecakapan Khusus
                                            </i>
                                        </button>
                                    <!--row begin-->
                                    <input type="hidden" id="hid_jumlah_item_KecakapanKhusus" value="0" />
                                            <div class="portlet-body table-both-scroll">
                                                <div class="table-responsive">
                                                <table id="tb_list_kckhusus" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> No </th>
                                                            <th> Bidang Studi </th>
                                                            <th> Olahraga </th>
                                                            <th> Kesenian </th>
                                                            <th> Keterampilan </th>
                                                            <th> Lain-Lain </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="6" align="center">
                                                            Belum Ada Data.
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                            </div>                           
                                    <!--/row-->
                                </div>
                            <!-- END FORM-->
                            </div>
                        </div>
                        <!--kotak data kecakapan khusus End-->
        <div class="modal-footer">
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn green" >Save changes</button> -->
            <button type="button" class="btn green" onclick="svSantri()">Save changes</button>
        </div>
    </form>