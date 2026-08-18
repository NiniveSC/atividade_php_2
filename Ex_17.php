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
    $texto = trim($texto);

    return preg_replace('/\s+/', ' ', $texto);

 }

 function formatar_texto($texto) {
    return ucwords(strtolower($texto));
 }

 function processar_texto($texto) {
    $caracteres = contar_caracteres($texto);
    $palavras = contar_palavras($texto);
    $frases = contar_frases($texto);
    $maior = encontrar_maior_palavra($texto);
    $menor = encontrar_menor_palavra($texto);
    $repetidas =  contar_palavras_repetidas($texto);
    $frequentes = cinco_palavras_frequentes($texto);
    $sem_espacos = remover_espacos($texto);
    $formatado = formatar_texto($texto);

    return [
        "Caracteres" => $caracteres,
        "Palavras" => $palavras,
        "Frases" => $frases,
        "Palavra mais longa" => $maior,
        "Palavra mais curta" => $menor,
        "Palavras repetidas" => $repetidas,
        "Palavras mais frequentes" => $frequentes,
        "Texto sem espaços duplicados" => $sem_espacos,
        "Texto formatado" => $formatado
    ];
 }

 $texto = "A aluna chegou atrasada hoje, pois a aluna acordou atrasada.";

 $resultado = processar_texto($texto);

 echo 