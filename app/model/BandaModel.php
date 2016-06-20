<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\model;

/**
 * Description of BandaModel
 *
 * @author Daniel Cerverizzo
 */
class BandaModel extends \core\mvc\Model {

    private $nome;
    private $intour;

    public function __construct($id = null, $nome = null, $intour = null) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->intour = $intour;
    }

    public function show() {
        echo "<h1>Dados da Banda</h1>";
        echo "<p><strong>Nome:</strong>{$this->nome}</p>";
        echo "<p><strong>On Tour:</strong>{$this->intour}</p>";
    }

    function getNome() {
        return $this->nome;
    }

    function getIntour() {
        return $this->intour;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIntour($intour) {
        $this->intour = $intour;
    }

    function getIntours() {
        if ($this->intour == true) {
            return "Tour on";
        } else
            return "Tour off";
    }

}
