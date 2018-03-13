<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:250px;position:relative;padding:5px;}</style>
<script src="<?=base_url()?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jpendaftaran.js"></script>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green-jungle">
        <div class="portlet-title">
                <div class="caption">
                    <i class="icon-graduation"></i><?php echo $title;?>
                </div>
                <div class="tools">
                  <div class="btn-group pull-right">

                  </div>
                </div>
                <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                    <button class="btn btn-default <?php if($page != 'DAFTAR'){echo 'hidden';}?> " type="button" onclick="addSantri()">
                        <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                    </button>
                    <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                        <i class="fa fa-search"></i>&nbsp;Search
                    </button>
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                    </button>
                </div>
        </div>
        <input type="text" name="hid_param" id="hid_param" class="hidden" />
        <input type="text" name="hid_kategori_santri" id="hid_kategori_santri" class="hidden" value="<?php echo $kategori_santri;?>"/>
        <input type="text" name="hid_page" id="hid_page" class="hidden" value="<?php echo $page;?>"/>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="tb_list">
                <thead>
                    <tr>
                        <th>No Registrasi</th>
                        <th>Tahun Masuk</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Arab</th>
                        <!-- <th >Nama Panggilan</th> -->
                        <!-- <th>Uang Jajan Perbulan</th> -->
                        <!-- <th>No KK</th> -->
                        <th>NIK</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8" align="center">
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
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<!--modal untuk add new santri mulai######################################################################################################################## -->
  <div class="modal fade draggable-modal" id="Modal_add_Santri" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-full">
            <div class="modal-content">
                <!-- <div class="modal-header "> -->
                    <!-- <div class="btn pull-right" >
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green-jungle" id="save_button_header" onclick="svSantri()">Simpan changes</button>
                    <button type="button" class="btn green-jungle" id="addto_button_header" onclick="AddTOSantri()">Jadikan Santri</button>
                    </div> -->
                <!-- </div> -->
                <div class="modal-body-form">
                    <!--Modal body goes here -->
                    <form id="add_santri" class="form-horizontal" enctype="multipart/form-data">
                            <div class="tabbable-custom">
                                <ul class="nav nav-tabs">
                                     <li class="active">
                                        <a href="#tab_santri" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;Data Santri</a>
                                    </li>
                                    <li>
                                        <a href="#tab_pembiayaan" id="tabpembiayaan" data-toggle="tab"><i class="fa fa-university"></i>&nbsp;Data Pembiayaan</a>
                                    </li>
                                    <li>
                                        <a href="#tab_sekolah"  id="tabsekolah"  data-toggle="tab"><i class="fa fa-child"></i>&nbsp;Data Sekolah (AITAM)</a>
                                    </li>
                                    <li>
                                        <a href="#tab_fisik" id="tabfisik"  data-toggle="tab"><i class="fa fa-graduation-cap"></i>&nbsp;Data Fisik</a>
                                    </li>
                                    <li>
                                        <a href="#tab_keluarga" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&nbsp;Data Keluarga</a>
                                    </li>
                                    <li>
                                        <a href="#tab_penyakitn" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&nbsp;Data Penyakit</a>
                                    </li>
                                    <li>
                                        <a href="#tab_kecakapan"  id="tabkecakapan"  data-toggle="tab"><i class="fa fa-graduation-cap"></i>&nbsp;Data Kecakapan Khusus</a>
                                    </li>
                                    <li>
                                        <a href="#tab_lampiran" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&nbsp;Data Lampiran</a>
                                    </li>
                                    <li>
                                        <a href="#tab_donatur" data-toggle="tab"><i class="fa fa-group"></i>&nbsp;Data Donatur</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!--kotak data santri mulai-->
                                        <div class="tab-pane active" id="tab_santri">
                                            <div class="portlet box green-jungle">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>DATA SANTRI
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <div class="form-body">
                                                        <!-- <h3 class="form-section">Data Pribadi</h3> -->
                                                        <!--row begin-->
                                                        <!-- Profile & header -->
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <ul class="list-unstyled profile-nav">
                                                                   <!-- <div class="form-group "> -->
                                                                        <!--<label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">-->
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput" >
                                                                              <div class="fileinput-preview thumbnail" data-trigger="fileinputs" style="float:left;width:200px;position:relative;padding:5px;" id="image-holder">
                                                                              </div>
                                                                                  <div>
                                                                                      <span class="btn red btn-outline btn-file" id="button_photo">
                                                                                          <span class="fileinput-new"> Select image </span>
                                                                                          <span class="fileinput-exists"> Change </span>
                                                                                          <input type="file" id="fileUpload" name="fileUpload"> </span>
                                                                                      <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput" > Remove </a>
                                                                                  </div>
                                                                                  <input type="hidden"  id="TfileUpload" name="TfileUpload">
                                                                            </div>
                                                                        <!--</div>-->
                                                                    <!-- </div> -->
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="row">
                                                                    <div class="m-grid-row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                Kategori
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><i class="fa"></i>
                                                                                    <select class="form-control" name="kategori_santri" id="kategori_santri"  required >
                                                                                        <?php
                                                                                        if($kategori_santri =="TMI")
                                                                                        {
                                                                                            $hidden_tmi     ='';
                                                                                            $hidden_aitam   ='hidden';
                                                                                            $tmi_select     ='selected';
                                                                                            $aitam_select   ='';
                                                                                        }
                                                                                        else {
                                                                                            $hidden_tmi     ='hidden';
                                                                                            $hidden_aitam   ='';
                                                                                            $aitam_select   ='selected';
                                                                                            $tmi_select     ='';
                                                                                        }
                                                                                        ?>
                                                                                        <option value=""></option>
                                                                                        <option value="TMI" <?php echo $hidden_tmi?> <?php echo $tmi_select?>>TMI</option>
                                                                                        <option value="AITAM_ISLAH" <?php echo $hidden_aitam?> <?php echo $aitam_select?>>AITAM_ISLAH</option>
                                                                                        <option value="AITAM_JAMIAH" <?php echo $hidden_aitam?>>AITAM_JAMIAH</option>
                                                                                    </select>
                                                                                    <input type="text" name="kategori_update" id="kategori_update" class="hidden"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                No Registrasi
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><i class="fa"></i>
                                                                                    <input type class="form-control" readonly name="no_registrasi" id="no_registrasi" onkeydown="OtomatisKapital(this)" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-grid-row">
                                                                        <div class="col-md-6">
                                                                           <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                No Stambuk
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><i class="fa"></i>
                                                                                    <input type class="form-control numbers-only"  name="no_stambuk" id="no_stambuk" readonly >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                Tahun Masuk
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><i class="fa"></i>
                                                                                    <input type class="form-control datepicker"  data-date-format="yyyy" name="thn_masuk" id="thn_masuk" readonly="true" required>
                                                                                </div>
                                                                                    <span class="input-group-btn">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-grid-row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    Gedung
                                                                                </span>
                                                                                <div class="input" id= "hiddenidgedung">
                                                                                    <?php
                                                                                        $att_item = 'id="hide_id_gedung"  class="form-control select" style="width:100%"  onchange="pilihItemGedung()"';
                                                                                        echo form_dropdown('hide_id_gedung', $kode_gedung, null, $att_item);
                                                                                    ?>
                                                                                </div>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type class="form-control" readonly name="rayon" id="rayon" onkeydown="OtomatisKapital(this)" required>
                                                                                </div>
                                                                                <span class="input-group-btn"
                                                                                        style="cursor: pointer;"
                                                                                        title="Cari Kode Gedung"
                                                                                        id="spansearchgedung"
                                                                                        onclick="idgedungshow()">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-search"></i>
                                                                                    </button>
                                                                                </span>
                                                                                <span class="input-group-btn"
                                                                                    style="cursor: pointer;"
                                                                                        title="Cari Kode Gedung"
                                                                                        id="spansearchclosegedung"
                                                                                    onclick="idgedunghide()">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-times-circle"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    Kamar
                                                                                </span>
                                                                                <div class="input" id= "hiddenidKamar">
                                                                                    <?php
                                                                                        $att_item = 'id="hide_id_Kamar"  class="form-control select" style="width:100%"  onchange="pilihItemKamar()"';
                                                                                        echo form_dropdown('hide_id_Kamar', $kode_kamar, null, $att_item);
                                                                                    ?>
                                                                                </div>
                                                                                <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" readonly name="kamar" id="kamar" onkeydown="OtomatisKapital(this)" required>
                                                                                </div>
                                                                                <span class="input-group-btn"
                                                                                        style="cursor: pointer;"
                                                                                        title="Cari Kode Kamar"
                                                                                        id="spansearchKamar"
                                                                                        onclick="idKamarshow()">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-search"></i>
                                                                                    </button>
                                                                                </span>
                                                                                <span class="input-group-btn"
                                                                                    style="cursor: pointer;"
                                                                                        title="Cari Kode Kamar"
                                                                                        id="spansearchcloseKamar"
                                                                                        onclick="idKamarhide()">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-times-circle"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    Bagian
                                                                                </span>
                                                                                <div class="input" id= "hiddenidBagian">
                                                                                    <?php
                                                                                        $att_item = 'id="hide_id_Bagian"  class="form-control select" style="width:100%"  onchange="pilihItemBagian()"';
                                                                                        echo form_dropdown('hide_id_Bagian', $kode_Bagian, null, $att_item);
                                                                                    ?>
                                                                                </div>
                                                                                <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" readonly name="bagian" id="bagian" onkeydown="OtomatisKapital(this)" required>
                                                                                </div>
                                                                                <span class="input-group-btn"
                                                                                        style="cursor: pointer;"
                                                                                        title="Cari Kode Bagian"
                                                                                        id="spansearchBagian"
                                                                                        onclick="idBagianshow()">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-search"></i>
                                                                                    </button>
                                                                                </span>
                                                                                <span class="input-group-btn"
                                                                                        style="cursor: pointer;"
                                                                                        title="Cari Kode Bagian"
                                                                                        id="spansearchcloseBagian"
                                                                                        onclick="idBagianhide()">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-times-circle"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    Kelas
                                                                                </span>
                                                                                <div class="input" id= "hiddenidKelas">
                                                                                    <?php
                                                                                        $att_item = 'id="hide_id_Kelas"  class="form-control select" style="width:100%"  onchange="pilihItemKelas()"';
                                                                                        echo form_dropdown('hide_id_Kelas', $kode_kelas, null, $att_item);
                                                                                    ?>
                                                                                </div>
                                                                                <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" readonly name="kel_sekarang" id="kel_sekarang" onkeydown="OtomatisKapital(this)" required>
                                                                                </div>
                                                                                <span class="input-group-btn"
                                                                                        style="cursor: pointer;"
                                                                                        title="Cari Kode Kelas"
                                                                                        id="spansearchKelas"
                                                                                        onclick="idKelasshow()">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-search"></i>
                                                                                    </button>
                                                                                </span>
                                                                                <span class="input-group-btn"
                                                                                        style="cursor: pointer;"
                                                                                        title="Cari Kode Kelas"
                                                                                        id="spansearchcloseKelas"
                                                                                        onclick="idKelashide()">
                                                                                    <button class="btn default" type="button">
                                                                                        <i class="fa fa-times-circle"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end profile & heder -->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    NISN
                                                                </span>
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i><i class="fa"></i><input type class="form-control numbers-only" name="nisn" id="nisn" onkeydown="OtomatisKapital(this)" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        NISN LOKAL
                                                                    </span>
                                                                        <div class="input-icon right">
                                                                        <i class="fa"></i><input type class="form-control numbers-only" name="nisnlokal" id="nisnlokal" readonly="" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">                                                         
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group"> -->
                                                                <!-- <label class="control-label col-md-3"></label> -->
                                                                    <!-- <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Nama Lengkap
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><i class="fa"></i><input type class="form-control" name="nama_lengkap" id="nama_lengkap" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div> -->
                                                                <!-- </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div id="cnama_arab" class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Nama Arab
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="nama_arab" id="nama_arab" onkeydown="OtomatisKapital(this)" >
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div id="cnama_panggilan" class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                  <label class="control-label col-md-3"></label>
                                                                      <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Nama Panggilan
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="nama_panggilan" id="nama_panggilan" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                  <label class="control-label col-md-3"></label>
                                                                      <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                          <span class="input-group-addon">
                                                                              Hobi
                                                                          </span>
                                                                              <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="hobi" id="hobi" onkeydown="OtomatisKapital(this)">
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                            <!--inputbbox-->
                                                        <div class="row">
                                                            <div id="cuang_jajan_perbulan" class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                  <label class="control-label col-md-3"></label>
                                                                      <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Uang Jajan Perbulan
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="uang_jajan_perbulan" id="uang_jajan_perbulan" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Nomor KK
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control numbers-only" name="no_kk" id="no_kk" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <!-- </div>
                                                            </div> -->
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div id="cnik" class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            NIKK
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control numbers-only" name="nik" id="nik" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Tempat Lahir
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="tempat_lahir" id="tempat_lahir" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                            <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            Tgl. Lahir
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control datepicker" data-date-format="dd-mm-yyyy"  name="tgl_lahir" id="tgl_lahir" readonly  required>
                                                                            </div>
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div id="ckonsulat" class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Konsulat
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="konsulat" id="konsulat" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                            <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Suku
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="suku" id="suku" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Kewarganegaraan
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="kewarganegaraan" id="kewarganegaraan" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <h3 class="form-section">Alamat</h3>
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Jalan/Kompleks
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><textarea type class="form-control" name="jalan" id="jalan" onkeydown="OtomatisKapital(this)" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        No Rumah, RT, RW
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="no_rumah" id="no_rumah" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Dusun/Kampung
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="dusun" id="dusun" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Desa/Kelurahan
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="desa" id="desa" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Kecamatan
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="kecamatan" id="kecamatan" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Kabupaten/Kota
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="kabupaten" id="kabupaten" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Provinsi
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="provinsi" id="provinsi" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Kode Pos
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control numbers-only" name="kd_pos" id="kd_pos" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        No Telepon
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control numbers-only" name="no_tlp" id="no_tlp" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        No HP
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control numbers-only" name="no_hp" id="no_hp" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6 <?php if($kategori_santri != 'TMI'){echo 'hidden';} ?>">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        E-Mail
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <input type="email" class="form-control" name="email" id="email">
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                            <!--span-->
                                                            <div class="col-md-6 <?php if($kategori_santri != 'TMI'){echo 'hidden';} ?>">
                                                                <!-- <div class="form-group">
                                                                <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Facebook
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="fb" id="fb">
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                            <div class="col-md-6 <?php if($kategori_santri != 'TMI'){echo 'hidden';} ?>">
                                                                <!-- <div class="form-group">
                                                                  <label class="control-label col-md-3"></label>
                                                                      <div class="col-md-9"> -->
                                                                        <div class="input-group">
                                                                          <span class="input-group-addon">
                                                                          Dibesarkan Di
                                                                          </span>
                                                                              <div class="input-icon right">
                                                                                <i class="fa"></i><input type class="form-control" name="dibesarkan_di" id="dibesarkan_di" onkeydown="OtomatisKapital(this)" required>
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!--end inputbox-->
                                                        <!--/row-->
                                                    </div>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
                                        </div>
                                    <!--kotak data santri selesai-->
                                    <!--kotak data Pembiayaan mulai-->
                                        <div class="tab-pane  <?php if($kategori_santri != 'TMI'){echo 'hidden';} ?>" id="tab_pembiayaan">
                                            <div class="portlet box green-jungle">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>DATA PEMBIAYAAN</div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"></a>
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
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Yang Membiayai
                                                                            </span>
                                                                                <div class="input-icon right">                                                         <i class="fa"></i><select class="form-control" name="pembiaya" id="pembiaya" onchange="cek_jk()" required>
                                                                                        <option value=""></option>
                                                                                        <option value="AYAH">AYAH</option>
                                                                                        <option value="IBU">IBU</option>
                                                                                        <option value="WALI">WALI</option>
                                                                                        <option value="SAUDARA">SAUDARA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Penghasilan Perbulan
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="penghasilan" id="penghasilan" onkeydown="OtomatisKapital(this)" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Minimum Pengeluaran
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="biaya_perbulan_min" id="biaya_perbulan_min" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Maximum Pengeluaran
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="biaya_perbulan_max" id="biaya_perbulan_max" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--/row-->
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!--kotak data pembiayaan selesai-->
                                    <!--kotak data sekolah mulai-->
                                        <div class="tab-pane  <?php if($kategori_santri == 'TMI'){echo 'hidden';} ?>" id="tab_sekolah">
                                            <div class="portlet box green-jungle" id="kotak_sekolah">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> DATA SEKOLAH (AITAM)</div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"></a>
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
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Nama Sekolah
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="nama_sekolah_aitam" id="nama_sekolah_aitam" onkeydown="OtomatisKapital(this)" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Kelas
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="kelas_aitam" id="kelas_aitam" onkeydown="OtomatisKapital(this)" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Alamat Sekolah
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="alamat_sekolah_aitam" id="alamat_sekolah_aitam" onkeydown="OtomatisKapital(this)" required>
                                                                                </div>
                                                                            </div>
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
                                        </div>
                                    <!--kotak data sekolah end-->
                                    <!--kotak data fisik mulai-->
                                        <div class="tab-pane  <?php if($kategori_santri != 'TMI'){echo 'hidden';} ?>" id="tab_fisik">
                                            <div class="portlet box green-jungle">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> DATA FISIK</div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <div class="form-body">
                                                        <h3 class="form-section">Fisik</h3>
                                                            <!--row begin-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Golongan Darah
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                <i class="fa"></i><select class="form-control" name="gol_darah" id="gol_darah" required>
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
                                                                </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Tinggi Badan (cm)
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control numbers-only" name="tinggi_badan" id="tinggi_badan" maxlength="3"  required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Khitan
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                <i class="fa"></i><select class="form-control" name="khitan" id="khitan" required>
                                                                                    <option value=""></option>
                                                                                    <option value="SUDAH">SUDAH</option>
                                                                                    <option value="BELUM">BELUM</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"></label>
                                                                            <div class="col-md-9">
                                                                                <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                Berat Badan (kg)
                                                                                </span>
                                                                                    <div class="input-icon right">
                                                                                        <i class="fa"></i><input type class="form-control numbers-only" name="berat_badan" id="berat_badan" maxlength="3" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Pengelihatan Mata
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                <i class="fa"></i><select class="form-control" name="pengelihatan_mata" id="pengelihatan_mata" required>
                                                                                        <option value=""></option>
                                                                                        <option value="BAIK">BAIK</option>
                                                                                        <option value="SEDANG">SEDANG</option>
                                                                                        <option value="KURANG">KURANG</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Pakai Kaca Mata
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                <i class="fa"></i><select class="form-control" name="kaca_mata" id="kaca_mata" required>
                                                                                        <option value=""></option>
                                                                                        <option value="TIDAK">TIDAK</option>
                                                                                        <option value="YA">YA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Pendengaran Telingan
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                <i class="fa"></i><select class="form-control" name="pendengaran" id="pendengaran" required>
                                                                                        <option value=""></option>
                                                                                        <option value="BAIK">BAIK</option>
                                                                                        <option value="SEDANG">SEDANG</option>
                                                                                        <option value="KURANG">KURANG</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Kelainan Fisik
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="kelainan_fisik" id="kelainan_fisik" onkeydown="OtomatisKapital(this)">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"></label>
                                                                            <div class="col-md-9">
                                                                                <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                            Operasi
                                                                                </span>
                                                                                    <div class="input-icon right">
                                                                                    <i class="fa"></i><select class="form-control" name="operasi" id="operasi" required>
                                                                                            <option value=""></option>
                                                                                            <option value="TIDAK">TIDAK</option>
                                                                                            <option value="PERNAH">PERNAH</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                        <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Sebab
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="sebab" id="sebab" onkeydown="OtomatisKapital(this)">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"></label>
                                                                            <div class="col-md-9">
                                                                                <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                            Kecelakaan
                                                                                </span>
                                                                                    <div class="input-icon right">
                                                                                    <i class="fa"></i><select class="form-control" name="kecelakaan" id="kecelakaan" required>
                                                                                            <option value=""></option>
                                                                                            <option value="TIDAK">TIDAK</option>
                                                                                            <option value="PERNAH">PERNAH</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"></label>
                                                                            <div class="col-md-9">
                                                                                <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                            Akibat
                                                                                </span>
                                                                                    <div class="input-icon right">
                                                                                        <i class="fa"></i><input type class="form-control" name="akibat" id="akibat" onkeydown="OtomatisKapital(this)">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end inputbox-->
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Alergi
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="alergi" id="alergi" onkeydown="OtomatisKapital(this)">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                            <!--span-->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Dari Tahun
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control datepicker" data-date-format="yyyy" readonly name="thn_fisik" id="thn_fisik">
                                                                                </div>
                                                                            </div>
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
                                                            <label class="control-label col-md-3"> </label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Kondisi Pendidikan
                                                                        </span>
                                                                            <div class="input-icon right">
                                                                            <i class="fa"></i><select class="form-control" name="kondisi_pendidikan" id="kondisi_pendidikan" required>
                                                                                    <option value=""></option>
                                                                                    <option value="KETAT">KETAT</option>
                                                                                    <option value="SEDANG">SEDANG</option>
                                                                                    <option value="BEBAS">BEBAS</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Ekonomi Keluarga
                                                                        </span>
                                                                        <div class="input-icon right">
                                                                        <i class="fa"></i><select class="form-control" name="ekonomi_keluarga" id="ekonomi_keluarga" required>
                                                                                <option value=""></option>
                                                                                <option value="MAMPU">MAMPU</option>
                                                                                <option value="CUKUP">CUKUP</option>
                                                                                <option value="KURANG">KURANG</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="control-label col-md-3"> </label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Situasi Rumah
                                                                    </span>
                                                                        <div class="input-icon right">
                                                                        <i class="fa"></i><select class="form-control" name="situasi_rumah" id="situasi_rumah" required>
                                                                                    <option value=""></option>
                                                                                    <option value="PERKOTAAN">PERKOTAAN</option>
                                                                                    <option value="PEDESAAN">PEDESAAN</option>
                                                                                    <option value="PERKAMPUNGAN">PERKAMPUNGAN</option>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    Dekat Dengan
                                                                    </span>
                                                                    <div class="input-icon right">
                                                                    <i class="fa"></i><select class="form-control" name="dekat_dengan" id="dekat_dengan" required>
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
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    <!--inputbbox-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="control-label col-md-3"> </label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        Hidup Beragama
                                                                        </span>
                                                                        <div class="input-icon right">
                                                                        <i class="fa"></i><select class="form-control" name="hidup_beragama" id="hidup_beragama" required>
                                                                                <option value=""></option>
                                                                                <option value="BAIK">BAIK</option>
                                                                                <option value="SEDANG">SEDANG</option>
                                                                                <option value="KURANG">KURANG</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end inputbox-->
                                                    </div>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
                                        </div>
                                    <!--kotak data Fisik End-->
                                    <!--kotak data Keluarga mulai-->
                                        <div class="tab-pane" id="tab_keluarga">
                                            <div class="portlet box green-jungle">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> DATA KELUARGA </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <div class="form-body">
                                                        <h3 class="form-section">
                                                            <button type="button" class="btn red" id="button_keluarga" onclick="modalAddkeluarga()" required>
                                                                <i class="fa fa-plus"> </i> Tambah Keluarga / Wali / Saudara
                                                                </h3>
                                                        <!--row begin-->
                                                                <input type="hidden" id="hid_jumlah_item_keluarga" value="0" />
                                                                <input type="hidden" name="hid_table_item_Keluarga" id="hid_table_item_Keluarga" />
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
                                                                                        <!-- <th> Tgl. Wafat </th>
                                                                                        <th> Umur </th>
                                                                                        <th> Hari </th>
                                                                                        <th> Sebab Wafat </th>
                                                                                        <th> Status Perkawinan Ibu </th>
                                                                                        <th> Pendapatan Ibu </th>
                                                                                        <th> Sebab Tidak Bekerja </th>
                                                                                        <th> Keahlian </th>
                                                                                        <th> Status Rumah </th>
                                                                                        <th> Kondisi Rumah </th>
                                                                                        <th> Jumlah Yang diasuh </th> -->
                                                                                        <th> Pekerjaan </th>
                                                                                        <th> Pendidikan Terakhir </th>
                                                                                        <!-- <th> Agama </th>
                                                                                        <th> Suku </th>
                                                                                        <th> Kewarganegaraan </th>
                                                                                        <th> Ormas </th>
                                                                                        <th> Orpol </th>
                                                                                        <th> Kedudukan diMasyarakat </th>
                                                                                        <th> Tahun Lulus </th>
                                                                                        <th> No. Stambuk </th>
                                                                                        <th> Tempat Lahir </th> -->
                                                                                        <th> Tgl. Lahir </th>
                                                                                        <th> Hubungan Keluarga </th>
                                                                                        <!-- <th> Keterangan </th> -->
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
                                                                                    <!--<tfoot>
                                                                                        <tr>
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
                                        </div>
                                    <!--kotak data Keluarga End-->
                                    <!--kotak data Penyakit mulai-->
                                        <div class="tab-pane" id="tab_penyakitn">
                                            <div class="portlet box green-jungle">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> DATA PENYAKIT </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <div class="form-body">
                                                        <h3 class="form-section">
                                                            <button type="button" class="btn red" id="button_penyakit" onclick="modalAddPenyakit()" required>
                                                                <i class="fa fa-plus"> </i> Tambah List Penyakit
                                                            </button></h3>
                                                        <!--row begin-->
                                                            <input type="text" id="hid_jumlah_item_penyakit" value="0" class="hidden"/>
                                                            <input type="text" name="hid_table_item_penyakit" id="hid_table_item_penyakit" class="hidden"/>
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
                                                                        <!--<tfoot>
                                                                            <tr>
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
                                        </div>
                                    <!--kotak data Penyakit End-->
                                    <!--kotak data kecakapan khusu mulai-->
                                        <div class="tab-pane" id="tab_kecakapan">
                                            <div class="portlet box green-jungle">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> DATA KECAKAPAN KHUSUS </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <div class="form-body">
                                                        <h3 class="form-section">
                                                        <!--inputbbox-->
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Bidang Studi
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="bid_studi" id="bid_studi" onkeydown="OtomatisKapital(this)" maxlength="50" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <!--span-->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Olah Raga
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="olahraga" id="olahraga" onkeydown="OtomatisKapital(this)" maxlength="50"  >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!--end inputbox-->
                                                                <!--inputbbox-->
                                                                <!-- <div class="row"> -->
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Kesenian
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="kesenian" id="kesenian" onkeydown="OtomatisKapital(this)" maxlength="50"  >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Keterampilan
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="keterampilan" id="keterampilan" onkeydown="OtomatisKapital(this)" maxlength="50"  >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            Lain-Lain
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="lain_lain" id="lain_lain" onkeydown="OtomatisKapital(this)" maxlength="50"  >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                        </div>
                                                            <!--end inputbox-->
                                                        <button type="button" class="btn red" id="button_kecakapankhusus" onclick="modalAddKecakapanKhusus()">
                                                            <i class="fa fa-plus"> </i> Tambah List Kecakapan Khusus
                                                        </button></h3>
                                                    <!-- #regioon body -->
                                                        <!-- <input type="hidden" id="hid_jumlah_item_KecakapanKhusus" value="0" />
                                                        <input type="hidden" name="hid_table_item_KecakapanKhusus" id="hid_table_item_KecakapanKhusus" />
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
                                                                    </tbody> -->
                                                                    <!--<tfoot>
                                                                        <tr>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>-->
                                                            <!-- </table>
                                                            </div>
                                                        </div> -->
                                                   <!-- #endregioon body -->
                                                    </div>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
                                        </div>
                                    <!--kotak data kecakapan khusus End-->
                                    <!--kotak data lampiran mulai-->
                                        <div class="tab-pane" id="tab_lampiran">
                                          <div class="portlet box green-jungle">
                                              <div class="portlet-title">
                                                  <div class="caption">
                                                      <i class="fa fa-gift"></i> DATA LAMPIRAN </div>
                                                  <div class="tools">
                                                      <a href="javascript:;" class="collapse"></i></a>
                                                  </div>
                                              </div>
                                              <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                  <div class="form-body">
                                                        <!--row begin-->
                                                        <div class="row">
                                                            <!--inputbbox-->
                                                            <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Ijazah/ Raport Kelas Terakhir</label>
                                                                        <div class="col-md-3">
                                                                          <div class="fileinput fileinput-new" data-provides="fileinput" id="button_ijazah">
                                                                              <div class="input-group input-large">
                                                                                  <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                      <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                      <span class="fileinput-filename"> </span>
                                                                                  </div>
                                                                                  <span class="input-group-addon btn default btn-file">
                                                                                      <span class="fileinput-new"> Select file </span>
                                                                                      <span class="fileinput-exists"> Change </span>
                                                                                      <input type="file"  id="fileUpload_ijazah" name="fileUpload_ijazah"> </span>
                                                                                  <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_ijazah" name="RfileUpload_ijazah"> Remove </a>
                                                                              </div>
                                                                          </div>
                                                                          <div class="cijazah" ><a id="ijazahholder" href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >Lihat Ijazah</button></a></div>
                                                                          <input type="hidden"  id="TfileUpload_ijazah" name="TfileUpload_ijazah">
                                                                        </div>
                                                                    </div>
                                                                <!-- </div> -->
                                                                <!--span-->
                                                                <!-- <div class="col-md-6"> -->
                                                                    <div class="form-group">
                                                                          <label class="control-label col-md-3"> Akta Kelahiran </label>
                                                                          <div class="col-md-3">
                                                                              <div class="fileinput fileinput-new" data-provides="fileinput" id="button_akelahiran">
                                                                                <div class="input-group input-large">
                                                                                      <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                          <span class="fileinput-filename"> </span>
                                                                                      </div>
                                                                                      <span class="input-group-addon btn default btn-file">
                                                                                          <span class="fileinput-new"> Select file </span>
                                                                                          <span class="fileinput-exists"> Change </span>
                                                                                          <input type="file"  id="fileUpload_akelahiran" name="fileUpload_akelahiran"> </span>
                                                                                      <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_akelahiran" name="RfileUpload_akelahiran"> Remove </a>
                                                                                </div>
                                                                              </div>
                                                                              <div class="cakelahiran" ><a id="aklahiranholder" href="LINKTARGET" target="_blank">
                                                                                <button type="button" class="btn dark btn-outline" >Lihat Akte Lahir</button></a>
                                                                              </div>
                                                                            <input type="hidden"  id="TfileUpload_akelahiran" name="TfileUpload_akelahiran">
                                                                          </div>
                                                                    </div>
                                                                <!-- </div> -->
                                                                <!--end inputbox-->
                                                                <!--inputbbox-->
                                                                <!-- <div class="col-md-6"> -->
                                                                    <div class="form-group">
                                                                                <label class="control-label col-md-3"> Kartu Keluarga </label>
                                                                                <div class="col-md-3">
                                                                                    <div class="fileinput fileinput-new" data-provides="fileinput" id="button_kk">
                                                                                        <div class="input-group input-large">
                                                                                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                                <span class="fileinput-filename"> </span>
                                                                                            </div>
                                                                                            <span class="input-group-addon btn default btn-file">
                                                                                                <span class="fileinput-new"> Select file </span>
                                                                                                <span class="fileinput-exists"> Change </span>
                                                                                                <input type="file"  id="fileUpload_kk" name="fileUpload_kk"> </span>
                                                                                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_kk" name="RfileUpload_kk"> Remove </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="ckk" ><a id="kkholder" href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >Lihat Kartu Keluarga</button></a></div>
                                                                                    <input type="hidden"  id="TfileUpload_kk" name="TfileUpload_kk">
                                                                                </div>
                                                                            </div>
                                                                    <!-- </div> -->
                                                                <!--span-->
                                                                <!-- <div class="col-md-6"> -->
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"> SKHUN </label>
                                                                        <div class="col-md-3">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput" id="button_skhun">
                                                                                <div class="input-group input-large">
                                                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                        <span class="fileinput-filename"> </span>
                                                                                    </div>
                                                                                    <span class="input-group-addon btn default btn-file">
                                                                                        <span class="fileinput-new"> Select file </span>
                                                                                        <span class="fileinput-exists"> Change </span>
                                                                                        <input type="file"  id="fileUpload_skhun" name="fileUpload_skhun"> </span>
                                                                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_skhun" name="RfileUpload_skhun"> Remove </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cskhun" ><a id="skhunholder" href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >Lihat SKHUN</button></a></div>
                                                                            <input type="hidden"  id="TfileUpload_skhun" name="TfileUpload_skhun">
                                                                        </div>
                                                                    </div>
                                                                <!-- </div> -->
                                                                <!--end inputbox-->
                                                                <!--inputbbox-->
                                                                <!-- <div class="col-md-6"> -->
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"> Transkip Nilai </label>
                                                                        <div class="col-md-3">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput" id="button_transkip">
                                                                                <div class="input-group input-large">
                                                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                        <span class="fileinput-filename"> </span>
                                                                                    </div>
                                                                                    <span class="input-group-addon btn default btn-file">
                                                                                        <span class="fileinput-new"> Select file </span>
                                                                                        <span class="fileinput-exists"> Change </span>
                                                                                        <input type="file"  id="fileUpload_transkip" name="fileUpload_transkip"> </span>
                                                                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_transkip" name="RfileUpload_transkip"> Remove </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ctranskip"><a id="transkipholder" href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >Lihat Transkip Nilai</button></a></div>
                                                                            <input type="hidden"  id="TfileUpload_transkip" name="TfileUpload_transkip">
                                                                        </div>
                                                                    </div>
                                                                <!-- </div> -->
                                                                <!--span-->
                                                                <!-- <div class="col-md-6"> -->
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"> SKBB </label>
                                                                        <div class="col-md-3">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput" id="button_skbb">
                                                                                <div class="input-group input-large">
                                                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                        <span class="fileinput-filename"> </span>
                                                                                    </div>
                                                                                    <span class="input-group-addon btn default btn-file">
                                                                                        <span class="fileinput-new"> Select file </span>
                                                                                        <span class="fileinput-exists"> Change </span>
                                                                                        <input type="file"  id="fileUpload_skbb" name="fileUpload_skbb"> </span>
                                                                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_skbb" name="RfileUpload_skbb"> Remove </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cskbb"><a id="skbbholder" href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >Lihat SKBB</button></a></div>
                                                                            <input type="hidden"  id="TfileUpload_skbb" name="TfileUpload_skbb">
                                                                        </div>
                                                                    </div>
                                                                <!-- </div> -->
                                                                <!-- end inputbox -->
                                                                <!--inputbbox-->
                                                                <!-- <div class="col-md-6"> -->
                                                                    <div class="form-group">
                                                                            <label class="control-label col-md-3">  Surat Kesehatan </label>
                                                                            <div class="col-md-3">
                                                                                <div class="fileinput fileinput-new" data-provides="fileinput" id="button_skes">
                                                                                    <div class="input-group input-large">
                                                                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                            <span class="fileinput-filename"> </span>
                                                                                        </div>
                                                                                        <span class="input-group-addon btn default btn-file">
                                                                                            <span class="fileinput-new"> Select file </span>
                                                                                            <span class="fileinput-exists"> Change </span>
                                                                                            <input type="file"  id="fileUpload_skes" name="fileUpload_skes"> </span>
                                                                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" id="RfileUpload_skes" name="RfileUpload_skes"> Remove </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cskes"><a id="skesholder" href="LINKTARGET" target="_blank"> <button type="button" class="btn dark btn-outline" >Lihat Surat Kesehatan</button></a></div>
                                                                                <input type="hidden"  id="TfileUpload_skes" name="TfileUpload_skes">
                                                                            </div>
                                                                        </div>
                                                                    <!-- </div> -->
                                                                    <!--end inputbox-->
                                                            </div>
                                                            <!--/row-->
                                                        </div>
                                                        <!-- END FORM-->
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                    <!--kotak data data lampiran End-->
                                    <!--kotak data Donaturi-->
                                        <div class="tab-pane" id="tab_donatur">
                                            <div class="portlet box green-jungle">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> DATA DONATUR </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <div class="form-body">
                                                        <h3 class="form-section">
                                                            <button type="button" class="btn red" id="button_donatur" onclick="modalAdddonatur()" >
                                                                <i class="fa fa-plus"> </i> Tambah Donatur
                                                            </button></h3>
                                                            
                                                        <!--row begin-->
                                                            <input type="text" id="hid_jumlah_item_donatur" value="0" class="hidden"/>
                                                            <input type="text" name="hid_table_item_donatur" id="hid_table_item_donatur" class="hidden"/>
                                                            <input type="text" name="hid_Xaitam" id="hid_Xaitam" class="hidden"/>
                                                                <div class="portlet-body table-both-scroll">
                                                                <div class="table-responsive">
                                                                <table id="tb_list_donatur" class="table table-striped table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> No</th>
                                                                            <th> ID Donatur</th>
                                                                            <th> Nama Donatur</th>
                                                                            <th> Kategori</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td colspan="4" align="center">
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
                                                        <!--/row-->
                                                    </div>
                                                <!-- END FORM-->
                                                </div>
                                            </div>
                                        </div>
                                    <!--kotak data Donaturi End-->
                                </div>
                            </div>
                        <!--modal-body end-->
                    </form>
                </div>
                <div class="modal-footer modal-footer-form">
                    <a href="javascript:;" class="btn btn-sm default" data-dismiss="modal">
                    <i class="glyphicon glyphicon-minus-sign"></i>&nbsp;CLOSE
                    </a>
                    <a href="javascript:;" class="btn btn-sm green-jungle" onclick="svSantri()" id="save_button_footer">
                        <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;SIMPAN
                    </a>
                    <a href="javascript:;" class="btn btn-sm green-jungle  <?php if($page != 'DAFTAR'){echo 'hidden';}?> " onclick="AddTOSantri()" id="addto_button_footer">
                        <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;Jadikan Santri
                    </a>
                    <a href="javascript:;" class="btn btn-sm green-jungle  <?php if($page != 'DAFTAR'){echo 'hidden';}?> " onclick="AddToTMI()" id="addtoTMI_button_footer">
                        <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;Jadikan TMI
                    </a>
                    <img id="load_save" style="margin-left:5px;display: none"
                        src="<?php echo base_url(); ?>images/pre_loader.gif" />
                </div>
                <!-- </div> -->
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
  </div>
