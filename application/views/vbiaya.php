<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>

<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jbiaya.js"></script>

<div class="row">
<!-- table master biaya -->
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
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true" title="Tambah Data">Tambah Data
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" onclick="add_biaya('B')"> <i class="fa fa-plus"></i>BULANAN
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" onclick="add_biaya('S')"> <i class="fa fa-plus"></i>SEMESTER
                            </a>
                        </li>
                    </ul>
                  <!-- <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                        <i class="fa fa-search"></i>&nbsp;Search
                    </button>
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                    </button> -->
                </div>
            </div>
            <input type="text" class="hidden" name="hid_param" id="hid_param" />
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tb_list">
                    <thead>
                        <tr>
                            <th style="text-align:center; width: 100%" >Tahun Ajaran</th>
                            <th style="text-align:center; width: 100%">Kategori</th>
                            <th style="text-align:center; width: 100%">Total Biaya</th>
                            <th style="text-align:center; width: 30%">Action</th>
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
<!-- end Table master biaya -->
<!-- table potongan -->
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green-jungle">
        <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-database"></i><?php echo $title2;?>
                </div>
                <div class="tools">
                  <div class="btn-group pull-right">                      
                  </div>
                </div>
                <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                <button class="btn btn-default " type="button" onclick="addpotongan()">
                        <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                    </button>
                    <!-- <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                        <i class="fa fa-search"></i>&nbsp;Search
                    </button>
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                    </button> -->
                </div>
            </div>
            <input type="text" class="hidden" name="hid_param_potongan" id="hid_param_potongan" />
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tb_potongan">
                    <thead>
                        <tr>
                            <th style="text-align:center">Nama Potongan</th>
                            <th style="text-align:center">Persentasi (%)</th>
                            <th style="text-align:center">Nominal</th>
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
        <!-- <div class="portlet box green-jungle">
            <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i><?php echo $title2;?>
                    </div>
            </div>
            <div class="portlet-body">
            <form action="#" id="add_potongan">
                                                    <div class="form-group">
                                                            <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Potongan Harga Santri
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa fa-percent"></i>
                                                                <input type="text" class="form-control" name="potongan" id="potongan"  maxlength='3' value="<?php echo $potongan?>">
                                                                 
                                                            </div>
                                                            <span class="input-group-btn">
                                                                <a href="javascript:;" class="btn btn-icon-only blue" onclick="EditDataPotongan()" id="BPEdit" title="EDIT">
                                                                    <i class="glyphicon glyphicon-edit"></i>
                                                                </a>
                                                                <a href="javascript:;" class="btn btn-icon-only red" onclick="CanceleDataPotongan('30')" id="BPCancel" title="CANCEL">
                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                </a>
                                                                <a href="javascript:;"class="btn btn-icon-only green-jungle" onclick="SaveDataPotongan('<?php echo $potongan?>')" id="BPSave" title="SAVE">
                                                                    <i class="glyphicon glyphicon-floppy-disk"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div> 
                                        </form>
            </div>
        </div> -->
    </div>
