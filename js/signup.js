function submitSignup() {
    var info = {
        lastname: [document.getElementById('lastname').value.trim(), true],
        firstname: [document.getElementById('firstname').value.trim(), false],
        email: [document.getElementById('email').value.trim(), true],
        password: [document.getElementById('password').value.trim(), true],
        confirmedpassword: [document.getElementById('confirmedpassword').value.trim(), true],
        language: [document.getElementById('language').value.trim(), false],
        country: [document.getElementById('country').value.trim(), false],
        dob: [document.getElementById('dob').value.trim(), false],
    };

    // Check for compulsory fields
    var compulsory = true;
    for (var property in info) {
        if (info.hasOwnProperty(property)) {
            if (info[property][1]) {
                if (info[property][0].trim() == '') {
                    document.getElementById(property).parentNode.style.border = '1px solid red';
                    compulsory = false;
                } else {
                    document.getElementById(property).parentNode.style.border = 'none';
                }
            }
        }
    }

    // Check for password comfirmation
    if (!compulsory) {
        alert('Please enter the compulsory fields');
    } else {
        // Check for the password match
        if (info.password[0] == info.confirmedpassword[0]) {
            if (validateEmail(info.email[0])) {
                if (info.password[0].length < 6) {
                    alert('Password must be more than 6 letters and/or digits');
                    document.getElementById('password').parentNode.style.border
                        = '1px solid red';
                    document.getElementById('confirmedpassword').parentNode.style.border
                        = '1px solid red';
                } else {
                    console.log('OK I am fine');
                }
            } else {
                document.getElementById('email').parentNode.style.border = '1px solid red';
                alert('Email is not in right format');
            }
        } else {
            alert('Password mismatched. Please type again.');
        }
    }

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
}