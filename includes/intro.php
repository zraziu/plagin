<?php
    // вывод записей
    include_once('m/vlg.php');
    $vlg = vlg_all();

echo '<link rel="stylesheet" type="text/css" href="'.plugins_url("vlg_plagin/includes/css/style.css").'">
          <script type="text/javascript" src="'.plugins_url("vlg_plagin/includes/js/script.js").'"></script>';
?>

<h1>Калькулятор</h1>
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
        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar fa-icon-btn" aria-hidden="true"></i> Дней: <span id="vlgDropdownDay">1</span></button>
        <div class="dropdown-menu">
            <div class="dropdown-item"><input id="vlgDay1" type="radio" name="vlgDay" value="1"> <label for="vlgDay1">1</label></div>
            <div class="dropdown-item"><input id="vlgDay2" type="radio" name="vlgDay" value="2"> <label for="vlgDay2">2</label></div>
            <div class="dropdown-item"><input id="vlgDay3" type="radio" name="vlgDay" value="3"> <label for="vlgDay3">3</label></div>
            <div class="dropdown-item"><input id="vlgDay4" type="radio" name="vlgDay" value="4"> <label for="vlgDay4">4</label></div>
            <div class="dropdown-item"><input id="vlgDay5" type="radio" name="vlgDay" value="5"> <label for="vlgDay5">5</label></div>
        </div>
    </div>
    <div id="vlgHotel" class="btn-group btn-group-margin">
        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="modal" data-target=".modal-sm-hotel"><i class="fa fa-bed fa-icon-btn" aria-hidden="true"></i> Проживание: <span id="vlgDropdownHotel">без проживания</span></button>
    </div>
</div>


<h2 class="excursion-switch-title">ШАГ 2: Места, которые Вы хотите посетить</h2>
<div id="vlgListExc" class="vlg-two__list"></div> <!-- список -->
<div class="vlg-two__add" data-toggle="modal" data-target=".modal-sm-exc">
    <i class="fa fa-plus fa-lg fa-green"></i> Добавить экскурсию
</div>

<h2 class="excursion-switch-title">ШАГ 3: Дополнительные условия</h2>
<div class="vlg-three">
    <div id="vlgEatDay1" class="vlg-three__item">
        <div class="vlg-three_info"><div class="vlg-two__time">1 день</div>
        </div><div class="vlg-three__title">
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatBreakfast" type="checkbox" class="custom-control-input" value="Завтрак в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Завтрак</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatLunch" type="checkbox" class="custom-control-input" value="Обед в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Обед</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatDinner" type="checkbox" class="custom-control-input" value="Ужин в кафе города">
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
                    <input id="eatBreakfast" type="checkbox" class="custom-control-input" value="Завтрак в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Завтрак</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatLunch" type="checkbox" class="custom-control-input" value="Обед в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Обед</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatDinner" type="checkbox" class="custom-control-input" value="Ужин в кафе города">
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
                    <input id="eatBreakfast" type="checkbox" class="custom-control-input" value="Завтрак в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Завтрак</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatLunch" type="checkbox" class="custom-control-input" value="Обед в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Обед</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatDinner" type="checkbox" class="custom-control-input" value="Ужин в кафе города">
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
                    <input id="eatBreakfast" type="checkbox" class="custom-control-input" value="Завтрак в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Завтрак</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatLunch" type="checkbox" class="custom-control-input" value="Обед в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Обед</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatDinner" type="checkbox" class="custom-control-input" value="Ужин в кафе города">
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
                    <input id="eatBreakfast" type="checkbox" class="custom-control-input" value="Завтрак в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Завтрак</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatLunch" type="checkbox" class="custom-control-input" value="Обед в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Обед</b></span>
                </label>
            </div>
            <div class="vlg-three__input">
                <label class="custom-control custom-checkbox">
                    <input id="eatDinner" type="checkbox" class="custom-control-input" value="Ужин в кафе города">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><b>Ужин</b></span>
                </label>
            </div>
        </div>
    </div>
</div>




