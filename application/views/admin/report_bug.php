<div id="report_bug" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="min-height: 590px;">
            <form id="add-responsibility-form" action="index.php/administration/responsibility/add" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Report <small>Bug</small>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">�</span>
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
                                                        <input class="form-control" type="text" onblur="checkEmpty(this,'Name', 'errorName')" value="" id="name" name="name">
                                                        <span id="errorName" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                        <textarea class="form-control" name="description" id="description" onblur="checkEmpty(this,'Description', 'errorDescription')"></textarea>
                                                        <span id="errorDescription" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Status</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--info">
                                                            <label>
                                                                <input type="checkbox" checked="checked" id="status" name="status">
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
                    <button type="button" onclick="add_new_responsibility();" class="btn btn-default btn-bold btn-upper btn-font-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
