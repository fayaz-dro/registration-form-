// Client-side validation using jQuery
$(document).ready(function () {
    $("#registrationForm").on("submit", function (e) {
        let isValid = true;

        // Clear previous error messages
        $(".error").text("");

        // Get values
        const fullName = $("#fullName").val().trim();
        const email = $("#email").val().trim();
        const phone = $("#phone").val().trim();
        const dob = $("#dob").val();
        const gender = $("input[name='gender']:checked").val();
        const address = $("#address").val().trim();
        const course = $("#course").val();
        const agree = $("#agree").is(":checked");

        // Name validation
        if (fullName === "") {
            $("#fullNameError").text("Full name is required.");
            isValid = false;
        }

        // Email validation (simple pattern)
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "") {
            $("#emailError").text("Email is required.");
            isValid = false;
        } else if (!emailPattern.test(email)) {
            $("#emailError").text("Please enter a valid email address.");
            isValid = false;
        }

        // Phone validation (10 digits)
        const phonePattern = /^[0-9]{10}$/;
        if (phone === "") {
            $("#phoneError").text("Mobile number is required.");
            isValid = false;
        } else if (!phonePattern.test(phone)) {
            $("#phoneError").text("Mobile number must be 10 digits only.");
            isValid = false;
        }

        // DOB validation
        if (dob === "") {
            $("#dobError").text("Date of birth is required.");
            isValid = false;
        }

        // Gender validation
        if (!gender) {
            $("#genderError").text("Please select your gender.");
            isValid = false;
        }

        // Address validation
        if (address === "") {
            $("#addressError").text("Address is required.");
            isValid = false;
        }

        // Course validation
        if (course === "") {
            $("#courseError").text("Please select a course.");
            isValid = false;
        }

        // Terms validation
        if (!agree) {
            $("#agreeError").text("You must confirm that the information is correct.");
            isValid = false;
        }

        // If validation fails, prevent form submission
        if (!isValid) {
            e.preventDefault();
        }
    });
});
