<?php

if (php_sapi_name() == 'cli-server') {

    $info = parse_url($_SERVER['REQUEST_URI']);

    if (file_exists( "./$info[path]") && $info["path"] != "/") {
        return false;
    } else {
        include_once "app.php";
        return true;
    }
}