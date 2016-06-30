<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\musico;

/**
 * Description of MusicoReport
 *
 * @author Daniel Cerverizzo
 */
class MusicoReport {

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
        $relatorio->Cell(0, 8, 'Relatorio das Bandas', 1, 1, 'C', true);
        $relatorio->Cell(60, 8, 'Id', 1, 0, 'C', true);
        $relatorio->Cell(60, 8, 'Nome', 1, 0, 'C', true);
        $relatorio->Cell(60, 8, 'In Tour', 1, 0, 'C', true);
        $relatorio->Ln();
        //!= arruma depois 

        $musicoDao = new \app\dao\MusicoDao();
        $musicos = $musicoDao->selectAll();


        $fill = false;
        foreach ($musicos as $musico) {
            $relatorio->Cell(60, 8, $musico->getId(), 1, 0, 'C', $fill);
            $relatorio->Cell(60, 8, $musico->getSexo(), 1, 0, 'C', $fill);
            $relatorio->Cell(60, 8, $musico->getCPF(), 1, 0, 'C', $fill);
            $relatorio->Cell(60, 8, $musico->getRG(), 1, 0, 'C', $fill);
            $relatorio->Cell(60, 8, $musico->BandaModel->getNome(), 1, 0, 'C', $fill);
            $relatorio->Ln();
            $fill = !$fill;
        }

        ob_start();
        $relatorio->Output();
        ob_end_flush();
    }

    //put your code here
}
