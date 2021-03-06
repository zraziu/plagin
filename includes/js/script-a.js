/***** АДМИНКА *****/
// Показать - скрыть блок цен
var elems = document.getElementsByName('pricePerPerson'); //массив radio кнопок
document.addEventListener("DOMContentLoaded", ready); // стр загрузилась, выполняется функия ready

function ready() {
    for(var i = 0; i < elems.length; i++) {
        if (elems[i].checked) {
            document.getElementById('Block1').style.display='none';
            document.getElementById('Block2').style.display='none';
            document.getElementById('Block3').style.display='none';

            document.getElementById('Block'+(i+1)).style.display='block';


            // если 2 или 3 блок
            if (i == 1) {
                $('#Block3 input').attr('name', '0');
                $('#Block2 input').attr('name', 'prise');
            } else if (i == 2) {
                $('#Block2 input').attr('name', '0');
                $('#Block3 input').attr('name', 'prise');
            }

            // меняем иконку человек-группа
            /*
            if (i == 1 ) {
                $('#Block2 input').val($('#Block3 input').val());
            } else {
                $('#Block3 input').removeClass('icon-male');
                $('#Block2 input').addClass('icon-users');
            }
            */
        }
    }
}

// Кнопка загрузки изображений - "Upload" button
$('.upload_image_button').click(function() {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = $(this);
    wp.media.editor.send.attachment = function(props, attachment) {
        $(button).parent().prev().attr('src', attachment.url);
        $(button).prev().val(attachment.id);
        wp.media.editor.send.attachment = send_attachment_bkp;
    }
    wp.media.editor.open(button);
    return false;
});

// Кнопка удалить - The "Remove" button (remove the value from input type='hidden')
$('.remove_image_button').click(function() {
    var answer = confirm('Вы уверены?');
    if (answer == true) {
        var src = $(this).parent().prev().attr('data-src');
        $(this).parent().prev().attr('src', src);
        $(this).prev().prev().val('');
    }
    return false;
});