<!--modal untuk add new santri selesai##########################################################################################################################-->
<!-- modal add KELUARGA -->
    <div class="modal fade bs-modal-lg" id="Modal_add_keluarga_santri" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <span class="caption-subject font-red sbold uppercase">INPUT DATA KELUARGA/WALI/SAUDARA</span>
                </div>
            </div>
            <div class="portlet-body">
                    <!-- BEGIN FORM-->
                <form action="#" id="add_keluarga_santri">
                <input class="hidden" name="hid_kdkeluarga" id="hid_kdkeluarga">
                    <div class="form-body">
                            <!--inputbbox-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Kategori
                                            </span>
                                        <select class="form-control" name="kategori_keluarga" id="kategori_keluarga" onchange="cek_jk()" required>
                                            <option value=""></option>
                                            <option value="AYAH">AYAH</option>
                                            <option value="IBU">IBU</option>
                                            <option value="WALI">WALI</option>
                                            <option value="SAUDARA">SAUDARA</option>
                                        </select></div>
                                        <span class="help-block">Pilih Keluarga (Ayah, Ibu, Wali, Saudara)</span>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Nama
                                            </span>
                                        <i class="fa"></i><input type class="form-control" name="nama_keluarga" id="nama_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                    <span class="help-block">Masukan Nama Lengkap</span>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                NIK
                                            </span>
                                        <i class="fa"></i><input type class="form-control numbers-only" name="nik_keluarga" id="nik_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                                        <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Bin/Binti
                                            </span>
                                    <i class="fa"></i><input type class="form-control" name="binbinti_keluarga" id="binbinti_keluarga" onkeydown="OtomatisKapital(this)" ></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Jenis Kelamin
                                            </span>
                                            <select class="form-control" name="jenis_kelamin_keluarga" id="jenis_kelamin_keluarga" required>
                                            <option value=""></option>
                                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                                            <option value="PEREMPUAN">PEREMPUAN</option>
                                        </select></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Status
                                            </span>
                                        <select class="form-control" name="status_pernikahan_keluarga" id="status_pernikahan_keluarga" required>
                                        <option value=""></option>
                                        <option value="MENIKAH">MENIKAH</option>
                                        <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                        <option value="JANDA/DUDA">JANDA/DUDA</option>
                                        <option value="WAFAT">WAFAT</option>
                                    </select></div>
                                    <span class="help-block">Status Pernikahan</span>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Tgl. Wafat
                                            </span>
                                    <i class="fa"></i><input type class="form-control datepicker" data-date-format="dd-mm-yyyy" readonly="true" name="tgl_wafat_keluarga" id="tgl_wafat_keluarga" required><span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Umur
                                            </span>
                                    <i class="fa"></i><input type class="form-control numbers-only" name="umur_keluarga" id="umur_keluarga" maxlength="3" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Hari
                                            </span>
                                    <i class="fa"></i><input type class="form-control" name="hari_keluarga" id="hari_keluarga" onkeydown="OtomatisKapital(this)" required> </div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Sebab Wafat
                                            </span>
                                    <i class="fa"></i><input type class="form-control" name="sebab_wafat_keluarga" id="sebab_wafat_keluarga" onkeydown="OtomatisKapital(this)" required> </div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Status Pernikahan Ibu
                                            </span>
                                    <select class="form-control" name="status_perkawinan_ibu_keluarga" id="status_perkawinan_ibu_keluarga" required>
                                        <option value=""></option>
                                        <option value="JANDA">JANDA</option>
                                        <option value="MENIKAH LAGI">MENIKAH LAGI</option>
                                        <option value="WAFAT">WAFAT</option>
                                    </select> </div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Pendapatan Ibu
                                            </span>
                                    <i class="fa"></i><input type class="form-control" name="pedapatan_ibu_keluarga" id="pedapatan_ibu_keluarga" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Sebab Tidak Bekerja
                                            </span>
                                    <i class="fa"></i><input type class="form-control" name="sebab_tidak_bekerja_keluarga" id="sebab_tidak_bekerja_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Keahlian
                                            </span>
                                    <i class="fa"></i><input type class="form-control" name="keahlian_keluarga" id="keahlian_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Status Rumah
                                            </span>
                                        <select class="form-control" name="status_rumah_keluarga" id="status_rumah_keluarga" required>
                                        <option value=""></option>
                                        <option value="KONTRAK">KONTRAK</option>
                                        <option value="MILIK SENDIRI">MILIK SENDIRI</option>
                                    </select></div>                                   
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Kondisi Rumah
                                            </span>
                                        <select class="form-control" name="kondisi_rumah_keluarga" id="kondisi_rumah_keluarga" required>
                                        <option value=""></option>
                                        <option value="PERMANEN">PERMANEN</option>
                                        <option value="SEDERHANA">SEDERHANA</option>
                                        <option value="SANGAT SEDERHANA">SANGAT SEDERHANA</option>
                                    </select></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Jumlah yang diasuh
                                            </span>
                                    <i class="fa"></i><input type class="form-control numbers-only" name="jml_asuh" id="jml_asuh" maxlength="3"  required></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Pekerjaan
                                            </span>
                                        <i class="fa"></i><input type class="form-control" name="pekerjaan_keluarga" id="pekerjaan_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Pendidikan Terakhir
                                            </span>
                                            <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                                <option value=""></option>
                                                <option value="TK">TK</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP/SLTA">SMP/SLTA</option>
                                                <option value="SMA/SMK">SMA/SMK</option>
                                                <option value="DIPLOMA">DIPLOMA</option>
                                                <option value="SARJANA">SARJANA</option>
                                                <option value="MAGISTER">MAGISTER</option>
                                                <option value="DOKTOR">DOKTOR</option>
                                            </select></div>
                                </div>
                            </div>
                                <!--span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Agama
                                            </span>
                                                <i class="fa"></i><input type class="form-control" name="agama_keluarga" id="agama_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                    </div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Nomor KK
                                            </span>
                                                <i class="fa"></i><input type class="form-control numbers-only" name="suku_keluarga" id="suku_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                    </div>
                                </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Kewarganegaraan
                                            </span>
                                                <i class="fa"></i><input type class="form-control" name="kewarganegaraan_keluarga" id="kewarganegaraan_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                 </div>
                            </div>
                        </div>
                                <!--span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Ormas
                                            </span>
                                                <i class="fa"></i><input type class="form-control" name="ormas_keluarga" id="ormas_keluarga" onkeydown="OtomatisKapital(this)" ></div>
                                    </div>
                                </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                Orpol
                                            </span>
                                                <i class="fa"></i><input type class="form-control" name="orpol_keluarga" id="orpol_keluarga" onkeydown="OtomatisKapital(this)" ></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label"></label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                        Kedudukan dimasyarakat
                                        </span>
                                            <i class="fa"></i><input type class="form-control" name="kedudukandimasyarakat_keluarga" id="kedudukandimasyarakat_keluarga" onkeydown="OtomatisKapital(this)" ></div>
                                </div>
                            </div>
                        </div>
                            <!--span-->
                            <h3 class="form-section">Alumni TMI Darussalam</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            Tahun Lulus
                                            </span>
                                                <i class="fa"></i><input type class="form-control datepicker" data-date-format="yyyy" readonly="true" name="tahun_lulus_keluarga" id="tahun_lulus_keluarga" ><span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            No. Stambuk
                                            </span>
                                                <i class="fa"></i><input type class="form-control numbers-only" name="nostambuk_keluarga" id="nostambuk_keluarga" ></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            Tempat Lahir
                                            </span>
                                                <i class="fa"></i><input type class="form-control" name="tempat_lahir_keluarga" id="tempat_lahir_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        Tgl. Lahir
                                        </span>
                                            <i class="fa"></i><input type class="form-control datepicker" readonly="true" data-date-format="dd-mm-yyyy" name="tgl_lahir_keluarga" id="tgl_lahir_keluarga" required><span class="input-group-btn">
                                            <button class="btn default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            Hubungan Keluarga
                                            </span>
                                                <i class="fa"></i><input type class="form-control" name="hubungan_keluarga" id="hubungan_keluarga" onkeydown="OtomatisKapital(this)" required></div>
                                </div>
                            </div>
                                <!--span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                            keterangan
                                            </span>
                                                <i class="fa"></i><input type class="form-control" name="keterangan_keluarga" id="keterangan_keluarga" onkeydown="OtomatisKapital(this)" ></div>
                                </div>
                            </div>
                        </div>
                                <!--span-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"></label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                        KTP
                                        </span>
                                        <input type="file" class="form-control" name="ktp_keluarga" id="ktp_keluarga" ></div>
                                        <input type="text" class="hidden" name="hid_ktp_keluarga" id="hid_ktp_keluarga" ></div>
                                    </div>
                                </div>
                            </div>
                                <!--span-->
                            <!--end inputbox-->
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <button type="button" class="btn green-jungle" id="btn_keluarga" onclick="TambahKeluarga()">Tambah</button>
                        </div>
                    </div>
                </form>
                    <!-- END FORM-->
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- end of modal keluarga-->
<!-- modal add PENYAKIT -->
    <div class="modal fade draggable-modal" id="Modal_add_penyakit" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                            <span class="caption-subject font-red sbold uppercase">INPUT DATA PENYAKIT</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="form-body">
                                            <!-- BEGIN FORM-->
                                            <form action="#" id="add_penyakit">
                                                <!--inputbox-->
                                                    <!--span-->
                                                        <input class="hidden" name="hid_kdpenyakit" id="hid_kdpenyakit">
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Nama Penyakit
                                                                </span>
                                                                <div class="input-icon right">
                                                                <i class="fa"></i><input type class="form-control" name="nama_penyakit" id="nama_penyakit" onkeydown="OtomatisKapital(this)" required >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Tahun
                                                                </span>
                                                                <div class="input-icon right">
                                                                <i class="fa"></i><input type class="form-control input-small datepicker" data-date-format="yyyy" name="thn_penyakit" id="thn_penyakit" required readonly="true"><span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Kategori Penyakit
                                                                </span>
                                                                <div class="input-icon right">
                                                                <i class="fa"></i><select class="form-control input-small" name="kategori_penyakit" id="kategori_penyakit" required>
                                                                    <option value=""></option>
                                                                    <option value="KRONIS">KRONIS</option>
                                                                    <option value="TIDAK KRONIS">TIDAK KRONIS</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Tipe Penyakit
                                                                </span>
                                                                <div class="input-icon right">
                                                                <i class="fa"></i><select class="form-control" name="tipe_penyakit" id="tipe_penyakit" required>
                                                                    <option value=""></option>
                                                                    <option value="MENULAR">MENULAR</option>
                                                                    <option value="TIDAK MENULAR">TIDAK MENULAR</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Lampiran Bukti Penyakit
                                                            </span>
                                                            <input type="file" class="form-control" name="lamp_bukti" id="lamp_bukti" ></div>
                                                            <input type="text" class="hidden" name="hid_lamp_bukti" id="hid_lamp_bukti" ></div>
                                                        </div>
                                                <!--end inputbox-->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green-jungle" id="btn_penyakit" onclick="TambahPenyakit()">Tambah</button>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div><!-- END VALIDATION STATES-->
                        </div>
                    </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- end of modal penyakit-->
