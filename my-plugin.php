<?php
/*
Plugin Name: Ekrana Yazı Yazdıran Eklenti
Description: Bu eklenti, her gönderinin altına bir yazı ekler.
Version: 1.0
Author: GitHub Copilot
*/

add_action('admin_menu', 'my_plugin_create_settings_page');

function my_plugin_create_settings_page() {
    add_options_page('My Plugin Settings', 'My Plugin', 'manage_options', 'my-plugin', 'my_plugin_settings_page_content');
}

function my_plugin_settings_page_content() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        update_option('id_range_start', $_POST['id_range_start']);
        update_option('id_range_end', $_POST['id_range_end']);
    }

    $id_range_start = get_option('id_range_start', 'default_value');
    $id_range_end = get_option('id_range_end', 'default_value');

    echo '<form method="POST">';
    echo 'ID_RANGE_START: <input type="number" name="id_range_start" value="' . $id_range_start . '"><br>';
    echo 'ID_RANGE_END: <input type="number" name="id_range_end" value="' . $id_range_end . '"><br>';
    echo '<input type="submit" value="Save">';
    echo '</form>';
}

define('ID_RANGE_START', get_option('id_range_start', 'default_value'));
define('ID_RANGE_END', get_option('id_range_end', 'default_value'));


?>
