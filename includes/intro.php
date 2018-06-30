<?php
    // вывод записей
    include_once('m/vlg.php');
    $vlg = vlg_all();

echo '<link rel="stylesheet" type="text/css" href="'.plugins_url("vlg_plagin/includes/css/style.css").'">
          <script type="text/javascript" src="'.plugins_url("vlg_plagin/includes/js/script.js").'"></script>';
?>

<form  method="post" id="form-excursion">
<h2 class="excursion-switch-title">ШАГ 1: Основные данные</h2>

<div class="vlg-one">
    <div id="vlgPeople" class="btn-group btn-group-margin">
        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users fa-icon-btn" aria-hidden="true"></i> Человек: <span class="btnDropdownPeople"></span> <span class="btnDropdownPeopleFree"></span>
        </button>
        <div class="dropdown-menu">
            <div class="dropdown-item"><div class="dropdown-item-people">Дети до 15 лет</div><div class="number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputPeople16" class="input-calc-exc" type="text" min="0" max="100" value="40"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="dropdown-item"><div class="dropdown-item-people">Дети до 18 лет</div><div class="number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputPeople18" class="input-calc-exc" type="text" min="0" max="100" value="0"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span></div>
            </div>
            <div class="dropdown-item"><div class="dropdown-item-people">Взрослые</div><div class="number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputPeople" class="input-calc-exc" type="text" min="0" max="100" value="0"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span></div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="dropdown-item"><div class="dropdown-item-people">Бесплатно</div><div class="number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputPeopleFree"  class="input-calc-exc" type="text" min="0" max="10" value="4"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div id="vlgDay" class="btn-group btn-group-margin">
        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar fa-icon-btn" aria-hidden="true"></i> Ночей: <span id="vlgDropdownDay">1</span></button>
        <div class="dropdown-menu">
            <div class="dropdown-item"><input id="vlgDay1" type="radio" name="vlgDay" value="1" checked> <label for="vlgDay1">0</label></div>
            <div class="dropdown-item"><input id="vlgDay2" type="radio" name="vlgDay" value="2"> <label for="vlgDay2">1</label></div>
            <div class="dropdown-item"><input id="vlgDay3" type="radio" name="vlgDay" value="3"> <label for="vlgDay3">2</label></div>
            <div class="dropdown-item"><input id="vlgDay4" type="radio" name="vlgDay" value="4"> <label for="vlgDay4">3</label></div>
            <div class="dropdown-item"><input id="vlgDay5" type="radio" name="vlgDay" value="5"> <label for="vlgDay5">4</label></div>
        </div>
    </div>
    <div id="vlgHotel" class="btn-group btn-group-margin">
        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="modal" data-target=".modal-sm-hotel"><i class="fa fa-bed fa-icon-btn" aria-hidden="true"></i> Проживание: <span id="vlgDropdownHotel">нет</span></button>
    </div>
</div>


<h2 class="excursion-switch-title">ШАГ 2: Места, которые Вы хотите посетить</h2>
<div id="vlgListExc" class="vlg-two__list"></div> <!-- список -->
<div class="vlg-two__add" data-toggle="modal" data-target=".modal-sm-exc">
    <i class="fa fa-plus fa-lg fa-green"></i> Добавить экскурсию
</div>

<h2 class="excursion-switch-title">ШАГ 3: Дополнительные условия</h2>

<?php
$vlg = vlg_get(2);
$priceBus = 'data-bus="'.$vlg['prise18'].';'.$vlg['prise16'].';'.$vlg['prise0'].';'.$vlg['prise'].'"';

$vlg = vlg_get(4);
$priceEat = 'data-eat="'.$vlg['prise0'].';';

$vlg = vlg_get(5);
$priceEat = $priceEat.$vlg['prise0'].';';

