function validEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

let validate = function (){
    let valid = true;
    let name = $('#name').val();
    let email = $('#email').val();
    let confirm_email = $('#confirm-email').val();
    let subject = $('#subject').val();
    let message = $('#message').val();

    if (name.length === 0 ){
        $("#name_error").text("required field");
        valid = false;
    }
    if (email.length === 0){
        $("#email_error").text("required field");
        valid = false;
    }
    if (!validEmail(email)){
        $("#email_error").text("email format invalid");
        valid = false;
    }
    if (confirm_email.length === 0){
        $("#confirm_email_error").text("required field");
        valid = false;
    }
    if (!validEmail(email)){
        $("#confirm_email_error").text("email format invalid");
        valid = false;
    }
    if (email !== confirm_email){
        $("#confirm_email_error").text("emails do not match");
        valid = false;
    }
    if (subject.length === 0) {
        $("#subject_error").text("required field");
        valid = false;
    }
    if (message.length === 0){
        $("#msg_error").text("required field");
        valid = false;
    }
    return valid;
}

// document has loaded, add onclick to submit form when button is clicked
$('#send-btn').click(function(event) {
    event.preventDefault();

    let isValid = validate();
    if (!isValid){

    } else {
        let name = $('#name').val();
        let email = $('#email').val();
        let confirm_email = $('#confirm-email').val();
        let subject = $('#subject').val();
        let message = $('#message').val();

        let arguments = {name: name, email: email, confirm_email: confirm_email, subject: subject, message: message}

        fetch(`http://${document.location.hostname}/ac/contact`, {
            headers: {
                // 'Accept': 'application/json',
                // 'Content-Type': 'application/json',
            },
            method: "POST",
            body: JSON.stringify(arguments)
        }).then(data => {
            data.json().then(resp => {
                if (resp.result === 'error') {
                    $("#msg").text("Sorry, your message was not sent.")
                } else if (resp.result === 'okay') {
                    clearForm({})
                    $("#msg").text("Your message was sent.")
                }
            })
        }).catch(err => {
        }).finally(() => {

        })
    }
})


function clearForm(event) {
    $('#name').val('');
    $("#name_error").text('');

    $('#email').val('');
    $("#email_error").text("");

    $('#confirm-email').val('');
    $("#confirm_email_error").text("");

    $('#subject').val('');
    $("#subject_error").text("");

    $('#message').val('');
    $("#msg_error").text("");

}

$('#clear-btn').click(clearForm);
