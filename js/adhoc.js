function create_element(dom, parent, html, id, className) {
    if (dom != null) {
        var element = document.createElement(dom);
        if (id != null) element.id = id;
        if (className != null) element.className = className;
        if (html != null) element.innerHTML = html;
        if (parent != null) parent.appendChild(element);
        return element;
    }

    return null;
}

function login() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email=='' || password=='') {
        alert('Please enter email & password');
    } else {
        var login_result = document.getElementById('login-result');
        if (login_result != null) {
            var img = create_element('img', null, null, '', login_result);
            img.src = 'images/loading.svg';
        }
        $.ajax({
            url: "backend/service/user.php?type=login",
            type: "POST",
            data: "email="+email+"&password="+password,
            success: function(result, status, xhr) {
                if (result == 1) {
                    location.reload();
                } else {
                    var login_result = document.getElementById('login-result');
                    if (login_result!=null) {
                        login_result.innerHTML = 'Login failed. Please try again.';
                    }
                }
            },
        });
    }
}