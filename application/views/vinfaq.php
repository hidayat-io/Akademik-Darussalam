<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>js/jinfaq.js"></script>
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
                                    <th>ID Donatur</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal</th>
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

<div id="m_add" class="modal fade bs-modal-lg" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="lbl_titel"></h4>
            </div>

            <div class="modal-body">
                <form action="#" id="frminfaq" class="form-horizontal">
                    <input type="hidden" name="hid_id_data_tipe" value="" />

                    <input type="hidden" name="hid_id_data" value="" />
                    <input type="hidden" name="hid_data_saldo" value="" id="hid_data_saldo" />
                    <input type="hidden" name="hid_data_nm_awl" value="" id="hid_data_nm_awl" />
                    <input type="hidden" name="hid_id_data_tipe" value="" id="hid_id_data_tipe" />


                    <div class="form-body">
                            <div class="portlet-body">
                                <ul class="nav nav-pills">
                                    <li class="active" id="tab_in" >
                                        <a href="#tab_2_1" id="tab_masuk" data-toggle="tab">Uang Pemasukan Infaq</a>
                                    </li>
                                    <li id="tab_out">
                                        <a href="#tab_2_2" id="tab_keluar" data-toggle="tab" name="tab_2_2">Uang Pengeluaran Infaq</a>
                                    </li>
                                </ul>
                                <div class="tab-content ">
                                    <div class="tab-pane fade active in " id="tab_2_1">
                                        <p>

                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Nama</span>
                                                           <select class="form-control select2" style="width: 100%;" id="opt_donatur" name="opt_donatur">
                                                           </select>

                                                    </div>
                                                </div>
                                            </div>


                                            <!--inputbbox-->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Tanggal Pemasukan</span>
                                                        <input class="form-control datepicker"  type="text" name="txttgl" value="<?php echo date('d-m-Y'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->

                                            <!--inputbbox-->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Nominal</span>
                                                        <input type="text" class="form-control spinner numbers-only" name="txtnominal" id="txtnominal">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->

                                            <!--inputbbox-->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <sspan class="input-group-addon">Keterangan</span>
                                                        <textarea class="form-control" rows="2" name="txtketerangan" id="txtketerangan"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->

                                        </p>
                                    
                                    </div>

                                    <div class="tab-pane fade" id="tab_2_2">
                                        <p>

                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Nama</span>
                                                           <select class="form-control select2" style="width: 100%;" id="opt_donatur2" name="opt_donatur2" onchange="displaysaldo()">
                                                           </select>

                                                    </div>
                                                </div>
                                            </div>

                                            <!--inputbbox-->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Tanggal Pengeluaran</span>
                                                        <input class="form-control datepicker"  type="text" name="txttglkl" value="<?php echo date('d-m-Y'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->

                                            <!--inputbbox-->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Saldo Saat ini</span>
                                                        <input type="text" class="form-control spinner numbers-only" name="txtsaldo" id="txtsaldo" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->

                                            <!--inputbbox-->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Nominal Pengeluaran</span>
                                                        <input type="text" class="form-control spinner numbers-only" name="txtnominalkl" id="txtnominalkl">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->

                                            <!--inputbbox-->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <sspan class="input-group-addon">Keterangan</span>
                                                        <textarea class="form-control" rows="2" name="txtketerangankl" id="txtketerangankl"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--span-->



                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-sm default">Cancel</button>

                <button type="button" class="btn btn-sm green-jungle" onclick="simpaninfaq()">Simpan</button>
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
                            <label class="col-md-3 control-label">Nama</label>
                            <div class="col-md-4">

                                <select class="form-control select2" style="width: 100%;" id="opt_dnt_srch" name="opt_dnt_srch">
                                </select>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Data Range</label>

                            <div class="col-md-8">
                                <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                    <input type="text" class="form-control" name="from" id="from">
                                    <span class="input-group-addon" style="min-width: 20px"> to </span>
                                    <input type="text" class="form-control" name="to" id="to">
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-md-4 control-label">Tipe</label>
                        <div class="col-md-5">
                            <div class="mt-radio-inline">
                                <label class="mt-radio">
                                    <input type="radio" name="optionsRadios" id="optsimpan" value="i" checked="checked" >IN
                                    <span></span>
                                </label>
                                <label class="mt-radio">
                                    <input type="radio" name="optionsRadios" id="optkeluar" value="o">OUT
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-sm default">Cancel</button>

                <button type="button" class="btn btn-sm green-jungle" onclick="searchdata()">Cari</button>
            </div>
        </div>
    </div>
</div>