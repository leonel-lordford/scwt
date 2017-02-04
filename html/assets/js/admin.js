function confirm_delete() {
    if(confirm('Hola')) {
        //
    }
    else {
        alert('Cancelado');
    }
}

// validation form
$("#form_message").on("submit", function() {
    var error = false;
    // validate input data here and submit form
    if ($("#name").val().trim().length > 0) {
        $("#name_error").addClass("hidden");
        $("#name").val($("#name").val().trim());
    }
    else {
        $("#name").val("");
        $("#name_error").removeClass("hidden");

        error = true;
    }
    if ($("#email").val().trim().length > 0) {
        $("#email_error").addClass("hidden");
        $("#email").val($("#email").val().trim());
    }
    else {
        $("#email").val("");
        $("#email_error").removeClass("hidden");

        error = true;
    }
    if ($("#message").val().trim().length > 0) {
        $("#message_error").addClass("hidden");
        $("#message").val($("#message").val().trim());
    }
    else {
        $("#message").val("");
        $("#message_error").removeClass("hidden");

        error = true;
    }

    if (error) {
        return false;
    }
    else {
        return true;
    }
});
