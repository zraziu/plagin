<?php
include_once('m/vlg.php');
?>

<h3><a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg"><< Назад</a></h3>

<?php

if (!empty($_POST)) {
    // все ли поля заполнены
    if(vlg_add($_POST['title'], $_POST['description'], $_POST['pricePerPerson'], $_POST['prise0'], $_POST['prise16'], $_POST['prise18'], $_POST['prise'], $_POST['hours'], $_POST['category'])) {
        die('Успешно!');

        $title = $_POST['title'];
        $description = $_POST['description'];
        $pricePerPerson = $_POST['pricePerPerson'];
        $prise0 = $_POST['prise0'];
        $prise16 = $_POST['prise16'];
        $prise18 = $_POST['prise18'];
        $prise = $_POST['prise'];
        $hours = $_POST['hours'];

        $error = true;

    }
} else {
    $error = false;
}
?>

<h2>Новый музей</h2>
<? if ($error): ?>
    <p>Заполните все поля</p>
<? endif; ?>


<form method="post">
    <p>Название: <input type="text" name="title" value="<?=$title?>" autofocus /></p>
    <br><br>
    <p style="float: top;"><i class="icon-doc-text" aria-hidden="true"></i> Описание: <textarea rows="5" cols="90" name="description"><?=$description?></textarea></p>
    <br><br>
    <p><i class="icon-rouble" aria-hidden="true"></i> Цена:
        <label><input id="ppba" type="radio" name="pricePerPerson" value="per-person-by-age" aria-required="true" onChange="ready()" checked>На чел по возрасту</label>
        <label><input id="pp" type="radio" name="pricePerPerson" value="per-person" aria-required="true" onChange="ready()">На чел любой возраст</label>
        <label><input id="pg" type="radio" name="pricePerPerson" value="per-group" aria-required="true" onChange="ready()">На группу</label></p>

    <div id='Block1' style='display: none;'>
        <p>
            <i class="icon-newborn" aria-hidden="true"></i> До 16: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="prise0" value="<?=$prise0?>" />
            <br><br>
            <i class="icon-happy-baby" aria-hidden="true"></i> До 18: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="prise16" value="<?=$prise16?>" />
            <br><br>
            <i class="icon-smile" aria-hidden="true"></i> Взрослые: <input type="text" name="prise18" value="<?=$prise18?>" />
        </p>
    </div>
    <div id='Block2' style='display: none;'>
        <p>
            <i class="icon-male" aria-hidden="true"></i> Цена <input type="text" name="prise" value="<?=$prise?>" />
        </p>
    </div>
    <div id='Block3' style='display: none;'>
        <p>
            <i class="icon-users" aria-hidden="true"></i> Цена <input type="text" name="prise" value="<?=$prise?>" />
        </p>
    </div>
    <br>
    <br>
    <p><i class="icon-clock" aria-hidden="true"></i> Займет часов: <input type="text" name="hours" value="<?=$hours?>" /></p>
    <br><br>

    <input type="hidden" name="category" value="musem">
    <input type="submit" value="Добавить" />

</form>
