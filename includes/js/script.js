/***** FRONTEND *****/
$(document).ready(function() {
    /* Перетаскивание блоков */
    $(function () {
        $("#sortable").sortable({handle: 'i.vlg-two__move', placeholder: "vlg-placeholder"});
        $("#sortable").disableSelection();
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
            
        },
        function () {
            var parentBlock = $(this).closest('.vlg-catalog__item');
            parentBlock.removeClass('vlg-catalog__BlActive');
            $(this).find('i').removeClass('fa-times fa-add-red');
            $(this).find('i').addClass('fa-plus fa-add-green');
            $(this).find('span').text('Добавить');

        }
    );




















});