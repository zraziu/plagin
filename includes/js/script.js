/***** FRONTEND *****/
$(document).ready(function() {
    /* Перетаскивание блоков */
    $(function () {
        $("#vlgListExc").sortable({handle: 'i.vlg-two__move', placeholder: "vlg-placeholder"});
        $("#vlgListExc").disableSelection();
    });

    // счетчики экск
    let vlgA = 0;
    let vlgB = 0;

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







    // функции 
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





});