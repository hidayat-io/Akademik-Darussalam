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
                        <i class="fa fa-database"></i>PRINT RAPOR BY NO REGISTER
                    </div>
                    <div class="tools">
                    <div class="btn-group pull-right">
                        
                    </div>
                    </div>
                    <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                        <!-- <button class="btn btn-default " type="button" onclick="addrapor()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                        </button> -->
                    </div>
                </div>
                <input type="hidden" name="hid_param" id="hid_param" />
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn blue active">
                                <input type="radio" class="toggle"> PERKELAS</label>
                            <label class="btn blue">
                                <input type="radio" class="toggle"> PER NO REGISTER </label>
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
                                                    $att_item = ' type="text" class="form-control select" style="width: 90%;" id="id_thn_ajar" add_tohide()" required';
                                                    echo form_dropdown('select_thnajar', $kode_deskripsi, $id_thn_ajar, $att_item);
                                                ?>
                                                <input type="hidden" class="form-control" name="hide_Kurikulum" id="hide_Kurikulum" >
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Kelas
                                                </span>
                                                <?php
                                                    $att_item = ' type="text" class="form-control select2"  style="width: 90%;" id="id_kelas" required';
                                                    echo form_dropdown('select_kelas', $kode_kelas, null, $att_item);
                                                ?>
                                            
                                            </div>
                                        </div>    
                                    </div>
                                    <!--span-->                                     
                                </div>
                            <!--end inputbox-->
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green-jungle" id="save_button" onclick="svrpp()">Save</button>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
        <!-- table kurikulum -->
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
                        <!-- <button class="btn btn-default " type="button" onclick="addrapor()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
                        </button> -->
                    </div>
                </div>
                <input type="hidden" name="hid_param2" id="hid_param2" />
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="tb_list2">
                        <thead>
                            <tr>
                                <!-- <th style="text-align:center">ID</th> -->
                                <th style="text-align:center">Tahun Ajar Aktif</th>
                                <th style="text-align:center">Semester Aktif</th>
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
<!-- page end -->