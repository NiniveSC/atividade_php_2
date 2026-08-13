<?php

function contar_maiusculas($senha) {
    $contador = 0;

    for ($i = 0; $i < strlen($senha); $i++){
        if (ctype_upper($senha[$i])){
            $contador++;
        }
    }

    return $contador;

}

function contar_minusculas($senha) {
    $contador = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if (ctype_lower($senha[$i])){
            $contador++;
        }
    }
    return $contador;
}

function contar_caracteres($senha){
    $contador = 0;

    for ($i = 0; $i < strlen($senha); $i++){
        if (!ctype_alnum($senha[$i])) {
            $contador++;
        }
    }
    return $contador;
}

function contar_tamanho($senha) {
    return strlen($senha);
}


function classificar_senha($tamanho, $maiusculas, $minusculas, $numeros, $caracteres) {
    if ($tamanho < 8) {
        return "Muito pequena";
    }

    $pontos = 0;

    if ($maiusculas > 0) {
        $pontos++;
    }

    if ($minusculas > 0) {
        $pontos++;
    }

    if ($numeros > 0) {
        $pontos++;
    }

    if ($caracteres > 0) {
        $pontos++;
    }

    if ($pontos == 1){
        return "Segurança Fraca";
    }

    if ($pontos == 2){
        return "Segurança Média";
    }

    if ($pontos == 3) {
        return "Segurança Forte";
    }

    return "Segurança Muito Forte";
}

$senha = "Abc123@#";

$maiusculas = contar_maiusculas($senha);
$minusculas = contar_minusculas($senha);
$numeros = contar_numeros($senha);
$caracteres = contar_caracteres($senha);
$tamanho = contar_tamanho($senha);

echo "Senha: $senha <br>";
echo "Maiúsculas: $maiusculas <br>";
echo "Minúsculas: $minusculas <br>";
echo "Números: $numeros <br>";
echo "Caracteres especiais: $caracteres <br>";
echo "Tamanho: $tamanho <br>";
echo "Classificação: " . classificar_senha($tamanho, $maiusculas, $minusculas, $numeros, $caracteres);
