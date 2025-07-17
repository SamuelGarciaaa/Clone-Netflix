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

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>