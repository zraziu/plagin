<?php
    include_once('m/vlg.php');
    //$vlg = vlg_all(); - теперь все по категориям
?>

<h1>Настройка цен</h1>
<br>
<h2 class="vlg-a__h2">Экскурсии / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h2>
<div class="vlg-a__list">
    <?
    $vlg = vlg_cat('excursion');
    foreach ($vlg as $op): ?>
    <div class="vlg-a__item"><?=wp_unslash($op['name'])?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></div>
    <? endforeach; ?>
</div>
<br><hr>
<h2 class="vlg-a__h2">Музеи / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add-musem">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h2>
<div class="vlg-a__list">
    <?
    $vlg = vlg_cat('musem');
    foreach ($vlg as $op): ?>
        <div class="vlg-a__item"><?=wp_unslash($op['name'])?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></div>
    <? endforeach; ?>
</div>
<br><hr>
<h2 class="vlg-a__h2">Загородные / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add-obl">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h2>
<div class="vlg-a__list">
    <?
    $vlg = vlg_cat('excursion-obl');
    foreach ($vlg as $op): ?>
        <div class="vlg-a__item"><?=wp_unslash($op['name'])?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></div>
    <? endforeach; ?>
</div>
<br><hr>
<h2 class="vlg-a__h2">Гостиницы / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add-hotel">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h2>
<div class="vlg-a__list">
    <?
    $vlg = vlg_cat('hotel');
    foreach ($vlg as $op): ?>
        <div class="vlg-a__item"><?=wp_unslash($op['name'])?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></div>
    <? endforeach; ?>
</div>
<br><hr>
<h2 class="vlg-a__h2">Услуги / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add-services">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h2>
<div class="vlg-a__list">
    <div class="vlg-a__item">Трансфер <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit-transfer&id=2"><i class="fa fa-pencil"></i> изменить</a></div>
    <?
    $vlg = vlg_cat('service');
    foreach ($vlg as $op): ?>
        <div class="vlg-a__item"><?=wp_unslash($op['name'])?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></div>
    <? endforeach; ?>
</div>
<br><hr>
<h2 class="vlg-a__h2">Комиссия</h2>
<a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit-commission&id=1"><i class="icon-sliders"></i> Редактировать комиссию</a>