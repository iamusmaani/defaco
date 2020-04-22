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
                            <!--begin:: admin list-->
                            <div class="kt-portlet">
                                <div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">&nbsp;</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
                                            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#add_new">Add New</button>
										</div>
									</div>
								</div>
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
                                        <?php
                                        if(count($PageData)){
                                            foreach($PageData as $value){
                                        ?>
										<div class="kt-widget__top" id="admin-user-<?php echo $value['id'];?>">
											<div class="kt-widget__media kt-hidden-">
                                                <img src="assets/media/app/default_user.png" alt="image">
                                                <div class="text-center">
                                                    <a href="<?php echo base_url('administration/admin/view/'.$value['id'])?>"><i class="fa fa-eye text-success"></i></a>
                                                    <i class="fa fa-edit text-primary" onclick="edit_user(<?php echo $value['id']?>)"></i>
                                                    <i class="fa fa-times text-danger" onclick="delete_admin_user(<?php echo $value['id']?>)"></i>
                                                </div>
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
													<p class="kt-widget__username">
                                                        <?php print_r(ucfirst($value['first_name']));?> <?php print_r(ucfirst($value['last_name']));?>
													</p>
												</div>
												<div class="kt-widget__subhead">
													<a><i class="fa fa-envelope"></i><?php print_r($value['email']);?></a>
													<a><i class="fa fa-mobile"></i><?php print_r($value['mobile']);?></a>
                                                    <a><i class="fa fa-map-marker"></i>
                                                        <?php print_r(ucwords($value['address_line_1']).", ");?>
                                                        <?php
                                                            if($value['address_line_2'] != ""){
                                                                print_r(ucwords($value['address_line_2']).", ");
                                                            }
                                                        ?>
                                                        <?php echo get_city_name($value['city']);?>,
                                                        <?php echo get_state_name($value['state']);?>,
                                                        <?php echo get_country_name($value['country']);?>, 
                                                        <?php print_r($value['zip']);?>.
                                                    </a>
												</div>
												<div class="kt-widget__info">
													<div class="kt-widget__desc">
                                                        <strong>Role:</strong> 
                                                        <a href="/index.php/administration/role">
                                                        <?php
                                                            foreach($value['assigned_roles'] as $assigned_role){
                                                                echo get_role_name($assigned_role)." | ";
                                                            }
                                                        ?>
                                                        </a>
                                                        <br>
														<strong>Joined On: </strong><?php print_r(date('m/d/Y h:i a', strtotime($value['created_at'])));?>
													</div>
												</div>
											</div>
                                        </div>
                                        <br/>
                                        <?php
                                            }
                                        } else {
                                                echo "No Users Are There!";
                                        }
                                        ?>
                                    </div>
                                    <br/>
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

                            <!--begin:: add new user-->
                            <?php $this->load->view('admin/users/add');?>
                            <!--end:: add new user-->
                            <!--begin:: add new user-->
                            <?php $this->load->view('admin/users/edit');?>
                            <!--end:: add new user-->
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