<?php
    //Array de infos das mídias
    $infoMidia = [
        'nome' => '',
        'imagem' => '',
        'classificacao' => '',
        'genero' => '',
    ];

    //Array de gêneros
    $gender = [
        'Terror', 'Comédia', 'Ação'
    ];

    //Array de mídias padrão
    $midias = [
        
    ];

    $_SESSION['gender'] = $gender;
    $_SESSION['midias'] = $midias;
?>