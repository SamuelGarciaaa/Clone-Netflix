<?php $title = 'Add user page'; ?>

<?php require_once('./shared/header.php'); ?>

    <link rel="stylesheet" href="/src/css/addUser.css">
</head>

<!-- Code beggins here. -->

<?php
    $error = false;
    $noProfile = false;
    $full = false;
    $empty = false;

    if(isset($_REQUEST['cod'])){
        $error = true;

        if($_REQUEST['cod'] === 'empty'){
            $empty = true;
        }
        
        elseif($_REQUEST['cod'] === 'noProfiles'){
            $noProfile = true;
        }
        
        else{
            $full = true;
        }
    }
?>

<body>
    <div class="custom-container position-relative">
        <div class="close-button">
            <a href="/profilesPage.php"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <div class="text text-center mb-5">
            <p class="h2 text-white fw-bold">Add a profile</p>
            <p class="text-white p-profile">Add a Netflix profile for someone.</p>
        </div>

        <form action="/src/controller/addProfileControll.php" method="POST" enctype="multipart/form-data" class="m-5">
            <div class="first-layer d-flex flex-wrap align-items-center mb-5">
                <div class="img-container">
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

                    <div class="img-container-div">
                        <input type="file" name="imgProfile" id="imgProfile" class="customImgProfile">
                        <label for="imgProfile"><i class="fa-solid fa-image me-1"></i></label>
                    </div>
                </div>

                <div class="col-12 col-md-9 name-container">
                    <input type="text" name="name" id="name" class="form-name 
                    <?php 
                        if($error){
                            if($empty){
                                echo 'error-form-custom';
                            }
                        }
                    ?>" placeholder="Name">

                    <p class="error-p mt-3 
                    <?php
                        if($error){
                            if($empty){
                                echo '';
                            }
                            
                            else{
                                echo 'd-none';
                            }
                        }

                        else{
                            echo 'd-none';
                        }
                    ?>">Please fill in all fields!</p>
                </div>
            </div>

            <p class="error-p 
                            <?php
                                if($error){
                                    if(!$noProfile){
                                        echo 'd-none';
                                    }
                                    
                                    else{
                                        echo '';
                                    }
                                }

                                else{
                                    echo 'd-none';
                                }
                            ?>">You need to add a profile!</p>
            <hr class="form-hr">

            <div class="row mt-5">
                <div class="text-child col">
                    <p class="h5 text-white fw-bold">Profile for children</p>
                    <p class="p-child">Watch only series and films suitable for children</p>
                </div>

                <div class="col switch mb-5">
                    <div class="form-check form-switch">
                        <input class="form-check-input customSwitch" type="checkbox" id="children" name="children" value="yes">
                    </div>
                </div>

                <p class="error-p text-center <?php
                    if($error){
                        if($full){
                            echo '';
                        }
                        
                        else{
                            echo 'd-none';
                        }
                    }

                    else{
                        echo 'd-none';
                    }
                ?>">You've reached the max amount of profiles!</p>

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