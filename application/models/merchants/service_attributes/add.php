<div id="add_new" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="min-height: 590px;">
            <form id="add-attribute-form" action="/members/attribute/add" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Add New <small>Service Attribute</small>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--begins:: add responsibility -->
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                    <span id="add_new_form"></span>
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" onblur="checkEmpty(this,'Name', 'errorAddName')" value="" id="add_name" name="name">
                                                        <span id="errorAddName" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                        <textarea class="form-control" name="description" id="add_description" onblur="checkEmpty(this,'Description', 'errorAddDescription')"></textarea>
                                                        <span id="errorAddDescription" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Have Price?</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                            <label>
                                                                <input type="checkbox" id="add_have_price" name="have_price">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Is Product?</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                            <label>
                                                                <input type="checkbox" id="add_id_product" name="is_product">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <span id="add_new_form"></span>
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Price</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="number" value="" id="add_price" name="price">
                                                        <span id="errorAddPrice" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Tax</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select class="form-control" name="tax[]" id="tax_id">
                                                            <option value="0">No Tax</option>
                                                            <?php
                                                                foreach(get_active_tax() as $key => $value){
                                                                    echo "<option value='".$value->id."'>".$value->name.( $value->is_percentage == 0 ? " ( $ ".$value->amount." )" : " ( % ".$value->amount." )" )."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Discount</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select class="form-control" name="discount[]" id="discount">
                                                            <option value="0">No Discount</option>
                                                            <?php
                                                                foreach(get_active_discount() as $key => $value){
                                                                    echo "<option value='".$value->id."'>".$value->name.( $value->is_percentage == 0 ? " ( $ ".$value->amount." )" : " ( % ".$value->amount." )" )."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <span id="add_new_form"></span>
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Duration (Minutes)</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="number" onblur="checkEmpty(this,'Duration', 'errorAddDuration')" value="" id="add_duration" name="duration">
                                                        <span id="errorAddDuration" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Status</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                            <label>
                                                                <input type="checkbox" checked="checked" id="add_status" name="status">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--ends:: add responsibility-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-clean btn-bold btn-upper btn-font-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="add_attribute();" class="btn btn-default btn-bold btn-upper btn-font-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>