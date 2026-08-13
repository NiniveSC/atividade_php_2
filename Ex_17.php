<?php 

function contar_caracteres($texto) {
    return strlen($texto);
}

function contar_palavras($texto) {
    $texto = trim($texto);
    $palavras = explode(" ", $texto);

    return count($palavras);
}

function contar_frases($texto) {
    $frases = preg_split("/[.!?]+", $texto);

    $contador = 0;

    foreach ($frases as $frase){
        if (trim($frase) != ""){
            $contador++;
        }
    }

    return $contador
}

function encontrar_maior_palavra($texto) {
    $palavras = explode(" ", trim($texto));

    $maior = "";

    foreach ($palavras as $palavra) {
        if (strlen($palavra) > strlen($maior)) {
            $maior = $palavra;
        }
    }

    return $maior;
}

function encontrar_menor_palavra($texto) {
    $palavras = explode(" ", trim($texto));

    $menor = $palavras[0];

    foreach ($palavras as $palavra) {

        if (strlen($palavra) < strlen($menor)) {
            $menor = $palavra;
        }

    }

    return $menor;
}

function contar_palavras_repetidas($texto) {
    $palavras = explode(" ", strtolower(trim($texto)));

    $quantidades = array_count_values($palavras);

    $contador = 0;

    foreach ($quantidades as $quantidade) {

        if ($quantidade > 1) {
            $contador++;
        }

    }

    return $contador;
}

 function cinco_palavras_frequentes($texto) {
    $palavras = explode(" ", strtolower(trim(texto)));

    $quantidades = array_count_values($palavras);

    arsort($quantidades);

    return array_slice($quantidades, 0,5, true);
 }

 function remover_espacos($texto) {
    $texto
 }
