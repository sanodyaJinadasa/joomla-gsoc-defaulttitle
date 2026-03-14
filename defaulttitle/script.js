document.addEventListener('DOMContentLoaded', function () {

    var titleField = document.getElementById('jform_title');

    if (!titleField || titleField.value !== '') return;

    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'index.php?option=com_ajax&plugin=defaulttitle&group=content&format=json', true);

    xhr.onload = function() {

        if (xhr.status === 200) {

            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                titleField.value = response.data;
            }
        }
    };

    xhr.send();
});