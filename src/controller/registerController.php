<?php
    if($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Checks if the fields are not empty
        if(!empty($email) && !empty($password)){
            //Starts the session
            ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
            session_start();

            if(isset($_SESSION['usuario'])){
                //If the session exists, redirect to the profile page.
                header('location:/profilesPage.php');
                exit();
            }

            else{
                //Creates the session using the Email
                $_SESSION['usuario'] = $email;

                if($_POST['remember-me-checkbox']){
                    setcookie("email", $email, ((time() + 3600) * 24), "/");
                    setcookie("password", $password, ((time() + 3600) * 24), "/");
                }

                header('location:/getUsername.php');
                exit();
            }
        }

        //If they are empty, an error is returned to the user
        else{
            //cod=empty
            header('location:/registerPage.php?cod=empty');
        }
    }
?>