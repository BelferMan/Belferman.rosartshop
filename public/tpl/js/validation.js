$('.signin_submit').on('click', function (e) {
    e.preventDefault();
    var email = $('.signin_email').val().trim();
    var password = $('.signin_password').val().trim();


    var emailRegEx = /^(?!.*\.\.)[\w.\-#!$%&'*+\/=?^_`{}|~]{1,35}@[\w.\-]+\.[a-zA-Z]{2,15}$/

    if (password.length < 2 || password.length > 70) {
        $('.error_pass').text('* Enter valid password.');
        Pvalid = false;
    } else {
        $('.error_pass').text('');
        Pvalid = true;
    }

    if (!emailRegEx.test(email)) {
        $('.error_mail').text('* Enter valid email.');
        Evalid = false;
    } else {
        $('.error_mail').text('');
        Evalid = true;
    }

    if (Evalid && Pvalid) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: MAIN_URL + '/user/sign-in',
            data: {
                email: email,
                password: password

            },
            success: function (res) {
                if (res == 1) {
                    window.location.reload();
                } else if (res == 0) {
                    $('.error_mail').text('* Invalid username/password combination');
                }
            }
        });
    }
})

$('.register_submit').on('click', function (e) {

    e.preventDefault();
    var email = $('.register_email').val().trim();
    var password = $('.register_password').val().trim();
    var name = $('.register_name').val().trim();

    var emailRegEx = /^(?!.*\.\.)[\w.\-#!$%&'*+\/=?^_`{}|~]{1,35}@[\w.\-]+\.[a-zA-Z]{2,15}$/

    if (password.length < 2 || password.length > 70) {
        $('.register_error_pass').text('* Enter valid password.');
        Pvalid = false;
    } else {
        $('.register_error_pass').text('');
        Pvalid = true;
    }

    if (!emailRegEx.test(email)) {
        $('.register_error_mail').text('* Enter valid email.');
        Evalid = false;
    } else {
        $('.register_error_mail').text('');
        Evalid = true;
    }

    if (name.length < 2 || name.length > 70) {
        $('.register_error_name').text('* Enter valid name.');
        Nvalid = false;
    } else {
        $('.register_error_name').text('');
        Nvalid = true;
    }

    if (Evalid && Pvalid && Nvalid) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: MAIN_URL + '/user/register',
            data: {
                email: email,
                password: password,
                name: name

            },
            success: function (res) {
                if (res == 1) {
                    window.location.reload();
                } else if (res == 0) {
                    $('.register_error_mail').text('* Email already taken.');
                }
            }
        });
    }

});
