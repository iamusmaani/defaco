function checkEmpty(reference, label, messageElement) {
    if (reference.value == "") {
        validationErrors = true;
        reference.classList.add("is-invalid");
        $("#" + messageElement).html(label + " is required");
        return false;
    } else {
        validationErrors = false;
        reference.classList.remove("is-invalid");
        $("#" + messageElement).html("");
    }
}

function checkEmptySelect(reference, label, messageElement) {

    if (reference.value == 0 || reference.value == "" || reference.value == null) {
        validationErrors = true;
        reference.classList.add("is-invalid");
        $("#" + messageElement).html(label + " is required");
        return false;
    } else {
        validationErrors = false;
        reference.classList.remove("is-invalid");
        $("#" + messageElement).html("");
    }
}

function validateEmail(reference, label, messageElement) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(reference.value)) {
        validationErrors = false;
        reference.classList.remove("is-invalid");
        $("#" + messageElement).html("");
    } else {
        validationErrors = true;
        reference.classList.add("is-invalid");
        $("#" + messageElement).html(label + " is invalid");
        return false;
    }
}

function validatePhone(reference, label, messageElement) {
    var phoneno = /^\d{10}$/;
    if ((reference.value.match(phoneno))) {
        validationErrors = false;
        reference.classList.remove("is-invalid");
        $("#" + messageElement).html("");
    } else {
        validationErrors = true;
        reference.classList.add("is-invalid");
        $("#" + messageElement).html(label + " is invalid");
        return false;
    }
}

function validateNumber(reference, label, messageElement){
    if(isNaN(reference.value)){
        validationErrors = true;
        reference.classList.add("is-invalid");
        $("#" + messageElement).html(label + " requires number value");
        return false;
    } else {
        validationErrors = false;
        reference.classList.remove("is-invalid");
        $("#" + messageElement).html("");
    }
}

function validateSpecialChars(reference, label, messageElement) {
    //Regex for Valid Characters i.e. Alphabets, Numbers and Space.
    var regex = /^[A-Za-z0-9 ]+$/

    //Validate TextBox value against the Regex.
    var isValid = regex.test(reference.value);
    if (!isValid) {
        validationErrors = true;
        reference.classList.add("is-invalid");
        $("#" + messageElement).html("Spaces and special character are not allowed in " + label);
        return false;
    } else {
        validationErrors = false;
        reference.classList.remove("is-invalid");
        $("#" + messageElement).html("");
    }

    return isValid;
}

function getStates(reference, label, messageElement){
    if (reference.value == 0 || reference.value == "" || reference.value == null) {
        validationErrors = true;
        reference.classList.add("is-invalid");
        $("#" + messageElement).html("We dont work in this region.");
        return false;
    } else {
        validationErrors = false;
        reference.classList.remove("is-invalid");
        $("#" + messageElement).html("");

        request = $.ajax({
            url: "index.php/general/get_states",
            type: "post",
            data: { country_id: reference.value }
        });

        request.done(function (request, status, error) {
            let res = JSON.parse(request);
            let html = "<option value='0'>Select State</option>";
            for(let i=0;i<res.States.length;i++){
                html += "<option value="+res.States[i].id+">"+res.States[i].name+"</option>";
            }
            $(".state").html("").html(html);
        });

        request.fail(function (request, status, error) {
            alert("Something Went Wrong, Please try again later.");
        });
    }
}

function getCities(reference, label, messageElement){
    if (reference.value == 0 || reference.value == "" || reference.value == null) {
        validationErrors = true;
        reference.classList.add("is-invalid");
        $("#" + messageElement).html("We dont work in this region.");
        return false;
    } else {
        validationErrors = false;
        reference.classList.remove("is-invalid");
        $("#" + messageElement).html("");

        request = $.ajax({
            url: "index.php/general/get_cities",
            type: "post",
            data: { state_id: reference.value }
        });

        request.done(function (request, status, error) {
            let res = JSON.parse(request);
            let html = "<option value='0'>Select City</option>";
            for(let i=0;i<res.Cities.length;i++){
                html += "<option value="+res.Cities[i].id+">"+res.Cities[i].name+"</option>";
            }
            $(".city").html("").html(html);
        });

        request.fail(function (request, status, error) {
            alert("Something Went Wrong, Please try again later.");
        });
    }
}

/**
 * Input field configurations
 */

$('.datepicker').datepicker({
    autoclose: true,
    orientation: "bottom auto"
});

$('.timepicker').timepicker({defaultTime: '10:30:20 AM'});

/**
 * Loader setting
 */
$(document).ready(function(){
    console.log("Page loaded hiding loader");
});