<!-- بسم الله الرحمن الرحیم -->
<script src="<?php echo base_url(); ?>js/jdaftarulang.js"></script>
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
                    <button class="btn btn-default " type="button" onclick="adddaftarulang()">
                        <i class="fa fa-edit"></i>&nbsp;Registrasi Siswa&nbsp;
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
                            <th style="text-align:center">Tahun Ajar</th>
                            <th style="text-align:center">No Registrasi</th>
                            <th style="text-align:center">Gedung</th>
                            <th style="text-align:center">Bagian</th>
                            <th style="text-align:center">Kamar</th>
                            <th style="text-align:center">Kelas</th>
                            <th style="text-align:center">Tanggal</th>
                            <th style="text-align:center" width="10%">Action</th>
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
<!-- modal add daftarulang -->
    <div class="modal fade draggable-modal" id="Modal_add_daftarulang" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <i class=" icon-layers font-red"></i><span class="caption-subject font-red sbold uppercase">DAFTAR ULANG TMI</span>
                </div>
                <div class="modal-body">
                     <!-- isi body modal mulai -->
                    <div class="row">
                        <div class="col-md-12">
                        <!-- BEGIN VALIDATION STATES-->
                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_daftarulang">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    TAHUN AJAR AKTIF : <?php echo $deskripsi ?>
                                                                </span>
                                                                <input type="text" class="hidden" name="id_thn_ajar" id="id_thn_ajar" value="<?php echo $id_thn_ajar ?>">                                                                    
                                                            </div>                                                            
                                                    </div> 
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    No Registrasi
                                                                </span>
                                                                <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" placeholder="Masukan No Registrasi Santri TMI" onkeydown="OtomatisKapital(this)" maxlength="10" required>
                                                                    <span class="input-group-btn"
                                                                        style="cursor: pointer;"
                                                                            title="Cek No Registrasi"
                                                                            id="spansearchregis"
                                                                        onclick="idregisshow()">
                                                                        <button class="btn green" type="button">
                                                                            <i class="fa fa-check-square"></i>
                                                                        </button>
                                                                    </span>
                                                                    <span class="input-group-btn"
                                                                        style="cursor: pointer;"
                                                                            title="Batal"
                                                                            id="spansearchcloseregis"
                                                                        onclick="idregishide()">
                                                                        <button class="btn red" type="button">
                                                                            <i class="fa fa-remove"></i>
                                                                        </button>
                                                                    </span>
                                                            </div>                                                            
                                                    </div> 
                                                    <div id="data_santri_detail" class="portlet box green-jungle">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-child"></i>Data Santri Ditemukan</div>
                                                        </div>
                                                        <div class="portlet-body">
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
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        Gedung
                                                                    </span>
                                                                    <div class="input" id= "hiddenidgedung">
                                                                        <?php
                                                                            $att_item = 'id="hide_id_gedung"  class="form-control select2" style="width:100%"  onchange="pilihItemGedung()"';
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
                                                            <!--span-->
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        Kamar
                                                                    </span>
                                                                    <div class="input" id= "hiddenidKamar">
                                                                        <?php
                                                                            $att_item = 'id="hide_id_Kamar"  class="form-control select2" style="width:100%"  onchange="pilihItemKamar()"';
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
                                                            <!--span-->
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        Bagian
                                                                    </span>
                                                                    <div class="input" id= "hiddenidBagian">
                                                                        <?php
                                                                            $att_item = 'id="hide_id_Bagian"  class="form-control select2" style="width:100%"  onchange="pilihItemBagian()"';
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
                                                            <!--span-->
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        Kelas
                                                                    </span>
                                                                    <div class="input" id= "hiddenidKelas">
                                                                        <?php
                                                                            $att_item = 'id="hide_id_Kelas"  class="form-control select2" style="width:100%"  onchange="pilihItemKelas()"';
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
                                                            <!--span-->
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        Potongan
                                                                    </span>
                                                                    <div class="input" id= "hiddenidPotongan">
                                                                        <?php
                                                                            $att_item = 'id="hide_id_Potongan"  class="form-control select2" style="width:100%"  onchange="pilihItemPotongan()"';
                                                                            echo form_dropdown('hide_id_Potongan', $id_potongan, null, $att_item);
                                                                        ?>
                                                                    </div>
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i><input type class="hidden" readonly name="id_potongan" id="id_potongan" required>
                                                                        <input type class="form-control" style="width: 88%;" readonly name="nama_potongan" id="nama_potongan" required>                                                                    
                                                                        <span class="input-group-btn"
                                                                                style="cursor: pointer;"
                                                                                title="Cari Potongan"
                                                                                id="spansearchPotongan"
                                                                                onclick="idPotonganshow()">
                                                                            <button class="btn default" type="button">
                                                                                <i class="fa fa-search"></i>
                                                                            </button>
                                                                        </span>
                                                                        <span class="input-group-btn"
                                                                                style="cursor: pointer;"
                                                                                title="Cari Potongan"
                                                                                id="spansearchclosePotongan"
                                                                                onclick="idPotonganhide()">
                                                                            <button class="btn default" type="button">
                                                                                <i class="fa fa-times-circle"></i>
                                                                            </button>
                                                                        </span>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <input type="radio" class="chk" name="tipe_potongan" value="persen" checked="checked">Persen
                                                                            </span>
                                                                            <div class="input-icon right">
                                                                            <i class="fa"></i><input type class="form-control" readonly name="potongan_persen" id="potongan_persen"  required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <input type="radio" class="chk" name="tipe_potongan" value="nominal" >Nominal
                                                                            </span>
                                                                            <div class="input-icon right">
                                                                            <i class="fa"></i><input type class="form-control" readonly name="potongan_nominal" id="potongan_nominal"  required>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                   
                                                                </div>
                                                                
                                                            </div>     
                                                        </div>
                                                    </div>
                                               <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svdaftarulang()">Save</button>
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
<!-- end of modal daftarulang-->
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
                                                                Kode daftarulang
                                                            </span>
                                                            <input type="text" class="form-control" name="s_kodedaftarulang" id="s_kodedaftarulang" onkeydown="OtomatisKapital(this)" required></div>
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
