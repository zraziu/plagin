<?php
include_once('m/vlg.php');
?>

<h3><a href="<?=$_SERVER["PHP_SELF"]?>?page=vlg"><< Назад</a></h3>

<h1>Настройка комиссии</h1>

<?php
// получаем id записи
$id = (int)$_GET['id'];

if($id == 0)
    die('Не передан id');

if(!empty($_POST) && is_admin()) {
    if (isset($_POST['save'])) {
        if (vlg_edit_comis($id, $_POST['prise1'], $_POST['prise2'], $_POST['prise3'], $_POST['prise4'], $_POST['pricePerPerson'], $_POST['category'])) {
            die('Успешно отредактирован!');
        }
    }

        $prise1 = $_POST['prise1'];
        $prise2 = $_POST['prise2'];
        $prise3 = $_POST['prise3'];
        $prise4 = $_POST['prise4'];
        $error = true;

} else {
    $vlg = vlg_get($id);
    $title = $vlg['name'];
    $prise1 = $vlg['prise'];
    $prise2 = $vlg['prise0'];
    $prise3 = $vlg['prise16'];
    $prise4 = $vlg['prise18'];
    $error = false;
}
?>

<? if ($error): ?>
    <p>Все цены должны быть проставлены. Ноль тоже подойдет.</p>
<? endif; ?>

<form method="post">
    До 10 чел: <input type="text" name="prise1" value="<?=$prise1?>" /> руб
    <br><br>
    До 30 чел: <input type="text" name="prise2" value="<?=$prise2?>" /> руб
    <br><br>
    До 40 чел: <input type="text" name="prise3" value="<?=$prise3?>" /> руб
    <br><br>
    Более 40 чел: <input type="text" name="prise4" value="<?=$prise4?>" /> руб
    <br><br>
    <input type="hidden" name="pricePerPerson" value="per-person">
    <input type="hidden" name="category" value="commission">
    <input type="submit" name="save" value="Сохранить" />


</form>
