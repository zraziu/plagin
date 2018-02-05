<?php
/*
Plugin Name: Прием в Волгограде
Description: Здесь можно править цены на прием.
Version: 1.0
Author: Корецкий О.В.
Author URI: http://parusvlg.ru
*/ 

// Активация
function vlg_activation() {
    // Вход в базу данных
    global $wpdb;
    $table_name = $wpdb->prefix.'vlg'; //имя таблицы с префиксом по умолчанию


    if ($wpdb->get_var("SHOW TABLES LIKE $table_name") != $table_name) { // проверяем есть ли такая таблица
        // создаем таблицу
        $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
                    `id` int(5) NOT NULL AUTO_INCREMENT,
                      `name` varchar(120) NOT NULL,
                      `description` text NOT NULL,
                      `hours` int(20) NOT NULL,
                      `prise` int(20) NOT NULL,
                      `prise0` int(20) NOT NULL,
                      `prise16` int(20) NOT NULL,
                      `prise18` int(20) NOT NULL,
                      `bus18` int(20) NOT NULL,
                      `bus40` int(20) NOT NULL,
                      `bus60` int(20) NOT NULL,
                      `category` varchar(120) NOT NULL,
                      `pricePerPerson` varchar(20) NOT NULL,
                      `imgUpload` varchar(250) NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
        $wpdb->query($sql);


        $comis = "INSERT INTO $table_name (name, prise, prise0, prise16, prise18, pricePerPerson, category) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
        $comis_query = $wpdb->prepare($comis, 'Комиссия', '300', '300', '250', '135', 'per-person', 'commission'); // подготовливаем строку для SQL
        $comis_result = $wpdb->query($comis_query); // создаем

        if($comis_result === false)
            die('Ошибка записи Комиссии в БД');

        return true;
    }


    //добавляем опции
    //add_option('vlg_prise1', '0');
    //add_option('vlg_prise2', '0');

}

// Деактивация
function vlg_deactivation() {
    // удаляем опции
    //delete_option('vlg_prise1');
    //delete_option('vlg_prise2');

}

//Удаление
function vlg_uninstall() {
    global $wpdb;
    $table_name = $wpdb->prefix.'vlg';
    // удаляем таблицу
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);

}


register_activation_hook( __FILE__, 'vlg_activation' );
register_deactivation_hook( __FILE__, 'vlg_deactivation' );
register_uninstall_hook( __FILE__, 'vlg_uninstall' );

// передаем параметры для меню
function vlg_add_menu(){
    add_menu_page('Прием в Волгограде', 'Прием в Волгограде', 8, 'vlg', 'vlg_options_page', 'dashicons-megaphone');
}
// добавляем меню
add_action('admin_menu', 'vlg_add_menu');



// шаблон стр настроек в админке
function vlg_options_page() {
    if (jQuery.fn.jquery>"3.0.0"){
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
    }
    // распределитель в зависимости от GET
    switch($_GET['c']){
        case 'add':
            $action = 'add';
            break;
        case 'edit':
            $action = 'edit';
            break;
        case 'add-musem':
            $action = 'add-musem';
            break;
        case 'add-hotel':
            $action = 'add-hotel';
            break;
        case 'add-services':
            $action = 'add-services';
            break;
        case 'edit-commission':
            $action = 'edit-commission';
            break;
        default:
            $action = 'all';
            break;
    }

    include_once ("includes/$action.php");

    echo '<link rel="stylesheet" type="text/css" href="'.plugins_url("vlg_plagin/includes/css/style.css").'">
          <script type="text/javascript" src="'.plugins_url("vlg_plagin/includes/js/script.js").'"></script>';
}

    // шорткод для вставки на сайт
    function vlg_short(){
        ob_start(); // открытие буфера
        include_once("includes/intro.php");
        return ob_get_clean(); //очищаем

    }
    add_filter('widget_text', 'do_shortcode');
    add_shortcode('vlg', 'vlg_short');



?>