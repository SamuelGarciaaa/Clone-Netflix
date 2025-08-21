<?php
    if($_POST){
        @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
        @session_start();

        $diretorio_destino = __DIR__ . "/../img/movies/";

        $nome_original = basename($_FILES["img-midia"]["name"]);

        $caminho_final = $diretorio_destino . $nome_original;

        if(move_uploaded_file($_FILES["img-midia"]["tmp_name"], $caminho_final)){
            $img = "/src/img/movies/" . $nome_original;
        }

        $name = $_POST['name'];
        $index = $_POST['index'];
        $movie_name = $_POST['movie_name'];

        $age = $_POST['ages-radio'] ?? '';
        $gender_padrao = $_POST['gender-select'];
        $type = $_POST['type'];
        $custom_gender = $_POST['custom-gender'];
        
        if(!empty($custom_gender)){
            $gender = $custom_gender;
        }

        else{
            $gender = $gender_padrao;
        }

        $about = $_POST['about'];

        if(!empty($movie_name) && !empty($img) && isset($age) && !empty($type) && !empty($gender) && !empty($about)){
            //Deu certo
            require_once('moviesControl.php');

            if(!in_array($gender, $_SESSION['profiles'][$index]['generos'])){
                $_SESSION['profiles'][$index]['generos'][] = createGender($gender);
            }

            $_SESSION['profiles'][$index]['midias'][] = createMidia($type, $movie_name, $about, $age, $img, $gender);

            header('location:/moviesPage.php');
            exit();
        }

        else{
            //Erro
            header('location:/addMidia.php?cod=empty');
            exit();
        }
    }
?>