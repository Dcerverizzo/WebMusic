<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\musica;

/**
 * Description of MusicaReport
 *
 * @author Daniel Cerverizzo
 */
class MusicaReport {

    public function showReport($id) {
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
        $relatorio->Cell(0, 8, 'Relatorio das Musicas', 1, 1, 'C', true);
        $relatorio->Cell(15, 8, 'Id', 1, 0, 'C', true);
        $relatorio->Cell(60, 8, 'Musica', 1, 0, 'C', true);
        $relatorio->Cell(60, 8, 'Album', 1, 0, 'C', true);
        $relatorio->Cell(35, 8, 'Banda', 1, 0, 'C', true);
        $relatorio->Cell(20, 8, 'Duração', 1, 0, 'C', true);
        $relatorio->Ln();

        if ($id == "null") {
            $musicaDao = new \app\dao\MusicaDao();
            $musicas = $musicaDao->selectAll();



            $fill = false;
            foreach ($musicas as $musica) {
                $relatorio->Cell(15, 8, $musica->getId(), 1, 0, 'C', $fill);
                $relatorio->Cell(60, 8, $musica->getDuracao(), 1, 0, 'C', $fill);
                $relatorio->Cell(60, 8, $musica->getAlbum(), 1, 0, 'C', $fill);
                $relatorio->Cell(35, 8, $musica->getBandaModel()->getNome(), 1, 0, 'C', $fill);
                $relatorio->Cell(20, 8, $musica->getNome(), 1, 0, 'C', $fill);
                $fill = !$fill;
                $relatorio->Ln();
            }

            ob_start();
            $relatorio->Output();
            ob_end_flush();
        } else {
            $musicaDao = new \app\dao\MusicaDao();
            $musicas = $musicaDao->selectId($id);

            $fill = false;
            foreach ($musicas as $musica) {
                $relatorio->Cell(15, 8, $musica->getId(), 1, 0, 'C', $fill);
                $relatorio->Cell(60, 8, $musica->getDuracao(), 1, 0, 'C', $fill);
                $relatorio->Cell(60, 8, $musica->getAlbum(), 1, 0, 'C', $fill);
                $relatorio->Cell(35, 8, $musica->getBandaModel()->getNome(), 1, 0, 'C', $fill);
                $relatorio->Cell(20, 8, $musica->getNome(), 1, 0, 'C', $fill);
                $fill = !$fill;
                $relatorio->Ln();
            }

            ob_start();
            $relatorio->Output();
            ob_end_flush();
        }
    }

}
