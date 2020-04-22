<div id="suggest_feature" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="min-height: 590px;">
            <form id="suggest-feature-form" action="index.php/administration/responsibility/add" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Suggest <small>Feature</small>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--begins:: suggest feature -->
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            <div class="container">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" type="text" onblur="checkEmpty(this,'Feature Name', 'errorFeatureName')" value="" id="feature_name" name="feature_name">
                                    <span id="errorFeatureName" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" type="text" onblur="checkEmpty(this,'Description', 'errorFeatureDescription')" value="" id="feature_description" name="feature_description">
                                    <span id="errorFeatureDescription" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Supported Files in ZIP</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" type="file" onblur="checkEmpty(this,'Supported Files', 'errorSupportedFiles')" value="" id="feature_files" name="feature_files">
                                    <span id="errorSupportedFiles" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6 col-xl-6">
                                    <button type="button" class="btn btn-clean btn-bold btn-upper btn-font-sm col-sm-12" data-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <button type="button" onclick="" class="btn btn-default btn-bold btn-upper btn-font-sm col-sm-12">
                                        Add
                                    </button>       
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--ends:: suggest feature-->
                </div>
            </form>
        </div>
    </div>
</div>
