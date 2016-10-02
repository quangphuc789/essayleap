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
        var content = data[0];
        if (content != null) {
            if (content.category != null) {
                document.getElementById('category').innerHTML = content.category;
            }
            if (content.exam != null) {
                document.getElementById('exam').innerHTML = content.exam;
            }
            if (content.text != null) {
                document.getElementById('text').innerHTML = '<b>'+content.text+'</b>';
            }
            if (content.star != null) {
                document.getElementById('star').innerHTML = content.star;
            }
            if (content.timestamp != null) {
                document.getElementById('timestamp').innerHTML = content.timestamp;
            }
        }
    }

    function displayEssays(data) {
        var intro = document.getElementById('essay-intro');
        if (data.length == 1) {
            intro.innerHTML = 'There is 1 essay submitted';
        } else if (data.length > 1) {
            intro.innerHTML = 'There are ' + data.length + ' essays submitted';
        } else {
            intro.innerHTML = 'There is no essay submitted, could you be the first? :) ';
            return;
        }

        var list = document.getElementById('essay-list');
        for (var i = 0; i < data.length; i++) {
            var item = data[i];
            var essay = create_element('div', null, 'essay-item', '', list);
            create_element('div', null, 'essay-item-text', '\"'+item.text.substring(0, 150) + '... \"', essay);
            create_element('div', null, null, 'Author: '+item.author, essay);
            create_element('div', null, null, 'Word Count: '+item.word_count, essay);
            create_element('div', null, null, 'Upvote: '+item.upvote, essay);
            create_element('div', null, null, 'Downvote: '+item.downvote, essay);
            create_element('div', null, null, 'Duration: '+item.duration, essay);
            create_element('div', null, null, 'Submitted Time: '+item.timestamp, essay);

            essay.onclick = function() {
                openOverlay();
                populateEssay();
            }
        }

        function populateEssay() {
            document.getElementById('essay-title').innerHTML = 
                document.getElementById('text').innerHTML;
            document.getElementById('essay-content').innerHTML = item.text.replace(/\n/g, '<br>')+item.text.replace(/\n/g, '<br>');
        }
    }
}

function openOverlay() {
    document.getElementById("overlay-back").style.display = "block";
    document.getElementById("overlay").style.display = "block";
    document.getElementById("overlay").style.opacity = 1;
}

function closeOverlay() {
    document.getElementById("overlay-back").style.display = "none";
    document.getElementById("overlay").style.display = "none";
    document.getElementById('essay-content').innerHTML = '';
    document.getElementById('essay-content').contentEditable = false;
}

function attemptEssay(id) {
    openOverlay();
    document.getElementById('essay-title').innerHTML = 
        document.getElementById('text').innerHTML;

    var edit = document.getElementById('essay-content');
    edit.innerHTML = '';
    edit.contentEditable = true;
    edit.style.minHeight = '50%';

    var info = document.getElementById('essay-info');
    info.innerHTML = '';
    var submit = create_element('button', null, 'btn btn-default', 'Submit', info);
    submit.onclick = function() {
        var content = document.getElementById('essay-content').innerHTML;
        var compressed_data = 'id='+id+'&content='+content;
        $.ajax({
            url: "backend/service/topic.php?submit=1",
            type: "POST",
            data: compressed_data,
            success: function(result, status, xhr) {
                console.log(result);
            }
        });
    }
}

