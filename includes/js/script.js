/***** FRONTEND *****/
$(document).ready(function() {
    /* Перетаскивание блоков */
    $(function () {
        $("#vlgListExc").sortable({handle: 'i.vlg-two__move', placeholder: "vlg-placeholder"});
        $("#vlgListExc").disableSelection();
    });

    $("#vlgModal .vlg-add-exc").click(function () {
        var parentBlock = $(this).closest('.vlg-catalog__item');

        if (parentBlock.is('.vlg-catalog__BlActive')) {
            parentBlock.removeClass('vlg-catalog__BlActive');
            $(this).find('i.fa-add-exc').removeClass('fa-times fa-add-red');
            $(this).find('i.fa-add-exc').addClass('fa-plus fa-add-green');
            $(this).find('i.fa-add-exc span').text('Добавить');
            // удалить из списка
            $('#vlgListExc [id ^= "'+ parentBlock.attr('id') +'"]').remove();

        } else {
            parentBlock.addClass('vlg-catalog__BlActive'); // стиль блок м

            $(this).find('i.fa-add-exc').removeClass('fa-plus fa-add-green');
            $(this).find('i.fa-add-exc').addClass('fa-times fa-add-red');
            $(this).find('i.fa-add-exc span').text('Удалить');

            // добавить в список строку
            var vlgListExc = '<div id="'+ parentBlock.attr('id') +'list" class="vlg-two__item '+ parentBlock.attr('id') +'"><div class="vlg-two_info"><div class="vlg-two__time">'+ parentBlock.find('.vlg-catalog__hours').text() +'</div><div class="vlg-two__bus">Автобус</div></div><div class="vlg-two_title">'+ parentBlock.find('.vlg-catalog__title').text() +'<div class="vlg-two__btn"><i class="fa fa-trash fa-red vlg-two__delete"></i> <i class="fa fa-arrows vlg-two__move"></i></div></div></div>';
            $('#vlgListExc').append(vlgListExc);

        }
    });

    $('#vlgListExc').on('click', 'i.vlg-two__delete', function(){
        var vlgListItem = $(this).closest('.vlg-two__item'); // нужный блок
        var vlgListItemId = $('#vlgModal #'+vlgListItem.attr("id").split('list')[0]); // нужный блок модал

        vlgListItem.remove(); // удалить в списке

        vlgListItemId.removeClass('vlg-catalog__BlActive'); // удалить в модальном
        vlgListItemId.find('i.fa-add-exc').removeClass('fa-times fa-add-red');
        vlgListItemId.find('i.fa-add-exc').addClass('fa-plus fa-add-green');
        vlgListItemId.find('i.fa-add-exc span').text('Добавить');

    });



















});