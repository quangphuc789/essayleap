(function(){
    var contentDiv = document.getElementById('mailing-content');
    tinymce.init({
        selector: '#editor',
    });

    var submitBtn = document.getElementById('submit');
    submitBtn.onclick = function() {
        var content = tinyMCE.get('editor').getContent();
        console.log(decodeHtml(content));

        $.ajax({
            url: "backend/service/mail.php?type=send",
            type: "POST",
            data: "content="+decodeHtml(content),
            success: function(result, status, xhr) {
                console.log(result);
                // if (result == 1) {
                //     location.reload();
                // } else {
                //     var login_result = document.getElementById('login-result');
                //     if (login_result!=null) {
                //         login_result.innerHTML = 'Login failed. Please try again.';
                //     }
                // }
            },
        });
    }

    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
})();