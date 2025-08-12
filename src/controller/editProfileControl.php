<?php
if($_POST){
    //@ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']).'/../session'));
    @session_start();

    $name = $_POST['name'];

    // Define imagem com base no valor enviado
    if(isset($_POST['imgs'])){
        switch($_POST['imgs']){
            case 'img1':
                $hasImage = true;
                $imgPath = '/src/img/profiles/imgProfile1.jpg';
                break;

            case 'img2':
                $hasImage = true;
                $imgPath = '/src/img/profiles/imgProfile2.jpg';
                break;

            case 'img3':
                $hasImage = true;
                $imgPath = '/src/img/profiles/imgProfile3.jpg';
                break;

            default:
                // Custom image ainda em desenvolvimento
                break;
        }
    }

    if(!empty($name) && !empty($hasImage)){
        // Pega o array de perfis da sessão
        $array = $_SESSION['profiles'];
        $pastName = $_POST['pastName'];

        // Procura índice do perfil com nome antigo
        $index = 0;
        foreach($array as $key => $profile){
            if(isset($profile['name']) && trim(strtolower($profile['name'])) === trim(strtolower($pastName))){
                $index = $key;
                break;
            }
        }

        // Atualiza os dados do perfil no índice encontrado
        $array[$index]['name'] = $name;
        $array[$index]['imgProfile'] = $imgPath;
        $array[$index]['children'] = 'false';

        // Atualiza a sessão com o array modificado
        $_SESSION['profiles'] = null;
        $_SESSION['profiles'] = $array;

        header('location:/profilesPage.php');
        exit();
    }

    else{
        // Redireciona com erro se dados faltarem
        header('location:/editProfile.php?cod=empty');
        exit();
    }
}
?>