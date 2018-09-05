<script src="<?php echo base_url(); ?>js/jtabungan_aitam.js"></script>
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
                                    <th>Tanggal</th>
                                    <th>No.Register</th>
                                    <th>Nama Santri</th>
                                    <th>Kelas</th>
                                    <th>Tipe</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
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
                <form action="#" id="frmtabungan" class="form-horizontal">
                    <input type="hidden" name="hid_id_data" value="" />
                    <input type="hidden" name="hid_data_saldo" value="" id="hid_data_saldo" />
                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label col-md-2"></label>
                            <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    Nama
                                </span>
                               <select class="form-control select2" style="width: 100%;" id="opt_client" name="opt_client" onchange="displaySaldo()"></select>

                                </div>
                            </div>
                             </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2"></label>
                            <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    Tanggal
                                </span>
                               <input class="form-control form-control-inline input-medium datepicker"  type="text" name="txttgl"
                                    value="<?php echo date('d-m-Y'); ?>" /></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipe</label>
                            <div class="col-md-8">
                                <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                        <input type="radio" name="optionsRadios" id="optsimpan" value="i" checked="checked">Simpan
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="optionsRadios" id="optkeluar" value="o">Keluar
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 "></label>
                            <div class="col-md-8">
                             <div class="input-group">
                                <span class="input-group-addon">
                                    Tabungan Saat Ini
                                </span>
                                <input type="text" class="form-control spinner numbers-only" placeholder="Saldo Tabungan"
                                name="txtsaldotabungan" id="txtsaldotabungan"></div>
                               
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-2"></label>
                            <div class="col-md-8">
                             <div class="input-group">
                                <span class="input-group-addon">
                                   Nominal
                                </span>
                                 <input type="text" class="form-control spinner numbers-only" placeholder="Nominal" name="txtnominal"
                                id="txtnominal"></div>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2"></label>
                            <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                   Keterangan
                                </span>
                                 <textarea class="form-control" rows="3" name="txtketerangan" id="txtketerangan"></textarea></div>
                            </div>
                        </div>
                    </form>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>

                <button type="button" class="btn green" onclick="simpantabungan()">Simpan</button>
            </div>
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
                             <label class="col-md-3 control-label">Nama Santri</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control spinner" placeholder="Nama Santri" name="txtnamasearch"
                                id="txtnamasearch">
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-3">Date Range</label>
                            <div class="col-md-8">
                                <div class="input-group input-large">
                                    <input type="text" class="form-control datepicker" name="startDate" id="startDate" style="text-align:center">
                                    <span class="input-group-addon" style="min-width:20px">to</span>
                                    <input type="text" class="form-control datepicker" name="endDate" id="endDate" style="text-align:center"> 
                                </div>
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
