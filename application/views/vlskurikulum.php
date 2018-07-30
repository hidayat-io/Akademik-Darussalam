<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>js/jlskurikulum.js"></script>
<!-- page -->
    <div class="row">
        <!-- <div class="col-md-100%"> -->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
                <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-database"></i>LAPORAN STRUKTUR KURIKULUM PER KURIKULUM
                        </div>
                </div>
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group" >
                            <label class="btn blue active" >
                                <input type="radio" class="toggle" name="rbtn_kuriulum" id="r_utama" checked > KURIKULUM UTAMA</label>
                            <label class="btn blue">
                                <input type="radio" class="toggle" name="rbtn_kuriulum" id="r_pagisore"> KURIKULUM PAGI SORE </label>
                        </div>                                                            
                        <div class="btn-group" >
                           <label class="btn blue">
                                <input type="checkbox" class="toggle" id="chk_pertingkat"> PER-TINGKAT 
                            </label>
                        </div>                                                            
                        <div class="btn-group" >
                           <label class="btn blue">
                                <input type="checkbox" class="toggle" id="chk_bytingkat" > BY-TINGKAT 
                            </label>
                        </div>                                                            
                    </div>
                    <div class="form-body">                                
                        <!-- BEGIN FORM-->
                        <form action="#" id="form_lskurikulum">
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
                                                    Kelas
                                                </span>
                                                <div class="input-icon right">
                                                    <?php
                                                        $att_item = ' type="text" class="form-control select2"  style="width: 100%;" id="id_kelas" required';
                                                        echo form_dropdown('select_kelas', $kode_kelas, null, $att_item);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>    
                                <!--span-->
                            <div class="modal-footer">
                                <div class="m-grid-col-center">
                                    <button type="button" class="btn btn-lg green-jungle" id="export_button_sku" onclick="export_skurikulum()" style="width: 100%;"><i class="glyphicon glyphicon-share"></i> EXPORT KURIKULUM</button>
                                </div>
                            /div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
<!-- page end -->