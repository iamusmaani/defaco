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
                                        <h4 class="text-center">Holidays</h4>
                                    </div>
                                </div>
                                <!--ends:: tabs-->
                                <!--begin:: tab bodies-->
                                <div class="kt-portlet__body">
                                    <form id="save-holiday-form" action="members/setting/add_holiday" method="POST">
                                        <span id="errorFormError" class="text-danger"></span>
                                        <div class="kt-form kt-form--label-right">
                                            <div class="kt-form__body">
                                                <div class="kt-section kt-section--first">
                                                    <div class="kt-section__body">
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Add Holiday</label>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Holiday Date" class="form-control datepicker" onblur="checkEmpty(this,'Date', 'errorHolidayDate')" type="text" id="holiday_date" name="holiday_date">
                                                                <span id="errorHolidayDate" class="text-danger"></span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Holiday Name" class="form-control" onblur="checkEmpty(this,'Name', 'errorHolidayName')" type="text" id="holiday_name" name="holiday_name">
                                                                <span id="errorHolidayName" class="text-danger"></span>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-12">
                                                                <div class="pull-right btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="add_holiday()">
                                                                    Add
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">SNo</th>
                                                                        <th class="text-center">Date</th>
                                                                        <th class="text-center">Name</th>
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        if(count($holidays) > 0 ){
                                                                            $i = 1;
                                                                            foreach($holidays as $k => $v){
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center"><?php echo $i;?></td>
                                                                        <td class="text-center"><?php echo date('m-d-Y A',strtotime($v->holiday_date));?></td>
                                                                        <td class="text-left"><?php echo $v->holiday_name;?></td>
                                                                        <td class="text-center"><a onclick="delete_holiday(<?php echo $v->id;?>)"><i class="fa fa-trash text-danger"></i></a></td>
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
                                    </form>
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