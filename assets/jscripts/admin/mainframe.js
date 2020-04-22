let validationErrors = false;

function validateAddEditNewAdmin(id) {
    let adminForm = document.forms[id];

    checkEmpty(adminForm['first_name']);
    checkEmpty(adminForm['last_name']);
    ValidateEmail(adminForm['email']);
    validatePhone(adminForm['mobile']);

    checkEmpty(adminForm['address_line_1']);
    checkEmptySelect(adminForm['country']);
    checkEmptySelect(adminForm['state']);
    checkEmptySelect(adminForm['city']);
    checkEmpty(adminForm['zip_code']);


    if (validationErrors) {
        $(id).submit();
    } else {
        return false;
    }
}

function add_new_responsibility() {
    let addForm = document.forms['add-responsibility-form'];

    checkEmpty(addForm['name'], "Name", "errorName");
    checkEmpty(addForm['description'], "Description", "errorDescription");

    if (validationErrors) {
        return false;
    } else {
        $("#add-responsibility-form").submit();
    }
}

function edit_responsibility(responsibility_id) {
    request = $.ajax({
        url: "index.php/administration/responsibility/get_responsibility_data",
        type: "post",
        data: { id: responsibility_id }
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        $("#responsibility_id").val(res.id);
        $("#edit-name").val(res.name);
        $("#edit-description").val(res.description);
        if (res.status == 1) {
            $("#edit_status").prop("checked", true);
        } else {
            $("#edit_status").prop("checked", false)
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

function save_updated_responsibility() {
    let editForm = document.forms['add-responsibility-form'];

    let id = editForm['responsibility_id'];

    if (id == "") {
        alert("Unable to update! Try again later.");
        return false;
    }

    checkEmpty(addForm['name'], "Name", "errorEditName");
    checkEmpty(addForm['description'], "Description", "errorEditDescription");

    if (validationErrors) {
        return false;
    } else {
        $("#edit-responsibility-form").submit();
    }
}

function responsibility_delete(id) {
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "index.php/administration/responsibility/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            $("#responsibility-" + id).remove();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function add_new_role() {
    let addForm = document.forms['add-role-form'];

    checkEmpty(addForm['name'], "Name", "errorName");
    checkEmpty(addForm['description'], "Description", "errorDescription");
    checkEmptySelect(addForm['responsibilities'], 'Responsibilities', 'errorResponsibilities');

    if (validationErrors) {
        return false;
    } else {
        $("#add-role-form").submit();
    }
}

function view_responsibility_details(ids) {
    request = $.ajax({
        url: "index.php/administration/role/view_responsibility",
        type: "post",
        data: { ids: ids }
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        let html = "";
        if(res.success == true){
            for(let i=0; i<res.responsibilities.length; i++){
                html  += "<tr>";
                html += "<td align='center'>"+(i+1)+"</td>";
                html += "<td>"+res.responsibilities[i].name+"</td>";
                html += "<td>"+res.responsibilities[i].description+"</td>";
                html += "<td>"+((res.responsibilities[i].status == 0) ? '<span class="text-danger">Active</span>' : '<span class="text-success">Active</span>')+"</td>";
                html  += "</tr>";   
            }
        } else {
            html  += "<tr>";
            html += "<td colspan='4'>Something Went Wrong</td>";
            html  += "</tr>";
        }
        $("#roles_responsility_list").html(html);
    });

    request.fail(function (request, status, error) {
        alert("Something went Wrong, Try again Later!");
    });

    $("#view_responsibility").modal();
}

function edit_role(role_id){
    request = $.ajax({
        url: "index.php/administration/role/edit/"+role_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            $("#role_id").val(res.role_data.id);
            $("#edit_name").val(res.role_data.name);
            $("#edit_description").val(res.role_data.description);

            if (res.role_data.status == 1) {
                $("#edit_status").prop("checked", true);
            } else {
                $("#edit_status").prop("checked", false)
            }

            let responsibility = res.role_data.responsibility;

            let assigned_responsibility = [];
            for(let i=0; i< responsibility.length; i++){
                assigned_responsibility.push(responsibility[i].responsibility_id);
            }

            $("#edit_responsibilities").val(assigned_responsibility);
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

function save_role_changes(){
    let editForm = document.forms['edit-role-form'];

    checkEmpty(editForm['name'], "Name", "errorEditName");
    checkEmpty(editForm['description'], "Description", "errorEditDescription");

    if (validationErrors) {
        return false;
    } else {
        $("#edit-role-form").submit();
    }
}

function delete_role(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "index.php/administration/role/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            $("#role-" + id).remove();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function add_new_user(){
    let addForm = document.forms['add-user-form'];
    checkEmpty(addForm['first_name'], "First Name", "errorFirstName");
    checkEmpty(addForm['last_name'], "Last Name", "errorLastName");
    checkEmpty(addForm['email'], "Email", "errorEmail");
    validateEmail(addForm['email'], "Email", "errorEmail"); 
    checkEmpty(addForm['mobile'], "Mobile", "errorMobile");
    validatePhone(addForm['mobile'], "Mobile", "errorMobile");

    checkEmpty(addForm['address_line_1'], "Address Line 1", "errorAddressLine1");
    checkEmptySelect(addForm['country'], "Country", "errorCountry");
    checkEmptySelect(addForm['state'], "State", "errorState");
    checkEmptySelect(addForm['city'], "City", "errorCity");
    checkEmpty(addForm['zip_code'], "Zip", "errorZipCode");

    checkEmpty(addForm['password'], "Password", "errorPassword");
    checkEmpty(addForm['confirm_password'], "Confirm Password", "errorConfirmPassword");
    checkEmptySelect(addForm['roles'], "User Roles", "errorRoles");

    if (validationErrors) {
        $("#errorFormError").html("Please provide valid information to add new user.");
        setTimeout(function(){ $("#errorFormError").html(""); }, 3000);
        return false;
    } else {
        $("#add-user-form").submit();
    }
}

function process_login(){
    let loginForm = document.forms['admin-login-form'];
    checkEmpty(loginForm['email'], "Email", "errorEmail");
    checkEmpty(loginForm['password'], "Password", "errorPassword");

    if (validationErrors) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#admin-login-form").submit();
    }
}

function delete_admin_user(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "administration/admin/delete",
            type: "post",
            data: { id: id }
        });

        request.done(function (request, status, error) {
            $("#admin-user-" + id).remove();
        });

        request.fail(function (request, status, error) {
            alert("Something went Wrong, Try again Later!");
        });
    } else {
        return false;
    }
}

function edit_user(user_id){
    request = $.ajax({
        url: "index.php/administration/admin/edit/"+user_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            $("#user_id").val(res.user_data.id);
            $("#edit_first_name").val(res.user_data.first_name);
            $("#edit_last_name").val(res.user_data.last_name);
            $("#edit_email").val(res.user_data.email);
            $("#edit_mobile").val(res.user_data.mobile);

            $("#edit_address_line_1").val(res.user_data.address_line_1);
            $("#edit_address_line_2").val(res.user_data.address_line_2);
            $("#edit_country").val(res.user_data.country.id);
            $("#edit_state").html("").html("<option value='"+res.user_data.state.id+"'>"+res.user_data.state.name+"</option>");
            $("#edit_city").html("").html("<option value='"+res.user_data.city.id+"'>"+res.user_data.city.name+"</option>");
            $("#edit_zip_code").val(res.user_data.zip);

            if (res.user_data.status == 1) {
                $("#edit_status").prop("checked", true);
            } else {
                $("#edit_status").prop("checked", false)
            }

            let roles = res.user_data.roles;

            let assigned_roles = [];
            for(let i=0; i< roles.length; i++){
                assigned_roles.push(roles[i].role_id);
            }

            $("#edit_roles").val(assigned_roles);
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

function save_user(){
    let editForm = document.forms['edit-user-form'];

    checkEmpty(editForm['first_name'], "First Name", "errorEditFirstName");
    checkEmpty(editForm['last_name'], "Last Name", "errorLEditastName");
    checkEmpty(editForm['email'], "Email", "errorEditEmail");
    validateEmail(editForm['email'], "Email", "erroEditrEmail"); 
    checkEmpty(editForm['mobile'], "Mobile", "errorEditMobile");
    validatePhone(editForm['mobile'], "Mobile", "errorEditMobile");

    checkEmpty(editForm['address_line_1'], "Address Line 1", "errorEditAddressLine1");
    //checkEmptySelect(editForm['country'], "Country", "errorEditCountry");
    checkEmpty(editForm['zip_code'], "Zip", "errorEditZipCode");
    //checkEmptySelect(editForm['roles'], "User Roles", "errorEditRoles");

    if (validationErrors) {
        $(".errorFormError").html("Please provide valid information to add new user.");
        setTimeout(function(){ $(".errorFormError").html(""); }, 3000);
        return false;
    } else {
        $("#edit-user-form").submit();
    }
}

function add_fee(){
    let addFeeFrm = document.forms['add-fee-form'];
    checkEmpty(addFeeFrm['name'], "Name", "errorAddName");
    checkEmpty(addFeeFrm['description'], "Description", "errorAddDescription");
    checkEmpty(addFeeFrm['amount'], "Amount", "errorAddAmount");
    
    if (validationErrors == true) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#add-fee-form").submit();
    }
}

function get_fee_to_edit(fee_id)
{
    request = $.ajax({
        url: "administration/fee/get_fee/" + fee_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            console.log(res);
            $("#fee_id").val(res.fee.id);
            $("#edit_name").val(res.fee.name);
            $("#edit_description").val(res.fee.description);
            $("#edit_type").val(res.fee.type);
            
            if (res.fee.is_percentage == 1) {
                $("#edit_is_percentage").prop("checked", true);
            } else {
                $("#edit_is_percentage").prop("checked", false)
            }

            $("#edit_amount").val(res.fee.amount);

            if (res.fee.status == 1) {
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

function edit_fee(){
    let addFeeFrm = document.forms['edit-fee-form'];
    checkEmpty(addFeeFrm['name'], "Name", "errorAddName");
    checkEmpty(addFeeFrm['description'], "Description", "errorAddDescription");
    checkEmpty(addFeeFrm['amount'], "Amount", "errorAddAmount");
    
    if (validationErrors == true) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#edit-fee-form").submit();
    }
}

function delete_fee(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "administration/fee/delete",
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

function add_pay_method(){
    let addPaymethodFrm = document.forms['add-paymethod-form'];
    checkEmpty(addPaymethodFrm['name'], "Name", "errorAddName");
    checkEmpty(addPaymethodFrm['description'], "Description", "errorAddDescription");
    
    if (validationErrors == true) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#add-paymethod-form").submit();
    }
}

function get_pay_method_to_edit(method_id)
{
    request = $.ajax({
        url: "administration/paymethod/get_paymethod/" + method_id,
        type: "get"
    });

    request.done(function (request, status, error) {
        let res = JSON.parse(request);
        if(res.success == true){
            console.log(res);
            $("#method_id").val(res.paymethod.id);
            $("#edit_name").val(res.paymethod.name);
            $("#edit_description").val(res.paymethod.description);

            if (res.paymethod.status == 1) {
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

function edit_pay_method(){
    let editPayFrm = document.forms['edit-paymethod-form'];
    console.log(editPayFrm);
    checkEmpty(editPayFrm['name'], "Name", "errorEditName");
    checkEmpty(editPayFrm['description'], "Description", "errorEditDescription");
    
    if (validationErrors == true) {
        // nothing to do here
        // todo: add sweet alert here
    } else {
        $("#edit-paymethod-form").submit();
    }
}

function delete_pay_method(id){
    if (confirm("Are you sure you want to Delete?")) {
        request = $.ajax({
            url: "administration/paymethod/delete",
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