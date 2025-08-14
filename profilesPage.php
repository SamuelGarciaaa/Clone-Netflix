<?php
    $title = 'Profiles page';

    @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    @session_start();
    
    // Se não existir perfil na sessão, redireciona para adicionar perfil
    if(!isset($_SESSION['profiles']) || empty($_SESSION['profiles'])){
        header('location:/addProfile.php?cod=noProfiles');
        exit();
    }
?>

<!-- Code beggins here. -->

<?php require_once('./shared/header.php'); ?>

<link rel="stylesheet" href="/src/css/profiles.css">
</head>
<body>
    <div class="body-profiles">
        <!-- Cabeçalho da página -->
        <header class="d-flex">
            <div class="container text-center header-title">
                <p class="h3 text-white">Who's wathing Netflix?</p>
            </div>
        </header>

        <!-- Conteúdo principal: lista de perfis -->
        <main class="profiles-container">
            <?php
                $array = $_SESSION['profiles'];

                echo '<div class="container d-flex">';

                // Percorre cada perfil da sessão
                foreach($array as $profile){
                    if(!empty($profile['imgProfile']) && $profile['children'] === 'false'){
                        // Perfil adulto com imagem e botão de editar
                        echo '
                        <div>
                            <div class="d-block profileDiv text-center">
                                <div>
                                    <form method="POST" action="/moviesPage.php">
                                        <input type="hidden" name="name" value="' . $profile['name'] . '">
                                        <input type="hidden" name="img" value="' . $profile['imgProfile'] . '">
                                        <button class="button-image-profile"><img src="' . $profile['imgProfile'] . '" class="imgProfile"></button>
                                    </form>
                                </div>

                                <p class="text-white text-center profile-name">' . $profile['name'] . '</p>

                                <div class="editButton">
                                    <form method="POST" action="/editProfile.php">
                                        <input type="hidden" name="name" value="' . $profile['name'] . '">
                                        <input type="hidden" name="img" value="' . $profile['imgProfile'] . '">
                                        <button class="editLink"><i class="fa-regular fa-pen-to-square"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    else if(!empty($profile['imgProfile']) && $profile['children'] === 'true'){
                        // Perfil infantil com imagem, sem botão de editar
                        echo '
                        <div>
                            <div class="d-block profileDiv text-center">
                                <div>
                                    <img src="' . $profile['imgProfile'] . '" class="imgProfile">
                                </div>

                                <p class="text-white text-center profile-name">' . $profile['name'] . '</p>
                            </div>
                        </div>
                        ';
                    }
                }

                // Botão para adicionar novo perfil
                echo '
                    <div>
                        <div class="plus-sign">
                            <a href="/addProfile.php"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                ';

                echo '</div>';
            ?>
        </main>

        <!-- Rodapé vazio -->
        <footer>
        </footer>
    </div>
</body>

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>