$vlg = vlg_get(6);
$priceEat = $priceEat.$vlg['prise0'].'"';
?>
<div class="vlg-three">
    <div id="vlgEat" class="vlg-three__list" <?=$priceEat?>>
        <div id="vlgEatDay1" class="vlg-three__item vlg-eat__BlActive">
            <div class="vlg-three_info"><div class="vlg-two__time">1 день</div>
            </div><div class="vlg-three__title">
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-breakfast" value="Завтрак в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Завтрак</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-lunch" value="Обед в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Обед</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-dinner" value="Ужин в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Ужин</b></span>
                    </label>
                </div>
            </div>
        </div>
        <div id="vlgEatDay2" class="vlg-three__item">
            <div class="vlg-three_info"><div class="vlg-two__time">2 день</div>
            </div><div class="vlg-three__title">
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-breakfast" value="Завтрак в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Завтрак</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-lunch" value="Обед в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Обед</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-dinner" value="Ужин в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Ужин</b></span>
                    </label>
                </div>
            </div>
        </div>
        <div id="vlgEatDay3" class="vlg-three__item">
            <div class="vlg-three_info"><div class="vlg-two__time">3 день</div>
            </div><div class="vlg-three__title">
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-breakfast" value="Завтрак в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Завтрак</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-lunch" value="Обед в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Обед</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-dinner" value="Ужин в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Ужин</b></span>
                    </label>
                </div>
            </div>
        </div>
        <div id="vlgEatDay4" class="vlg-three__item">
            <div class="vlg-three_info"><div class="vlg-two__time">4 день</div>
            </div><div class="vlg-three__title">
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-breakfast" value="Завтрак в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Завтрак</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-lunch" value="Обед в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Обед</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-dinner" value="Ужин в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Ужин</b></span>
                    </label>
                </div>
            </div>
        </div>
        <div id="vlgEatDay5" class="vlg-three__item">
            <div class="vlg-three_info"><div class="vlg-two__time">5 день</div>
            </div><div class="vlg-three__title">
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-breakfast" value="Завтрак в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Завтрак</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-lunch" value="Обед в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Обед</b></span>
                    </label>
                </div>
                <div class="vlg-three__input">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input eat-dinner" value="Ужин в кафе города">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><b>Ужин</b></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group btn-group-margin">
        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bus fa-icon-btn" aria-hidden="true"></i> Трансфер: <span id="btnDropdownBus" class="btnDropdownBus" <?=$priceBus?>>0</span></button>
        <div class="dropdown-menu">
            <div class="dropdown-item">
                <label class="tgl" style="font-size:22px"><input type="checkbox" class="bus-to-or-no" checked /><span data-on="Туроператора" data-off="&nbsp;&nbsp;&nbsp;Заказчика&nbsp;&nbsp;&nbsp;"></span></label>
            </div>
            <div class="block-input-bus">
                <div class="dropdown-item"><div class="dropdown-item-people">Часов</div><div class="number dropdown-item-number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputBus" class="inputBus input-calc-exc" type="text" min="0" max="100" value="0"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="excursion-switch-title">ШАГ 4: Рассчет</h2>
<div class="vlg-four">
    <?php
    $vlg = vlg_get(1);
    $priceCommis = 'data-commis="'.$vlg['prise'].';'.$vlg['prise0'].';'.$vlg['prise16'].';'.$vlg['prise18'].'"';
    ?>

    <div id="vlgBtnPrise" class="vlg-two__add vlg-four__calc" <?=$priceCommis?>><i class="fa fa-calculator fa-green"></i> Рассчитать стоимость</div>
    <div class="vlg-four__price vlg-display-none">
        <div class="vlg-four__price-people">Итого <span id="vlgTotalPrice">0</span> руб за чел / </div><div class="vlg-four__price-group"><span id="vlgTotalPriceGroup">0</span> руб за группу<i class="asterisk">*</i></div>
    </div>
</div>
<p class="ad2  vlg-display-none"><i class="asterisk">*</i> - Цена расчитывается ориентировочно. Для более точного расчета ждем Вашу заявку.</p>


<h2 class="excursion-switch-title vlg-display-none">ШАГ 5: Заявка</h2>
<div class="vlg-five vlg-display-none">
    <div class="vlg-five__list">
        <div class="vlg-five__item better-placeholder">
            <span class="input-group-addon"><i class="fa fa-user-o fa-fw" aria-hidden="true"></i></span><input type="text" class="form-control form-control-modal better-placeholder__input" id="input_name" name="name" placeholder="Как к Вам обращаться?"><label for="input_name" class="better-placeholder__label">Как к Вам обращаться?</label>
        </div>
        <div class="vlg-five__item better-placeholder">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span><input type="email" class="form-control form-control-modal better-placeholder__input" id="input_email" name="email" placeholder="Куда Вам написать?"><label for="input_email" class="better-placeholder__label">Куда Вам написать?</label>
        </div>
        <div class="vlg-five__item better-placeholder">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"aria-hidden="true"></i></span><input type="tel" class="form-control form-control-modal better-placeholder__input" id="input_tel" name="tel" placeholder="Куда Вам позвонить?"><label for="input_tel" class="better-placeholder__label">Куда Вам позвонить?</label>
        </div>
    </div>

    <span class="inputHidden"></span>
    <button class="vlg-two__add" type="submit">
        <i class="fa fa-envelope fa-lg fa-green"></i> Отправить
    </button>
    <p class="msgs"></p>
