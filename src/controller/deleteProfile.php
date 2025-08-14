<?php
    if($_POST){
        @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
        @session_start();

        $profileToBeDeleted = $_POST['profileName'];
        $array = $_SESSION['profiles'];

        $index = 0;
        foreach($array as $key => $profile){
            if(isset($profile['name']) && trim(strtolower($profile['name'])) === trim(strtolower($profileToBeDeleted))){
                $index = $key;
                break;
            }
        }

        unset($array[$index]);

        $_SESSION['profiles'] = $array;

        header('location:/profilesPage.php');
        exit();
    }
?>