<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\model;

/**
 * Description of CidadeModel
 *
 * @author jlgregorio81
 */
class CidadeModel extends \core\mvc\Model {

    private $nome;
    private $uf;
    private $cep;

    public function __construct($id = null, $nome = null, $uf = null, $cep = null) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->uf = $uf;
        $this->cep = $cep;
    }

    public function show() {
        echo "<h1>Dados de Cidade</h1>";
        echo "<p><strong>Nome:</strong>{$this->nome}</p>";
        echo "<p><strong>UF:</strong>{$this->uf}</p>";
        echo "<p><strong>CEP:</strong>{$this->cep}</p>";
    }

    public function getNome() {
        return $this->nome;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public static function getUfs() {
        return array("AC" => "Acre", "AL" => "Alagoas", "AM" => "Amazonas", "AP" => "Amapá", "BA" => "Bahia", "CE" => "Ceará", "DF" => "Distrito Federal", "ES" => "Espírito Santo", "GO" => "Goiás", "MA" => "Maranhão", "MT" => "Mato Grosso", "MS" => "Mato Grosso do Sul", "MG" => "Minas Gerais", "PA" => "Pará", "PB" => "Paraíba", "PR" => "Paraná", "PE" => "Pernambuco", "PI" => "Piauí", "RJ" => "Rio de Janeiro", "RN" => "Rio Grande do Norte", "RO" => "Rondônia", "RS" => "Rio Grande do Sul", "RR" => "Roraima", "SC" => "Santa Catarina", "SE" => "Sergipe", "SP" => "São Paulo", "TO" => "Tocantins");
    }

}