</div>


<!-- Модальное Экскурсии -->
<div id="vlgExcModal" class="modal fade modal-sm-exc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="vlg-modal-close">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- Форма заявки -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Экскурсии <span id="vlgSelectExc">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Музеи <span id="vlgSelectMusem">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="region-tab" data-toggle="tab" href="#region" role="tab" aria-controls="region" aria-selected="false">Загородные <span id="vlgSelectObl">0</span></a>
                </li>
            </ul>

            <div class="tab-content vlg-modal" id="vlgModal">
                <!-- вкладка 1 -->
                <div class="tab-pane fade in active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="vlg-catalog">
                        <?
                        $vlg = vlg_cat('excursion');

                        $count = 0; // для id

                        foreach ($vlg as $op):
                            // цена
                            $priceInfo = ''; // прайс основной
                            $priceInfoDop = ''; // прайс доплата
                            if ($op['pricePerPerson'] == 'per-person-by-age') {
                                $priceInfo = 'data-price="'.$op['prise0'].';'.$op['prise16'].';'.$op['prise18'].'"';
                                $priceInfoDop = 'data-pricedop="'.$op['prise'].'"'; // цена доп за гида
                            } else if ($op['pricePerPerson'] == 'per-person') {
                                $priceInfo = 'data-price="'.$op['prise0'].'"';
                                $priceInfoDop = 'data-pricedop="'.$op['prise'].'"'; // цена доп за гида
                            } else {
                                $priceInfo = 'data-price="'.$op['prise'].'"';
                                $priceInfoDop = 'data-pricedop="0"';
                            }
                            // время
                            $timeInfo = '';
                            if (strlen($op['hours']) >= 2) {
                                $timeInfo = '<div>продолжительность</div> <span><i class="fa fa-clock-o"></i> '.substr($op['hours'], 0, 1).' ч '.substr($op['hours'], 2, 2).'м</span>';
                            } else {
                                $timeInfoName = '';
                                if ($op['hours'] == 1) {
                                    $timeInfoName = ' час';
                                } else if ($op['hours'] >= 2 && $op['hours'] <= 4) {
                                    $timeInfoName = ' часа';
                                } else if ($op['hours'] >= 5) {
                                    $timeInfoName = ' часов';
                                }
                                $timeInfo = '<div>продолжительность</div> <span><i class="fa fa-clock-o"></i> '.$op['hours'].$timeInfoName.'</span>';
                            }
                            // цена на чел или группу
                            $pricePerPerson = 'data-person="'.$op['pricePerPerson'].'"';
                            ?>

                            <div id="vlgEcx<?=$count?>" class="vlg-catalog__item" <?=$priceInfo?> <?=$pricePerPerson?> <?=$priceInfoDop?>>
                                <div class="vlg-catalog__photo">
                                    <img src="<? echo wp_get_attachment_image_url( $op['imgUpload'], array(300, 200) ); ?>" alt="">
                                    <div class="vlg-catalog__triangle"></div>
                                    <div class="vlg-catalog__title"><?=$op['name']?></div>
                                </div>
                                <div class="vlg-catalog__discription">
                                    <div class="vlg-catalog__info">
                                        <div class="vlg-catalog__hours"><?=$timeInfo?></div>
                                        <div class="vlg-catalog__rating"><div>рейтинг</div> <span><i class="fa fa-signal" aria-hidden="true"></i> <?=$op['rating']?></span></div>
                                    </div>
                                    <div class="vlg-catalog__text"><?=$op['description']?></div>
                                    <div class="vlg-catalog__footer">
                                        <?
                                        if ($op['urlPage']) {
                                            echo '<a href="'.$op['urlPage'].'" target="_blank" class="vlg-catalog__link"><i class="fa fa-link fa-link-exc"><span>Подробно</span></i></a>';
                                        } else {
                                            echo '<div></div>';
                                        }
                                        ?>
                                        <div class="vlg-add-exc"><i class="fa fa-plus fa-add-exc fa-add-green"><span>Добавить</span></i></div>
                                    </div>
                                </div>
                            </div>


                        <?
                            $count++; // id
                            endforeach;
                        ?>
                    </div>
                </div>
                <!-- вкладка 2 -->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="vlg-catalog">
                        <?
                        $vlg = vlg_cat('musem');

                        $count = 0; // для id

                        foreach ($vlg as $op):
                            // цена
                            $priceInfo = ''; // прайс основной
                            $priceInfoDop = ''; // прайс доплата
                            if ($op['pricePerPerson'] == 'per-person-by-age') {
                                $priceInfo = 'data-price="'.$op['prise0'].';'.$op['prise16'].';'.$op['prise18'].'"';
                                $priceInfoDop = 'data-pricedop="'.$op['prise'].'"';
                            } else if ($op['pricePerPerson'] == 'per-person') {
                                $priceInfo = 'data-price="'.$op['prise0'].'"';
                                $priceInfoDop = 'data-pricedop="'.$op['prise'].'"';
                            } else {
                                $priceInfo = 'data-price="'.$op['prise'].'"';
                                $priceInfoDop = 'data-pricedop="0"';
                            }
                            // время
                            $timeInfo = '';
                            if (strlen($op['hours']) >= 2) {
                                $timeInfo = '<div>продолжительность</div> <span><i class="fa fa-clock-o"></i>'.substr($op['hours'], 0, 1).' ч '.substr($op['hours'], 2, 2).'м</span>';
                            } else {
                                $timeInfoName = '';
                                if ($op['hours'] == 1) {
                                    $timeInfoName = ' час';
                                } else if ($op['hours'] >= 2 && $op['hours'] <= 4) {
                                    $timeInfoName = ' часа';
                                } else if ($op['hours'] >= 5) {
                                    $timeInfoName = ' часов';
                                }
                                $timeInfo = '<div>продолжительность</div> <span><i class="fa fa-clock-o"></i> '.$op['hours'].$timeInfoName.'</span>';
                            }
                            // цена на чел или группу
                            $pricePerPerson = 'data-person="'.$op['pricePerPerson'].'"';
                            ?>
                            <div id="vlgMusem<?=$count?>" class="vlg-catalog__item" <?=$priceInfo?> <?=$pricePerPerson?> <?=$priceInfoDop?>>
                                <div class="vlg-catalog__photo">
                                    <img src="<? echo wp_get_attachment_image_url( $op['imgUpload'], array(300, 200) ); ?>" alt="">
                                    <div class="vlg-catalog__triangle"></div>
                                    <div class="vlg-catalog__title"><?=$op['name']?></div>
                                </div>
                                <div class="vlg-catalog__discription">
                                    <div class="vlg-catalog__info">
                                        <div class="vlg-catalog__hours"><?=$timeInfo?></div>
                                        <div class="vlg-catalog__rating"><div>рейтинг</div> <span><i class="fa fa-signal" aria-hidden="true"></i> <?=$op['rating']?></span></div>
                                    </div>
                                    <div class="vlg-catalog__text"><?=$op['description']?></div>
                                    <div class="vlg-catalog__footer">
                                        <?
                                        if ($op['urlPage']) {
                                            echo '<a href="'.$op['urlPage'].'" target="_blank" class="vlg-catalog__link"><i class="fa fa-link fa-link-exc"><span>Подробно</span></i></a>';
                                        }
                                        else {
                                            echo '<div></div>';
                                        }
                                        ?>
                                        <div class="vlg-add-musem"><i class="fa fa-plus fa-add-exc fa-add-green"><span>Добавить</span></i></div>
                                    </div>
                                </div>
                            </div>
                        <?
                            $count++;
                            endforeach;
                        ?>
                    </div>
                </div>
                <!-- вкладка 3 -->
                <div class="tab-pane fade" id="region" role="tabpanel" aria-labelledby="region-tab">
                    <div class="vlg-catalog">
                        <?
                        $vlg = vlg_cat('excursion-obl');

                        $count = 0; // для id

                        foreach ($vlg as $op):
                            // цена
                            $priceInfo = ''; // прайс основной
                            $priceInfoDop = ''; // прайс доплата
                            if ($op['pricePerPerson'] == 'per-person-by-age') {
                                $priceInfo = 'data-price="'.$op['prise0'].';'.$op['prise16'].';'.$op['prise18'].'"';
                                $priceInfoDop = 'data-pricedop="'.$op['prise'].'"';
                            } else if ($op['pricePerPerson'] == 'per-person') {
                                $priceInfo = 'data-price="'.$op['prise0'].'"';
                                $priceInfoDop = 'data-pricedop="'.$op['prise'].'"';
                            } else {
                                $priceInfo = 'data-price="'.$op['prise'].'"';
                                $priceInfoDop = 'data-pricedop="0"';
                            }
                            // время
                            $timeInfo = '';
                            if (strlen($op['hours']) >= 2) {
                                $timeInfo = '<div>продолжительность</div> <span><i class="fa fa-clock-o"></i>'.substr($op['hours'], 0, 1).' ч '.substr($op['hours'], 2, 2).'м</span>';
                            } else {
                                $timeInfoName = '';
                                if ($op['hours'] == 1) {
                                    $timeInfoName = ' час';
                                } else if ($op['hours'] >= 2 && $op['hours'] <= 4) {
                                    $timeInfoName = ' часа';
                                } else if ($op['hours'] >= 5) {
                                    $timeInfoName = ' часов';
                                }
                                $timeInfo = '<div>продолжительность</div> <span><i class="fa fa-clock-o"></i> '.$op['hours'].$timeInfoName.'</span>';
                            }
                            // цена на чел или группу
                            $pricePerPerson = 'data-person="'.$op['pricePerPerson'].'"';
                            ?>
                            <div id="vlgObl<?=$count?>" class="vlg-catalog__item" <?=$priceInfo?> <?=$pricePerPerson?> <?=$priceInfoDop?>>
                                <div class="vlg-catalog__photo">
                                    <img src="<? echo wp_get_attachment_image_url( $op['imgUpload'], array(300, 200) ); ?>" alt="">
                                    <div class="vlg-catalog__triangle"></div>
                                    <div class="vlg-catalog__title"><?=$op['name']?></div>
                                </div>
                                <div class="vlg-catalog__discription">
                                    <div class="vlg-catalog__info">
                                        <div class="vlg-catalog__hours"><?=$timeInfo?></div>
                                        <div class="vlg-catalog__rating"><div>рейтинг</div> <span><i class="fa fa-signal" aria-hidden="true"></i> <?=$op['rating']?></span></div>
                                    </div>
                                    <div class="vlg-catalog__text"><?=$op['description']?></div>
                                    <div class="vlg-catalog__footer">
                                        <?
                                        if ($op['urlPage']) {
                                            echo '<a href="'.$op['urlPage'].'" target="_blank" class="vlg-catalog__link"><i class="fa fa-link fa-link-exc"><span>Подробно</span></i></a>';
                                        }
                                        else {
                                            echo '<div></div>';
                                        }
                                        ?>
                                        <div class="vlg-add-obl"><i class="fa fa-plus fa-add-exc fa-add-green"><span>Добавить</span></i></div>
                                    </div>
                                </div>
                            </div>
                        <?
                            $count++;
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Модальное Проживание -->
<div id="vlgHotelModal" class="modal fade modal-sm-hotel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="vlg-modal-close">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- Форма -->
            <div class="tab-content vlg-modal">
                <div class="vlg-catalog">
                    <?
                    $vlg = vlg_cat('hotel');

                    $count = 0; // для id

                    foreach ($vlg as $op):
                        // цена
                        $priceInfo = '';
                        if ($op['pricePerPerson'] == 'per-person-by-age') {
                            $priceInfo = 'data-price="'.$op['prise0'].';'.$op['prise16'].';'.$op['prise18'].'"';
                        } else if ($op['pricePerPerson'] == 'per-person') {
                            $priceInfo = 'data-price="'.$op['prise0'].'"';
                        } else {
                            $priceInfo = 'data-price="'.$op['prise'].'"';
                        }
                        ?>

                        <div id="vlgHotel<?=$count?>" class="vlg-catalog__item" <?=$priceInfo?> style="order:<?=$op['rating']?>">
                            <div class="vlg-catalog__photo">
                                <img src="<? echo wp_get_attachment_image_url( $op['imgUpload'], array(300, 200) ); ?>" alt="">
                                <div class="vlg-catalog__triangle"></div>
                                <div class="vlg-catalog__title"><?=$op['name']?></div>
                            </div>
                            <div class="vlg-catalog__discription">
                                <div class="vlg-catalog__text"><?=$op['description']?></div>
                                <div class="vlg-catalog__footer">
                                    <?
                                    if ($op['urlPage']) {
                                        echo '<a href="'.$op['urlPage'].'" target="_blank" class="vlg-catalog__link"><i class="fa fa-link fa-link-exc"><span>Подробно</span></i></a>';
                                    } else {
                                        echo '<div></div>';
                                    }
                                    ?>
                                    <div class="vlg-add-exc"><i class="fa fa-plus fa-add-exc fa-add-green"><span>Выбрать</span></i></div>
                                </div>
                            </div>
                        </div>

                        <?
                        $count++; // id
                    endforeach;
                    ?>
                </div>
            </div>


        </div>
    </div>
</div>
</form>