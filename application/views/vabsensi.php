<script src="<?php echo base_url(); ?>js/jabsensi.js"></script>
<input type="hidden" name="hid_param" id="hid_param" value='' />

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green-jungle">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar-check-o"></i><?php echo $title;?> 
                </div>
                <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">                    
                    <button type="button" class="btn btn-default" title="Export Data to Excel" onclick="downloadExcel()">
                        <i class="fa fa-file-excel-o"></i>&nbsp;Report
                    </button>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tb-list">
                    <thead>
                        <tr>
                            <th>Kode Kelas</th>                  
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Tipe Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Edit</th>                                       
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->        
    </div>
</div>
