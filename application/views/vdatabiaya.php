<script src="<?php echo base_url(); ?>js/jdatabiaya.js"></script>
<input type="hidden" name="hid_param" id="hid_param" value='' />
    <div class="row">
        <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i><?php echo $title;?> </div>
                        <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                            <button type="button" class="btn btn-default" title="Add New Data" onclick="pnladd()">
                                <i class="fa fa-edit"></i>&nbsp;New
                            </button>
                            <button type="button" class="btn btn-default" title="Search Data" onclick="modalSearch();">
                                <i class="fa fa-search"></i>&nbsp;Search
                            </button>
                            <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                                <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                            </button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="tb-list">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Komponen</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

  <!-- modal add -->


<div id="m_add" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="lbl_titel"></h4>
            </div>
            <div class="modal-body">
                <form action="#" id="frmdatabiaya" class="form-horizontal">
                    <input type="hidden" name="hid_id_data" value="" id="hid_id_data" />


                     <!--inputbbox-->
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="control-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">Tahun</span>
                                            <select class="form-control select2" style="width: 100%;" id="opt_tahun" name="opt_tahun">
                                                <?php
                                                    for($i=date('Y'); $i>=date('Y')-32; $i-=1)
                                                        {
                                                            echo"<option value='$i'> $i </option>";
                                                        }
                                                ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--span-->

                    <div id="div_semester" class="box-header with-border">
                        <h4>SEMESTER</h4>
                        <input type="button" value="Add Komponen" id="addButton">
                    </div>

                    <br />

                    <div id='div_komponen_semester'>
                        <div id="TextBoxDiv"></div>
                    </div>

                    <div id="div_bulanan" class="box-header with-border">
                        <h4>BULANAN</h4>
                        <input type="button" value="Add Bulanan" id="addbtnbulanan">
                    </div>

                    <br />
                    <div id='div_komponen_bulanan'>
                        
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                <button type="button" class="btn green" onclick="simpankomponen()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div id="m_add_detail" class="modal fade bs-modal-md" data-backdrop="static" tabindex="-1" 
    data-keyboard="false" aria-hidden="true" style="background-color rgba(3,0,0,1);">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="lblttl_detl"></h4>
      </div>
      <div class="modal-body">
      </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>

        <button type="button" class="btn blue" onclick="">Add</button>
    </div>
    </div>
</div>

<div id="m_search" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="lbl_title"></h4>
            </div>
            <div class="modal-body">
                <form action="#" id="frmsearch" class="form-horizontal">
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Komponen</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control spinner" placeholder="Nama" name="txtnamasearch"
                                id="txtnamasearch">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>

                <button type="button" class="btn blue" onclick="searchdata()">Cari</button>
            </div>
        </div>
    </div>
</div>