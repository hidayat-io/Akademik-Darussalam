<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>js/jsuratpermohonan.js"></script>
<!-- page -->
    <div class="row">
        <div class="col-md-5">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
                <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-database"></i>SURAT PERMOHONAN MENDAPATKAN KAFALAH
                        </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">                                
                        <!-- BEGIN FORM-->
                        <form action="#" id="form_lsuratpermohonan">
                                <!--span-->
                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            No Registrasi
                                        </span>
                                        <?php
                                            $att_item = ' type="text" class="form-control select2" style="width: 100%;" id="no_registrasi" required';
                                            echo form_dropdown('select_thnajar', $data_santri, null, $att_item);
                                        ?>
                                    </div>
                                </div>
                                <!--span-->
                            <div class="modal-footer">
                                <div class="m-grid-col-center">
                                    <button type="button" class="btn btn-lg red" id="print_button_SPKAFALAH" onclick="print_SPKAFALAH()" style="width: 100%;"><i class="glyphicon glyphicon-print"></i> PRINT SURAT PERMOHONAN KAFALAH</button>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- page end -->