let validationErrors = false;

function process_signup() {
    let signupForm = document.forms['merchant-signup'];

    checkEmpty(signupForm['first_name'], "First Name", "errorFName");
    checkEmpty(signupForm['last_name'], "Last Name", "errorLName");
    checkEmpty(signupForm['email'], "Email", "errorEmail");
    validateEmail(signupForm['email'], "Email", "errorEmail");
    checkEmpty(signupForm['phone'], "Phone", "errorPhone");
    validatePhone(signupForm['phone'], "Phone", "errorPhone");
    checkEmpty(signupForm['company_name'], "Business Name", "errorBusiness");
    checkEmpty(signupForm['password'], "Password", "errorPassword");
    
    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#merchant-signup").submit();
    }
}

function process_login(){
    let loginForm = document.forms['merchant-login-form'];
    checkEmpty(loginForm['email'], "Email", "errorEmail");
    checkEmpty(loginForm['password'], "Password", "errorPassword");

    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#merchant-login-form").submit();
    }
}

function add_category(){
    let addCatForm = document.forms['add-category-form'];
    checkEmpty(addCatForm['name'], "Name", "errorAddName");
    checkEmpty(addCatForm['description'], "Description", "errorAddDescription");

    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#add-category-form").submit();
    }
}

function get_category_to_edit(category_id)
{
    request = $.ajax({
        url: "index.php/members/category/get_category/"+category_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            $("#category_id").val(res.category.id);
            $("#edit_name").val(res.category.name);
            $("#edit_description").val(res.category.description);
            $("#edit_parent_id").val(res.category.parent_id);

            if (res.category.status == 1) {
                $("#edit_status").prop("checked", true);
            } else {
                $("#edit_status").prop("checked", false)
            }

        } else {
            alert("Try Again Later!");
        }
    });

    request.fail(function (request, status, error) {
        console.log("Request", request);
        console.log("Status", status);
        console.log("Error", error);
        alert("Something went Wrong, Try again Later!");
    });

    $("#edit").modal();
}

function edit_category(){
    let editCatForm = document.forms['edit-category-form'];
    checkEmpty(editCatForm['name'], "Name", "errorName");
    checkEmpty(editCatForm['description'], "Description", "errorDescription");

    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#edit-category-form").submit();
    }
}

function delete_category(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "members/category/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            location.reload();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function add_tax(){
    let addTaxForm = document.forms['add-tax-form'];
    checkEmpty(addTaxForm['name'], "Name", "errorAddName");
    checkEmpty(addTaxForm['description'], "Description", "errorAddDescription");
    checkEmpty(addTaxForm['amount'], "Amount", "errorAddAmount");

    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#add-tax-form").submit();
    }
}

function get_tax_to_edit(tax_id)
{
    request = $.ajax({
        url: "index.php/members/tax/get_tax/"+tax_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            $("#tax_id").val(res.tax.id);
            $("#edit_name").val(res.tax.name);
            $("#edit_description").val(res.tax.description);
            $("#edit_amount").val(res.tax.amount);

            if (res.tax.is_percentage == 1) {
                $("#edit_is_percentage").prop("checked", true);
            } else {
                $("#edit_is_percentage").prop("checked", false)
            }

            if (res.tax.status == 1) {
                $("#edit_status").prop("checked", true);
            } else {
                $("#edit_status").prop("checked", false)
            }

        } else {
            alert("Try Again Later!");
        }
    });

    request.fail(function (request, status, error) {
        console.log("Request", request);
        console.log("Status", status);
        console.log("Error", error);
        alert("Something went Wrong, Try again Later!");
    });

    $("#edit").modal();
}

function edit_tax(){
    let editTaxForm = document.forms['edit-tax-form'];
    checkEmpty(editTaxForm['name'], "Name", "errorEditName");
    checkEmpty(editTaxForm['description'], "Description", "errorEditDescription");
    checkEmpty(editTaxForm['amount'], "Amount", "errorEditAmount");

    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#edit-tax-form").submit();
    }
}

function delete_tax(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "members/tax/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            location.reload();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function add_discount(){
    let addDiscountForm = document.forms['add-discount-form'];
    checkEmpty(addDiscountForm['name'], "Name", "errorAddName");
    checkEmpty(addDiscountForm['description'], "Description", "errorAddDescription");
    checkEmpty(addDiscountForm['amount'], "Amount", "errorAddAmount");

    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#add-discount-form").submit();
    }
}

