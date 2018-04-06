/***** FRONTEND *****/
$(document).ready(function() {
    let inputPeople = 0;
    let inputPeople16 = 40;
    let inputPeople18 = 0;
    let inputPeopleFree = 4;
    let calcInputPeople = 0;
    let vlgDay = 1;
    let vlgHotelPrise = 0;
    let excCommission = $("#vlgBtnPrise").data("commis").split(';'); // массив
    let vlgEatP = $('#vlgEat').data('eat').split(';'); // массив цен питание
    let vlgBusP = $('#btnDropdownBus').data('bus').split(';'); // массив цен автобуса

    let vlgExc = 0; // цена экскурсий
    let vlgHotel = 0; // цена на отель
    let vlgEat = 0; // цена на питание
    let vlgBus = 0;  // цена на автобус
    let commis = 0;


    /* кол-во человек */
    $('#vlgPeople input').change(function() {
        inputPeople = $.isNumeric($("input#inputPeople").val()) ? +$("input#inputPeople").val() : 0;
        inputPeople16 = $.isNumeric($("input#inputPeople16").val()) ? +$("input#inputPeople16").val() : 0;
        inputPeople18 = $.isNumeric($("input#inputPeople18").val()) ? +$("input#inputPeople18").val() : 0;
        inputPeopleFree = $.isNumeric($("input#inputPeopleFree").val()) ? +$("input#inputPeopleFree").val() : 0;
        calcInputPeople = inputPeople + inputPeople18 + inputPeople16 + inputPeopleFree; /* Кол-во человек */

        $("#inputPeopleFree").attr( "max", (calcInputPeople != 0) ? calcInputPeople-1 : 0 ); // Макс бесплатных чел
        $("span.btnDropdownPeople").text(Math.round(calcInputPeople - inputPeopleFree)); // итого человек на кноп
        $("span.btnDropdownPeopleFree").text(' + ' + Math.round(inputPeopleFree)); // итого беспатно на кноп
    });

    /* кол-ва дней */
    $('#vlgDay input:radio').change(function() {
        vlgDay = $('#vlgDay input:checked').val(); // кол-во
        $( "#vlgDropdownDay" ).text(vlgDay);

        /* Проживание */
        if (vlgDay >= 2) {
            $('#vlgHotel').css('display', 'flex');
        } else {
            $('#vlgHotel').css('display', 'none');
        }

        /* Питание */
        $('[id ^= vlgEatDay]').css('display', 'none');
        $('[id ^= vlgEatDay]').removeClass('vlg-eat__BlActive');

        let eati = 1;
        while (eati <= vlgDay) {
            $('#vlgEatDay'+eati).css('display', 'flex');
            $('#vlgEatDay'+eati).addClass('vlg-eat__BlActive');
            eati++;
        }
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
            vlgHotelPrise = 0; // цена проживания
        } else {
            $('#vlgHotelModal .vlg-catalog__item').removeClass('vlg-catalog__BlActive');
            $('#vlgHotelModal i.fa-add-exc').replaceWith('<i class="fa fa-plus fa-add-exc fa-add-green"><span>Выбрать</span></i>');
            $('#vlgDropdownHotel').text(' без проживания');

            parentBlock.addClass('vlg-catalog__BlActive');
            parentBlock.find('i.fa-add-exc').replaceWith('<i class="fa fa-times fa-add-exc fa-add-red"><span>Отменить</span></i>');
            $('#vlgDropdownHotel').text(parentBlock.find('.vlg-catalog__title').text());
            vlgHotelPrise = parentBlock.data("price"); // цена проживания
        }

    });

    /* Выбор экскурсий */
    $("#vlgModal .vlg-add-exc, #vlgModal .vlg-add-musem").click(function () {
        let parentBlock = $(this).closest('.vlg-catalog__item');

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
            let vlgListExc = '<div id="'+ parentBlock.attr('id') +'list" class="vlg-two__item '+ parentBlock.attr('id') +'"><div class="vlg-two_info"><div class="vlg-two__time">'+ parentBlock.find('.vlg-catalog__hours span').text() +'</div><div class="vlg-two__bus">Автобус</div></div><div class="vlg-two_title">'+ parentBlock.find('.vlg-catalog__title').text() +'<div class="vlg-two__btn"><i class="fa fa-trash fa-red vlg-two__delete"></i> <i class="fa fa-arrows vlg-two__move"></i></div></div></div>';
            $('#vlgListExc').append(vlgListExc);
            // счетчик
            countExc(parentBlock, 'plus');
        }

        countBus();// пересчет автобуса
    });
    $('#vlgListExc').on('click', 'i.vlg-two__delete', function(){ // удаление блоков в списке
        let vlgListItem = $(this).closest('.vlg-two__item'); // нужный блок
        let vlgListItemId = $('#vlgModal #'+vlgListItem.attr("id").split('list')[0]); // нужный блок модал
        vlgListItem.remove(); // удалить в списке
        vlgListItemId.removeClass('vlg-catalog__BlActive'); // удалить в модальном
        vlgListItemId.find('i.fa-add-exc').replaceWith('<i class="fa fa-plus fa-add-exc fa-add-green"><span>Добавить</span></i>');
        // счетчик
        countExc(vlgListItemId, 'minus');
        countBus();// пересчет автобуса
    });

    /* Выбор питания */
    $('#vlgEat input').change(function(){
        countBus();// пересчет автобуса
    });

    /* Расчет стоимости */
    $('#vlgBtnPrise').click(function() {

        /* Экскурсии */
        function calcExc () {
            vlgExc = 0;
            if ($("#vlgExcModal .vlg-catalog__item").is('.vlg-catalog__BlActive')) {
                $("#vlgExcModal .vlg-catalog__BlActive").each(function(){
                    if ($(this).data('person') == 'per-person') {       // на любого чел
                        vlgExc = vlgExc + $(this).data('price') * calcInputPeople;
                    } else if ($(this).data('person') == 'per-group') { // на группу
                        vlgExc = vlgExc + $(this).data('price');
                    } else {                                            // на чел по возр
                        let p = $(this).data('price').split(';');
                        vlgExc = vlgExc + (p[0] * inputPeople16) + (p[1] * inputPeople18) + (p[2] * inputPeople) + (p[2] * inputPeopleFree);
                    }
                })
            }
        }

        /* Проживание */
        function calcHotel () {
            vlgHotel = 0;
            if ($("#vlgHotelModal .vlg-catalog__item").is('.vlg-catalog__BlActive')) {
                $("#vlgHotelModal .vlg-catalog__BlActive").each(function(){
                        vlgHotel = vlgHotel + $(this).data('price') * calcInputPeople;
                })
            }
        }

        /* Питание */
        function calcEat () {
            vlgEat = 0;
            $("#vlgEat .vlg-eat__BlActive").each(function(){  // кол-во дней
                // кол-во завтр отмеч * завтр цена * кол-во чел
                let vlgEat1 = $('#vlgEat input.eat-breakfast:checked').length * vlgEatP[0] * calcInputPeople;
                let vlgEat2 = $('#vlgEat input.eat-lunch:checked').length * vlgEatP[1] * calcInputPeople;
                let vlgEat3 = $('#vlgEat input.eat-dinner:checked').length * vlgEatP[2] * calcInputPeople;
                vlgEat = vlgEat1 + vlgEat2 + vlgEat3; // итого
            });
        }

        /* Автобус */
        function calcBus () {
            let busHour = $.isNumeric($("#btnDropdownBus").text()) ? +$("#btnDropdownBus").text() : 0;// +$("#btnDropdownBus").text(); // Берем кол-во часов
            //if (busHour<3) busHour = 3;  // минимум 3 часа

            if (calcInputPeople>60) { //calcInputPeople кол-во чел
                vlgBus = busHour*vlgBusP[0];
            } else if (calcInputPeople>40) {
                vlgBus = busHour*vlgBusP[1];
            } else if (calcInputPeople>17) {
                vlgBus = busHour*vlgBusP[2];
            } else if (calcInputPeople > 0) {
                vlgBus = busHour*vlgBusP[3];
            }
        }
        /* Комиссия */
        function calcCommission() {
            commis = 0;

            let chk = $("#vlgExcModal .vlg-catalog__BlActive").length;
            chk = (chk > 4) ? chk-4 : 0; // от 4 экск
    
            let commisP = 0;
            let ii = 1;
            while (ii <= chk) {
                commisP += 20;
                ii++;
            }
            if (calcInputPeople<10) {
                commis = (+excCommission[0]+commisP*chk)*calcInputPeople;
            } else if (calcInputPeople<30) {
                commis = (+excCommission[1]+commisP*chk)*calcInputPeople;
            } else if (calcInputPeople<40) {
                commis = (+excCommission[2]+commisP*chk)*calcInputPeople;
            } else {
                commis = (+excCommission[3]+commisP*chk)*calcInputPeople; // больше 41 чел
            }
            commis = (commis > 20000) ? 20000 : commis;  // не больше 20000
        }

        calcExc();
        calcHotel();
        calcEat();
        calcBus ();
        calcCommission();

        console.log(vlgBus + '-цена автобус; ');
    });


    // функции
    /* счетчики экск */
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

    /* Счтаем часы автобуса */
    function countBus(){
        let busH = 0;
        let busM = 0;
        // собираем экскурсии
        $('#vlgListExc .vlg-two__item').each(function() {
            // проверяем переключатель авто-пешком
            if ($(this).find('.vlg-two__bus')) { // поменять vlg-two__bus на флаг переключателя
                // обрезаем + складываем
                busH = + $(this).find('.vlg-two__time').text().split('ч')[0] + busH;
                busM = + $(this).find('.vlg-two__time').text().slice(-3, -1) + busM;
            }
        });
        // минуты в часы
        if (busM >= 1) {
            let mins = busM % 60;
            let hours = (busM - mins) / 60;
            /*  // добавляем 0 и :
            if (mins = 0) {
                mins = '';
            } else if (mins < 10) {
                mins = ':0' + mins;
            } else {
                mins = ':' + mins;
            } */
            // округляем до часа
            if (mins > 20) busH = busH + 1;

            busH = busH + hours;
            busM = mins;
        }

        busH = + $('#vlgEat .vlg-eat__BlActive input:checked').length + busH; // питание
        $('#btnDropdownBus').text(busH);
        $('#inputBus').val(busH);
        //console.log(busH+':'+busM);
}

    /* Перетаскивание блоков */
    $(function () {
        $("#vlgListExc").sortable({handle: 'i.vlg-two__move', placeholder: "vlg-placeholder"});
        $("#vlgListExc").disableSelection();
    });


    /* Отодвигаем блок помощь */
    $('#vlgExcModal, #vlgHotelModal').on('show.bs.modal', function (e) {
        $('#sh_button').css('right', '20px');
    });
    $('#vlgExcModal, #vlgHotelModal').on('hide.bs.modal', function (e) {
        $('#sh_button').css('right', '0');
    });

});