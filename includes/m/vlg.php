<?php
    function vlg_all() { //все записи
        global $wpdb;
        $table = $wpdb->prefix.'vlg';

        $query = "SELECT * FROM $table ORDER BY id DESC"; // или id, name, prise, category
        return $wpdb->get_results($query, ARRAY_A);
    }

    function vlg_cat($cat) { //  получить записи по категории
        global $wpdb;
        $table = $wpdb->prefix.'vlg';
        /*
        $t = "SELECT * FROM $table WHERE category='%d' ORDER BY id DESC";
        $query = $wpdb->prepare($t, $cat);
        */
        $query = "SELECT * FROM $table WHERE category='$cat'";

        //$wpdb->get_var( "SELECT something FROM table WHERE foo = '$name' and status = '$status'" );

        return $wpdb->get_results($query, ARRAY_A);
    }

    function vlg_get($id) { // получить записи по id
        global $wpdb;
        $table = $wpdb->prefix.'vlg';

        $t = "SELECT * FROM $table WHERE id='%d'"; //id, name, prise, category
        $query = $wpdb->prepare($t, $id);
        return $wpdb->get_row($query, ARRAY_A);
    }

    function vlg_add($title, $description, $pricePerPerson, $prise0, $pris16, $prise18, $prise, $hours, $category, $imgUpload, $urlPage, $rating) { // добавить запись
        global $wpdb;

        // проверка на корректность введеных данных
        $title = trim($title);
        $description = trim($description);
        $pricePerPerson = trim($pricePerPerson);
        $prise0 = absint($prise0);
        $pris16 = absint($pris16);
        $prise18 = absint($prise18);
        $prise = absint($prise);
        $hours = absint($hours);
        $rating = absint($rating);
        $category = trim($category);
        $urlPage = trim($urlPage);


        // пустые ли поля
        if ($title == '')
            return false;

        // добавляем в базу
        $table = $wpdb->prefix.'vlg'; // название таблицы с префиксом
        $t = "INSERT INTO $table (name, description, pricePerPerson, prise0, prise16, prise18, prise, hours, category, imgUpload, urlPage, rating) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"; // запрос
        $query = $wpdb->prepare($t, $title, $description, $pricePerPerson, $prise0, $pris16, $prise18, $prise, $hours, $category, $imgUpload, $urlPage, $rating); // подготовливаем строку для SQL
        $result = $wpdb->query($query); // создаем

        if($result === false)
            die('Ошибка записи в БД');

        return true;
    }

    function vlg_edit($id, $title, $description, $pricePerPerson, $prise0, $pris16, $prise18, $prise, $hours, $category, $imgUpload, $urlPage, $rating) { // изменить запись
        global $wpdb;

        // проверка на корректность введеных данных
        $title = trim($title);
        $description = trim($description);
        $pricePerPerson = trim($pricePerPerson);
        $prise0 = absint($prise0);
        $pris16 = absint($pris16);
        $prise18 = absint($prise18);
        $prise = absint($prise);
        $hours = absint($hours);
        $rating = absint($rating);
        $category = trim($category);

        // пустые ли поля
        if ($title == '')
            return false;

        // добавляем в базу
        $table = $wpdb->prefix.'vlg';
        $t = "UPDATE $table SET name='%s', description='%s', pricePerPerson='%s', prise0='%s', prise16='%s', prise18='%s', prise='%s', hours='%s', category='%s', imgUpload='%s', urlPage='%s', rating='%s' WHERE id='%d'";
        $query = $wpdb->prepare($t, $title, $description, $pricePerPerson, $prise0, $pris16, $prise18, $prise, $hours, $category, $imgUpload, $urlPage, $rating,  $id);
        $result = $wpdb->query($query);

        if($result === false)
            die('Ошибка записи в БД');

        return true;
    }

    function vlg_edit_comis($id, $prise1, $prise2, $prise3, $prise4, $pricePerPerson, $category) { // изменить комиссию и трансфер по id
        global $wpdb;

        // проверка на корректность введеных данных
        $prise1 = absint($prise1);
        $prise2 = absint($prise2);
        $prise3 = absint($prise3);
        $prise4 = absint($prise4);

        // пустые ли поля
        /*
        if ($prise1 === '' || $prise2 === '' || $prise3 === '' || $prise4 === '')
            return false;
        */
        // добавляем в базу
        $table = $wpdb->prefix.'vlg';
        $t = "UPDATE $table SET prise='%s', prise0='%s', prise16='%s', prise18='%s', pricePerPerson='%s', category='%s' WHERE id='%d'";
        $query = $wpdb->prepare($t, $prise1, $prise2, $prise3, $prise4, $pricePerPerson, $category, $id);
        $result = $wpdb->query($query);

        if($result === false)
            die('Ошибка записи Комис в БД');

        return true;
    }

    function vlg_delete($id) {  // удалить запись по id
        global $wpdb;
        $table = $wpdb->prefix.'vlg';
        $t = "DELETE FROM $table WHERE id='%d'";
        $query = $wpdb->prepare($t, $id);
        return $wpdb->query($query);
    }

    function arthur_image_uploader( $name, $width, $height ) { //Загрузка изображение в плагине arthurgareginyan.com
        // получаем id сохраненного фото
        $id = (int)$_GET['id'];
        $vlg = vlg_get($id);
        $imgUpload = $vlg['imgUpload'];

        // загрузка стандартного медиазагрузчика WP
        wp_enqueue_media();

        // Set variables
        $options = get_option( 'imgUpload' );
        $default_image =  $imgUpload ? wp_get_attachment_image_url($imgUpload) : plugins_url('../img/logo.jpg', __FILE__);

        if ( !empty( $options[$name] ) ) {
            $image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
            $src = $image_attributes[0];
            $value = $options[$name];
        } else {
            $src = $default_image;
            $value = $imgUpload;
        }

        $text = __( 'Upload', RSSFI_TEXT );

        // Print HTML field
        echo '
            <div class="upload">
                <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
                <div>
                    <input type="hidden" name="imgUpload" id="imgUpload[' . $name . ']" value="' . $value . '" /> 
                    <button type="submit" class="upload_image_button button">' . $text . '</button>
                    <button type="submit" class="remove_image_button button">&times;</button>
                </div>
            </div>
        '; //imgUpload[' . $name . ']
    }
