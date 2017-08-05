var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                user_id: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                remember: {
	                    required: false
	                }
	            },

	            messages: {
	                user_id: {
	                    required: "User ID harus diisi."
	                },
	                password: {
	                    required: "Password harus diisi."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit();
	                }
	                return false;
	            }
	        });
	}

    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();

            // init background slide images
		    $.backstretch([
		        base_url+"/assets/images/bg/1.png",
		        base_url+"/assets/images/bg/2.png",
		        base_url+"/assets/images/bg/3.png"
		        ], {
		          fade: 1000,
		          duration: 4000
		    	}
        	);
        }
    };

}();

jQuery(document).ready(function() {
    Login.init();
});