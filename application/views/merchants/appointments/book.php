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
                            <!--begin:: book appointment form -->
                            <div class="kt-portlet kt-portlet--tabs">
                                <!--begin:: tabs-->
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-toolbar">
                                        <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" id="step-1-tab-head" href="#step-1" role="tab" aria-selected="true">
                                                    <i class="fa fa-anchor"></i> Customer Information
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" id="step-2-tab-head" href="#step-2" role="tab" aria-selected="false">
                                                    <i class="fa fa-balance-scale"></i> Select Products / Services
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" id="step-3-tab-head" href="#step-3" role="tab" aria-selected="false">
                                                    <i class="fa fa-beer"></i> Appointment Information
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" id="step-4-tab-head" href="#step-4" role="tab" aria-selected="false">
                                                    <i class="fa fa-cube"></i> Confirm Booking
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--ends:: tabs-->
                                <!--begin:: tab bodies-->
                                <div class="kt-portlet__body">
                                    <form id="add-appointment-form" action="members/appointment/process_booking" method="POST">
                                        <div class="tab-content">
                                            <span id="errorFormError" class="text-danger"></span>
                                            <div class="tab-pane active" id="step-1" role="tabpanel">
                                                <div class="kt-form kt-form--label-right">
                                                    <div class="kt-form__body">
                                                        <div class="kt-section kt-section--first">
                                                            <div class="kt-section__body">
                                                                <h2 class="text-center">Record Customer</h2>
                                                                <br>
                                                                <div class="form-group row">
                                                                    <?php
                                                                        $search_by = get_merchant_configurations('CustomerSearchBy');
                                                                    ?>
                                                                    <div class="col-lg-6 col-xl-12">
                                                                        <label>Phone</label>
                                                                        <?php
                                                                            if($search_by == "Phone"){
                                                                        ?>
                                                                        <input class="form-control" onkeyup="searchCustomerByPhone(this.value);" type="text" onblur="checkEmpty(this,'Phone', 'errorPhone')" id="phone" name="phone" placeholder="Customer Phone">
                                                                        <?php
                                                                            } else {
                                                                        ?>
                                                                        <input class="form-control" type="text" onblur="checkEmpty(this,'Phone', 'errorPhone')" id="phone" name="phone" placeholder="Customer Phone">
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <span id="errorPhone" class="text-danger"></span>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-12">
                                                                        <label>Email</label>
                                                                        <?php
                                                                            if($search_by == "Email"){
                                                                        ?>
                                                                        <input class="form-control" type="text" onkeyup="searchCustomerByEmail(this.value)" onblur="checkEmpty(this,'Email', 'errorEmail')" id="email" name="email" placeholder="Customer Email">
                                                                        <?php
                                                                            } else {
                                                                        ?>
                                                                        <input class="form-control" type="text" onblur="checkEmpty(this,'Email', 'errorEmail')" id="email" name="email" placeholder="Customer Email">
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <span id="errorEmail" class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6 col-xl-12">
                                                                        <label>First Name</label>
                                                                        <input class="form-control" type="text" onblur="checkEmpty(this,'First Name', 'errorFirstName')" id="firstName" name="firstName" placeholder="Customer First Name">
                                                                        <span id="errorFirstName" class="text-danger"></span>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-12">
                                                                        <label>Last Name</label>
                                                                        <input class="form-control" type="text" onblur="checkEmpty(this,'Last Name', 'errorLastName')" id="lastName" name="lastName" placeholder="Customer Last Name">
                                                                        <span id="errorLastName" class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        &nbsp;
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <div class="pull-right btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#step-2-tab-head').trigger('click')">
                                                                            Next &gt;
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="step-2" role="tabpanel">
                                                <div class="kt-form kt-form--label-right">
                                                    <div class="kt-form__body">
                                                        <div class="kt-section kt-section--first">
                                                            <div class="kt-section__body">
                                                                <h2 class="text-center">Choose Products and Services</h2>
                                                                <?php
                                                                    $services = get_services($this->session->userdata('merchant_information')->id);
                                                                ?>
                                                                <br/>
                                                                <div class="form-group row">
                                                                    <div class="container-fluid">
                                                                        <table class="table table-bordered table-responsive">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Type</th>
                                                                                    <th>Image</th>
                                                                                    <th>Name</th>
                                                                                    <th>Price ($)</th>
                                                                                    <th>Duration (Minutes)</th>
                                                                                    <th>Tax(s)</th>
                                                                                    <th>Discount(s)</th>
                                                                                    <th>Add-On(s)</th>
                                                                                    <th>Worth</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                    if(count($services)>0){
                                                                                        foreach($services as $k=>$v ){
                                                                                ?>
                                                                                <tr>
                                                                                    <td><input onchange="add_appointment_services(this)" type="checkbox" value="<?php echo $v->id?>" name="service_id[]" id="service_id_<?php echo $v->id?>"/></td>
                                                                                    <td><?php echo $v->is_product == 1? "Product" : "Service"?></td>
                                                                                    <td>
                                                                                        <?php 
                                                                                            $media = get_service_media($v->id);
                                                                                            if(count($media) > 0){
                                                                                        ?>
                                                                                        <img src="uploads/services/<?php echo $v->id?>/<?php echo $media[0]->media;?>" height="50">
                                                                                        <?php
                                                                                            } else {
                                                                                        ?>
                                                                                        <img src="uploads/services/default.png" height="50">
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                                        
                                                                                    </td>
                                                                                    <td><?php echo $v->name?></td>
                                                                                    <td class="text-right">$<?php echo $v->price?></td>
                                                                                    <td class="text-right"><?php echo $v->duration?></td>
                                                                                    <td class="text-right">
                                                                                        <?php
                                                                                            // get service tax
                                                                                            $total_service_tax = 0;
                                                                                            $taxes = get_service_tax($v->id);
                                                                                            foreach($taxes as $key=>$val){
                                                                                                if($val->is_percentage){
                                                                                                    $total_service_tax = $total_service_tax + ($val->amount / 100);
                                                                                                } else {
                                                                                                    $total_service_tax = $total_service_tax + $val->amount;
                                                                                                }
                                                                                            }
                                                                                            echo "$".$total_service_tax;
                                                                                        ?>
                                                                                    </td>
                                                                                    <td class="text-right">
                                                                                        <?php
                                                                                            // get service tax
                                                                                            $total_service_discount = 0;
                                                                                            $discounts = get_service_discount($v->id);
                                                                                            foreach($discounts as $key=>$val){
                                                                                                if($val->is_percentage){
                                                                                                    $total_service_discount = $total_service_discount + ($val->amount / 100);
                                                                                                } else {
                                                                                                    $total_service_discount = $total_service_discount + $val->amount;
                                                                                                }
                                                                                            }
                                                                                            echo "$".$total_service_discount;
                                                                                        ?>
                                                                                    </td>
                                                                                    <td><a style="cursor: pointer;" class="text-success" onclick="include_addons(<?php echo $v->id;?>)"><i class="fa fa-plus"></i> Include</a></td>
                                                                                    <td>
                                                                                        <?php
                                                                                            $net_price = ($v->price + $total_service_tax) - $total_service_discount;
                                                                                        ?>
                                                                                        <p class="text-right"><del>$<?php echo number_format($v->price,2,".",",")?></del></p>
                                                                                        <h4 class="text-right">$<?php echo number_format($net_price,2,".",",")?></h4>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#step-1-tab-head').trigger('click')">
                                                                            &lt; Previous
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u pull-right" onclick="$('#step-3-tab-head').trigger('click')">
                                                                            Next &gt;
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="step-3" role="tabpanel">
                                                <div class="kt-form kt-form--label-right">
                                                    <div class="kt-form__body">
                                                        <div class="kt-section kt-section--first">
                                                            <div class="kt-section__body">
                                                                <h2 class="text-center">Make an appointment</h2>
                                                                <br/>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-4 col-lg-4 col-form-label">Payment Method</label>
                                                                    <div class="col-lg-4 col-xl-4">
                                                                        <div class="input-group date">
                                                                            <select class="form-control" id="payment_method">
                                                                                <?php
                                                                                    foreach(get_payment_method() as $k => $v){
                                                                                        echo "<option value='".$v->id."'>".$v->name."</option>";
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">
                                                                                    <i class="la la-usd"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <span id="errorPayMethod" class="text-danger"></span>
                                                                    </div>
                                                                    <div class="col-lg-4 col-xl-4 col-form-label text-info">
                                                                        Select Appointment Payment Method
                                                                    </div>
                                                                    <br/><br/><br/>
                                                                    <label class="col-xl-4 col-lg-4 col-form-label">Date</label>
                                                                    <div class="col-lg-4 col-xl-4">
                                                                        <div class="input-group date">
                                                                            <input type="text" class="form-control datepicker" readonly="" onchange="pick_appointment_time(this)" placeholder="Select date" id="appointment_date">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">
                                                                                    <i class="la la-calendar-check-o"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <span id="errorAppointmentDate" class="text-danger"></span>
                                                                    </div>
                                                                    <div class="col-lg-4 col-xl-4 col-form-label text-info">
                                                                        Select date to book time slots.
                                                                    </div>
                                                                    <br/>
                                                                    <hr/>
                                                                </div>
                                                                <div class="form-group row" id="appointment_time_picker" style="display:none;">
                                                                    <div class="col-lg-3 col-xl-3">
                                                                        <label>Start Time</label>
                                                                        <input class="form-control timepicker" id="start_time" onblur="checkEmpty(this,'Start Time', 'errorStartTime')" placeholder="Appointment from " type="text" name="start_time"/>
                                                                        <span id="errorStartTime" class="text-danger"></span>
                                                                    </div>
                                                                    <div class="col-lg-3 col-xl-3">
                                                                        <label>End Time</label>
                                                                        <input class="form-control timepicker" id="end_time" onblur="checkEmpty(this,'End Time', 'errorEndTime')" placeholder="Appointment from " type="text" name="end_time"/>
                                                                        <span id="errorEndTime" class="text-danger"></span>
                                                                    </div>
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                                        <strong>Booked Slots</strong><br><br>
                                                                        Select available time slot.<br>
                                                                        <span class="text-danger"> Red </span> are already booked slots.<br>
                                                                    </label>
                                                                    <div class="col-lg-3 col-xl-3">
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane active" id="kt_widget2_tab1_content">
                                                                                <div class="kt-widget2" id="appointment_list">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#step-2-tab-head').trigger('click')">
                                                                            &lt; Previous
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u pull-right" onclick="validate_booking_data()">
                                                                            Next &gt;
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="step-4" role="tabpanel">
                                                <div class="kt-form kt-form--label-right">
                                                    <div class="kt-form__body">
                                                        <div class="kt-section kt-section--first">
                                                            <div class="kt-section__body">
                                                                <h2 class="text-center">Booking Summary</h2>
                                                                <br>
                                                                <div class="form-group row" id="booking_summary"></div>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#step-3-tab-head').trigger('click')">
                                                                            &lt; Previous
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <div onclick="make_an_appointment()" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u pull-right" onclick="validateAddEditNewAdmin('add-admin-form');">
                                                                            Confirm booking
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--begin:: add form modal-->
                                            <?php $this->load->view('merchants/appointments/include_addons');?>
                                            <!--ends:: add form modal-->
                                        </div>
                                    </form>
                                </div>
                                <!--ends:: tab bodies-->
							</div>
                            <!--end:: book appointment form-->
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