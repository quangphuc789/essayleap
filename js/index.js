(function(){
    $.ajax({
        url: "backend/service/topic.php?cat=all",

        success: function(result, status, xhr) {
            console.log(result);
        }
    });
})();