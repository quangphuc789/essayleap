(function(){
    $.ajax({
        url: "backend/service/topic.php?cat=all",

        success: function(result, status, xhr) {
            displayTopicTable(result);
        }
    });

    function displayTopicTable(topics) {
        var table = document.getElementById('popular-table');

        for (var i = 0; i < topics.length; i++) {
            var row = table.insertRow(-1);

            var cell = row.insertCell(-1);
            cell.innerHTML = topics[i].category;
            var cell = row.insertCell(-1);
            cell.innerHTML = topics[i].exam;
            var cell = row.insertCell(-1);
            cell.innerHTML = topics[i].text;
            var cell = row.insertCell(-1);
            cell.innerHTML = topics[i].star;
            var cell = row.insertCell(-1);
            cell.innerHTML = topics[i].timestamp;
        }
    }
})();