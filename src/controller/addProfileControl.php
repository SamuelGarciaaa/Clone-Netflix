<?php
    if($_POST){
        //Start the session
        //@ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
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
    
            //Creates a new user array
            $newUser = [
                'name' => $name,
                'imgProfile' => $imgPath,
                'children' => $forChildren
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