<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSolutions - Sistema de Funcionários</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSolutions - Sistema de Funcionários</title>
</head>
<body>
    <?php

    $funcionarios = [
        [
            "id"         => 1001,
            "nome"       => "Ana Cristina Souza",
            "cargo"      => "Desenvolvedor",
            "departamento" => "Tecnologia",
            "salario"    => 5800.00,
            "admissao"   => "2023-02-15",
            "status"     => "Ativo",
            "email"      => "ana.souza@techsolutions.com"
        ],
        [
            "id"         => 1002,
            "nome"       => "Carlos Eduardo Mendes",
            "cargo"      => "Analista de Sistemas",
            "departamento" => "Tecnologia",
            "salario"    => 4200.00,
            "admissao"   => "2023-06-01",
            "status"     => "Ativo",
            "email"      => "carlos.mendes@techsolutions.com"
        ],
        [
            "id"         => 1003,
            "nome"       => "Mariana Oliveira Lima",
            "cargo"      => "Gerente de Projetos",
            "departamento" => "Gestão",
            "salario"    => 9200.00,
            "admissao"   => "2022-09-10",
            "status"     => "Ativo",
            "email"      => "mariana.lima@techsolutions.com"
        ],
        [
            "id"         => 1004,
            "nome"       => "Rafael Santos Pereira",
            "cargo"      => "Designer UX/UI",
            "departamento" => "Design",
            "salario"    => 4900.00,
            "admissao"   => "2023-11-20",
            "status"     => "Treinamento",
            "email"      => "rafael.pereira@techsolutions.com"
        ],
        [
            "id"         => 1005,
            "nome"       => "Fernanda Costa Rocha",
            "cargo"      => "DevOps Engineer",
            "departamento" => "Infraestrutura",
            "salario"    => 6500.00,
            "admissao"   => "2023-04-05",
            "status"     => "Férias",
            "email"      => "fernanda.rocha@techsolutions.com"
        ],
        [
            "id"         => 1006,
            "nome"       => "Lucas Andrade Silva",
            "cargo"      => "Estagiário de Desenvolvimento",
            "departamento" => "Tecnologia",
            "salario"    => 1800.00,
            "admissao"   => "2024-01-15",
            "status"     => "Treinamento",
            "email"      => "lucas.silva@techsolutions.com"
        ],
        [
            "id"         => 1007,
            "nome"       => "Juliana Martins Dias",
            "cargo"      => "Analista de Dados",
            "departamento" => "Dados",
            "salario"    => 5100.00,
            "admissao"   => "2023-08-22",
            "status"     => "Ativo",
            "email"      => "juliana.dias@techsolutions.com"
        ]
    ];


    $departamentos = [
        "Tecnologia",
        "Gestão",
        "Design",
        "Infraestrutura",
        "Dados"
    ];


    $totalFuncionarios = 0;
    foreach ($funcionarios as $funcionario) {
        $totalFuncionarios++;
    }


    $totalDepartamentos = 0;
    foreach ($departamentos as $departamento) {
        $totalDepartamentos++;
    }

    $totalSalarios = 0;
    foreach ($funcionarios as $funcionario) {
        $totalSalarios += $funcionario['salario'];
    }


    $mediaSalario = $totalSalarios / $totalFuncionarios;


    $maiorSalario = $funcionarios[0]['salario'];  // Começa com o primeiro salário
    $menorSalario = $funcionarios[0]['salario'];  // Começa com o primeiro salário

    // Percorre todos os funcionários para encontrar o maior e menor salário
    foreach ($funcionarios as $funcionario) {
        // Verifica se o salário atual é maior que o maior registrado
        if ($funcionario['salario'] > $maiorSalario) {
            $maiorSalario = $funcionario['salario'];
        }
        // Verifica se o salário atual é menor que o menor registrado
        if ($funcionario['salario'] < $menorSalario) {
            $menorSalario = $funcionario['salario'];
        }
    }


    function formatarMoedaManual($valor) {
        // Separa a parte inteira da parte decimal
        $parteInteira = (int)$valor;                    // Pega a parte inteira
        $parteDecimal = round(($valor - $parteInteira) * 100); // Pega os centavos
        
        // Garante que a parte decimal tenha 2 dígitos
        if ($parteDecimal < 10) {
            $parteDecimal = "0" . $parteDecimal;
        }
        
        // Converte a parte inteira para string e adiciona pontos de milhar
        $parteInteiraStr = (string)$parteInteira;
        $parteInteiraFormatada = "";
        $contador = 0;
        
        // Percorre a string de trás para frente adicionando pontos a cada 3 dígitos
        for ($i = strlen($parteInteiraStr) - 1; $i >= 0; $i--) {
            $parteInteiraFormatada = $parteInteiraStr[$i] . $parteInteiraFormatada;
            $contador++;
            // Adiciona ponto a cada 3 dígitos, exceto no final
            if ($contador % 3 == 0 && $i > 0) {
                $parteInteiraFormatada = "." . $parteInteiraFormatada;
            }
        }
        
        // Retorna o valor formatado com "R$ " e vírgula separando os centavos
        return "R$ " . $parteInteiraFormatada . "," . $parteDecimal;
    }


    function formatarDataManual($data) {
        // Divide a string da data pelo hífen
        $partes = explode("-", $data);
        // Pega ano, mês e dia e reorganiza para formato brasileiro
        $ano = $partes[0];
        $mes = $partes[1];
        $dia = $partes[2];
        // Retorna no formato DD/MM/YYYY
        return $dia . "/" . $mes . "/" . $ano;
    }


    function contarElementos($array) {
        $contador = 0;
        foreach ($array as $elemento) {
            $contador++;
        }
        return $contador;
    }


    echo "<h1>📋 TechSolutions - Lista de Funcionários</h1>";
    echo "<p><strong>Total de funcionários:</strong> " . $totalFuncionarios . "</p>";
    echo "<p><strong>Total da folha mensal:</strong> " . formatarMoedaManual($totalSalarios) . "</p>";
    echo "<p><strong>Média salarial:</strong> " . formatarMoedaManual($mediaSalario) . "</p>";
    
    // Exibe os departamentos usando implode (junta os elementos com separador)
    echo "<p><strong>Departamentos:</strong> " . implode(", ", $departamentos) . "</p>";
    echo "<hr>";


    echo "<h2>Lista de Funcionários</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    
    // Cabeçalho da tabela usando <td> com negrito manual
    echo "<tr>";
    echo "    <td><strong>ID</strong></td>";
    echo "    <td><strong>Nome</strong></td>";
    echo "    <td><strong>Cargo</strong></td>";
    echo "    <td><strong>Departamento</strong></td>";
    echo "    <td><strong>Salário</strong></td>";
    echo "    <td><strong>Admissão</strong></td>";
    echo "    <td><strong>Status</strong></td>";
    echo "    <td><strong>E-mail</strong></td>";
    echo "</tr>";
    
    // Percorre todos os funcionários para exibir na tabela
    foreach ($funcionarios as $funcionario) {
        echo "<tr>";
        echo "    <td>" . $funcionario['id'] . "</td>";
        echo "    <td>" . $funcionario['nome'] . "</td>";
        echo "    <td>" . $funcionario['cargo'] . "</td>";
        echo "    <td>" . $funcionario['departamento'] . "</td>";
        echo "    <td>" . formatarMoedaManual($funcionario['salario']) . "</td>";
        echo "    <td>" . formatarDataManual($funcionario['admissao']) . "</td>";
        echo "    <td>" . $funcionario['status'] . "</td>";
        echo "    <td>" . $funcionario['email'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    echo "<hr>";


    echo "<h2>Departamentos da Empresa</h2>";
    echo "<ul>";
    foreach ($departamentos as $departamento) {
        echo "<li>" . $departamento . "</li>";
    }
    echo "</ul>";
    echo "<hr>";


    echo "<h2>Funcionários por Departamento</h2>";
    
    // Loop externo: percorre cada departamento
    foreach ($departamentos as $departamento) {
        echo "<h3>" . $departamento . "</h3>";
        echo "<ul>";
        
        // Loop interno: percorre todos os funcionários
        // Verifica se o departamento do funcionário é igual ao atual
        foreach ($funcionarios as $funcionario) {
            if ($funcionario['departamento'] == $departamento) {
                echo "<li>" . $funcionario['nome'] . " - " . $funcionario['cargo'] . "</li>";
            }
        }
        
        echo "</ul>";
    }
    echo "<hr>";


    echo "<h2>Funcionários Ativos</h2>";
    echo "<ul>";
    
    // Percorre todos os funcionários
    // Exibe apenas aqueles com status "Ativo"
    foreach ($funcionarios as $funcionario) {
        if ($funcionario['status'] == 'Ativo') {
            echo "<li>" . $funcionario['nome'] . " - " . $funcionario['cargo'] . "</li>";
        }
    }
    
    echo "</ul>";
    echo "<hr>";


    echo "<p><strong>Resumo:</strong></p>";
    echo "<ul>";
    echo "    <li>Total de funcionários: " . $totalFuncionarios . "</li>";
    echo "    <li>Total de departamentos: " . $totalDepartamentos . "</li>";
    echo "    <li>Maior salário: " . formatarMoedaManual($maiorSalario) . "</li>";
    echo "    <li>Menor salário: " . formatarMoedaManual($menorSalario) . "</li>";
    echo "</ul>";


    // Obtém o timestamp atual
    $timestamp = time();
    // Formata manualmente a data e hora
    $dia = date("d", $timestamp);
    $mes = date("m", $timestamp);
    $ano = date("Y", $timestamp);
    $hora = date("H", $timestamp);
    $minuto = date("i", $timestamp);
    $segundo = date("s", $timestamp);
    
    echo "<p><em>Dados gerados em " . $dia . "/" . $mes . "/" . $ano . " " . $hora . ":" . $minuto . ":" . $segundo . "</em></p>";
    ?>
</body>
</html>
</body>
</html>