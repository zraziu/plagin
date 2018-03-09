/***** FRONTEND *****/
$(document).ready(function() {
    /* Перетаскивание блоков */
    $(function () {
        $("#vlgListExc").sortable({handle: 'i.vlg-two__move', placeholder: "vlg-placeholder"});
        $("#vlgListExc").disableSelection();
    });
    /*
    Нажимаем на блок в модал - добавляем класс + добавляем в список
    */

    $("#vlgModal .vlg-add-exc, #vlgModal .vlg-add-musem").toggle(
        function () {
            var parentBlock = $(this).closest('.vlg-catalog__item');
            parentBlock.addClass('vlg-catalog__BlActive');
            $(this).find('i').removeClass('fa-plus fa-add-green');
            $(this).find('i').addClass('fa-times fa-add-red');
            $(this).find('span').text('Удалить');

            // добавить в список
            var vlgListExc = '<div class="vlg-two__item"><div class="vlg-two_info"><div class="vlg-two__time">'+ parentBlock.find('.vlg-catalog__hours').text() +'</div><div class="vlg-two__bus">Автобус</div></div><div class="vlg-two_title">'+ parentBlock.find('.vlg-catalog__title').text() +'<div class="vlg-two__btn"><i class="fa fa-trash fa-red vlg-two__delete"></i> <i class="fa fa-arrows vlg-two__move"></i></div></div></div>';

            $('#vlgListExc').append(vlgListExc);
            
        },
        function () {
            var parentBlock = $(this).closest('.vlg-catalog__item');
            parentBlock.removeClass('vlg-catalog__BlActive');
            $(this).find('i').removeClass('fa-times fa-add-red');
            $(this).find('i').addClass('fa-plus fa-add-green');
            $(this).find('span').text('Добавить');

            // удалить из списка
            var vlgTitleExc = parentBlock.find('.vlg-catalog__title').text();
            $('#vlgListExc .vlg-two__item').filter(':contains('+ vlgTitleExc +')').remove();

        }
    );




















});