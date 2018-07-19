<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>js/jrapor.js"></script>
<!-- page -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
                <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-database"></i>PRINT RAPOR
                        </div>
                </div>
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group" >
                            <label class="btn blue active" onclick="rbtn_rapor_action()">
                                <input type="radio" class="toggle" name="rbtn_rapor" id="r_perkelas" checked > PERKELAS</label>
                            <label class="btn blue" onclick="rbtn_rapor_action()">
                                <input type="radio" class="toggle" name="rbtn_rapor" id="r_pernoregister"> PER NO REGISTER </label>
                        </div>                                                            
                    </div>
                    <div class="form-body">                                
                        <!-- BEGIN FORM-->
                        <form action="#" id="form_rapor">
                                <div class="row">
                                    <!--span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Kurikulum
                                                </span>
                                                <?php
                                                    $att_item = ' type="text" class="form-control select" style="width: 90%;" id="id_thn_ajar" onchange="add_tohide()" required';
                                                    echo form_dropdown('select_thnajar', $kode_deskripsi, $id_thn_ajar, $att_item);
                                                ?>
                                                <input type="" class="form-control hidden" name="hide_Kurikulum" id="hide_Kurikulum" value="<?php echo $id_thn_ajar ?>" >
                                            </div>
                                        </div>    
                                    </div>
                                    <!--span-->
                                    <!--span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Semester
                                                </span>
                                                <select class="form-control select" style="width: 90%;" name="semester" id="semester" required>
                                                    <option value=""></option>
                                                    <option value="1" <?php if ($semester_aktif == '1') echo ' selected="selected"'; ?>>1</option>
                                                    <option value="2"<?php if ($semester_aktif == '2') echo ' selected="selected"'; ?>>2</option>
                                                </select>
                                            </div>
                                        </div>    
                                    </div>                                  
                                </div>            
                                <div class="row">                                                                      
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Kelas
                                                </span>
                                                <div class="input-icon right">
                                                    <?php
                                                        $att_item = ' type="text" class="form-control select2"  style="width: 90%;" id="id_kelas" required';
                                                        echo form_dropdown('select_kelas', $kode_kelas, null, $att_item);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    No Register
                                                </span>
                                                <input type="text" class="form-control" style="width: 90%;" name="no_registrasi" id="no_registrasi" onkeydown="OtomatisKapital(this)" required disabled="true">
                                            </div>
                                        </div>
                                    </div>
                                    <!--span-->  
                                </div> 
                            <!--end inputbox-->
                            <div class="modal-footer">
                                <div class="m-grid-col-center">
                                    <button type="button" class="btn btn-lg red" id="print_button" onclick="print_rapor()" style="width: 100%;"><i class="glyphicon glyphicon-print"></i> PRINT <?php echo $title ?></button>
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