function get_discount_to_edit(discount_id)
{
    request = $.ajax({
        url: "index.php/members/discount/get_discount/"+discount_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            $("#discount_id").val(res.discount.id);
            $("#edit_name").val(res.discount.name);
            $("#edit_description").val(res.discount.description);
            $("#edit_amount").val(res.discount.amount);

            if (res.discount.is_percentage == 1) {
                $("#edit_is_percentage").prop("checked", true);
            } else {
                $("#edit_is_percentage").prop("checked", false)
            }

            if (res.discount.status == 1) {
                $("#edit_status").prop("checked", true);
            } else {
                $("#edit_status").prop("checked", false)
            }

        } else {
            alert("Try Again Later!");
        }
    });

    request.fail(function (request, status, error) {
        console.log("Request", request);
        console.log("Status", status);
        console.log("Error", error);
        alert("Something went Wrong, Try again Later!");
    });

    $("#edit").modal();
}

function edit_discount(){
    let editDiscountForm = document.forms['edit-discount-form'];
    checkEmpty(editDiscountForm['name'], "Name", "errorEditName");
    checkEmpty(editDiscountForm['description'], "Description", "errorEditDescription");
    checkEmpty(editDiscountForm['amount'], "Amount", "errorEditAmount");

    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#edit-discount-form").submit();
    }
}

function delete_discount(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "members/discount/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            location.reload();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function add_attribute(){
    let addAtrForm = document.forms['add-attribute-form'];
    checkEmpty(addAtrForm['name'], "Name", "errorAddName");
    checkEmpty(addAtrForm['description'], "Description", "errorAddDescription");
    checkEmpty(addAtrForm['duration'], "Duration", "errorAddDuration");

    if(addAtrForm['have_price'].checked){
        checkEmpty(addAtrForm['price'], "Price", "errorAddPrice");
    }
    
    if (validationErrors == true) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#add-attribute-form").submit();
    }
}

function get_attribute_to_edit(attribute_id)
{
    request = $.ajax({
        url: "index.php/members/attribute/get_attribute/"+attribute_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            $("#attribute_id").val(res.attribute.id);
            $("#edit_name").val(res.attribute.name);
            $("#edit_description").val(res.attribute.description);
            $("#edit_price").val(res.attribute.price);
            $("#edit_duration").val(res.attribute.duration);
            $("#edit_tax").val(res.attribute.tax);
            $("#edit_discount").val(res.attribute.discount);
            
            if (res.attribute.have_price == 1) {
                $("#edit_have_price").prop("checked", true);
            } else {
                $("#edit_have_price").prop("checked", false)
            }

            if (res.attribute.is_product == 1) {
                $("#edit_is_product").prop("checked", true);
            } else {
                $("#edit_is_product").prop("checked", false)
            }

            if (res.attribute.status == 1) {
                $("#edit_status").prop("checked", true);
            } else {
                $("#edit_status").prop("checked", false)
            }

        } else {
            alert("Try Again Later!");
        }
    });

    request.fail(function (request, status, error) {
        console.log("Request", request);
        console.log("Status", status);
        console.log("Error", error);
        alert("Something went Wrong, Try again Later!");
    });

    $("#edit").modal();
}

function edit_attribute(){
    let editAtrForm = document.forms['edit-attribute-form'];
    checkEmpty(editAtrForm['name'], "Name", "errorEditName");
    checkEmpty(editAtrForm['description'], "Description", "errorEditDescription");
    checkEmpty(editAtrForm['duration'], "Duration", "errorEditDuration");

    if(editAtrForm['have_price'].checked){
        checkEmpty(editAtrForm['price'], "Price", "errorEditPrice");
    }
    
    if (validationErrors == true) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#edit-attribute-form").submit();
    }
}

function delete_attribute(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "members/attribute/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            location.reload();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function add_promo(){
    let addPrmFrm = document.forms['add-promo-form'];
    checkEmpty(addPrmFrm['code'], "Code", "errorCode");
    checkEmpty(addPrmFrm['description'], "Description", "errorDescription");
    checkEmpty(addPrmFrm['quantity'], "Quantity", "errorQuantity");
    checkEmpty(addPrmFrm['expiry_date'], "Expiry", "errorExpiry");
    checkEmpty(addPrmFrm['amount'], "Expiry", "errorAmount");

    if (validationErrors == true) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#add-promo-form").submit();
    }
}