<!-- modal add donatur -->
    <div class="modal fade draggable-modal" id="Modal_add_donatur" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                            <span class="caption-subject font-red sbold uppercase">INPUT DATA DONATUR</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="form-body">
                                            <!-- BEGIN FORM-->
                                            <form action="#" id="add_donatur">
                                                <!--inputbox-->
                                                    <!--span-->
                                                        <input class="hidden" name="hid_kddonatur" id="hid_kddonatur">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Donatur
                                                                </span>
                                                                <div class="input" id= "hiddenidDonatur">
                                                                    <?php
                                                                        $att_item = 'id="hide_id_Donatur"  class="form-control select" style="width:100%"  onchange="pilihItemDonatur()"';
                                                                        echo form_dropdown('hide_id_Donatur', $id_donatur, null, $att_item);
                                                                    ?>
                                                                </div>
                                                                <div class="input-icon right">
                                                                <i class="fa"></i><input type class="form-control" readonly name="donatur" id="donatur" onkeydown="OtomatisKapital(this)" required>
                                                                </div>
                                                                <span class="input-group-btn"
                                                                        style="cursor: pointer;"
                                                                        title="Cari Kode donatur"
                                                                        id="spansearchDonatur"
                                                                        onclick="idDonaturshow()">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </span>
                                                                <span class="input-group-btn"
                                                                    style="cursor: pointer;"
                                                                        title="Cari Kode Donatur"
                                                                        id="spansearchcloseDonatur"
                                                                        onclick="idDonaturhide()">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-times-circle"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Nama donatur
                                                                </span>
                                                                <div class="input-icon right">
                                                                <i class="fa"></i><input type class="form-control" name="nama_donatur" id="nama_donatur" readonly="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--span-->
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Kategori Donatur
                                                                </span>
                                                                <div class="input-icon right">
                                                                <i class="fa"></i><input type class="form-control" name="kategori_donatur" id="kategori_donatur" readonly="true" >
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                <!--end inputbox-->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green-jungle" id="btn_donatur" onclick="Tambahdonatur()">Tambah</button>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div><!-- END VALIDATION STATES-->
                        </div>
                    </div>
                </div><!--end modal-body-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- end of modal donatur-->
<!-- modal Cari -->
    <div class="modal fade draggable-modal" id="Modal_cari" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                                                Noregistrasi
                                                            </span>
                                                            <i class="fa"></i><input type class="form-control" name="s_noregistrasi" id="s_noregistrasi" onkeydown="OtomatisKapital(this)" required></div>
                                                    </div>
                                                <!--span-->
                                                    <!-- <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama Lengkap
                                                        </span>
                                                        <i class="fa"></i><input type class="form-control" name="s_namalengkap" id="s_namalengkap" onkeydown="OtomatisKapital(this)" required></div>
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
