<?php
    $title = 'Movies page';

    //@ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    @session_start();
    
    if(!isset($_SESSION['profiles']) || empty($_SESSION['profiles'])){
        header('location:/addProfile.php?cod=noProfiles');
        exit();
    }
?>

<!-- Code begins here. -->
<?php require_once('./shared/header.php'); ?>

    <link rel="stylesheet" href="/src/css/moviesPage.css">
</head>
<body>

</body>

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>