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
                            
                            <div class="kt-portlet kt-portlet--tabs">
                                <!--begin:: list table-->
                                <div class="kt-portlet__body">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Description</th>
                                                <th class="text-center">Voice Call</th>
                                                <th class="text-center">Received On</th>
                                                <th class="text-center">Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($enquiries as $value){
                                            ?>
                                            <tr id="role-<?php print_r($value->id);?>">
                                                <td class="text-center"><?php print_r($value->id);?></td>
                                                <td><?php print_r(ucfirst($value->name));?></td>
                                                <td><?php print_r($value->email);?></td>
                                                <td><?php print_r($value->phone == 0? "N/A" : $value->phone);?></td>
                                                <td><?php print_r(ucfirst($value->description));?></td>
                                                <td class="text-center"><?php echo $value->call_allowed == 0 ? "<span class='text-danger'>No</span>" : "<span class='text-success'>Yes</span>";?></td>
                                                <td class="text-center"><?php print_r(date('m/d/Y h:i A',strtotime($value->created_at)));?></td>
                                                <td class="text-center"><?php echo $value->status == 0 ? "<span class='text-danger'>Not Answered</span>" : "<span class='text-success'>Answered</span>";?></td>
                                                <td align="center">
                                                    <a onclick="respond_enquiry(<?php print_r($value->id);?>);"><i class="fa fa-envelope text-info"></i></a> &nbsp;
                                                    <a onclick="delete_enquiry(<?php print_r($value->id);?>);"><i class="fa fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--ends:: list table-->
                                <!--begin:: add form modal-->
                                <?php $this->load->view('admin/roles/add');?>
                                <!--ends:: add form modal-->
                                <!--begins:: edit form modal-->
                                <?php $this->load->view('admin/roles/edit');?>
                                <!--ends:: edit form modal-->
                                <!--begins:: view responsibility modal-->
                                <?php $this->load->view('admin/roles/view_roles_responsibility');?>
                                <!--ends:: view responsibility modal-->
                            </div>
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