function get_promo_to_edit(promo_id)
{
    request = $.ajax({
        url: "members/promocode/get_promo/" + promo_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            $("#promo_id").val(res.promocode.id);
            $("#edit_code").val(res.promocode.code);
            $("#edit_description").val(res.promocode.description);
            $("#edit_quantity").val(res.promocode.quantity);
            $("#edit_expiry_date").val(res.promocode.expiry_date);
            
            if (res.promocode.is_percentage == 1) {
                $("#edit_is_percentage").prop("checked", true);
            } else {
                $("#edit_is_percentage").prop("checked", false)
            }

            $("#edit_amount").val(res.promocode.amount);

            if (res.promocode.status == 1) {
                $("#edit_status").prop("checked", true);
            } else {
                $("#edit_status").prop("checked", false)
            }

        } else {
            alert("Try Again Later!");
        }
    });

    request.fail(function (request, status, error) {
        console.log("Request", request);
        console.log("Status", status);
        console.log("Error", error);
        alert("Something went Wrong, Try again Later!");
    });

    $("#edit").modal();
}

function edit_promo(){
    let editPrmFrm = document.forms['edit-promo-form'];
    checkEmpty(editPrmFrm['code'], "Code", "errorEditCode");
    checkEmpty(editPrmFrm['description'], "Description", "errorEditDescription");
    checkEmpty(editPrmFrm['quantity'], "Quantity", "errorEditQuantity");
    checkEmpty(editPrmFrm['expiry_date'], "Expiry", "errorEditExpiry");
    checkEmpty(editPrmFrm['amount'], "Expiry", "errorEditAmount");

    if (validationErrors == true) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#edit-promo-form").submit();
    }
}

function delete_promo(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "members/promocode/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            location.reload();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function add_media_field(){
    let number_of_rows = $(".media-row").length;

    let html = `<div class="media-row" id="media-`+(Number(number_of_rows) + 1)+`">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Select Picture (Square)</label>
                        <div class="col-lg-6 col-xl-6 custom-file">
                            <input type="file" name="media[]" class="form-control">
                        </div>
                        <div class="col-lg-1 col-xl-1 text-center">
                            <h1 class="fa fa-minus" onclick="remove_media_field(`+(Number(number_of_rows) + 1)+`)"></h1>
                        </div>
                    </div>
                </div>`;
    $("#media-1").append(html);
}

function remove_media_field(id){
    $("#media-"+id).remove();
}

function show_service_atributes(service_id){
    request = $.ajax({
        url: "members/service/get_service_attributes",
        type: "post",
        data: { service_id: service_id }
    });

    request.done(function (request, status, error) {
        $("#service-attribute-preview-listing").html("").html(request);
    });

    request.fail(function (request, status, error) {
        alert("Something went Wrong, Try again Later!");
    });
    
    $("#view-service-atrribute").modal();
}

function show_service_media(service_id){
    request = $.ajax({
        url: "members/service/get_service_medias",
        type: "post",
        data: { service_id: service_id }
    });

    request.done(function (request, status, error) {
        $("#service-media-preview-listing").html("").html(request);
    });

    request.fail(function (request, status, error) {
        alert("Something went Wrong, Try again Later!");
    });

    $("#view-service-media").modal();
}

function preview_service_media(id, file){
    console.log("preview_service_media");
    html = "<div class='text-center'><img src='uploads/services/"+id+"/"+file+"' width='50%'></div>";
    $("media").html(html);
    $("#preview-media").modal();
}

function add_service(){
    let addServiceForm = document.forms['add-service-form'];
    checkEmpty(addServiceForm['name'], "Name", "errorName");
    checkEmpty(addServiceForm['description'], "Description", "errorDescription");
    checkEmpty(addServiceForm['duration'], "Duration", "errorDuration");
    checkEmpty(addServiceForm['price'], "Price", "errorPrice");

    if (validationErrors == true) {
        $("#errorEditForm").html("Please provide all mandatory information.");
        setTimeout(function(){$("#errorEditForm").html("");},3000);
    } else {
        $("#add-service-form").submit();
    }
}

