<?php $title = 'Profile page'; ?>

<?php require_once('./shared/header.php'); ?>

    <link rel="stylesheet" href="/src/css/profiles.css">
</head>

<!-- Code beggins here. -->

<?php
    @ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    @session_start();

    if(!isset($_SESSION['profiles']) || empty($_SESSION['profiles'])){
        header('location:/addProfile.php?cod=noProfiles');
        exit();
    }
?>

<body>
    <div class="body-profiles">
        <!-- Header -->
        <header class="d-flex">
            <div class="container text-center header-title">
                <p class="h3 text-white">Who's wathing Netflix?</p>
            </div>
        </header>

        <!-- Main -->
        <main class="profiles-container">
            <?php
                $array = $_SESSION['profiles'];

                echo '<div class="container d-flex">';

                foreach($array as $profile){
                    if(!empty($profile['imgProfile']) && $profile['children'] === 'false'){
                        echo '
                        <div class="d-block">
                            <div>
                                <img src="' . $profile['imgProfile'] . '" class="imgProfile">
                            </div>

                            <p class="text-white text-center profile-name">' . $profile['name'] . '</p>
                        </div>
                        ';
                    }

                    else if(!empty($profile['imgProfile']) && $profile['children'] === 'true'){
                        echo '
                        <div class="d-block">
                            <div>
                                <img src="' . $profile['imgProfile'] . '" class="imgProfile">
                            </div>

                            <p class="text-white text-center profile-name">' . $profile['name'] . '</p>
                        </div>
                        ';
                    }
                }

                echo '<div class="plus-sign">
                        <a href="/addProfile.php"><i class="fa-solid fa-plus"></i></a>
                    </div>';

                echo '</div>';
            ?>
        </main>

        <!-- Footer -->
        <footer>

        </footer>
    </div>
</body>

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>