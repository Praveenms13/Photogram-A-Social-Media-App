<?php

        include "_Includes/User.class.php";
        include "_Includes/Database.class.php";
        include "_Includes/Session.class.php";
        include "_Includes/UserSession.class.php";
        global $__DBconfig;
        if ($_SERVER['APPLICATION_ENV'] == "Production") {
            //echo "production";
            $__DBconfig = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/../../config_files/photogram_build.json");
        } else {
            //echo "development";
            $__DBconfig = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/../config_files/photogram_dev.json");
        }

        Session::start();

        function get_config($key, $default_key = 0)
        {
            global $__DBconfig;
            $config = json_decode($__DBconfig, true);
            if (isset($config[$key])) {
                return $config[$key];
            } else {
                return $default_key;
            }
        }
        function loadAccess($file_form)
        {
            include $_SERVER['DOCUMENT_ROOT'] . get_config('path') . "template/$file_form.php";
        }
        function loadAc($file)
        {
            include $_SERVER['DOCUMENT_ROOT'] . get_config('path') . "album/$file.php";
        }
