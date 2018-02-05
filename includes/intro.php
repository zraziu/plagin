<?php
include_once('m/vlg.php');
$vlg = vlg_all();
?>

<? foreach ($vlg as $v): ?>
блок - <?=$v['name']?><br>
<? endforeach ?>