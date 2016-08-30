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
            var essay = addDOM('div', list, null, null, 'essay-item');
            addDOM('div', essay, '\"'+item.text.substring(0, 150) + '... \"', null, 'essay-item-text');
            addDOM('div', essay, 'Author: '+item.author);
            addDOM('div', essay, 'Word Count: '+item.word_count);
            addDOM('div', essay, 'Upvote: '+item.upvote);
            addDOM('div', essay, 'Downvote: '+item.downvote);
            addDOM('div', essay, 'Duration: '+item.duration);
            addDOM('div', essay, 'Submitted Time: '+item.timestamp);

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

function attemptEssay() {
    openOverlay();
    document.getElementById('essay-title').innerHTML = 
        document.getElementById('text').innerHTML;

    var edit = document.getElementById('essay-content');
    edit.innerHTML = '';
    edit.contentEditable = true;
    edit.style.minHeight = '50%';
}