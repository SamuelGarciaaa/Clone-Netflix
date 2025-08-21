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

        return $midia;
    }

    //Array de gêneros
    //Inutil mas dane-se
    function createGender($gender){
        return $gender;
    }
?>