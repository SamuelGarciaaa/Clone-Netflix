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
        <div class="header">
            <div class="img-header">
                <a href="/profilesPage.php"><img src="/src/img/logoNetflix.png" alt="Logo Netflix" class="netflix-logo"></a>
            </div>
    
            <div class="buttons">
                <ul class="buttons-ul">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">TV Shows</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">Games</a></li>
                    <li><a href="#">New & Popular</a></li>
                    <li><a href="#">My list</a></li>
                    <li><a href="#">Browse by Languages</a></li>
                </ul>
            </div>

            <?php
                echo '
                    <div class="div-profile">
                        <div class="items">
                            <i class="fa-solid fa-magnifying-glass item"></i>
                            <i class="fa-regular fa-bell item"></i>
                            <p class="text-white">Kids</p>
                        </div>

                        <img src="' . $imgPath . '" alt="Image Profile" class="foto-perfil"/>
                    </div>
                ';
            ?>
        </div>
    </header>

    <!-- Main -->
    <main>
        <?php
        //Encontra o índice do perfil
        $array = $_SESSION['profiles'];
        $index = null;

        foreach($array as $key => $profile){
            if(isset($profile['name']) && trim(strtolower($profile['name'])) === trim(strtolower($name))){
                $index = $key;
                break;
            }
        }

        //Verifica se o perfil foi encontrado
        if($index !== null){
            $generos = $_SESSION['profiles'][$index]['generos'];
            $midias = $_SESSION['profiles'][$index]['midias'];
            
            //Agrupa as mídias por gênero
            $midiasPorGenero = [];
            foreach ($midias as $midia) {
                if (isset($midia['genero'])) {
                    $midiasPorGenero[$midia['genero']][] = $midia;
                }
            }

            //Percorre a lista de gêneros do usuário
            foreach($generos as $genero){
                //Verifica se existem mídias para este gênero
                if(isset($midiasPorGenero[$genero])){
                    echo '
                        <div class="generos">
                            <p> ' . htmlspecialchars($genero) . ' </p>
                        </div>
                    ';
                    echo '
                        <div class="filmes">
                    ';

                    //Percorre apenas as mídias do gênero atual
                    foreach($midiasPorGenero[$genero] as $midia){
                        echo '
                                <img src="' . htmlspecialchars($midia['imagem']) . '" alt="Imagem Filme" class="img-filme">
                                ';
                            }
                        }

                    echo '</div>';
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