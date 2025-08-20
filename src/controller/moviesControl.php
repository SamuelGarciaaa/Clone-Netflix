<?php
    //Função para criar mídias
    function createMidia(array $midias, $tipo, $nome, $sobre, $idade, $imagem, $genero){
        $midia = [
            'tipo' => $tipo,
            'nome' => $nome,
            'sobre' => $sobre,
            'idade' => $idade,
            'imagem' => $imagem,
            'genero' => $genero
        ];

        $midias[] = $midia;

        return $midias;
    }

    //Array de gêneros
    function createGender(array $generos, $gender) {
        $generos[] = $gender;
        return $generos;
    }
?>