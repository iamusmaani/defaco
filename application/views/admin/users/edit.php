<div id="edit" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="min-height: 590px;">
            <form id="edit-user-form" action="administration/admin/edit" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit <small>User</small>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--begins:: add responsibility -->
                    <div class="kt-portlet kt-portlet--tabs">
                        <!--begin:: tabs-->
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-toolbar">
                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" id="edit-personal-tab-head" href="#edit_personal" role="tab" aria-selected="true">
                                            <i class="fa fa-user"></i> Personal
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" id="edit-communication-tab-head" href="#edit_communication" role="tab" aria-selected="false">
                                            <i class="fa fa-envelope-open"></i> Communication
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" id="edit-settings-tab-head" href="#edit_admin-settings" role="tab" aria-selected="false">
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
                                    <span id="errorFormError" class="text-danger errorFormError"></span>
                                    <div class="tab-pane active" id="edit-personal" role="tabpanel">
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
                                                                <input type="hidden" name="user_id" id="user_id">
                                                                <input class="form-control" type="text" onblur="checkEmpty(this,'First Name', 'errorEditFirstName')" value="" name="first_name" id="edit_first_name">
                                                                <span id="errorEditFirstName" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" onblur="checkEmpty(this,'Last Name', 'errorEditLastName')" value="" name="last_name" id="edit_last_name">
                                                                <span id="errorEditLastName" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                    <input type="text" class="form-control" onblur="validateEmail(this,'Email','errorEditEmail')" value="" placeholder="Email" aria-describedby="basic-addon1" name="email" id="edit_email">
                                                                </div>
                                                                <span id="errorEditEmail" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group-last row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Mobile</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                    <input type="text" class="form-control" onblur="validatePhone(this,'Mobile','errorEditMobile')" value="" placeholder="Mobile" aria-describedby="basic-addon1" name="mobile" id="edit_mobile">
                                                                </div>
                                                                <span id="errorEditMobile" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                            <div class="kt-form__actions text-right">
                                                <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-communication-tab-head').trigger('click')">
                                                    Next &gt;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="edit_communication" role="tabpanel">
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
                                                                <textarea class="form-control" type="text" onblur="checkEmpty(this,'Address Line 1', 'errorEditAddressLine1')" value="" name="address_line_1" id="edit_address_line_1"></textarea>
                                                                <span id="errorEditAddressLine1" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Address Line 2</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <textarea class="form-control" type="text" value="" name="address_line_2" id="edit_address_line_2"></textarea>
                                                                <span id="errorEditAddressLine2" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Country</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <select class="form-control country" onchange="getStates(this,'Country','errorEditCountry');" onblur="checkEmptySelect(this,'Country', 'errorEditCountry')" onchange="get_states()" name="country" id="edit_country">
                                                                    <option value='0'>Select Country</option>
                                                                    <?php
                                                                        foreach(get_countries() as $countries){
                                                                            echo "<option value='".$countries->id."'>".$countries->name." (".$countries->sortname.")</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <span id="errorEditCountry" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">State</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <select class="form-control state" onchange="getCities(this,'State','errorEditState');" onblur="checkEmptySelect(this, 'State', 'errorEditState')" name="state" id="edit_state">
                                                                    <option value="0">Select State</option>
                                                                </select>
                                                                <span id="errorEditState" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">City</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <select class="form-control city" onblur="checkEmptySelect(this, 'City', 'errorEditCity')" name="city" id="edit_city">
                                                                    <option value="0">Select City</option>
                                                                </select>
                                                                <span id="errorEditCity" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Zipcode</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input type="text" onblur="checkEmpty(this, 'Zip','errorEditZipCode')" class="form-control" name="zip_code" id="edit_zip_code">
                                                                <span id="errorEditZipCode" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                            </div>
                                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                            <div class="kt-form__actions text-right">
                                                <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-personal-tab-head').trigger('click')">
                                                    &lt; Previous
                                                </div>
                                                <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-settings-tab-head').trigger('click')">
                                                    Next &gt;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="edit_admin-settings" role="tabpanel">
                                        <div class="kt-form kt-form--label-right">
                                            <div class="kt-form__body">
                                                <div class="kt-section kt-section--first">
                                                    <div class="kt-section__body">
                                                        <div class="row">
                                                            <label class="col-xl-3"></label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <h3 class="kt-section__title kt-section__title-sm">Reset User Password</h3>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Old Password</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input type="password" class="form-control" name="password" id="edit_old_password" placeholder="Old password">
                                                                <span id="errorEditOldPassword" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input type="password"  name="confirm_password" class="form-control" id="edit_new_password" placeholder="New password">
                                                                <span id="errorEditNewPassword" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-xl-3"></label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <h3 class="kt-section__title kt-section__title-sm">Role</h3>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Select User Role</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <select onblur="checkEmptySelect(this, 'User Role', 'errorEditRoles')" name="roles[]" id="edit_roles" type="role" class="form-control" multiple="">
                                                                    <?php
                                                                        foreach($Roles as $row){
                                                                            echo "<option value='".$row->id."'>".$row->name."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <span id="errorEditRoles" class="text-danger"></span>
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
                                                                        <input type="checkbox" checked="checked" name="active_inactive" id="edit_status">
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
                                                <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-communication-tab-head').trigger('click')">
                                                    &lt; Previous
                                                </div>
                                                <div onclick="save_user()" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="validateAddEditNewAdmin('add-admin-form');">
                                                    Save Information
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--ends:: tab bodies-->
                    </div>
                    <!--ends:: add responsibility-->
                </div>
            </form>
        </div>
    </div>
</div>
