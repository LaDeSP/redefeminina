<?php
include_once "conexao.class.php";
include_once "daorelatorioassistente.class.php";
include_once "daorelatorionutricionista.class.php";
include_once "daorelatoriofisioterapeuta.class.php";
include_once "daoproduto.class.php";
include_once "pdf.class.php";

session_start();

date_default_timezone_set('America/Campo_Grande');
$date = date('d-m-Y H:i');

if (isset($_POST['gerar'])) {
    if (isset($_POST['relatorio-assistente'])) {
        if ($_POST['relatorio-assistente'] == 'ativos') {
            // Instanciation of inherited class
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Pacientes Ativos (' . $date . ')', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Pacientes ativos '$date'");


            $relatorio = DaoRelatorioAssistente::getInstance();
            $usuarios = $relatorio->pacientesAtivos();

            $pdf->Cell(100, 10, 'NOME', 1, 0);
            $pdf->Cell(90, 10, 'STATUS ', 1, 1);
            foreach ($usuarios as $usuario) {
                $pdf->Cell(100, 10, $usuario->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->status, 1, 1);
            }
            $pdf->Output();
        } elseif ($_POST['relatorio-assistente'] == 'inativos') {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Pacientes Inativos (' . $date . ')', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Pacientes Inativos '$date'");


            $relatorio = DaoRelatorioAssistente::getInstance();
            $usuarios = $relatorio->pacientesInativos();

            $pdf->Cell(100, 10, 'NOME', 1, 0);
            $pdf->Cell(90, 10, 'STATUS ', 1, 1);
            foreach ($usuarios as $usuario) {
                $pdf->Cell(100, 10, $usuario->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->status, 1, 1);
            }
            $pdf->Output();
        } elseif ($_POST['relatorio-assistente'] == 'recebem-auxilio-doenca') {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Recebem Auxilio Doença (' . $date . ')', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Recebem Auxilio Doença '$date'");


            $relatorio = DaoRelatorioAssistente::getInstance();
            $usuarios = $relatorio->pacientesRecebemAuxilioDoenca();

            $pdf->Cell(100, 10, 'NOME', 1, 0);
            $pdf->Cell(90, 10, 'TIPO DE AUXILIO ', 1, 1);
            foreach ($usuarios as $usuario) {
                $nome = $relatorio->getName($usuario->id_paciente);
                $pdf->Cell(100, 10, $nome->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->tipo_auxilio, 1, 1);
            }
            $pdf->Output();
        } elseif ($_POST['relatorio-assistente'] == 'necessita-cesta') {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Necessita de Cesta Básica (' . $date . ')', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Necessita de Cesta Básica '$date'");


            $relatorio = DaoRelatorioAssistente::getInstance();
            $usuarios = $relatorio->pacientesNecessitamCesta();

            $pdf->Cell(100, 10, 'NOME', 1, 0);
            $pdf->Cell(90, 10, 'PORQUE NECESSITA ', 1, 1);
            foreach ($usuarios as $usuario) {
                $nome = $relatorio->getName($usuario->id_paciente);
                $pdf->Cell(100, 10, $nome->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->porque_necessita, 1, 1);
            }
            $pdf->Output();
        } elseif ($_POST['relatorio-assistente'] == 'usa-medicamento') {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Usam medicamentos (' . $date . ')', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Usam medicamentos '$date'");


            $relatorio = DaoRelatorioAssistente::getInstance();
            $usuarios = $relatorio->pacientesUsaMedicamento();

            $pdf->Cell(100, 10, 'NOME', 1, 0);
            $pdf->Cell(90, 10, 'TIPO DO MEDICAMENTO ', 1, 1);
            foreach ($usuarios as $usuario) {
                $nome = $relatorio->getName($usuario->id_paciente);
                $pdf->Cell(100, 10, $nome->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->tipo_medicamento, 1, 1);
            }
            $pdf->Output();
        } elseif ($_POST['relatorio-assistente'] == 'reliza-outro-tratamento') {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Realizam outro tratamento (' . $date . ')', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Realizam outro tratamento '$date'");


            $relatorio = DaoRelatorioAssistente::getInstance();
            $usuarios = $relatorio->pacientesRealizaOutroTratamento();

            $pdf->Cell(100, 10, 'NOME', 1, 0);
            $pdf->Cell(90, 10, 'TIPO DO OUTRO TRATAMENTO ', 1, 1);
            foreach ($usuarios as $usuario) {
                $nome = $relatorio->getName($usuario->id_paciente);
                $pdf->Cell(100, 10, $nome->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->tipo_tratamento, 1, 1);
            }
            $pdf->Output();
        } elseif ($_POST['relatorio-assistente'] == 'necessita-outro-auxilio') {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Necessitam outro auxilio (' . $date . ')', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Necessitam outro auxilio '$date'");


            $relatorio = DaoRelatorioAssistente::getInstance();
            $usuarios = $relatorio->pacientesNecessitaOutroAuxilio();

            $pdf->Cell(100, 10, 'NOME', 1, 0);
            $pdf->Cell(90, 10, 'STATUS ', 1, 1);
            foreach ($usuarios as $usuario) {
                $nome = $relatorio->getName($usuario->id_paciente);
                $pdf->Cell(100, 10, $nome->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->tipo_outro_auxilio, 1, 1);
            }
            $pdf->Output();
        }
    } elseif ($_POST['relatorio-nutricionista']) {
        if ($_POST['relatorio-nutricionista'] == 'atendidos') {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Todos pacientes atendidos por ' . $_SESSION['user'], 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Todos pacientes atendidos '$date'");


            $relatorio = DaoRelatorioNutricionista::getInstance();
            $usuarios = $relatorio->pacientesAtendidoPor();

            $pdf->Cell(190, 10, 'Data do relátorio ' . $date, 1, 1);
            $pdf->Cell(100, 10, 'Nome do Paciente', 1, 0);
            $pdf->Cell(90, 10, 'Data da consulta', 1, 1);
            foreach ($usuarios as $usuario) {
                $nome = $relatorio->getName($usuario->id_paciente_nutri);
                $pdf->Cell(100, 10, $nome->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->data_consulta, 1, 1);
            }
            $pdf->Output();
        } elseif ($_POST['relatorio-nutricionista'] == 'todosPacientes') {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Todos pacientes atendidos', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Todos pacientes atendidos '$date'");


            $relatorio = DaoRelatorioNutricionista::getInstance();
            $usuarios = $relatorio->todosAtendidos();

            $pdf->Cell(190, 10, 'Data do relátorio ' . $date, 1, 1);
            $pdf->Cell(100, 10, 'Nome do Paciente', 1, 0);
            $pdf->Cell(90, 10, 'Data da consulta', 1, 1);
            foreach ($usuarios as $usuario) {
                $nome = $relatorio->getName($usuario->id_paciente_nutri);
                $pdf->Cell(100, 10, $nome->nome_paciente, 1, 0);
                $pdf->Cell(90, 10, $usuario->data_consulta, 1, 1);
            }
            $pdf->Output();
        }
    }
} elseif (isset($_POST['relatorioCestaBasica'])) {
    $produtos = $_POST['produto'];
    $idProdutos = $_POST['idProdutos'];
    $produtosExistentes = $_POST['produtosExistentes'];
    $idNomeProdutos = $_POST['idNomeProdutos'];
    $dataVencimento = $_POST['dataVencimento'];
    $peso = $_POST['peso'];
    $quantidade = antiInject($_POST['quantidadeCestas']);
    $pegaDivisao = array();

    if (!empty($quantidade)) {
        for ($i = 0; $i < count($produtos); $i++) {
            if (!empty($produtos[$i])) {
                array_push($pegaDivisao, ($produtosExistentes[$i] / ($produtos[$i] * $quantidade)));
            }
        }
        $quantidadeMinima = min($pegaDivisao);


        if ($quantidadeMinima < 1) {
            echo '<div class="alert alert-warning"> Quantidade de produtos no estoque insuficiente </div></br>';
            $conexao = DaoProduto::getInstance();
            for ($i = 0; $i < count($produtos); $i++) {
                if (!empty($produtos[$i])) {
                    if (($produtosExistentes[$i] / ($produtos[$i] * $quantidade) < 1)) {
                        $item = $conexao->getNome($idNomeProdutos[$i]);
                        echo "Quantidade do item " . $item->nome . " do ID " . $idProdutos[$i] . " faltando </br>";
                    }
                }
            }
        } else {
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(80);
            $pdf->Cell(30, 10, 'Cestas Básicas', 0, 0, 'C');
            $pdf->Ln(20);
            $pdf->SetFont('Times', '', 12);
            $pdf->SetTitle("Cestas Básicas '$date'");
            $conexao = DaoProduto::getInstance();
            for ($i = 1; $i <= $quantidade; $i++) {
                $pdf->Cell(130, 20, " CESTA " . $i, 0, 1, "L");
                $pdf->Cell(50, 10, 'ID', 1, 0);
                $pdf->Cell(50, 10, 'Nome Produto', 1, 0);
                $pdf->Cell(30, 10, 'Qnt', 1, 0);
                $pdf->Cell(50, 10, 'Validade', 1, 1);
                for ($j = 0; $j < count($produtos); $j++) {
                    if (!empty($produtos[$j])) {
                        //echo "Existe produto " . $produtosExistentes[$j] . " que precisa de " . $produtos[$j] . " que possui ID " . $idProdutos[$j] . "</br>";
                        $nome = $conexao->getNome($idNomeProdutos[$j]);
                        $pdf->Cell(50, 10, $idProdutos[$j], 1, 0);
                        $pdf->Cell(50, 10, $nome->nome, 1, 0);
                        $pdf->Cell(30, 10, $produtos[$j], 1, 0);
                        $pdf->Cell(50, 10, $dataVencimento[$j], 1, 1);
                        $conexao->deletarRelatorio($idProdutos[$j], $produtos[$j]);
                    }
                }
            }
            $pdf->Output();
        }

    }else{
        echo "Numero de cestas é igual a 0";
    }
}

?>