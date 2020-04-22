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
                <!--begins:: add service -->
                <div class="kt-portlet kt-portlet--tabs">
                    <!--begin:: tabs-->
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" id="edit_service-tab-head" href="#edit_services" role="tab" aria-selected="true">
                                        <i class="fa fa-user"></i> Service
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" id="edit_pricing-tab-head" href="#edit_pricing" role="tab" aria-selected="true">
                                        <i class="fa fa-user"></i> Pricing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" id="edit_taxes-n-discounts-tab-head" href="#edit_taxes_n_discounts" role="tab" aria-selected="false">
                                        <i class="fa fa-envelope-open"></i> Taxes & Discounts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" id="edit_media-tab-head" href="#edit_media" role="tab" aria-selected="false">
                                        <i class="fa fa-wrench"></i> Media
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--ends:: tabs-->
                    <!--begin:: tab bodies-->
                    <div class="kt-portlet__body">
                        <form id="edit-service-form" action="members/service/save" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="service_id" name="id">
                            <div class="tab-content">
                                <span id="errorEditForm" class="text-danger"></span>
                                <div class="tab-pane active" id="edit_services" role="tabpanel">
                                    <div class="kt-form kt-form--label-right">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h3 class="kt-section__title kt-section__title-sm">Service Information:</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control" type="text" onblur="checkEmpty(this,'Name', 'errorEditName')" value="" name="name" id="service_edit_name">
                                                            <span id="errorEditName" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <textarea class="form-control" type="text" onblur="checkEmpty(this,'Description', 'errorEditDescription')" value="" name="description" id="service_edit_description"></textarea>
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
                                                    <div class="form-group form-group-last row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Duration</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control" type="number" onblur="checkEmpty(this,'Duration', 'errorEditDuration')" value="" id="service_edit_duration" name="service_duration">
                                                            <span id="errorEditDuration" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                        <div class="kt-form__actions text-right">
                                            <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit_pricing-tab-head').trigger('click')">
                                                Next &gt;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit_pricing" role="tabpanel">
                                    <div class="kt-form kt-form--label-right">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h3 class="kt-section__title kt-section__title-sm">Service Pricing:</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Price</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control" onblur="checkEmpty(this,'Price', 'errorEditPrice')" type="number" value="" id="service_edit_price" name="price">
                                                            <span id="errorEditPrice" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Attributes</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control" multiple="true" onblur="checkEmptySelect(this,'Attributes', 'errorAttributes')" name="attributes[]" id="service_edit_attributes">
                                                                <?php
                                                                    foreach(get_active_attributes() as $attributes){
                                                                        echo "<option value='".$attributes->id."'>".$attributes->name." (".$attributes->price.")</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            <span id="errorAttributes" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Category</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control" onblur="checkEmptySelect(this,'Category', 'errorCategory')" name="category[]" id="service_edit_category">
                                                                <?php
                                                                    foreach(get_active_categories() as $category){
                                                                        echo "<option value='".$category->id."'>".$category->name."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            <span id="errorCategory" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                        </div>
                                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                        <div class="kt-form__actions text-right">
                                            <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit_service-tab-head').trigger('click')">
                                                &lt; Previous
                                            </div>
                                            <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit_taxes-n-discounts-tab-head').trigger('click')">
                                                Next &gt;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit_taxes_n_discounts" role="tabpanel">
                                    <div class="kt-form kt-form--label-right">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h3 class="kt-section__title kt-section__title-sm">Service Taxes</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Tax(es)</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control" multiple="true" onblur="checkEmptySelect(this,'Taxes', 'errorTaxes')" name="taxes[]" id="service_edit_taxes">
                                                                <?php
                                                                    foreach(get_active_tax() as $taxes){
                                                                        $symbol = (($taxes->is_percentage == 1) ? "%" : "$");
                                                                        echo "<option value='".$taxes->id."'>".$symbol." ".$taxes->name."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            <span id="errorTaxes" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h3 class="kt-section__title kt-section__title-sm">Select Discount</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Discount(s)</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control" multiple="true" onblur="checkEmptySelect(this,'Discounts', 'errorDiscounts')" name="discounts[]" id="service_edit_discounts">
                                                                <?php
                                                                    foreach(get_active_discount() as $discounts){
                                                                        $symbol = (($discounts->is_percentage == 1) ? "%" : "$");
                                                                        echo "<option value='".$discounts->id."'>".$symbol." ".$discounts->name."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            <span id="errorDiscounts" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                        <div class="kt-form__actions text-right">
                                            <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit_pricing-tab-head').trigger('click')">
                                                &lt; Previous
                                            </div>
                                            <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit_media-tab-head').trigger('click')">
                                                Next &gt;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit_media" role="tabpanel">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">Upload Service/ Product Image</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Service /  Product Image</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="file" class="form-control" name="media[]" id="service_edit_media">
                                                        <br>
                                                        <div id="service_media_tbl"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">Service/ Product Status</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Active / In-Active</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <span class="kt-switch">
                                                            <label>
                                                                <input type="checkbox" checked="checked" name="status" id="service_edit_status">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                                <div class="kt-form__actions text-right">
                                                    <div class="btn btn-default btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="$('#edit_taxes-n-discounts-tab-head').trigger('click')">
                                                        &lt; Previous
                                                    </div>
                                                    <div class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" onclick="save_service()">
                                                        Save Changes &gt;
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
                <!--ends:: add service-->
            </div>
        </div>
    </div>
</div>