<?php
    if($_POST){
        //Start the session
        //@ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
        @session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        //Check if the fields are not empty
        if(!empty($email) && !empty($password)){
            if(isset($_SESSION['profiles']) && !empty($_SESSION['profiles'])){
                //If the session exists, redirect to the profile page.
                header('location:/profilesPage.php');
                exit();
            }
            
            else{
                if(isset($_POST['remember-me-checkbox']) && $_POST['remember-me-checkbox'] === 'remember'){
                    //Create the cookies
                    setcookie("email", $email, time() + 86400, "/");
                    setcookie("password", $password, time() + 86400, "/");
                }
                
                else{
                    //Delete the cookies
                    setcookie('email', '', time() - 86400, '/');
                    setcookie('password', '', time() - 86400, '/');
                }
                
                header('location:/addProfile.php');
                exit();
            }
        }

        //If they are empty, an error is returned to the user
        else{
            //cod=empty
            header('location:/registerPage.php?cod=empty');
            exit();
        }
    }
?>