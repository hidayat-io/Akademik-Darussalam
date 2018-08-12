<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    #frm_search_santri .form-group{

        margin: 2% 2%;
    }
</style>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/icheck/icheck.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jtabungan.js"></script>

<input type="hidden" name="hid_param" id="hid_param" value='' />
    <div class="row">
        <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-wallet"></i><?php echo $title;?> </div>
                        <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                            <button type="button" class="btn btn-default" title="Add New Data" onclick="pnladd()">
                                <i class="fa fa-edit"></i>&nbsp;Tambah Data
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

<div id="m_add" class="modal fade bs-modal-lg" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="portlet box green-jungle">
            <div class="portlet-title">
                <div class="caption">
                    <h4 class="modal-title" id="lbl_titel"></h4>
                </div>
                <div class="tools">
                  <div class="btn-group pull-right">
                    <i class="glyphicon glyphicon-remove cur-hand" data-dismiss="modal"></i>
                  </div>
                </div>
            </div>
            <div class="portlet-body">
                <form action="#" id="frmtabungan" class="form-horizontal">
                    <input type="text" name="hid_id_data" value="" class="hidden" />
                    <input type="text" class="hidden" name="hid_old_nominal" value="" id="hid_old_nominal" />
                    <input type="hidden" name="hid_tipe_transaksi" id="hid_tipe_transaksi" value="i" />
                    <div class="portlet-body">
                        <div class="tabbable-custom nav-justified">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="#tab_in" data-toggle="tab">Simpan Tabungan</a>
                                </li>
                                <li>
                                    <a href="#tab_out" data-toggle="tab">Ambil Tabungan</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab_in">
                                    <div class="form-group">
                                        <label class="control-label col-md-2"></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">Santri</span>
                                                   <select class="form-control select2" style="width: 100%;" id="opt_noreg" name="opt_noreg" onchange="displaySaldo()">
                                                   </select>
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
                                               <input class="form-control form-control-inline input-small datepicker"  type="text" name="txttgl"
                                                    value="<?php echo date('d-m-Y'); ?>" readonly="readonly" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2"></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Tabungan Saat Ini
                                                </span>
                                                <input type="text" class="form-control spinner inp" placeholder="Saldo Tabungan"
                                                name="txtsaldotabungan" id="txtsaldotabungan" readonly="">
                                            </div>

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
                                                id="txtnominal">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2"></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                   Keterangan
                                                </span>
                                                 <textarea class="form-control" rows="3" name="txtketerangan" id="txtketerangan"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: 11%">
                                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_square-blue" name="chk_kalkulasi" checked="">
                                            <span class="cur-hand">Kalkulasi Pengeluaran Harian</span>
                                        </label>
                                    </div>

                                    <div class="form-action col-sm-offset-2">
                                        <button type="button" class="btn default" data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn green-jungle" onclick="simpantabungan()">Simpan</button>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab_out">
									<input type="hidden" name="hid_list_siswa" id="hid_list_siswa" />
                                    <div class="form-group">
                                        <label class="control-label col-md-2" style="text-align: left; padding-right: 0px">Jumlah Pengambilan</label>
                                        <div class="col-md-3" style="text-align: left">
                                            <input class="form-control" placeholder="Jumlah Pengambilan" type="text" id="txt_jml_ambil" name="txt_jml_ambil">
                                        </div>
                                        <button type="button" class="btn blue pull-right" style="margin-right: 20px" onclick="modalCariSiswa()">
                                            <i class="fa fa-search"></i>&nbsp;Cari Data
                                        </button>
                                        <button type="button" class="btn green-jungle pull-right" style="margin-right: 20px" onclick="savePengeluaran()">
                                            <i class="glyphicon glyphicon-log-out "></i>&nbsp;Simpan Pengeluaran
                                        </button>
                                    </div>

                                    <table id="tb_list_siswa"
                                        data-toggle="table"
                                        data-url="<?php echo base_url(); ?>Tabungan/get_list_santri_pengeluaran"
                                        data-height="500"
                                        data-search="false"
                                        data-pagination="false"
                                        data-query-params="queryParamPengeluaranSantri">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="no_registrasi" data-align="right" data-sortable="true" data-width="10%">
                                                    No.Reg
                                                </th>
                                                <th data-field="nama_lengkap" data-align="left" data-sortable="true">
                                                    Nama Santri
                                                </th>
                                                <th data-field="kelas" data-sortable="true" data-width="12%">
                                                    Kelas
                                                </th>
                                                <th data-field="kamar" data-sortable="true" data-width="12%">
                                                    Kamar
                                                </th>
                                                <th data-field="saldo" data-sortable="true" data-width="10%" data-align="right">
                                                    Saldo
                                                </th>
                                                <th data-field="limit" data-sortable="true" data-width="10%" data-align="right">
                                                    Limit
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

<div id="modal_search_siswa" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="lbl_title">Cari Data Santri</h4>
            </div>
            <div class="modal-body">
                <form action="#" id="frm_search_santri" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">Santri</span>
                                   <select class="form-control select2" style="width: 100%;" id="opt_snoreg" name="opt_snoreg"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">Kelas</span>
                                   <select class="form-control select2" style="width: 100%;" id="opt_skelas" name="opt_skelas"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">Kamar</span>
                                   <select class="form-control select2" style="width: 100%;" id="opt_skamar" name="opt_skamar"></select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                <button type="button" class="btn blue" onclick="searchDataSantri()">Cari</button>
            </div>
        </div>
    </div>
</div>
