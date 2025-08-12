<?php
    //@ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();

    $title = 'Edit Profile Page';

    // Se recebeu dados via POST, atualiza sessão com nome e imagem do perfil
    if($_POST){
        $_SESSION['profileName'] = $_POST['name'];
        $_SESSION['profileImage'] = $_POST['img'];
    }

    // Pega dados da sessão para exibir no formulário
    $profileName = $_SESSION['profileName'] ?? '';
    $profileImage = $_SESSION['profileImage'] ?? '';

    $error = false;
    $empty = false;

    // Verifica se veio código de erro na query string
    if(isset($_REQUEST['cod'])){
        $error = true;

        if($_REQUEST['cod'] === 'empty'){
            $empty = true;
        }
    }
?>

<!-- Code beggins here. -->

<?php require_once('./shared/header.php'); ?>

<link rel="stylesheet" href="/src/css/editProfile.css">
</head>

<body>
    <div class="custom-container position-relative">
        <!-- Botão fechar, volta para a página de perfis -->
        <div class="close-button">
            <a href="/profilesPage.php"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <!-- Títulos da página -->
        <div class="text text-center mb-5">
            <p class="h2 text-white fw-bold">Edit a profile</p>
            <p class="text-white p-profile">Edit a Netflix profile of someone.</p>
        </div>

        <!-- Formulário para edição do perfil -->
        <form action="/src/controller/editProfileControl.php" method="POST" enctype="multipart/form-data" class="m-5">
            <div class="first-layer d-flex flex-wrap align-items-center mb-5">
                <div class="pastProfile">
                    <!-- Exibe imagem atual do perfil -->
                    <img src="<?= $profileImage ?>" alt="Profile image" class="pastImage rounded">

                    <!-- Exibe nome atual do perfil -->
                    <p class="text-white text-center fw-bold p-name"><?= $profileName ?></p>
                </div>
            
                <div class="img-container mb-3">
                    <!-- Opções de imagens pré-definidas -->
                    <div class="img-container-div">
                        <input type="radio" name="imgs" id="img1" class="d-none imgs" value="img1">
                        <label for="img1" class="label-img"><img src="/src/img/profiles/imgProfile1.jpg" alt="Imagem 1" class="img-profiles"></label>
                    </div>
                
                    <div class="img-container-div">
                        <input type="radio" name="imgs" id="img2" class="d-none imgs" value="img2">
                        <label for="img2" class="label-img"><img src="/src/img/profiles/imgProfile2.jpg" alt="Imagem 2" class="img-profiles"></label>
                    </div>
                
                    <div class="img-container-div">   
                        <input type="radio" name="imgs" id="img3" class="d-none imgs" value="img3">
                        <label for="img3" class="label-img"><img src="/src/img/profiles/imgProfile3.jpg" alt="Imagem 3" class="img-profiles"></label>
                    </div>

                    <!-- Upload de imagem personalizada (em desenvolvimento) -->
                    <div class="img-container-div">
                        <input type="file" name="imgProfile" id="imgProfile" class="customImgProfile">
                        <label for="imgProfile"><i class="fa-solid fa-image me-1"></i></label>
                    </div>
                </div>

                <!-- Campo para alterar nome do perfil -->
                <div class="col-12 col-md-9 name-container">
                    <input type="text" name="name" id="name" class="form-name 
                    <?php 
                        if($error){
                            if($empty){
                                echo 'error-form-custom';
                            }
                        }
                    ?>" placeholder="New Name">

                    <!-- Mensagem de erro caso campos estejam vazios -->
                    <p class="error-p mt-3 
                    <?php
                        if($error){
                            if($empty){
                                echo '';
                            } else {
                                echo 'd-none';
                            }
                        } else {
                            echo 'd-none';
                        }
                    ?>">Please fill in all fields!</p>
                </div>
            </div>

            <hr class="form-hr">

            <div class="row mt-5">
                <!-- Campo oculto para enviar nome antigo para controle -->
                <input type="hidden" value="<?= htmlspecialchars($profileName) ?>" name="pastName">

                <div class="buttons mt-2 text-center">
                    <input type="submit" name="save" id="save" value="Save" class="custom-save mb-2">
                    <a href="/profilesPage.php" class="cancelbuttton d-block w-100 fw-bold">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>
