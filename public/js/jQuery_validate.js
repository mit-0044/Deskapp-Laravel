$(function () {
    $("#add_user_form").validate({
        rules: {
            first_name: "required",
            surname: "required",
            address: "required",
            username: "required",
            pincode: {
                required: true,
                minlength: 6,
                maxlength: 6,
            },
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
            cpassword: {
                required: true,
                equalTo: '#password',
            },
            '#img': {
                required: true,
                File: true,
            },
            gender: {
                required: true,
            },
            gender_2: {
                required: true,
            },
            gender_3: {
                required: true,
            },
        },
        messages: {
            first_name: "Please Enter Your First Name.",
            surname: "Please Enter Your SurName.",
            username: "Please Enter Your Username.",
            address: "Please Enter Your Address.",
            pincode: {
                required: "Please Enter Your Pincode",
                minlength: "Pincode Must Have 6 Digits.",
                maxlength: "Pincode Must Be 6 Digits Only.",
            },
            mobile: {
                required: "Please Enter Your Mobile Number",
                minlength: "Mobile No. Must Have 10 Digits.",
                maxlength: "Mobile No. Must Be 10 Digits Only.",
            },
            email:{
                required: "Please Enter Your Email Address.",
                email: "Please Enter Valid Email Address.",
            },
            password: {
                required: "Please Enter Password.",
            },
            cpassword:{
                required: "Please Enter Confirm Password.",
                equalTo: "Contirm Password Must Be Same As Password."
            },
            '#img':{
                required: "Please Enter Your Image. You Can Add Multiple Image",
            },
            gender:{
                required: "Please Select Your Gender.",
            },
            gender_2:{
                required: "Please Select Your Gender.",
            },
            gender_3:{
                required: "Please Select Your Gender.",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});