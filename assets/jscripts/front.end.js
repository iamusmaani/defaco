let validationErrors = false;

function validate_interest() {
    let record = document.forms['record-interest'];

    checkEmpty(record['first_name'], "First Name", "errorFirstName");
    checkEmpty(record['last_name'], "Last Name", "errorLastName");
    checkEmpty(record['email'], "Email", "errorEmail");
    checkEmpty(record['phone'], "Phone", "errorPhone");
    validatePhone(record['phone'], "Phone", "errorPhone");
    //checkEmptyCheckbox(record['callme'], "Preferred Communication", "errorCallMe");

    if (validationErrors) {
        return false;
    } else {
        $("#record-interest").submit();
    }
}

function get_in_touch(){
    let enquiry = document.forms['get-in-touch'];

    checkEmpty(enquiry['name'], "Name", "errorName");
    checkEmpty(enquiry['email'], "Email", "errorEmail");
    checkEmpty(enquiry['phone'], "Phone", "errorPhone");
    checkEmpty(enquiry['description'], "Description", "errorDescription");
    //checkEmptyCheckbox(enquiry['callme'], "Preferred to Call", "errorCallMe");

    if (validationErrors) {
        return false;
    } else {
        $("#get-in-touch").submit();
    }
}