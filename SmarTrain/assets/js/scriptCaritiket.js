function field_focus(field, tabel) {
    if (field.value == tabel) {
        field.value = '';
    }
}

function field_blur(field, tabel) {
    if (field.value == '') {
        field.value = tabel;
    }
}

//Fade in dashboard box
$(document).ready(function () {
    $('.box').hide().fadeIn(1000);
});

//Stop click event
$('a').click(function (event) {
    event.preventDefault();
});