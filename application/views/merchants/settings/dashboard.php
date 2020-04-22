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
                            <!--begin:: settings card-->
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                    <div class="kt-portlet">
                                        <div class="kt-portlet kt-portlet--skin-solid kt-bg-danger">
                                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                                <div class="kt-portlet__head-label">
                                                    <span class="kt-portlet__head-icon">
                                                        <i class="fa fa-wrench"></i>
                                                    </span>
                                                    <a href="/members/setting/schedule/">
                                                        <h4 class="kt-portlet__head-title">
                                                            My Schedule
                                                        </h4>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3">
                                    <div class="kt-portlet">
                                        <div class="kt-portlet kt-portlet--skin-solid kt-bg-primary">
                                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                                <div class="kt-portlet__head-label">
                                                    <span class="kt-portlet__head-icon">
                                                        <i class="fa fa-cog"></i>
                                                    </span>
                                                    <a href="/members/setting/holiday/">
                                                        <h4 class="kt-portlet__head-title">
                                                            My Holidays
                                                        </h4>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3">
                                    <div class="kt-portlet">
                                        <div class="kt-portlet kt-portlet--skin-solid kt-bg-success">
                                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                                <div class="kt-portlet__head-label">
                                                    <span class="kt-portlet__head-icon">
                                                        <i class="fa fa-cogs"></i>
                                                    </span>
                                                    <a href="/members/setting/configuration/">
                                                        <h4 class="kt-portlet__head-title">
                                                            Configurations
                                                        </h4>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3">
                                    <div class="kt-portlet">
                                        <div class="kt-portlet kt-portlet--skin-solid kt-bg-info">
                                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                                <div class="kt-portlet__head-label">
                                                    <span class="kt-portlet__head-icon">
                                                        <i class="fa fa-credit-card"></i>
                                                    </span>
                                                    <a href="/members/setting/payment_methods/">
                                                        <h4 class="kt-portlet__head-title">
                                                            Payment Methods
                                                        </h4>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                    <div class="kt-portlet">
                                        <div class="kt-portlet kt-portlet--skin-solid kt-bg-success">
                                            <div class="kt-portlet__head kt-portlet__head--noborder">
                                                <div class="kt-portlet__head-label">
                                                    <span class="kt-portlet__head-icon">
                                                        <i class="fa fa-heart"></i>
                                                    </span>
                                                    <a href="/members/promocode/">
                                                        <h4 class="kt-portlet__head-title">
                                                            Promo Codes
                                                        </h4>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end:: settings card-->
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