<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>js/jljadwalpelajaran.js"></script>
<!-- page -->
    <div class="row">
        <!-- <div class="col-md-100%"> -->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
                <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-database"></i>LAPORAN JADWAL PELAJARAN
                        </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">                                
                        <!-- BEGIN FORM-->
                        <form action="#" id="form_ljadwalpelajaran">
                                <!--span-->
                                
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Kurikulum
                                                </span>
                                                <?php
                                                    $att_item = ' type="text" class="form-control select2" style="width: 100%;" id="id_thn_ajar" required';
                                                    echo form_dropdown('select_thnajar', $kode_deskripsi, $id_thn_ajar, $att_item);
                                                ?>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Semester
                                                </span>
                                                <select class="form-control" style="width: 100%;"  name="semester" id="semester" required>
                                                    <option value=""></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                        </div>    
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Santri
                                                </span>
                                                <select class="form-control" style="width: 100%;"  name="santri" id="santri" onchange="kosong_table()" required>
                                                    <option value=""></option>
                                                    <option value="PUTRI">PUTRI</option>
                                                    <option value="PUTRA">PUTRA</option>
                                                </select>
                                            </div>
                                        </div>    
                                <!--span-->
                            <div class="modal-footer">
                                <div class="m-grid-col-center">
                                    <button type="button" class="btn btn-lg green-jungle" id="export_button_sku" onclick="export_skurikulum()" style="width: 100%;"><i class="glyphicon glyphicon-share"></i> EXPORT JADWAL PELAJARAN</button>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
<!-- page end -->