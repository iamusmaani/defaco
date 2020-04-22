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
                            <!--begin:: admin list-->
                            <div class="kt-portlet">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
											<div class="kt-widget__media kt-hidden-">
												<img src="assets/media/users/100_1.jpg" alt="image">
											</div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
													<a href="#" class="kt-widget__username">
														Shahrukh Charlie
														<i class="flaticon2-correct kt-font-success"></i>
													</a>
												</div>
												<div class="kt-widget__subhead">
													<a href="#"><i class="fa fa-envelope"></i>shahrukhk@defaco.com</a>
													<a href="#"><i class="fa fa-mobile"></i>+91-9927-61766</a>
													<a href="#"><i class="fa fa-map-marker"></i>Sector 12, Noida, India. 201301</a>
												</div>
												<div class="kt-widget__info">
													<div class="kt-widget__desc">
														<strong>Role:</strong> Developer<br>
														<strong>Responsibility:</strong> Manage Merchants, UI Enhancements, Feature Implementations.<br>
														<strong>Joined On: </strong>12-12-2020
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <!--end:: admin list-->

                            <!--begin:: pagination-->
                            <div class="kt-portlet">
                                <div class="kt-portlet__body">
                                    <!--begin: Pagination-->
                                    <div class="kt-pagination kt-pagination--brand">
                                        <ul class="kt-pagination__links">
                                            <li class="kt-pagination__link--first">
                                                <a href="#"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
                                            </li>
                                            <li class="kt-pagination__link--next">
                                                <a href="#"><i class="fa fa-angle-left kt-font-brand"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">...</a>
                                            </li>
                                            <li>
                                                <a href="#">29</a>
                                            </li>
                                            <li>
                                                <a href="#">30</a>
                                            </li>
                                            <li class="kt-pagination__link--active">
                                                <a href="#">31</a>
                                            </li>
                                            <li>
                                                <a href="#">32</a>
                                            </li>
                                            <li>
                                                <a href="#">33</a>
                                            </li>
                                            <li>
                                                <a href="#">34</a>
                                            </li>
                                            <li>
                                                <a href="#">...</a>
                                            </li>
                                            <li class="kt-pagination__link--prev">
                                                <a href="#"><i class="fa fa-angle-right kt-font-brand"></i></a>
                                            </li>
                                            <li class="kt-pagination__link--last">
                                                <a href="#"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
                                            </li>
                                        </ul>
                                        <div class="kt-pagination__toolbar">
                                            <select class="form-control kt-font-brand" style="width: 60px">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            <span class="pagination__desc">
                                                Displaying XX of XXX records
                                            </span>
                                        </div>
                                    </div>
                                    <!--end: Pagination-->
                                </div>
                            </div>
                            <!--end:: pagination-->
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