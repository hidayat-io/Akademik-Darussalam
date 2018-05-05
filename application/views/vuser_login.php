<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>js/juser_login.js"></script>
<!-- page -->
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
                        <button class="btn btn-default " type="button" onclick="adduser_login()">
                            <i class="fa fa-edit"></i>&nbsp;Tambah Data&nbsp;
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
                                <th style="text-align:center">ID</th>
                                <th style="text-align:center">Nama Lengkap</th>
                                <th style="text-align:center">Group ID</th>
                                <th style="text-align:center">Nama Group</th>
                                <th style="text-align:center" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td colspan="6" align="center">
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
<!-- modal add user_login -->
    <div class="modal fade draggable-modal" id="Modal_add_user_login" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                        <span class="caption-subject font-red sbold uppercase">INPUT DATA USER</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">                                
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="add_user_login">
                                            <!--inputbox-->
                                                <!--span-->
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Pilih Karyawan
                                                            </span>
                                                            <div class="input" id= "hiddenidmskaryawan">
                                                                <?php
                                                                    $att_item = 'id="hide_id_mskaryawan"  class="form-control select2" style="width: 88%;"  onchange="pilihItemmskaryawan()"';
                                                                    echo form_dropdown('hide_id_mskaryawan', $mskaryawan, null, $att_item);
                                                                ?>
                                                            </div>
                                                            <div class="input-icon right">                                                                   
                                                                <span class="input-group-btn"
                                                                        style="cursor: pointer;"
                                                                        title="Cari mskaryawan"
                                                                        id="spansearchmskaryawan"
                                                                        onclick="idmskaryawanshow()">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </span>
                                                                <span class="input-group-btn"
                                                                        style="cursor: pointer;"
                                                                        title="Cari mskaryawan"
                                                                        id="spansearchclosemskaryawan"
                                                                        onclick="idmskaryawanhide()">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-times-circle"></i>
                                                                    </button>
                                                                </span>
                                                            </div>                                                                   
                                                        </div>                                                                
                                                    </div> 
                                                    <div class="form-group">
                                                            <!-- <label class="control-label"></label> -->
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                User ID
                                                            </span>
                                                            <input type="text" class="form-control" name="user_id" id="user_id"  readonly="true" required></div>
                                                    </div>
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <!-- <label class="control-label"></label> -->
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Nama User
                                                        </span>
                                                        <input type="text" class="form-control" name="nama_user_login" id="nama_user_login" readonly="true" ></div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                    <label class="control-label"></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                Group
                                                            </span>
                                                            <div class="input" id= "hiddenidmsgroup">
                                                                <?php
                                                                    $att_item = 'id="hide_id_msgroup"  class="form-control select2" style="width: 88%;"  onchange="pilihItemmsgroup()"';
                                                                    echo form_dropdown('hide_id_msgroup', $group, null, $att_item);
                                                                ?>
                                                            </div>
                                                            <div class="input-icon right">                                                                   
                                                            <input type class="form-control" style="width: 80%;" readonly name="id_group" id="id_group" required > 
                                                            <input type class="form-control" style="width: 80%;" readonly name="group_name" id="group_name" required> 
                                                                <span class="input-group-btn"
                                                                        style="cursor: pointer;"
                                                                        title="Cari msgroup"
                                                                        id="spansearchmsgroup"
                                                                        onclick="idmsgroupshow()">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </span>
                                                                <span class="input-group-btn"
                                                                        style="cursor: pointer;"
                                                                        title="Cari msgroup"
                                                                        id="spansearchclosemsgroup"
                                                                        onclick="idmsgrouphide()">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-times-circle"></i>
                                                                    </button>
                                                                </span>
                                                            </div>                                                                   
                                                        </div>                                                                
                                                    </div> 
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Password
                                                        </span>
                                                        <input type="password" class="form-control" name="password" id="password" maxlength="20" required></div>
                                                    </div>
                                                      <!--span-->
                                                      <!--span-->
                                                    <div class="form-group">
                                                        <!-- <label class="control-label"></label> -->
                                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Password Konfirmasi
                                                        </span>
                                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" maxlength="20" required></div>
                                                    </div>
                                                    <label id="cls_changePWD" class="mt-checkbox mt-checkbox-outline ">
                                                        <input type="checkbox" id="changePWD"> Change Password
                                                        <span></span>
                                                    </label>
                                                      <!--span-->
                                                    <!--end inputbox-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn green-jungle" id="save_button" onclick="svuser_login()">Save</button>
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
<!-- end of modal user_login-->
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
                                                                ID
                                                            </span>
                                                            <input type="text" class="form-control" name="s_user_id" id="s_user_id" onkeydown="OtomatisKapital(this)" required></div>
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
