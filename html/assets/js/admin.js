// validate form
$("#form_story").on("submit", function() {
    var error = false;
    // validate input data here and submit form
    if ($("#title").val().trim().length > 0) {
        $("#title_error").addClass("hidden");
        $("#title").val($("#title").val().trim());
    }
    else {
        $("#title").val("");
        $("#title_error").removeClass("hidden");

        error = true;
    }
    if ($("#summary").val().trim().length > 0) {
        $("#summary_error").addClass("hidden");
        $("#summary").val($("#summary").val().trim());
    }
    else {
        $("#summary").val("");
        $("#summary_error").removeClass("hidden");

        error = true;
    }
    if ($("#cover_image").val().length > 0) {
        $("#cover_image_error").addClass("hidden");
        $("#cover_image").val($("#cover_image").val().trim());
    }
    else {
        $("#cover_image").val("");
        $("#cover_image_error").removeClass("hidden");

        error = true;
    }
    if ($("#external_link").val().trim().length > 0) {
        $("#external_link_error").addClass("hidden");
        $("#external_link").val($("#external_link").val().trim());
    }
    else {
        $("#external_link").val("");
        $("#external_link_error").removeClass("hidden");

        error = true;
    }

    if (error) {
        return false;
    }
    else {
        return true;
    }
});
