import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    function showMessage(message, type) {
        var alertMessage = $("#alertMessage");
        alertMessage.removeClass("alert-success alert-danger");
        alertMessage.addClass("alert-" + type);
        alertMessage.text(message);
        alertMessage.show();

        // Auto-hide the alert after 3 seconds
        setTimeout(function () {
            alertMessage.hide();
        }, 3000);
    }
    $("#categoryForm").on("submit", function (event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: function (response) {
                console.log(response);
                showMessage("Category added successfully");
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                showMessage("Please fill the form before submit it.");
            },
        });
    });

    // Handle brand form submission
    $("#brandForm").on("submit", function (event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: function (response) {
                showMessage("Brand added successfully");
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                showMessage("Brand could not be added. Please check the form.");
            },
        });
    });

    $("#productForme").on("submit", function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                showMessage("Product added successfully");
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                showMessage("Please fill the form before submitting it.");
            },
        });
    });
});
