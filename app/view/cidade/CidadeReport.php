<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\cidade;

/**
 * Description of CidadeReport
 *
 * @author Daniel Cerverizzo
 */
class CidadeReport {

    public function showReport() {
        require_once ("core/vendor/tcpdf/tcpdf.php");
        require_once 'autoload.php';


        $relatorio = new \TCPDF();
        $relatorio->SetAuthor('Daniel Cerverizzo');

        $relatorio->setHeaderData(PDF_HEADER_LOGO, 20, 'Web Music', 'Relatorios com TCPDF');
        $relatorio->setHeaderMargin(4);
        $relatorio->setMargins(10, 20);
        $relatorio->AddPage();

        $relatorio->SetFillColor(240);
        $relatorio->SetFont('Times', 'B', 14);
        $relatorio->Cell(0, 8, 'Relatorio das Cidades', 1, 1, 'C', true);
        $relatorio->Cell(15, 8, 'Id', 1, 0, 'C', true);
        $relatorio->Cell(35, 8, 'UF', 1, 0, 'C', true);
        $relatorio->Cell(80, 8, 'Nome', 1, 0, 'C', true);
        $relatorio->Cell(60, 8, 'Cep', 1, 0, 'C', true);
        $relatorio->Ln();


        $cidadeDao = new \app\dao\CidadeDao();
        $cidades = $cidadeDao->findById(1);
        //  $cidades = $cidadeDao->selectAll();


        $fill = false;
        foreach ($cidades as $cidade) {
            $relatorio->Cell(15, 8, $cidade->getId(), 1, 0, 'C', $fill);
            $relatorio->Cell(35, 8, $cidade->getUf(), 1, 0, 'C', $fill);
            $relatorio->Cell(80, 8, $cidade->getNome(), 1, 0, 'C', $fill);
            $relatorio->Cell(60, 8, $cidade->getCep(), 1, 0, 'C', $fill);
            $relatorio->Ln();
            $fill = !$fill;
        }

        ob_start();
        $relatorio->Output();
        ob_end_flush();
    }

}