function delete_service(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "members/service/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            location.reload();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function get_service_to_edit(service_id)
{
    request = $.ajax({
        url: "index.php/members/service/get_service/"+service_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);

        if(res.success == true){
            $("#service_id").val(res.service.id);
            $("#service_edit_name").val(res.service.name);
            $("#service_edit_description").val(res.service.description);
            $("#service_edit_price").val(res.service.price);
            $("#service_edit_duration").val(res.service.duration);

            if (res.service.is_product == 1) {
                $("#edit_is_product").prop("checked", true);
            } else {
                $("#edit_is_product").prop("checked", false)
            }
            
            if (res.service.status == 1) {
                $("#service_edit_status").prop("checked", true);
            } else {
                $("#service_edit_status").prop("checked", false)
            }

            let categories = [];
            for(let i=0; i<res.service_category.length; i++){
                categories.push(res.service_category[i].id);
            }
            $("#service_edit_category").val(categories);

            let attributes = [];
            for(let i=0; i<res.service_attribute.length; i++){
                attributes.push(res.service_attribute[i].id);
            }
            $("#service_edit_attributes").val(attributes);

            let taxes = [];
            for(let i=0; i<res.service_tax.length; i++){
                taxes.push(res.service_tax[i].id);
            }
            $("#service_edit_taxes").val(taxes);

            let discounts = [];
            for(let i=0; i<res.service_discount.length; i++){
                discounts.push(res.service_discount[i].id);
            }
            $("#service_edit_discounts").val(discounts);

            let media_html = "";
            for(let i=0; i<res.service_media.length; i++){
                media_html += `<a href="javascript: void(0)" onclick="show_service_media(`+res.service.id+`)"><img height="50" src="uploads/services/`+res.service.id+`/`+res.service_media[i].media+`"></a> &nbsp;`;
            }
            $("#service_media_tbl").html("").html(media_html);
            
        } else {
            alert("Try Again Later!");
        }
    });

    request.fail(function (request, status, error) {
        console.log("Request", request);
        console.log("Status", status);
        console.log("Error", error);
        alert("Something went Wrong, Try again Later!");
    });

    $("#edit").modal();
}

function save_service(){
    let editServiceForm = document.forms['edit-service-form'];
    
    checkEmpty(editServiceForm['name'], "Name", "errorEditName");
    checkEmpty(editServiceForm['description'], "Description", "errorEditDescription");
    checkEmpty(editServiceForm['service_duration'], "Duration", "errorEditDuration");
    checkEmpty(editServiceForm['price'], "Price", "errorEditPrice");

    if (validationErrors == true) {
        $("#errorEditForm").html("Please provide all mandatory information.");
        setTimeout(function(){$("#errorEditForm").html("");},3000);
    } else {
        $("#edit-service-form").submit();
    }
}

function save_schedule(){
    let serviceForm = document.forms['save-service-form'];
    $(serviceForm).submit();
}

function add_holiday(){
    let saveHolidayForm = document.forms['save-holiday-form'];
    checkEmpty(saveHolidayForm['holiday_date'], "Holiday date", "errorHolidayDate");
    checkEmpty(saveHolidayForm['holiday_name'], "Holiday Name", "errorHolidayName");

    if (validationErrors == true) {
        $("#errorEditForm").html("Please provide all mandatory information.");
        setTimeout(function(){$("#errorEditForm").html("");},3000);
    } else {
        $("#save-holiday-form").submit();
    }
}

