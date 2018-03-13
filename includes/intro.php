<?php
    // вывод записей
    include_once('m/vlg.php');
    $vlg = vlg_all();

echo '<link rel="stylesheet" type="text/css" href="'.plugins_url("vlg_plagin/includes/css/style.css").'">
          <script type="text/javascript" src="'.plugins_url("vlg_plagin/includes/js/script.js").'"></script>';
?>

<h1>Калькулятор</h1>
<h2 class="excursion-switch-title">ШАГ 1: Спланировать тур / Основные данные</h2>

<div class="vlg-one">
    <div class="btn-group btn-group-margin">
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
    <div class="col">
        <div class="btn-group btn-group-margin">
            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar fa-icon-btn" aria-hidden="true"></i> Дней: <input id="vlgDropdownDay" type="text" style="border:0;" ></button>
            <div class="dropdown-menu">
                <div class="dropdown-item">
                    <div id="day-slider"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- btnDropdownDay #inputDays  vlg-two__delete vlg-two__move -->

<h2 class="excursion-switch-title">ШАГ 2: Места, которые Вы хотите посетить</h2>
<div class="vlg-two"></div>
<div id="vlgListExc" class="vlg-two__list"></div> <!-- список -->
<div class="vlg-two__add" data-toggle="modal" data-target=".modal-sm-help">
    <i class="fa fa-plus fa-lg fa-green"></i> Добавить экскурсию
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

                            ?>

                            <div id="vlgEcx<?=$count?>" class="vlg-catalog__item" <?=$priceInfo?>>
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

                            ?>
                            <div id="vlgMusem<?=$count?>" class="vlg-catalog__item" <?=$priceInfo?>>
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
