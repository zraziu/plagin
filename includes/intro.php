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
            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info fa-icon-btn" aria-hidden="true"></i> Дней: <span class="btnDropdownDay">1</span></button>
            <div class="dropdown-menu">
                <div class="dropdown-item"><div class="dropdown-item-people"> </div>
                    <div class="number dropdown-item-number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputDays" class="input-calc-exc" type="text" min="1" max="5" value="1"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
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
        <div class="vlg-two__time">1 ч 30 м</div>
        <div class="vlg-two__bus">Автобус</div>
        <div class="vlg-two_title">Обзорная экскурсия «Город-герой Волгоград» <div><i class="fa fa-trash fa-red vlg-two__delete"></i> <i class="fa fa-arrows-v vlg-two__move"></i></div></div>
    </div>
    <div class="vlg-two__item">
        <div class="vlg-two__time">0 ч 40 м</div>
        <div class="vlg-two__bus">Автобус</div>
        <div class="vlg-two_title">Обзорная экскурсия «Город-герой Волгоград» <div><i class="fa fa-trash fa-red vlg-two__delete"></i> <i class="fa fa-arrows-v vlg-two__move"></i></div></div>
    </div>
</div>

<h3>Выберите экскурсии, которые вы хотите посетить</h3>
<div class="exc-list">
    <?
    $vlg = vlg_cat('excursion');
    foreach ($vlg as $op): ?>
        <div class="exc-item"><?=$op['name']?> - </div>
    <? endforeach; ?>
</div>

<h3>Выберите места, которые Вы хотели бы посетить</h3>
<div class="exc-list">
    <?
    $vlg = vlg_cat('musem');
    foreach ($vlg as $op): ?>
        <div class="exc-item"><?=$op['name']?></div>
    <? endforeach; ?>
</div>


<h2 class="excursion-switch-title">ШАГ 3: Условия проживания</h2>
<div class="vlg-three">

</div>

<h2 class="excursion-switch-title">ШАГ 4: Условия проживания</h2>