<h2 class="excursion-switch-title">ШАГ 4: Бронирование</h2>
<div class="vlg-four">
    <?php
    $vlg = vlg_get(1);
    $priceCommis = 'data-commis="'.$vlg['prise'].';'.$vlg['prise0'].';'.$vlg['prise16'].';'.$vlg['prise18'].'"';
    ?>

<button id="vlgBtnPrise" <?=$priceCommis?>>Кнопка рассчитать стоимость</button>

</div>




<!-- Модальное Экскурсии -->
<div id="vlgExcModal" class="modal fade modal-sm-exc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- Форма заявки -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Выберите экскурсии <span id="vlgSelectExc">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Выберите музеи <span id="vlgSelectMusem">0</span></a>
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
                            $priceInfo = '';
                            if ($op['pricePerPerson'] == 'per-person-by-age') {
                                $priceInfo = 'data-price="'.$op['prise0'].';'.$op['prise16'].';'.$op['prise18'].'"';
                            } else {
                                $priceInfo = 'data-price="'.$op['prise'].'"';
                            }
                            // время
                            $timeInfo = '';
                            if (strlen($op['hours']) >= 2) {
                                $timeInfo = "<span>".substr($op['hours'], 0, 1)." ч ".substr($op['hours'], 2, 2)."м</span> <div>продолжительность</div>";
                            } else {
                                $timeInfo = "<span>".$op['hours']."ч 00м</span> <div>продолжительность</div>";
                            }
                            // цена на чел или группу
                            $pricePerPerson = 'data-person="'.$op['pricePerPerson'].'"';

                            ?>

                            <div id="vlgEcx<?=$count?>" class="vlg-catalog__item" <?=$priceInfo?> <?=$pricePerPerson?>>
                                <div class="vlg-catalog__photo">
                                    <img src="<? echo wp_get_attachment_image_url( $op['imgUpload'], array(300, 200) ); ?>" alt="">
                                    <div class="vlg-catalog__triangle"></div>
                                    <div class="vlg-catalog__title"><?=$op['name']?></div>
                                </div>
                                <div class="vlg-catalog__discription">
                                    <div class="vlg-catalog__info">
                                        <div class="vlg-catalog__hours"><?=$timeInfo?></div>
                                        <div class="vlg-catalog__rating"><?=$op['rating']?><div>рейтинг</div></div>
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
                            $priceInfo = '';
                            if ($op['pricePerPerson'] == 'per-person-by-age') {
                                $priceInfo = 'data-price="'.$op['prise0'].';'.$op['prise16'].';'.$op['prise18'].'"';
                            } else {
                                $priceInfo = 'data-price="'.$op['prise'].'"';
                            }
                            // время
                            $timeInfo = '';
                            if (strlen($op['hours']) >= 2) {
                                $timeInfo = "<span>".substr($op['hours'], 0, 1)." ч ".substr($op['hours'], 2, 2)."м</span> <div>продолжительность</div>";
                            } else {
                                $timeInfo = "<span>".$op['hours']."ч 00м</span> <div>продолжительность</div>";
                            }
                            // цена на чел или группу
                            $pricePerPerson = 'data-person="'.$op['pricePerPerson'].'"';
                            ?>
                            <div id="vlgMusem<?=$count?>" class="vlg-catalog__item" <?=$priceInfo?> <?=$pricePerPerson?>>
                                <div class="vlg-catalog__photo">
                                    <img src="<? echo wp_get_attachment_image_url( $op['imgUpload'], array(300, 200) ); ?>" alt="">
                                    <div class="vlg-catalog__triangle"></div>
                                    <div class="vlg-catalog__title"><?=$op['name']?></div>
                                </div>
                                <div class="vlg-catalog__discription">
                                    <div class="vlg-catalog__info">
                                        <div class="vlg-catalog__hours"><?=$timeInfo?></div>
                                        <div class="vlg-catalog__rating"><?=$op['rating']?><div>рейтинг</div></div>
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
            </div>


        </div>
    </div>
</div>
<!-- Модальное Проживание -->
<div id="vlgHotelModal" class="modal fade modal-sm-hotel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="">
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
