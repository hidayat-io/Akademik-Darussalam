<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>

<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jdatasoal.js"></script>

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
                    <button class="btn btn-default <?php echo $class_add;?>" type="button" onclick="adddatasoal()">
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
                            <th style="text-align:center">Mata Pelajaran</th>
                            <th style="text-align:center">Tingkat</th>
                            <th style="text-align:center">Soal</th>
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
<!-- modal add datasoal -->
    <div class="modal fade draggable-modal" id="Modal_add_datasoal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA SOAL</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_datasoal">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <input type="text" class="hidden" name="kode_datasoal" id="kode_datasoal">
                                                    <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    Mata Pelajaran
                                                                </span>
                                                                <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <?php
                                                                    $att_item = 'id="id_matpal" class="form-control  select" style="width:100%"   required';
                                                                    echo form_dropdown('id_matpal', $mat_pal, null, $att_item);
                                                                ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Tingkat
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <?php
                                                                    $att_item = 'type="text" class="form-control select"  style="width: 90%;" id="tingkat" onchange="SearchBankSoal()" required';
                                                                    echo form_dropdown('tingkat', $tingkat, null, $att_item);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Soal
                                                            </span>
                                                            <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                            <input type="text" class="form-control" name="soal" id="soal"  maxlength="200" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            Jawaban a
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                            <input type="text" class="form-control" name="jawaban_a" id="jawaban_a" maxlength="50" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            Jawaban b
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                            <input type="text" class="form-control" name="jawaban_b" id="jawaban_b" maxlength="50" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            Jawaban c
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                            <input type="text" class="form-control" name="jawaban_c" id="jawaban_c" maxlength="50" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            Jawaban d
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                            <input type="text" class="form-control" name="jawaban_d" id="jawaban_d" maxlength="50" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Jawaban benar
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <select class="form-control" name="jawab_benar" id="jawab_benar" required >
                                                                    <option value=""></option>
                                                                    <option value="a">a</option>
                                                                    <option value="b">b</option>
                                                                    <option value="c">c</option>
                                                                    <option value="d">d</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>     
                                            <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svdatasoal()">Save</button>
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
<!-- end of modal datasoal-->
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
                                                                ID Mata Pelajaran
                                                            </span>
                                                            <input type="text" class="form-control" name="s_idmatpal" id="s_idmatpal" onkeydown="OtomatisKapital(this)" required></div>
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
