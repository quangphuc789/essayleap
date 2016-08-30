function getTopicInfo(id) {
    $.ajax({
        url: "backend/service/topic.php?id="+id,

        success: function(result, status, xhr) {
            displayTopicContent(result);
        }
    });

    function displayTopicContent(content) {
        displayTopicIntroduction(content.topic);
        displayEssays(content.essay);
    }

    function displayTopicIntroduction(data) {
        console.log(data);
    }

    function displayEssays(data) {
        console.log(data);
    }
}

