<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src='js/signup.js'></script>
    </head>
    <body>
        <table>
            <tr>
                <td>Last Name *</td>
                <td><input id='lastname' type='text'/></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input id='firstname' type='text'/></td>
            </tr>
            <tr>
                <td>Email *</td>
                <td><input id='email' type='text'/></td>
            </tr>
            <tr>
                <td>Password *</td>
                <td><input id='password' type='password'/></td>
            </tr>
            <tr>
                <td>Confirm Password *</td>
                <td><input id='confirmedpassword' type='password'/></td>
            </tr>
            <tr>
                <td>Primary Language</td>
                <td><input id='language' type='text'/></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input id='country' type='text'/></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input id='dob' type='date'/></td>
            </tr>
            <tr>
                <td>
                    <button onclick='submitSignup()'>SUBMIT</button>
                </td>
            </tr>
        </table>
    </body>
</html>