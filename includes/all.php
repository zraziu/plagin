<?php
    include_once('m/vlg.php');
    //$vlg = vlg_all();
?>

<h1>Настройка цен</h1>
<br>
<h3>Экскурсии / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h3>
<ul class="exc-list">
    <?
    $vlg = vlg_cat('excursion');
    // выводим по одной записи
    foreach ($vlg as $op): ?>
    <li class="exc-item"><?=$op['name']?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></li>
    <? endforeach; ?>
</ul>
<br>

<h3>Музеи / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add-musem">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h3>
<ul class="exc-list">
    <?
    $vlg = vlg_cat('musem');
    // выводим по одной записи
    foreach ($vlg as $op): ?>
        <li class="exc-item"><?=$op['name']?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></li>
    <? endforeach; ?>
</ul>

<br>
<br>
<h3>Гостиницы / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add-hotel">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h3>
<ul class="exc-list">
    <?
    $vlg = vlg_cat('hotel');
    // выводим по одной записи
    foreach ($vlg as $op): ?>
        <li class="exc-item"><?=$op['name']?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></li>
    <? endforeach; ?>
</ul>

<br>
<br>
<h3>Услуги / <a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=add-services">Добавить <i class="fa fa-plus-circle fa-green"></i></a></h3>
<ul class="exc-list">
    <?
    $vlg = vlg_cat('service');
    // выводим по одной записи
    foreach ($vlg as $op): ?>
        <li class="exc-item"><?=$op['name']?> <a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit&id=<?=$op['id']?>"><i class="fa fa-pencil"></i> изменить</a></li>
    <? endforeach; ?>
</ul>

<br>
<br>
<h3>Комиссия</h3>
<a  href="<?=$_SERVER["PHP_SELF"]?>?page=vlg&c=edit-commission&id=1"><i class="icon-sliders"></i> Редактировать комиссию</a>