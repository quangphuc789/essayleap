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
            console.log()
            console.log('fine. to send ajax');
        } else {
            alert('Password mismatched. Please type again.');
        }
    }

}