<!-- end table potongan -->
</div>
<!-- modal EDIT BIAYA -->
    <div class="modal fade draggable-modal" id="Modal_add_biaya" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sx">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">MASTER BIAYA</h4>
                </div>
                <form action="#" id="add_biaya">
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label"></label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        Kurikulum
                                    </span>
                                    <?php
                                        $att_item = ' type="text" class="form-control select" style="width: 100%;" id="id_thn_ajar" required';
                                        echo form_dropdown('select_thnajar', $kode_deskripsi, null, $att_item);
                                    ?>
                                    <input type="text" id="hid_tipekomponen" name="hid_tipekomponen" CLASS="hidden" />
                                </div>
                            </div>    
                        </div>
                            <div class="col-md-12">
                                   
                                <!-- isi body modal mulai -->                    
                                <div class="tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        <li id="nav_tab_bulanan">
                                            <a href="#tab_bulanan" data-toggle="tab"><i class="fa fa-credit-card"></i>&nbsp;BIAYA BULANAN</a>
                                        </li>
                                        <li id="nav_tab_semester">
                                            <a href="#tab_semester" data-toggle="tab"><i class="fa fa-credit-card"></i>&nbsp;BIAYA SEMESTER</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!--kotak data Bulanan-->
                                            <div class="tab-pane" id="tab_bulanan">
                                                <div class="portlet box green-jungle">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            BULANAN
                                                        </div>
                                                       <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                                                            <button class="btn btn-default " type="button" onclick="addKomponen_modal('B')">
                                                                <i class="fa fa-edit"></i>&nbsp;Tambah Komponen Bulanan&nbsp;
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="hid_jumlah_item_bulanan" CLASS="hidden" value="0" />
                                                    <input type="text" name="hid_table_item_bulanan" class="hidden" id="hid_table_item_bulanan" />
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="tb_list_bulanan">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center">No</th>
                                                                    <th style="text-align:center" class="hidden">id_komponen</th>
                                                                    <th style="text-align:center">Komponen Bulanan</th>
                                                                    <th style="text-align:center">Nominal</th>
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
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--kotak data bulanan selesai-->
                                        <!--kotak data Pembiayaan mulai-->
                                            <div class="tab-pane" id="tab_semester">
                                                <div class="portlet box green-jungle">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            SEMESTER
                                                        </div>
                                                       <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                                                            <button class="btn btn-default " type="button" onclick="addKomponen_modal('S')">
                                                                <i class="fa fa-edit"></i>&nbsp;Tambah Komponen Semester&nbsp;
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="hid_jumlah_item_semester" CLASS="hidden" value="0" />
                                                    <input type="text" name="hid_table_item_semester" class="hidden" id="hid_table_item_semester" />
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="tb_list_semester">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center">No</th>
                                                                    <th style="text-align:center" class="hidden">id_komponen</th>
                                                                    <th style="text-align:center">Komponen Semester</th>
                                                                    <th style="text-align:center">Nominal</th>
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
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--kotak data pembiayaan selesai-->
                                    </div>
                                </div>                    
                                <!--end modal-body-->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-form">
                        <!-- <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green-jungle" id="save_button_footer" onclick="svSantri()">Simpan changes</button>
                        <button type="button" class="btn green-jungle" id="addto_button_footer" onclick="AddTOSantri()">Jadikan Santri</button> -->

                        <a href="javascript:;" class="btn btn-sm default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-minus-sign"></i>&nbsp;CLOSE
                        </a>
                        <a href="javascript:;" class="btn btn-sm green-jungle" onclick="SaveData()" id="save_button">
                            <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;
                        </a>
                        <img id="load_save" style="margin-left:5px;display: none"
                            src="<?php echo base_url(); ?>images/pre_loader.gif" />
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- end of EDIT-->
<!-- modal tambah komponen -->
    <div class="modal fade draggable-modal" id="Modal_add_komponen" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sx">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">KOMPONEN BIAYA</h4>
                </div>
                <form action="#" id="add_komponen">
                    <div class="modal-body">
                        <div class="row">
                                <!-- isi body modal mulai -->                    
                                <div class="tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        <li id="nav_tab_bulanan_komponen">
                                            <a href="#tab_bulanan_komponen" data-toggle="tab"><i class="fa fa-credit-card"></i>&nbsp;KOMPONEN BULANAN</a>
                                        </li>
                                        <li id="nav_tab_semester_komponen">
                                            <a href="#tab_semester_komponen" data-toggle="tab"><i class="fa fa-credit-card"></i>&nbsp;KOMPONEN SEMESTER</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!--kotak data Bulanan-->
                                            <div class="tab-pane" id="tab_bulanan_komponen">
                                                <div class="portlet box green-jungle">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            KOMPONEN BULANAN
                                                        </div>
                                                        <!-- <div class="tools">
                                                            <a href="javascript:;" class="collapse"></a>
                                                        </div> -->
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <!--inputbbox-->                                                            
                                                            <div id="checkboxlist">
                                                             <?php  $no =1;
                                                                    foreach ($komponen_bulanan as $row) { ?>
                                                                <div><input type="checkbox" value="<?php echo $row['id_komponen'].'#'.$row['nama_komponen']; ?>" class="chk"> <?php echo $row['nama_komponen']; ?></div>
                                                            <?php $no++; } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--kotak data bulanan selesai-->
                                        <!--kotak data Pembiayaan mulai-->
                                            <div class="tab-pane" id="tab_semester_komponen">
                                                <div class="portlet box green-jungle">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            KOMPONEN SEMESTER
                                                        </div>
                                                        <!-- <div class="tools">
                                                            <a href="javascript:;" class="collapse"></a>
                                                        </div> -->
                                                    </div>
                                                    <div class="portlet-body form">
                                                            <!--inputbbox-->
                                                           <div class="form-body">
                                                            <!--inputbbox-->                                                            
                                                                <div id="checkboxlist">
                                                                <?php  $no =1;
                                                                        foreach ($komponen_semester as $row) { ?>
                                                                    <div><input type="checkbox" value="<?php echo $row['id_komponen'].'#'.$row['nama_komponen']; ?>" class="chk"> <?php echo $row['nama_komponen']; ?></div>
                                                                <?php $no++; } ?>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--kotak data pembiayaan selesai-->
                                    </div>
                                </div>                    
                                <!--end modal-body-->
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-form">
                        <!-- <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green-jungle" id="save_button_footer" onclick="svSantri()">Simpan changes</button>
                        <button type="button" class="btn green-jungle" id="addto_button_footer" onclick="AddTOSantri()">Jadikan Santri</button> -->

                        <a href="javascript:;" class="btn btn-sm default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-minus-sign"></i>&nbsp;CLOSE
                        </a>
                        <a href="javascript:;" class="btn btn-sm green-jungle"  id="save_button_komponen">
                            <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;
                        </a>
                        <img id="load_save" style="margin-left:5px;display: none"
                            src="<?php echo base_url(); ?>images/pre_loader.gif" />
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- end of tambah komponen-->
<!-- modal Potongan -->
    <div class="modal fade draggable-modal" id="Modal_add_potongan" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sx">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">FORM TAMBAH POTONGAN</h4>
                </div>
                <form action="#" id="add_potongan">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- isi body modal mulai -->                    
                                <div class="portlet box green-jungle">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <div class="form-body">
                                            <!--inputbbox-->
                                            <div class="row">
                                            <input type="text" name="id_potongan" id="id_potongan" class="hidden">
                                                <div class="form-group">
                                                    <label class="control-label"></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                        Nama Potongan
                                                        </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i><input type="text" class="form-control" name="nama_potongan" id="nama_potongan" onkeydown="upperCaseF(this)" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="control-label"></label>
                                                        <div class="col-md-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Persen
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa fa-percent"></i>
                                                                <input type="text" class="form-control  numbers-only" name="persen" id="persen"  maxlength='3'>                                                                 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="control-label"></label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                        Nominal 
                                                        </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i><input type class="form-control" name="nominal_potongan" id="nominal_potongan">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>                  
                                <!--end modal-body-->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-form">
                        <a href="javascript:;" class="btn btn-sm default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-minus-sign"></i>&nbsp;CLOSE
                        </a>
                        <a href="javascript:;" class="btn btn-sm green-jungle" onclick="SaveDataPotongan()" id="save_button_potongan">
                             <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;SAVE
                        </a>
                        <img id="load_save" style="display:none" src="<?php echo base_url(); ?>assets/images/fb-loader.gif" />
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- end of Potongan-->