function delete_holiday(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "members/setting/delete_holiday",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            location.reload();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function add_configuration(){
    let saveConfigForm = document.forms['add-config-form'];
    checkEmpty(saveConfigForm['add_conf_name'], "Configuration name", "errorConfName");
    validateSpecialChars(saveConfigForm['conf_name'], "Configuration name", "errorConfName");
    checkEmpty(saveConfigForm['add_conf_value'], "Configuration value", "errorConfValue");

    if (validationErrors == true) {
        $("#errorEditForm").html("Please provide all mandatory information.");
        setTimeout(function(){$("#errorEditForm").html("");},3000);
    } else {
        $("#add-config-form").submit();
    }
}

function save_configuration(id){
    let conf_id = id;
    let conf_name = $("#conf_name_"+id).val();
    let conf_value = $("#conf_value_"+id).val();

    if (confirm("Are you sure you want to update?")) {
        request = $.ajax({
            url: "members/setting/save_configuration",
            type: "post",
            data: { 
                id: conf_id,
                name: conf_name,
                value: conf_value
            }
        });

        request.done(function (request, status, error) {
            location.reload();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function pick_appointment_time(ref){
    if(ref.value){
        request = $.ajax({
            url: "members/appointment/get_appointments",
            type: "post",
            data: { 
                date: ref.value
            }
        });
    
        request.done(function (request, status, error) {
            $("#appointment_list").html("").html(request);
            $("#appointment_time_picker").show();
        });
    
        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });

    } else {
        $("#appointment_time_picker").hide();
    }
}

function searchCustomerByPhone(input){
    request = $.ajax({
        url: "members/appointment/search_customer",
        type: "post",
        data: { 
            string: input,
            field: 'phone' 
        }
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        
        if(res.length > 0){
            $("#email").val("").val(res[0].email);
            $("#firstName").val("").val(res[0].first_name);
            $("#lastName").val("").val(res[0].last_name);
        }
    });

    request.fail(function (request, status, error) {
        alert("Something went Wrong, Try again Later!");
    });
}

function searchCustomerByEmail(input){
    request = $.ajax({
        url: "members/appointment/search_customer",
        type: "post",
        data: { 
            string: input,
            field: 'email' 
        }
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        
        if(res.length > 0){
            $("#phone").val("").val(res[0].phone);
            $("#firstName").val("").val(res[0].first_name);
            $("#lastName").val("").val(res[0].last_name);
        }
    });

    request.fail(function (request, status, error) {
        alert("Something went Wrong, Try again Later!");
    });
}

function include_addons(service_id){
    
    request = $.ajax({
        url: "members/service/get_service_attributes",
        type: "post",
        data: { service_id: service_id }
    });

    request.done(function (request, status, error) {
        $("#service_attributes_data").html("").html(request);
    });

    request.fail(function (request, status, error) {
        alert("Something went Wrong, Try again Later!");
    });
    
    $("#include_addon").modal();
}

// cart variable
let cart = {
    customer : {
        first_name : "Test Name",
        last_name : "Last Name",
        email : "email@email.com",
        phone : "1234567890"
    },
    appointment_schedule : {
        date  : '2020-02-02',
        start_time : '22:23:00',
        end_time : 'Time()'
    },
    payment_method : 0,
    services : []
};

function add_appointment_services(ref){
    if (ref.checked == true){
        cart.services.push({id:ref.value, attributes:[]});
    } else {
        cart.services.pop({id:ref.value, attributes:[]});
    }
}

function add_appointment_service_addons(service_id, ref){
    for(let i=0; i<cart.services.length; i++){
        let product_id = cart.services[i].id;
        if(product_id == service_id){
            if (ref.checked == true){
                cart.services[i].attributes.push(ref.value);
            } else {
                cart.services[i].attributes.pop(ref.value);
            }
        }
    }
}

function validate_booking_data(){
    
    if($("#phone").val() == ""){
        checkEmpty(document.getElementById("phone"), "Phone", "errorPhone");
        $('#step-1-tab-head').trigger('click');
        return false;
    } else {
        cart.customer.phone = $("#phone").val();
    }

    if($("#email").val() == ""){
        checkEmpty(document.getElementById("email"), "Email", "errorEmail");
        $('#step-1-tab-head').trigger('click');
        return false;
    } else {
        cart.customer.email = $("#email").val();
    }

    if($("#firstName").val() == ""){
        checkEmpty(document.getElementById("firstName"), "First name", "errorFirstName");
        $('#step-1-tab-head').trigger('click');
        return false;
    } else {
        cart.customer.first_name = $("#firstName").val();
    }

    if($("#lastName").val() == ""){
        checkEmpty(document.getElementById("lastName"), "Last Name", "errorLastName");
        $('#step-1-tab-head').trigger('click');
        return false;
    } else {
        cart.customer.last_name = $("#lastName").val();
    }

    if($("#appointment_date").val() == ""){
        checkEmpty(document.getElementById("appointment_date"), "Appointment Date", "errorAppointmentDate");
        $('#step-3-tab-head').trigger('click');
        return false;
    } else {
        cart.appointment_schedule.date = $("#appointment_date").val();
    }

    if($("#start_time").val() == ""){
        checkEmpty(document.getElementById("start_time"), "Start Time", "errorStartTime");
        $('#step-3-tab-head').trigger('click');
        return false;
    } else {
        cart.appointment_schedule.start_time = $("#start_time").val();
    }

    if($("#end_time").val() == ""){
        checkEmpty(document.getElementById("end_time"), "End time", "errorEndTime");
        $('#step-3-tab-head').trigger('click');
        return false;
    } else {
        cart.appointment_schedule.end_time = $("#end_time").val();
    }

    if($("#payment_method").val() == ""){
        checkEmptySelect(document.getElementById("payment_method"), "Payment Method", "errorPayMethod");
        $('#step-3-tab-head').trigger('click');
        return false;
    } else {
        cart.payment_method = $("#payment_method").val();
    }

    request = $.ajax({
        url: "members/appointment/booking_summary",
        type: "post",
        data: cart
    });

    request.done(function (request, status, error) {
        $('#step-4-tab-head').trigger('click');
        $("#booking_summary").html("").html(request);
    });

    request.fail(function (request, status, error) {
        alert("Something went Wrong, Try again Later!");
    });
}