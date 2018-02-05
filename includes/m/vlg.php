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

    function vlg_add($title, $description, $pricePerPerson, $prise0, $pris16, $prise18, $prise, $hours, $category) { // добавить запись
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
        $category = trim($category);


        // пустые ли поля
        if ($title == '')
            return false;

        // добавляем в базу
        $table = $wpdb->prefix.'vlg'; // название таблицы с префиксом
        $t = "INSERT INTO $table (name, description, pricePerPerson, prise0, prise16, prise18, prise, hours, category) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"; // запрос
        $query = $wpdb->prepare($t, $title, $description, $pricePerPerson, $prise0, $pris16, $prise18, $prise, $hours, $category); // подготовливаем строку для SQL
        $result = $wpdb->query($query); // создаем

        if($result === false)
            die('Ошибка записи в БД');

        return true;
    }

    function vlg_edit($id, $title, $description, $pricePerPerson, $prise0, $pris16, $prise18, $prise, $hours, $category) { // изменить запись
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
        $category = trim($category);

        // пустые ли поля
        if ($title == '')
            return false;

        // добавляем в базу
        $table = $wpdb->prefix.'vlg';
        $t = "UPDATE $table SET name='%s', description='%s', pricePerPerson='%s', prise0='%s', prise16='%s', prise18='%s', prise='%s', hours='%s', category='%s' WHERE id='%d'";
        $query = $wpdb->prepare($t, $title, $description, $pricePerPerson, $prise0, $pris16, $prise18, $prise, $hours, $category, $id);
        $result = $wpdb->query($query);

        if($result === false)
            die('Ошибка записи в БД');

        return true;
    }

    function vlg_edit_comis($id, $prise1, $prise2, $prise3, $prise4, $pricePerPerson, $category) { // изменить комиссию по id
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