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
                                        <h4 class="text-center">My Schedule</h4>
                                    </div>
                                </div>
                                <!--ends:: tabs-->
                                <!--begin:: tab bodies-->
                                <div class="kt-portlet__body">
                                    <form id="save-service-form" action="members/setting/save_schedule" method="POST">
                                        <span id="errorFormError" class="text-danger"></span>
                                        <div class="kt-form kt-form--label-right">
                                            <div class="kt-form__body">
                                                <div class="kt-section kt-section--first">
                                                    <div class="kt-section__body">
                                                        <div class="form-group row">
                                                            <label class="col-xl-1 col-lg-1 col-form-label">Monday</label>
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Week OFF</label>
                                                            <div class="col-lg-1 col-md-1 col-sm-12">
                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                                    <label>
                                                                        <input type="checkbox" <?php echo ($schedule[0]->is_off == 1) ? "checked='checked'" : ""?> name="week_off_0[]">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Monday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[0]->start));?>" id="monday_start" name="start[]">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Monday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[0]->end));?>" id="monday_end" name="end[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-1 col-lg-1 col-form-label">Tuesday</label>
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Week OFF</label>
                                                            <div class="col-lg-1 col-md-1 col-sm-12">
                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                                    <label>
                                                                        <input type="checkbox" <?php echo ($schedule[1]->is_off == 1) ? "checked='checked'" : ""?> name="week_off_1[]">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Tuesday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[1]->start));?>" id="tuesday_start" name="start[]">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Tuesday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[1]->end));?>" id="tuesday_end" name="end[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-1 col-lg-1 col-form-label">Wednesday</label>
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Week OFF</label>
                                                            <div class="col-lg-1 col-md-1 col-sm-12">
                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                                    <label>
                                                                        <input type="checkbox" <?php echo ($schedule[2]->is_off == 1) ? "checked='checked'" : ""?> name="week_off_2[]">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Wednesday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[2]->start));?>" id="wednesday_start" name="start[]">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Wednesday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[2]->end));?>" id="wednesday_end" name="end[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-1 col-lg-1 col-form-label">Thursday</label>
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Week OFF</label>
                                                            <div class="col-lg-1 col-md-1 col-sm-12">
                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                                    <label>
                                                                        <input type="checkbox" <?php echo ($schedule[3]->is_off == 1) ? "checked='checked'" : ""?> name="week_off_3[]">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Thursday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[3]->start));?>" id="thursday_start" name="start[]">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Thursday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[3]->end));?>" id="thursday_end" name="end[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-1 col-lg-1 col-form-label">Friday</label>
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Week OFF</label>
                                                            <div class="col-lg-1 col-md-1 col-sm-12">
                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                                    <label>
                                                                        <input type="checkbox" <?php echo ($schedule[4]->is_off == 1) ? "checked='checked'" : ""?> name="week_off_4[]">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Friday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[4]->start));?>" id="friday_start" name="start[]">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Friday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[4]->end));?>" id="friday_end" name="end[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-1 col-lg-1 col-form-label">Satrday</label>
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Week OFF</label>
                                                            <div class="col-lg-1 col-md-1 col-sm-12">
                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                                    <label>
                                                                        <input type="checkbox" <?php echo ($schedule[5]->is_off == 1) ? "checked='checked'" : ""?> name="week_off_5[]">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Saturday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[5]->start));?>" id="satrday_start" name="start[]">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Saturday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[5]->end));?>" id="saturday_end" name="end[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-1 col-lg-1 col-form-label">Sunday</label>
                                                            <label class="col-xl-2 col-lg-2 col-form-label">Week OFF</label>
                                                            <div class="col-lg-1 col-md-1 col-sm-12">
                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                                    <label>
                                                                        <input type="checkbox" <?php echo ($schedule[6]->is_off == 1) ? "checked='checked'" : ""?> name="week_off_6[]">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Sunday start time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[6]->start));?>" id="sunday_start" name="start[]">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                <input placeholder="Sunday end time" class="form-control timepicker" type="text" value="<?php echo date('h:i A',strtotime($schedule[6]->end));?>" id="sunday_end" name="end[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-6 col-xl-6">
                                                                &nbsp;
                                                            </div>
                                                            <div class="col-lg-6 col-xl-6">
                                                                <div class="pull-right btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="save_schedule()">
                                                                    Save My Schedule
                                                                </div>
                                                            </div>
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