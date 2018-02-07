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
                <!-- <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                    <button type="button" class="btn btn-default" title="Search Data" onclick="Modalcari()">
                        <i class="fa fa-search"></i>&nbsp;Search
                    </button>
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                    </button>
                </div> -->
            </div>
            <input type="text" class="hidden" name="hid_param" id="hid_param" />
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tb_list">
                    <thead>
                        <tr>
                            <th style="text-align:center">Kategori</th>
                            <th style="text-align:center">Total Biaya</th>
                            <th style="text-align:center">Action</th>
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
                    <h4 class="modal-title">UPDATE MASTER BIAYA</h4>
                </div>
                <form action="#" id="add_biaya">
                    <div class="modal-body">
                        <div class="row">
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
                                                        <!-- <div class="tools">
                                                            <a href="javascript:;" class="collapse"></a>
                                                        </div> -->
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                <?php  $no =1;
                                                                    foreach ($komponen_bulanan as $row) { ?>
                                                                    <input type="text" class="hidden" name="b_hid_nama_item_<?php echo $row['id_komponen']; ?>" id="b_hid_nama_item_<?php echo $row['id_komponen']; ?>" value="<?php echo $row['id_komponen']; ?>"/>
                                                                    <?php //get nominal
                                                                        if ($row['nominal'] == null)
                                                                        {
                                                                            $nominal = 0;
                                                                        }
                                                                        else
                                                                        {
                                                                            $nominal = $row['nominal'];
                                                                        }
                                                                    ?>
                                                                    <div class="form-group">
                                                                        <label class="control-label"></label>
                                                                        <div class="col-md-12">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            <?php echo $row['nama_komponen']; ?>
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="b_nominal_<?php echo $row['id_komponen']; ?>" id="b_nominal_<?php echo $row['id_komponen']; ?>" value="<?php echo $nominal ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>   
                                                                <?php $no++; } ?>
                                                            </div>
                                                        </div>
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
                                                        <!-- <div class="tools">
                                                            <a href="javascript:;" class="collapse"></a>
                                                        </div> -->
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <!-- BEGIN FORM-->
                                                        <div class="form-body">
                                                            <!--inputbbox-->
                                                            <div class="row">
                                                                 <?php  $no =1;
                                                                    foreach ($komponen_semester as $row) { ?>
                                                                    <input type="text" class="hidden" name="s_hid_nama_item_<?php echo $row['id_komponen']; ?>" id="s_hid_nama_item_<?php echo $row['id_komponen']; ?>" value="<?php echo $row['id_komponen']; ?>"/>
                                                                    <?php //get nominal
                                                                        if ($row['nominal'] == null)
                                                                        {
                                                                            $nominal = 0;
                                                                        }
                                                                        else
                                                                        {
                                                                            $nominal = $row['nominal'];
                                                                        }
                                                                    ?>
                                                                    <div class="form-group">
                                                                        <label class="control-label"></label>
                                                                        <div class="col-md-12">
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                            <?php echo $row['nama_komponen']; ?>
                                                                            </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i><input type class="form-control" name="s_nominal_<?php echo $row['id_komponen']; ?>" id="s_nominal_<?php echo $row['id_komponen']; ?>" value="<?php echo $nominal ?>" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>  
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
<!-- end of EDIT BEBAN GURU-->
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
