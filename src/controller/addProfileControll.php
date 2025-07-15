<?php
    if($_POST){
        @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
        @session_start();

        if(!isset($_SESSION['profiles'])){
            $_SESSION['profiles'] = [];
        }

        $name = $_POST['name'];
        $img = $_POST['imgProfile'];
        $forChildren = isset($_POST['children']) ? 'true' : 'false';

        $newUser = [
            'name' => $name,
            'imgProfile' => $img,
            'children' => $forChildren
        ];

        $_SESSION['profiles'][] = $newUser;
    }
?>  