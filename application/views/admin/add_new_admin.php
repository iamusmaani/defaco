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
				<?php $this->load->view('admin/components/side_menu');?>
                <!-- end:: Aside -->
                
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<?php $this->load->view('admin/components/header');?>
					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Subheader -->
						<?php $this->load->view('admin/components/breadcrumps');?>
						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <!--####-->
                            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                                <!-- begin:: Content -->
                                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                                    <div class="kt-portlet kt-portlet--tabs">
                                        <!--begin:: tabs-->
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" id="personal-tab-head" href="#personal" role="tab" aria-selected="true">
                                                            <i class="fa fa-user"></i> Personal
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" id="communication-tab-head" href="#communication" role="tab" aria-selected="false">
                                                            <i class="fa fa-envelope-open"></i> Communication
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" id="settings-tab-head" href="#admin-settings" role="tab" aria-selected="false">
                                                            <i class="fa fa-wrench"></i> Settings
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--ends:: tabs-->
                                        <!--begin:: tab bodies-->
                                        <div class="kt-portlet__body">
                                            <form id="add-admin-form" action="index.php/administration/admin/add_new" method="POST">
                                                <div class="tab-content">
                                                    <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                                                        <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                                        <div class="alert-text">
                                                            Error messages 1. <br>
                                                            Error messages 1. <br>
                                                        </div>
                                                        <div class="alert-close">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><i class="la la-close"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                                        <div class="kt-form kt-form--label-right">
                                                            <div class="kt-form__body">
                                                                <div class="kt-section kt-section--first">
                                                                    <div class="kt-section__body">
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Personal Information:</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input class="form-control" type="text" onblur="checkEmpty(this)" value="" id="first_name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input class="form-control" type="text" onblur="checkEmpty(this)" value="" id="last_name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                                    <input type="text" class="form-control" onblur="ValidateEmail(this)" value="" placeholder="Email" aria-describedby="basic-addon1" id="email">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group form-group-last row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Mobile</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                                    <input type="text" class="form-control" onblur="validatePhone(this)" value="" placeholder="Mobile" aria-describedby="basic-addon1" id="mobile">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                                            <div class="kt-form__actions text-right">
                                                                <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#communication-tab-head').trigger('click')">
                                                                    Next >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="communication" role="tabpanel">
                                                        <div class="kt-form kt-form--label-right">
                                                            <div class="kt-form__body">
                                                                <div class="kt-section kt-section--first">
                                                                    <div class="kt-section__body">
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Communication Information:</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Address Line 1</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <textarea class="form-control" type="text" onblur="checkEmpty(this)" value="" id="address_line_1"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Address Line 2</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <textarea class="form-control" type="text" value="" id="address_line_2"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Country</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <select class="form-control" onblur="checkEmptySelect(this)" id="country">
                                                                                    <option value="0">Select Country</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">State</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <select class="form-control" onblur="checkEmptySelect(this)" id="state">
                                                                                    <option value="0">Select State</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">City</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <select class="form-control" onblur="checkEmptySelect(this)" id="city">
                                                                                    <option value="0">Select City</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Zipcode</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input type="text" onblur="checkEmpty(this)" class="form-control" id="zip_code"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                                                
                                                            </div>
                                                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                                            <div class="kt-form__actions text-right">
                                                                <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#personal-tab-head').trigger('click')">
                                                                    < Previous
                                                                </div>
                                                                <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#settings-tab-head').trigger('click')">
                                                                    Next >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="admin-settings" role="tabpanel">
                                                        <div class="kt-form kt-form--label-right">
                                                            <div class="kt-form__body">
                                                                <div class="kt-section kt-section--first">
                                                                    <div class="kt-section__body">
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Choose User Password</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Password</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input type="password" class="form-control" id="password" placeholder="Choose password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Role</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Select Admin Role</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <select type="role" class="form-control">
                                                                                    <option>Select Admin User Role</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Account Status</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Active / In-Active</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <span class="kt-switch">
                                                                                    <label>
                                                                                        <input type="checkbox" checked="checked" name="active_inactive">
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                                            <div class="kt-form__actions text-right">
                                                                <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#communication-tab-head').trigger('click')">
                                                                    < Previous
                                                                </div>
                                                                <div class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="validateAddEditNewAdmin('add-admin-form');">
                                                                    Add New Admin
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
                            <!--####-->
                        </div>
						<!-- end:: Content -->
					</div>
					<!-- begin:: Footer -->
					<?php $this->load->view('admin/components/footer');?>
					<!-- end:: Footer -->
				</div>
			</div>
		</div>
		<!-- end:: Page -->

		<!-- begin::Scrolltop -->
		<?php $this->load->view('admin/components/scroll_to_top');?>
		<!-- end::Scrolltop -->

        <!-- begin:: common scripts-->
        <?php $this->load->view('admin/components/common_scripts');?>
        <!-- end:: common scripts -->
	</body>
	<!-- end::Body -->
</html>