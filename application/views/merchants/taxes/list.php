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
                            <!--begin:: categories list-->
                            <div class="kt-portlet">
                                <div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">&nbsp;</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
                                            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#add_new">Add New</button>
										</div>
									</div>
								</div>
                                <div class="kt-portlet__head kt-portlet__head--lg">
									<table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th class="text-center">Amount</th>
                                                <th>Status</th>
                                                <th class="text-center" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                foreach ($taxes as $value){ 
                                                $i++;
                                            ?>
                                                <tr id="category-<?php echo $value->id ?>">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $value->name ?></td>
                                                    <td><?php echo $value->description ?></td>
                                                    <td class="text-right"><?php echo $value->is_percentage == 0 ? "<b>$</b> ".$value->amount : "<b>%</b> ".$value->amount ?></td>
                                                    <td><?php echo $value->status == 1 ? "<span class='text-success'>Active</span>" : "<span class='text-danger'>In-Active</span>" ?></td>
                                                    <td align="center">
                                                        <a href="javascrip:" onclick="get_tax_to_edit(<?php echo $value->id ?>);">
                                                            <i class="fa fa-edit text-info"></i>
                                                        </a>
                                                    </td>
                                                    <td align="center">
                                                        <a href="javascrip:" onclick="delete_tax(<?php echo $value->id ?>);">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
								</div>
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <p><?php echo $links; ?></p>
                                </div>
							</div>
                            <!--end:: categories list-->
                            <!--begin:: add form modal-->
                            <?php $this->load->view('merchants/taxes/add');?>
                            <!--ends:: add form modal-->
                            <!--begin:: add form modal-->
                            <?php $this->load->view('merchants/taxes/edit');?>
                            <!--ends:: add form modal-->
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