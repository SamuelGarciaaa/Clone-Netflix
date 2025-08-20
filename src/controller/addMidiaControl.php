<?php
    if($_POST){
        @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
        @session_start();

        $name = $_POST['name'];
        $index = $_POST['index'];
        $movie_name = $_POST['movie_name'];
        $img = $_POST['img-midia'];

        $age = $_POST['ages-radio'] ?? '';

        $type = $_POST['type'];
        $custom_gender = $_POST['custom-gender'];
        $gender = $custom_gender ? !empty($custom_gender) : $_POST['gender-select'];
        $about = $_POST['about'];

        if(!empty($movie_name) && !empty($movie_name) && !empty($img) && isset($age) && !empty($type) && !empty($gender) && !empty($about)){
            //Deu certo

            
        }

        else{
            //Erro
            header('location:/addMidia.php?cod=empty');
            exit();
        }
    }
?>