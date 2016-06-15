<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\model;

/**
 * Description of PessoaFisica
 *
 * @author jlgregorio81
 */
class PessoaFisicaModel extends PessoaModel {
    
    private $sexo;
    private $cpf;
    private $rg;
    
    public function __construct($id = null, $nome = null, $endereco = null, $bairro = null, CidadeModel $cidade = null, $telefone01 = null, $email = null, $sexo = null, $cpf = null, $rg = null) {
        parent::__construct($id, $nome, $endereco, $bairro, $cidade, $telefone01, $email);
        $this->sexo = $sexo;
        $this->cpf = $cpf;
        $this->rg = $rg;
    }
    
    public function show() {
        parent::show();
        echo "<p><strong>Sexo:</strong>{$this->sexo}</p>";
        echo "<p><strong>CPF:</strong>{$this->cpf}</p>";
        echo "<p><strong>RG:</strong>{$this->rg}</p>";
    }
    
    public function getSexo() {
        return $this->sexo;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getRg() {
        return $this->rg;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }


    
}
