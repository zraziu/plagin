<?php
include_once('m/vlg.php');
?>

<h3><a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg"><< Назад</a></h3>


<?php
// получаем id записи
    $id = (int)$_GET['id'];

    if($id == 0)
        die('Не передан id');

    if(!empty($_POST)) {
        if (isset($_POST['save'])) {
            if (vlg_edit($id, $_POST['title'], $_POST['description'], $_POST['pricePerPerson'], $_POST['prise0'], $_POST['prise16'], $_POST['prise18'], $_POST['prise'], $_POST['hours'], $_POST['category'], $_POST['imgUpload'], $_POST['urlPage'])) {
                die('Успешно отредактирован!');
                }
            }
            elseif (isset($_POST['delete'])) {
                if (vlg_delete($id)) {
                    die('Успешно удален!');
                }
            }


        $title = $_POST['title'];
        $description = $_POST['description'];
        $pricePerPerson = $_POST['pricePerPerson'];
        $prise0 = $_POST['prise0'];
        $prise16 = $_POST['prise16'];
        $prise18 = $_POST['prise18'];
        $prise = $_POST['prise'];
        $hours = $_POST['hours'];
        $imgUpload = $_POST['imgUpload'];
        $urlPage = $_POST['urlPage'];
        $error = true;

} else {
    $vlg = vlg_get($id);
    $title = esc_html(wp_unslash($vlg['name']));
    $description = wp_unslash($vlg['description']);
    $pricePerPerson = $vlg['pricePerPerson'];
    $prise0 = $vlg['prise0'];
    $prise16 = $vlg['prise16'];
    $prise18 = $vlg['prise18'];
    $prise = $vlg['prise'];
    $hours = $vlg['hours'];
    $category = $vlg['category'];
    $imgUpload = $_POST['imgUpload'];
    $urlPage = $vlg['urlPage'];

    $error = false;
}
?>

<h2>Редактирование</h2>
<? if ($error): ?>
    <p>Заполните все поля</p>
<? endif; ?>

<form method="post">
    <p>Название: <input type="text" name="title" value='<?=$title?>' autofocus required /></p>
    <br><br>

    <?php
    if ($category != 'service') {
        echo '<p style="float: top;"><i class="icon-doc-text" aria-hidden="true"></i> Описание: <textarea rows="5" cols="90" name="description">'.$description.'</textarea></p><br><br>';
    }
    ?>

    <p><i class="icon-rouble" aria-hidden="true"></i> Цена:
        <label><input id="ppba" type="radio" name="pricePerPerson" value="per-person-by-age" aria-required="true" onChange="ready()" <?php echo $pricePerPerson == 'per-person-by-age' ? 'checked' : ''; ?>>На чел по возрасту</label>
        <label><input id="pp" type="radio" name="pricePerPerson" value="per-person" aria-required="true" onChange="ready()" <?php echo $pricePerPerson == 'per-person' ? 'checked' : ''; ?>>На чел любой возраст</label>
        <label><input id="pg" type="radio" name="pricePerPerson" value="per-group" aria-required="true" onChange="ready()" <?php echo $pricePerPerson == 'per-group' ? 'checked' : ''; ?>>На группу</label></p>

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
    <?php
    arthur_image_uploader( 'custom_image', $width = 115, $height = 115 );
    ?>
    <br><br>
    <p><i class="icon-link" aria-hidden="true"></i> URL: <input type="text" name="urlPage" value="<?=$urlPage?>" autofocus /></p>
    <br><br>

    <input type="hidden" name="category" value="<?=$category?>">
    <input type="submit" name="save" value="Сохранить" />
    <input type="submit" name="delete" value="Удалить" />

</form>
