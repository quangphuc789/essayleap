function addDOM(dom, parent, html, id, className) {
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
        $.ajax({
            url: "backend/service/user.php?type=login",
            type: "POST",
            data: "email="+email+"&password="+password,
            success: function(result, status, xhr) {
                console.log(result);
            },
        });
    }
}