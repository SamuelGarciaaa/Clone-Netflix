<?php
    $title = 'Movies page';

    @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    @session_start();
    
    // Checks if the session is on
    if(!isset($_SESSION['profiles']) || empty($_SESSION['profiles'])){
        header('location:/addProfile.php?cod=noProfiles');
        exit();
    }

    else{
        if($_POST){
            $name = $_POST['name'];
            $imgPath = $_POST['img'];
        }
    }
?>

<!-- Code begins here. -->
<?php require_once('./shared/header.php'); ?>

    <link rel="stylesheet" href="/src/css/moviesPage.css">
</head>
<body>
    <!-- Header -->
    <header>
        <?php
            echo '
                <img src="' . $imgPath . '" alt="Image Profile"/>
                <p>' . $name .  '</p>
            ';
        ?>
    </header>

    <!-- Main -->
    <main>
        <?php
            $array = $_SESSION['profiles'];

            $index = 0;
            foreach($array as $key => $profile){
                if(isset($profile['name']) && trim(strtolower($profile['name'])) === trim(strtolower($name))){
                    $index = $key;
                    break;
                }
            }

            $generos = $_SESSION['profiles'][$index]['generos'];
            $midias = $_SESSION['profiles'][$index]['midias'];

            foreach($generos as $genero){
                echo '
                    <div class="generos">
                        <p> ' . $genero . ' </p>
                    </div>
                ';

                foreach($midias as $key => $midia){
                    if($midia['genero'] === $genero){
                        echo '
                            <img src="' . $midia['imagem'] . '" alt="Imagem Filme">   
                        ';
                    }
                }
            }
        ?>
    </main>

    <!-- Footer -->
    <footer>

    </footer>
</body>

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>