<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
    <?php $this->load->view('admin/components/head');?>
    <!-- end::Head -->
    
	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<!-- begin:: Page -->
		<!-- begin:: Header Mobile -->
		<?php $this->load->view('admin/components/mobile_header');?>
        <!-- end:: Header Mobile -->
        
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<?php $this->load->view('merchants/components/side_menu');?>
                <!-- end:: Aside -->
                
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<?php $this->load->view('merchants/components/header');?>
					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Subheader -->
						<?php $this->load->view('merchants/components/breadcrumps');?>
						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <?php 
                                if($this->session->flashdata('success')) {
                            ?>
                            <div class="alert alert-solid-success alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="alert-text">
                                   <?php echo $this->session->flashdata('success');?><br>
                                </div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                    </button>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <?php 
                                if($this->session->flashdata('error')) {
                            ?>
                            <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="alert-text">
                                   <?php print_r($this->session->flashdata('error'))?><br>
                                </div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                    </button>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="kt-portlet">
                                <!--begin:: tabs-->
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-toolbar">
                                        <h4 class="text-center">Configurations</h4>
                                    </div>
                                </div>
                                <!--ends:: tabs-->
                                <!--begin:: tab bodies-->
                                <div class="kt-portlet__body">
                                    <span id="errorFormError" class="text-danger"></span>
                                    <div class="kt-form kt-form--label-right">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <form id="add-config-form" action="members/setting/add_configuration" method="POST">
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Add Configuration</label>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Configuration Name" class="form-control" onblur="validateSpecialChars(this,'Configuration name', 'errorConfName')" type="text" id="conf_name" name="add_conf_name">
                                                                <span id="errorConfName" class="text-danger"></span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Configuration Value" class="form-control" onblur="checkEmpty(this,'Configuration value', 'errorConfValue')" type="text" id="conf_value" name="add_conf_value">
                                                                <span id="errorConfValue" class="text-danger"></span>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-12">
                                                                <div class="pull-right btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="add_configuration()">
                                                                    Add
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="form-group row">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Name</th>
                                                                    <th class="text-center">Value</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    if(count($configs)>0){
                                                                        $i = 1;
                                                                        foreach($configs as $k => $v){
                                                                ?>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <input type="text" class="form-control" onblur="validateSpecialChars(this,'Configuration name', 'errorConfName<?php echo $v->id;?>')" name="conf_name" id="conf_name_<?php echo $v->id;?>" value="<?php echo $v->name;?>" readonly>
                                                                        <span id="errorConfName<?php echo $v->id;?>" class="text-danger"></span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                            // field type adjustments
                                                                            if($v->name == "CustomerSearchBy"){
                                                                        ?>
                                                                        <select class="form-control" onblur="validateSpecialChars(this,'Configuration value', 'errorConfValue<?php echo $v->id;?>')" name="conf_value" id="conf_value_<?php echo $v->id;?>">
                                                                            <option value="Email" <?php echo $v->value == "Email" ? "selected" : "";?>>Email</option>
                                                                            <option value="Phone" <?php echo $v->value == "Phone" ? "selected" : "";?>>Phone</option>
                                                                        </select>
                                                                        <?php
                                                                            } else if ($v->name == "EnableSubUserAppointments") {
                                                                        ?>
                                                                        <select class="form-control" onblur="validateSpecialChars(this,'Configuration value', 'errorConfValue<?php echo $v->id;?>')" name="conf_value" id="conf_value_<?php echo $v->id;?>">
                                                                            <option value="Email" <?php echo $v->value == "1" ? "selected" : "";?>>Enable</option>
                                                                            <option value="Phone" <?php echo $v->value == "0" ? "selected" : "";?>>Disable</option>
                                                                        </select>
                                                                        <?php
                                                                            } else if ($v->name == "PaginationRows") {
                                                                        ?>
                                                                        <input type="number" class="form-control" onblur="validateSpecialChars(this,'Configuration value', 'errorConfValue<?php echo $v->id;?>')" name="conf_value" id="conf_value_<?php echo $v->id;?>" value="<?php echo $v->value;?>">
                                                                        <?php        
                                                                            } else {
                                                                        ?>
                                                                        <input type="text" class="form-control" onblur="validateSpecialChars(this,'Configuration value', 'errorConfValue<?php echo $v->id;?>')" name="conf_value" id="conf_value_<?php echo $v->id;?>" value="<?php echo $v->value;?>">
                                                                        <?php
                                                                            }
                                                                        ?>                                                                        
                                                                        <span id="errorConfValue<?php echo $v->id;?>" class="text-danger"></span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a class="text-primary" onclick="save_configuration(<?php echo $v->id;?>)"><i class="fa fa-save"></i> Save</a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                        $i++;
                                                                        }
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ends:: tab bodies-->
                            </div>
                        </div>
						<!-- end:: Content -->
					</div>
					<!-- begin:: Footer -->
					<?php $this->load->view('merchants/components/footer');?>
					<!-- end:: Footer -->
				</div>
			</div>
		</div>
		<!-- end:: Page -->

		<!-- begin::Scrolltop -->
		<?php $this->load->view('merchants/components/scroll_to_top');?>
		<!-- end::Scrolltop -->

        <!-- begin:: common scripts-->
        <?php $this->load->view('merchants/components/common_scripts');?>
        <!-- end:: common scripts -->
	</body>
	<!-- end::Body -->
</html>