<?php
    // вывод записей
    include_once('m/vlg.php');
    $vlg = vlg_all();

echo '<link rel="stylesheet" type="text/css" href="'.plugins_url("vlg_plagin/includes/css/style.css").'">
          <script type="text/javascript" src="'.plugins_url("vlg_plagin/includes/js/script.js").'"></script>';
?>

<h1>Калькулятор</h1>
<h2 class="excursion-switch-title">ШАГ 1: Спланировать тур / Основные данные</h2>

<div class="row d-flex justify-content-between">
    <div class="col">
        <div class="btn-group btn-group-margin"><button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users fa-icon-btn" aria-hidden="true"></i> Человек: <span class="btnDropdownPeople"></span> <span class="btnDropdownPeopleFree"></span></button>
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
    </div>
    <div class="col">
        <div class="btn-group btn-group-margin">
            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar fa-icon-btn" aria-hidden="true"></i> Дней: <span class="btnDropdownDay">1</span></button>
            <div class="dropdown-menu">
                <div class="dropdown-item"><div class="dropdown-item-people"> </div>
                    <div class="number dropdown-item-number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputDays" class="input-calc-exc" type="text" min="1" max="5" value="1"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="btn-group btn-group-margin">
            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bus fa-icon-btn" aria-hidden="true"></i> Трансфер: <span class="btnDropdownBus">0</span></button>
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
</div>

<!-- btnDropdownDay #inputDays  vlg-two__delete vlg-two__move -->

<h2 class="excursion-switch-title">ШАГ 2: Места, которые Вы хотите посетить</h2>
<div class="vlg-two">
</div>
<div class="vlg-two__list">
    <div class="vlg-two__item">
        <div class="vlg-two_info">
            <div class="vlg-two__time">1 ч 30 м</div>
            <div class="vlg-two__bus">Автобус</div>
        </div>
        <div class="vlg-two_title">Обзорная экскурсия «Город-герой Волгоград» <div class="vlg-two__btn"><i class="fa fa-trash fa-red vlg-two__delete"></i> <i class="fa fa-arrows-v vlg-two__move"></i></div></div>
    </div>
    <div class="vlg-two__item">
        <div class="vlg-two_info">
            <div class="vlg-two__time">0 ч 40 м</div>
            <div class="vlg-two__bus">Автобус</div>
        </div>
        <div class="vlg-two_title">Обзорная экскурсия «Город-герой Волгоград» <div class="vlg-two__btn"><i class="fa fa-trash fa-red vlg-two__delete"></i> <i class="fa fa-arrows-v vlg-two__move"></i></div></div>
    </div>
    <div class="vlg-two__add" data-toggle="modal" data-target=".modal-sm-help">
        <i class="fa fa-plus fa-lg fa-green"></i> Добавить экскурсию
    </div>
</div>

<h2 class="excursion-switch-title">ШАГ 3: Условия проживания</h2>
<div class="vlg-three">
    <div>Отель</div>
</div>

<h2 class="excursion-switch-title">ШАГ 4: Бронирование</h2>
<div class="vlg-four">

</div>




<!-- Модальное Экскурсии -->
<div id="vlgExcModal" class="modal fade modal-sm-help" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- Форма заявки -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Выберите экскурсии</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Выберите места</a>
                </li>
            </ul>

            <div class="tab-content vlg-modal" id="myTabContent">
                <!-- вкладка 1 -->
                    <div class="tab-pane fade in active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="vlg-catalog">
                            <?
                            $vlg = vlg_cat('excursion');
                            foreach ($vlg as $op): ?>
                                <div class="vlg-catalog__item2">
                                    <div class="vlg-catalog__photo2">
                                        <img src="<? echo wp_get_attachment_image_url( $op['imgUpload'], array(300, 200) ); ?>" alt="">
                                        <div class="vlg-catalog__triangle"></div>
                                        <div class="vlg-catalog__add2"><?=$op['name']?></div>
                                    </div>
                                    <div class="vlg-catalog__discription2">
                                        <div class="vlg-catalog__info">
                                            <span class="vlg-catalog__hours"><?=$op['hours']?></span>
                                            <span class="vlg-catalog__rating"><?=$op['rating']?></span>
                                        </div>
                                        <div class="vlg-catalog__text2"><?=$op['description']?></div>
                                        <div class="vlg-catalog__time3">
                                            <i class="fa fa-link fa-link-exc"><span>Подробно</span></i>
                                            <i class="fa fa-plus fa-add-exc"><span>Добавить</span></i>
                                        </div>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <!-- вкладка 2 -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?
                            $vlg = vlg_cat('musem');
                            foreach ($vlg as $op): ?>
                                <div class="exc-item"><?=$op['name']?></div>
                            <? endforeach; ?>
                    </div>
            </div>


        </div>
    </div>
</div>
