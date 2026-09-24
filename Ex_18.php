<?php
function total_consultas($agenda){
    return count($agenda);
}

function pacientes_diferentes($agenda){
    $pacientes = [];

    foreach ($agenda as $consulta){
        $pacientes[] = $consulta["paciente"];
    }
    return count(array_unique($pacientes));
}

function contar_especialidades($agenda){
    $especialidades = [];
    foreach($agenda as $consulta){

        if(isset($especialidades[$conculta["especialidade"]])){
            $especialidades[$consulta["especialidade"]]++;
        }else{
            $especialidades[$consulta["especialidade"]] = 1;
        }
    }
    return $especialidades;
}

funcion ordenar_horarios($agenda){
    usort($agenda, function($a,$b){
        return strcmp($a["horario"], $b["horario"]);
    });
    return $agenda;
}

function pesquisar_pacientes($agenda,$nome){
    foreach($agenda as $consulta){
        if($conculta["paciente"] == $nome){
            return $consulta;
        }
    }
    return "Paciente não encontrado";
}

function horario_duplicado($agenda){

    $horarios = [];

    foreach($agenda as $consulta){
        if(in_array($consulta["horario"], $hprarios)){
            return "Sim";
        }
        $hprarios[] = $consulta["horario"];
    }
    return "Não";
}

function organizar_agenda($agenda, $nome){
    $agenda = ordenar_horarios($agenda);

    return [
        "total" => total_consultas($agenda),
        "pacientes" => pacientes_diferentes($agenda),
        "especialidades" => contar_especialidades($agenda),
        "primeiro" => $agenda[0],
        "ultimo" => $agenda[count($agenda)-1],
        "lista" => $agenda,
        "pesquisa" => pesquisar_pacientes($agenda, $nome),
        "duplicado" => horario_duplicado($agenda)
    ];
}

$agenda = [
    ["paciente"=>"Nínive","especialidade"=>"Cardiologia","data"=>"24/09/2026","horario"=>"09:00"],
    ["paciente"=>"Brayan","especialidade"=>"Ortopedia","data"=>"24/09/2026","horario"=>"12:00"],
    ["paciente"=>"Henrique","especialidade"=>"Pediatria","data"=>"24/09/2026","horario"=>"10:00"],
    ["paciente"=>"André","especialidade"=>"Cirurgião","data"=>"24/09/2026","horario"=>"08:00"]
]

$resultado = organizar_agenda($agenda, "Nínive");

echo "Total de consultas: " . $resultado["total"] . "<br><br>";
echo "Pacientes diferentes: " . $resultados["pacientes"] . "<br><br>"; 
echo "Consultas por especialidade:<br>";
foreach($resultado["especialidades"] as $esp => $qtd){
    echo $esp . ": " . $qtd . "<br>";
}

echo "<br>Primeiro atendimento:<br>";
echo "Paciente: " . $resultado["primeiro"]["paciente"] . "<br>";
echo "Especialidade: " . $resultado["primeiro"]["especialidade"] . "<br>";
echo "Data: " . $resultado["primeiro"]["data"] . "<br>";
echo "Horário: " . $resultado["primeiro"]["horario"] . "<br>";

echo "<br>Último atendimento:<br>";
echo "Paciente: " . $resultado["ultimo"]["paciente"] . "<br>";
echo "Especialidade: " . $resultado["ultimo"]["especialidade"] . "<br>";
echo "Data: " . $resultado["ultimo"]["data"] . "<br>";
echo "Horário: " . $resultado["ultimo"]["horario"] . "<br>";

echo "<br>Agenda ordenada:<br>";
foreach($resultado["lista"] as $consulta){
    echo "Paciente: " . $consulta["paciente"] . " - ";
    echo "Horário: " . $consulta["horario"] . "<br>";
}

echo "<br>Pesquisa do paciente:<br>";

if(is_array($resultado["pesquisa"])){
    echo "Paciente: " . $resultado["pesquisa"]["paciente"] . "<br>";
    echo "Especialidade: " . $resultado["pesquisa"]["especialidade"] . "<br>";
    echo "Data: " . $resultado["pesquisa"]["data"] . "<br>";
    echo "Horário: " . $resultado["pesquisa"]["horario"] . "<br>";
}else{
    echo $resultado["pesquisa"] . "<br>";
}

echo "<br>Horários duplicados: " . $resultado["duplicado"];
