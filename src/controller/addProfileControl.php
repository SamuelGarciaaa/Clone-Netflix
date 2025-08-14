<?php
    if($_POST){
        //Start the session
        @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
        @session_start();
        
        //Get the profile data
        $name = $_POST['name'];
        $forChildren = isset($_POST['children']) ? 'true' : 'false';

        if($forChildren === 'true'){
            $hasImage = true;
            $imgPath = '/src/img/profiles/imgProfileKids.png';
        }

        else{
            //Normal images
            if(isset($_POST['imgs'])){
                //Switch case for the imgs
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
                        //Get the custom image
                        //Still under development
                        break;
                }
            }
        }

        if(!empty($name) && $hasImage){
            //If the array doesn't exists, create it
            if(!isset($_SESSION['profiles'])){
                $_SESSION['profiles'] = [];
            }

            require_once 'moviesControl.php';
    
            //The Batman
            createMidia('filme', 'The Batman', 'Após dois anos espreitando as ruas como Batman, Bruce Wayne se encontra nas profundezas mais sombrias de Gotham City. Com poucos aliados confiáveis, o vigilante solitário se estabelece como a personificação da vingança para a população.', 14, '/src/img/movies/batman.jpg', 'Ação');

            //Get Hard
            createMidia('filme', 'Get Hard', 'O milionário James King é preso por fraude e deve cumprir pena em San Quentin. O juiz concede 30 dias para organizar os seus negócios. Desesperado, ele procura Darnell Lewis para prepará-lo para a vida atrás das grades. Mas apesar das suposições de James, Darnell nunca esteve na prisão. Juntos, os dois homens fazem de tudo para tornar James "durão" e, no processo, descobrem como estavam enganados sobre muitas coisas, inclusive sobre eles mesmos.', 14, '/src/img/movies/Get-Hard-21nov2014-poster.jpg', 'Comédia');

            //Wolf Man
            createMidia('filme', 'Wolf Man', 'Atacados por um animal que ninguém consegue ver, Blake e sua família se escondem em uma fazenda enquanto a criatura ronda o perímetro. À medida que a noite avança, ele começa a se comportar de forma estranha, transformando-se em algo irreconhecível.', 16, '/src/img/movies/filme-lobisomem.webp', 'Terror');

            createGender('Terror');
            createGender('Ação');
            createGender('Comédia');

            $filmes = $_SESSION['midias'];

            //Creates a new user array
            $newUser = [
                'name' => $name,
                'imgProfile' => $imgPath,
                'children' => $forChildren,
                'filmes' => $filmes
            ];
    
            if(count($_SESSION['profiles']) >= 5){
                header('location:/addProfile.php?cod=full');
                exit();
            }

            //Saves the new user array in a session
            $_SESSION['profiles'][] = $newUser;

            //Go to the profiles page
            header('location:/profilesPage.php');
            exit();
        }

        else{
            //Error
            header('location:/addProfile.php?cod=empty');
            exit();
        }
    }
?>