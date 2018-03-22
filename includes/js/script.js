/***** FRONTEND *****/
$(document).ready(function() {
    /* Перетаскивание блоков */
    $(function () {
        $("#vlgListExc").sortable({handle: 'i.vlg-two__move', placeholder: "vlg-placeholder"});
        $("#vlgListExc").disableSelection();
    });
    /* кол-ва дней */
    $('#vlgDay input:radio').change(function() {
        $( "#vlgDropdownDay" ).text($('#vlgDay input:checked').val());
    });

    /* Выбор отеля */
    $('#vlgHotelModal .vlg-add-exc').click(function() {
        var parentBlock = $(this).closest('.vlg-catalog__item'); // блок
        // поставить отметку
        if (parentBlock.is('.vlg-catalog__BlActive')) { // уже отмечен
            // все сбросить
            $('#vlgHotelModal .vlg-catalog__item').removeClass('vlg-catalog__BlActive');
            $('#vlgHotelModal i.fa-add-exc').replaceWith('<i class="fa fa-plus fa-add-exc fa-add-green"><span>Выбрать</span></i>');
            $('#vlgDropdownHotel').text(' без проживания');
        } else {
            $('#vlgHotelModal .vlg-catalog__item').removeClass('vlg-catalog__BlActive');
            $('#vlgHotelModal i.fa-add-exc').replaceWith('<i class="fa fa-plus fa-add-exc fa-add-green"><span>Выбрать</span></i>');
            $('#vlgDropdownHotel').text(' без проживания');

            parentBlock.addClass('vlg-catalog__BlActive');
            parentBlock.find('i.fa-add-exc').replaceWith('<i class="fa fa-times fa-add-exc fa-add-red"><span>Отменить</span></i>');
            $('#vlgDropdownHotel').text(parentBlock.find('.vlg-catalog__title').text());
        }

    });
    /* Выбор экскурсий */
    $("#vlgModal .vlg-add-exc, #vlgModal .vlg-add-musem").click(function () {
        var parentBlock = $(this).closest('.vlg-catalog__item');

        if (parentBlock.is('.vlg-catalog__BlActive')) { // удаление в модал
            parentBlock.removeClass('vlg-catalog__BlActive');
            parentBlock.find('i.fa-add-exc').replaceWith('<i class="fa fa-plus fa-add-exc fa-add-green"><span>Добавить</span></i>');
            // удалить из списка
            $('#vlgListExc [id ^= "'+ parentBlock.attr('id') +'"]').remove();
            // счетчик
            countExc(parentBlock, 'minus');
        } else {  // добавление в модал
            parentBlock.addClass('vlg-catalog__BlActive'); // добавить стиль
            parentBlock.find('i.fa-add-exc').replaceWith('<i class="fa fa-times fa-add-exc fa-add-red"><span>Удалить</span></i>');
            // добавить в список строку
            var vlgListExc = '<div id="'+ parentBlock.attr('id') +'list" class="vlg-two__item '+ parentBlock.attr('id') +'"><div class="vlg-two_info"><div class="vlg-two__time">'+ parentBlock.find('.vlg-catalog__hours span').text() +'</div><div class="vlg-two__bus">Автобус</div></div><div class="vlg-two_title">'+ parentBlock.find('.vlg-catalog__title').text() +'<div class="vlg-two__btn"><i class="fa fa-trash fa-red vlg-two__delete"></i> <i class="fa fa-arrows vlg-two__move"></i></div></div></div>';
            $('#vlgListExc').append(vlgListExc);
            // счетчик
            countExc(parentBlock, 'plus');
        }
    });
    $('#vlgListExc').on('click', 'i.vlg-two__delete', function(){ // удаление блоков в списке
        var vlgListItem = $(this).closest('.vlg-two__item'); // нужный блок
        var vlgListItemId = $('#vlgModal #'+vlgListItem.attr("id").split('list')[0]); // нужный блок модал
        vlgListItem.remove(); // удалить в списке
        vlgListItemId.removeClass('vlg-catalog__BlActive'); // удалить в модальном
        vlgListItemId.find('i.fa-add-exc').replaceWith('<i class="fa fa-plus fa-add-exc fa-add-green"><span>Добавить</span></i>');
        // счетчик
        countExc(vlgListItemId, 'minus');
    });

    /* Выбор питания */
    // выбор дней - открыть кол-во блоков
    $('#vlgDay').on('click', '.dropdown-item label', function(){
        let vlgDayN = $(this).text();

        if (vlgDayN >= 2) { // Блок проживание
            $('#vlgHotel').css('display', 'flex');
        } else {
            $('#vlgHotel').css('display', 'none');
        }

        /* Питание */
        // сбросить все
        $('[id ^= vlgEatDay]').css('display', 'none');

        let i = 1;
        while (i <= vlgDayN) {
            $('#vlgEatDay'+i).css('display', 'flex');
            i++;
        }

    });

    // функции

    // счетчики экск
    let vlgA = 0;
    let vlgB = 0;
    function countExc(block, operator) { // счетчик
        if (operator == 'plus') {
            if (block.is('[id ^= vlgEcx]')) {
                vlgA++;
            } else if (block.is('[id ^= vlgMusem]')) {
                vlgB++;
            }
        } else {
            if (block.is('[id ^= vlgEcx]')) {
                vlgA--;
            } else if (block.is('[id ^= vlgMusem]')) {
                vlgB--;
            }
        }

        $('#vlgExcModal #vlgSelectExc').text(vlgA);
        $('#vlgExcModal #vlgSelectMusem').text(vlgB);
    }



    /* Отодвигаем блок помощь */
    $('#vlgExcModal, #vlgHotelModal').on('show.bs.modal', function (e) {
        $('#sh_button').css('right', '20px');
    });
    $('#vlgExcModal, #vlgHotelModal').on('hide.bs.modal', function (e) {
        $('#sh_button').css('right', '0');
    });

});