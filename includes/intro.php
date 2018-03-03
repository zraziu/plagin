<?php
    // вывод записей
    include_once('m/vlg.php');
    $vlg = vlg_all();

?>

<h1>Калькулятор</h1>
<h2>Спланировать тур / Основные данные</h2>
<div class="vlg-one">
    <div class="vlg-one__day">Количество дней </div>

    <div class="vlg-one__people"><button class="" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users fa-icon-btn"></i> Количество человек: <span class="btnDropdownPeople"></span> <span class="btnDropdownPeopleFree"></span></button>
        <div class="dropdown-menu">
            <div class="dropdown-item"><div class="dropdown-item-people">Дети до 15 лет</div><div class="number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputPeople16" class="input-calc-exc" type="text" min="0" max="100" value="40"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="dropdown-item"><div class="dropdown-item-people">Дети до 18 лет</div><div class="number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputPeople18" class="input-calc-exc" type="text" min="0" max="100" value="0"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span></div>
            </div>
            <div class="dropdown-item"><div class="dropdown-item-people">Взрослых</div><div class="number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputPeople" class="input-calc-exc" type="text" min="0" max="100" value="0"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span></div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="dropdown-item"><div class="dropdown-item-people">Бесплатно</div><div class="number"><span class="quont-minus"><i class="fa fa-minus" aria-hidden="true"></i></span><input id="inputPeopleFree"  class="input-calc-exc" type="text" min="0" max="10" value="4"><span class="quont-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>






<h2>Места, которые Вы хотите посетить</h2>
<div class="vlg-two">
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
</div>

<h2>Условия проживания</h2>
<div class="vlg-three">

</div>