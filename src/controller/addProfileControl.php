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

            require_once('moviesControl.php');

            //The Batman
            createMidia('filme', 'The Batman', 'Após dois anos espreitando as ruas como Batman, Bruce Wayne se encontra nas profundezas mais sombrias de Gotham City. Com poucos aliados confiáveis, o vigilante solitário se estabelece como a personificação da vingança para a população.', 14, '/src/img/movies/batman.jpg', 'Ação');

            //Get Hard
            createMidia('filme', 'Get Hard', 'O milionário James King é preso por fraude e deve cumprir pena em San Quentin. O juiz concede 30 dias para organizar os seus negócios. Desesperado, ele procura Darnell Lewis para prepará-lo para a vida atrás das grades. Mas apesar das suposições de James, Darnell nunca esteve na prisão. Juntos, os dois homens fazem de tudo para tornar James "durão" e, no processo, descobrem como estavam enganados sobre muitas coisas, inclusive sobre eles mesmos.', 14, '/src/img/movies/Get-Hard-21nov2014-poster.jpg', 'Comédia');

            //Wolf Man
            createMidia('filme', 'Wolf Man', 'Atacados por um animal que ninguém consegue ver, Blake e sua família se escondem em uma fazenda enquanto a criatura ronda o perímetro. À medida que a noite avança, ele começa a se comportar de forma estranha, transformando-se em algo irreconhecível.', 16, '/src/img/movies/filme-lobisomem.webp', 'Terror');

            //Vingaroes: Ultimato
            createMidia('filme', 'Vingadores: Ultimato', 'Após Thanos eliminar metade das criaturas vivas, os Vingadores têm de lidar com a perda de amigos e entes queridos. Com Tony Stark vagando perdido no espaço sem água e comida, Steve Rogers e Natasha Romanov lideram a resistência contra o titã louco.', 12, '/src/img/movies/avengers-infinity-war-official-poster-2018-4o.png', 'Ação');

            //Stranger Things
            createMidia('serie', 'Stranger Things', 'Na década de 1980, um grupo de amigos se envolve em uma série de eventos sobrenaturais na pacata cidade de Hawkins. Eles enfrentam criaturas monstruosas, agências secretas do governo e se aventuram em dimensões paralelas.', 16, '/src/img/movies/stranger_binary_291670.jpg', 'Terror');

            //Brooklyn Nine-Nine
            createMidia('serie', 'Brooklyn Nine-Nine', 'Jake Peralta é um detetive brilhante e ao mesmo tempo imaturo, que nunca precisou se preocupar em respeitar as regras. Tudo muda quando um capitão exigente assume o comando de seu esquadrão e Jake deve aprender a trabalhar em equipe.', 14, '/src/img/movies/brooklyn-nine-nine.jpg', 'Comédia');

            createGender('Terror');
            createGender('Ação');
            createGender('Comédia');

            //Garante filmes diferentes
            $array = $_SESSION['midias'];

            $midias_unicas = [];
            foreach($array as $midia){
                $midias_unicas[$midia['nome']] = $midia;
            }

            $chaves_aleatorias_unicas = array_rand($midias_unicas, 3);

            $midias_por_perfil = [];
            foreach($chaves_aleatorias_unicas as $nome_do_filme){
                $midias_por_perfil[] = $midias_unicas[$nome_do_filme];
            }

            //Creates a new user array
            $newUser = [
                'name' => $name,
                'imgProfile' => $imgPath,
                'children' => $forChildren,
                'midias' => $midias_por_perfil
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