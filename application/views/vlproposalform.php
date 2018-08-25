<!-- بسم الله الرحمن الرحیم -->
<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
<script src="<?php echo base_url(); ?>js/jlproposalform.js"></script>
<!-- page -->
    <div class="row">
        <!-- <div class="col-md-100%"> -->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-jungle">
                <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-database"></i>PROPOSAL FORM
                        </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">                                
                        <!-- BEGIN FORM-->
                        <form action="#" id="form_lproposalform">
                                <!--span-->
                                <!-- <div class="clearfix"> -->
                                    <div class="m-grid-col-center">
                                        
                                        <div class="form-group">
                                            <div class="btn-group" >
                                                <label class="btn blue" >
                                                <input type="radio" class="toggle" name="rbtn_form" id="r_fa" checked > FORM A</label>
                                                <label class="btn blue">
                                                <input type="radio" class="toggle" name="rbtn_form" id="r_fb"> FORM B </label>
                                            </div>                                                           
                                        </div>
                                    </div>
                                <!-- </div>    -->
                                <!-- textbox HERE -->
                                <!--span-->
                            <div class="modal-footer">
                                <div class="m-grid-col-center">
                                    <button type="button" class="btn btn-lg green-jungle" id="export_form_a" onclick="export_form()" style="width: 100%;"><i class="glyphicon glyphicon-share"></i> EXPORT FORM</button>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
<!-- page end -->