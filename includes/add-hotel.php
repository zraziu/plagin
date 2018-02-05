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
/**
 * Image Uploader
 * author: Arthur Gareginyan www.arthurgareginyan.com
 */
function arthur_image_uploader( $name, $width, $height ) {
    wp_enqueue_media();

    // Set variables
    $options = get_option( 'RssFeedIcon_settings' );
    $default_image = plugins_url('img/logo.jpg', __FILE__);

    if ( !empty( $options[$name] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options[$name];
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload', RSSFI_TEXT );

    // Print HTML field
    echo '
        <div class="upload">
            <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="RssFeedIcon_settings[' . $name . ']" id="RssFeedIcon_settings[' . $name . ']" value="' . $value . '" />
                <button type="submit" class="upload_image_button button">' . $text . '</button>
                <button type="submit" class="remove_image_button button">&times;</button>
            </div>
        </div>
    ';
}

?>

<h2>Новый отель</h2>
<? if ($error): ?>
    <p>Заполните все поля</p>
<? endif; ?>


<form enctype="multipart/form-data" method="post">
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
    <br><br>
<?php
    arthur_image_uploader( 'custom_image', $width = 115, $height = 115 );
?>
    <br><br>
    <input type="hidden" name="category" value="hotel">
    <input type="submit" value="Добавить" />

</form>


<script>
    // Показать - скрыть блок цен
    var elems = document.getElementsByName('pricePerPerson'); //массив элементов
    document.addEventListener("DOMContentLoaded", ready); // стр загрузилась, выполняется функия ready

    function ready() {
        for(var i = 0; i < elems.length; i++) {
            if (elems[i].checked) {
                document.getElementById('Block1').style.display='none';
                document.getElementById('Block2').style.display='none';
                document.getElementById('Block3').style.display='none';

                document.getElementById('Block'+(i+1)).style.display='block';
            }
        }
    }

    // The "Upload" button
    $('.upload_image_button').click(function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            $(button).parent().prev().attr('src', attachment.url);
            $(button).prev().val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open(button);
        return false;
    });

    // The "Remove" button (remove the value from input type='hidden')
    $('.remove_image_button').click(function() {
        var answer = confirm('Are you sure?');
        if (answer == true) {
            var src = $(this).parent().prev().attr('data-src');
            $(this).parent().prev().attr('src', src);
            $(this).prev().prev().val('');
        }
        return false;
    });
</script>