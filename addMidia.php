<?php
    $title = 'Add Midia Page';

    @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    @session_start();

    if($_POST){
        $_SESSION['name-midia'] = $_POST['name'];
        $_SESSION['img-midia'] = $_POST['imgProfile'];
    }

    $name = $_SESSION['name-midia'];
    $imgPath = $_SESSION['img-midia'];

    if(isset($_REQUEST['cod'])){
        if($_REQUEST['cod'] === 'empty'){
            $empty = true;
        }
    }
?>

<!-- Code begins here. -->
<?php require_once('./shared/header.php'); ?>

    <link rel="stylesheet" href="/src/css/addMidia.css">
</head>

<body>
    <!-- Header -->
    <header>

    </header>

    <!-- Main -->
    <main>
        <div class="form w-50 container">
            <form action="/src/controller/addMidiaControl.php" method="POST" class="p-5" enctype="multipart/form-data">
                <div class="header d-flex justify-content-between mb-5">
                    <div class="logo mt-3">
                        <img src="/src/img/favicon_io/favicon-32x32.png" alt="Logo Netflix">
                    </div>
                    
                    <div class="img-perfil-div mt-2 d-flex gap-3 text-white fw-bold">
                        <img src="<?= $imgPath ?>" alt="Imagem perfil" class="img-perfil">
                        <p class="mt-2"><?= $name ?></p>
                    </div>

                    <div class="close-button">
                        <a href="/moviesPage.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                </div>

                <div class="error">
                    <?php
                        if(isset($empty)){
                            if($empty){
                                echo '<p class="error-p">Please fill in all fields!</p>';
                            }
                        }
                    ?>
                </div>

                <div class="title-image row">
                    <div class="image-midia col d-block text-center">
                        <p class="h5 text-white">Select an image for the midia</p>
                        <input type="file" name="img-midia" id="img-midia" class="d-none">
                        <label for="img-midia"><i class="fa-solid fa-image me-1"></i></label>
                    </div>
                    <div class="title col">
                        <input type="text" name="movie_name" class="form-control" placeholder="Enter a name">

                        <div class="idade mt-3">
                            <p class="text-white text-center h5">Select an age</p>

                            <div class="imgs">
                                <div class="ages layer-1 d-flex justify-content-around">
                                    <input type="radio" value="L" name="ages-radio" id="L" class="d-none">
                                    <label for="L" class="imgs-ages"><img src="/src/img/ages/Captura de tela 2025-08-20 162422.png" alt="Livre"></label>
    
                                    <input type="radio" value="10" name="ages-radio" id="10" class="d-none">
                                    <label for="10" class="imgs-ages"><img src="/src/img/ages/Captura de tela 2025-08-20 162414.png" alt="Livre"></label>
    
                                    <input type="radio" value="12" name="ages-radio" id="12" class="d-none">
                                    <label for="12" class="imgs-ages"><img src="/src/img/ages/Captura de tela 2025-08-20 162403.png" alt="Livre"></label>
                                </div>
    
                                <div class="ages layer-2 d-flex justify-content-around mt-2">
                                    <input type="radio" value="14" name="ages-radio" id="14" class="d-none">
                                    <label for="14" class="imgs-ages"><img src="/src/img/ages/Captura de tela 2025-08-20 162358.png" alt="Livre"></label>

                                    <input type="radio" value="16" name="ages-radio" id="16" class="d-none">
                                    <label for="16" class="imgs-ages"><img src="/src/img/ages/Captura de tela 2025-08-20 162354.png" alt="Livre"></label>

                                    <input type="radio" value="18" name="ages-radio" id="18" class="d-none">
                                    <label for="18" class="imgs-ages"><img src="/src/img/ages/Captura de tela 2025-08-20 162349.png" alt="Livre"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="midia mt-3 h5">
                        <p class="text-white">What is it?</p>

                        <select name="type" id="type" class="form-select">
                            <option value="movie">Movie</option>
                            <option value="serie">TV Show</option>
                        </select>
                    </div>

                    <div class="gender h5">
                        <p class="text-white">What gender is it?</p>

                        <select name="gender-select" id="gender-select" class="form-select">
                            <?php
                                $array = $_SESSION['profiles'];
                                $index = -1;

                                foreach($array as $key => $profile){
                                    if(isset($profile['name']) && $profile['name'] === $name){
                                        $index = $key;
                                        break;
                                    }
                                }

                                foreach($array as $profile){
                                    foreach($profile['generos'] as $genero){
                                        echo '
                                            <option value="' . $genero . '">' . $genero . '</option>
                                        ';
                                    }

                                    break;
                                }
                            ?>
                        </select>

                        <div class="create-gender h5 mt-3">
                            <p class="text-white">Didn't find your gender? Create one!</p>
                            <p class="custom-p">(Leave it empty if you dont want to create your own.)</p>

                            <input type="text" name="custom-gender" id="custom-gender" placeholder="Ex: Sci-Fi" class="form-control">
                        </div>
                    </div>

                    <div class="about h5">
                        <p class="text-white">Say something about your midia.</p>

                        <textarea class="form-control" name="about" id="about" placeholder="This midia is about..." rows="10"></textarea>
                    </div>

                    <!-- NÃO MEXER -->
                     <input type="hidden" value="<?= $name ?>" name="name">

                    <input type="hidden" value="<?= $index ?>" name="index">

                    <div class="buttons">
                        <div class="submit-button">
                            <button type="submit" class="">Submit</button>
                        </div>

                        <div class="cancel-button mt-2">
                            <a href="/moviesPage.php" type="reset">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer>

    </footer>
</body>

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>