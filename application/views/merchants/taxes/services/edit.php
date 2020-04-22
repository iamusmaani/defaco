<div id="edit" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="min-height: 590px;">
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit <small>Service</small>
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
                                    <a class="nav-link active" data-toggle="tab" id="edit-step-1-tab-head" href="#edit-step-1" role="tab" aria-selected="true">
                                        <i class="fa fa-anchor"></i> Step 1
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" id="edit-step-2-tab-head" href="#edit-step-2" role="tab" aria-selected="false">
                                        <i class="fa fa-balance-scale"></i> Step 2
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" id="edit-step-3-tab-head" href="#edit-step-3" role="tab" aria-selected="false">
                                        <i class="fa fa-beer"></i> Step 3
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" id="edit-step-4-tab-head" href="#edit-step-4" role="tab" aria-selected="false">
                                        <i class="fa fa-cube"></i> Step 4
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--ends:: tabs-->
                    <!--begin:: tab bodies-->
                    <div class="kt-portlet__body">
                        <form id="edit-service-form" action="members/service/save" method="POST" enctype="multipart/form-data">
                            <div class="tab-content">
                                <span id="errorEditForm" class="text-danger"></span>
                                <div class="tab-pane active" id="edit-step-1" role="tabpanel">
                                    <div class="kt-form kt-form--label-right">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input type="hidden" id="service_id" name="service_id">
                                                            <input class="form-control" type="text" onblur="checkEmpty(this,'Name', 'errorEditName')" value="" id="edit_name" name="name">
                                                            <span id="errorEditName" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <textarea class="form-control" name="description" id="edit_description" onblur="checkEmpty(this,'Description', 'errorEditDescription')"></textarea>
                                                            <span id="errorEditDescription" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Is Product?</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                                <label>
                                                                    <input type="checkbox" id="edit_is_product" name="is_product">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Price</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control" type="number" value="" id="edit_price" name="price" onblur="checkEmpty(this,'Price', 'errorEditPrice')">
                                                            <span id="errorEditPrice" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                        <div class="kt-form__actions text-right">
                                            <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-step-2-tab-head').trigger('click')">
                                                Next &gt;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit-step-2" role="tabpanel">
                                    <div class="kt-form kt-form--label-right">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Parent Category</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control" name="category" id="edit_cat_id">
                                                                <option value="0">No Category</option>
                                                                <?php
                                                                    foreach(get_active_categories() as $key => $value){
                                                                        echo "<option value='".$value->id."'>".$value->name."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Duration (Minutes)</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control" type="number" onblur="checkEmpty(this,'Duration', 'errorEditDuration')" value="" id="edit_duration" name="duration">
                                                            <span id="errorEditDuration" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Attributes</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select multiple="" class="form-control" name="attribute[]" id="edit_attributes">
                                                                <option value="0">No Attribute</option>
                                                                <?php
                                                                    foreach(get_active_attributes() as $key => $value){
                                                                        echo "<option value='".$value->id."'>".$value->name."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                        </div>
                                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                        <div class="kt-form__actions text-right">
                                            <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-step-1-tab-head').trigger('click')">
                                                &lt; Previous
                                            </div>
                                            <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-step-3-tab-head').trigger('click')">
                                                Next &gt;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit-step-3" role="tabpanel">
                                    <div class="kt-form kt-form--label-right">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Taxes</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select multiple="" class="form-control" name="taxes[]" id="edit_taxes">
                                                                <option value="0">No Attribute</option>
                                                                <?php
                                                                    foreach(get_active_tax() as $key => $value){
                                                                        echo "<option value='".$value->id."'>".$value->name."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Discounts</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select multiple="" class="form-control" name="discounts[]" id="edit_discounts">
                                                                <option value="0">No Discount</option>
                                                                <?php
                                                                    foreach(get_active_discount() as $key => $value){
                                                                        echo "<option value='".$value->id."'>".$value->name."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Status</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <span class="kt-switch">
                                                                <label>
                                                                    <input type="checkbox" checked="checked" name="status" id="edit_status">
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
                                            <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-step-2-tab-head').trigger('click')">
                                                &lt; Previous
                                            </div>
                                            <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-step-4-tab-head').trigger('click')">
                                                Next &gt;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit-step-4" role="tabpanel">
                                    <div class="kt-form kt-form--label-right">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="media-row"  id="media-1">
                                                        <div class="form-group row">
                                                            <h3>Product Images</h3>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <td>Sno</td>
                                                                        <td>File</td>
                                                                        <td>Preview</td>
                                                                    <tr>
                                                                </thead>
                                                                <thead id="service_media_tbl"></thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                        <div class="kt-form__actions text-right">
                                            <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit-step-3-tab-head').trigger('click')">
                                                &lt; Previous
                                            </div>
                                            <div onclick="save_service()" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="validateAddEditNewAdmin('add-admin-form');">
                                                Save Changes
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
        </div>
    </div>
</div>
