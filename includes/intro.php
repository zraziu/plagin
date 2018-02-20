<?php
    // вывод записей
    include_once('m/vlg.php');
    $vlg = vlg_all();

?>


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