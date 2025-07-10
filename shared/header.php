<?php
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();

    if(isset($_SESSION['usuarios'])){
        //If the session exists, redirect to the profile page.
        $title = 'Profile page';
        header('location: profilesPage.php?title=$title');
    }

    else{
        //Just use this page.
        $title = 'Login Page';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <!-- CSS imports. -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/loginPage.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- FavIcons. -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon_io/site.webmanifest">
</head>
<body>