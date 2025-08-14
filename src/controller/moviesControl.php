<?php
    //Função para criar mídias
    function createMidia($tipo, $nome, $sobre, $idade, $imagem, $genero){
        $midia = [
            'tipo' => $tipo,
            'nome' => $nome,
            'sobre' => $sobre,
            'idade' => $idade,
            'imagem' => $imagem,
            'genero' => $genero
        ];

        //Array de mídias padrão
        if(!isset($_SESSION['midias'])){
            $_SESSION['midias'] = [];
        }

        $_SESSION['midias'][] = $midia;
    }

    //Array de gêneros
    function createGender($gender){
        $genders = [
            'genero' => $gender
        ];

        //Array de gêneros padrão
        if(!isset($_SESSION['genders'])){
            $_SESSION['genders'] = [];
        }

        $_SESSION['genders'][] = $gender;
    }
?>