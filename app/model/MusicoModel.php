<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\model;

/**
 * Description of MusicoModel 
 * classe herdeira de pessoa
 *
 * @author Daniel Cerverizzo
 */
class MusicoModel extends \core\mvc\Model {

    private $nome;
    private $sexo;
    private $cpf;
    private $rg;
    private $login;
    private $senha;
    //private $banda_musico;
    private $bandaModel;

    function __construct($id = null, $nome = null, $sexo = null, $cpf = null, $rg = null, $login = null, $senha = null, $bandaModel = null) {
        parent::__construct($id, $nome, $sexo, $cpf, $rg, $bandaModel);
        $this->nome = $nome;
        $this->sexo = $sexo;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->login = $login;
        $this->senha = $senha;
        is_null($bandaModel) ? $this->bandaModel = new BandaModel() : $this->bandaModel = $bandaModel;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
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

    public function getId_banda() {
        return $this->id_banda;
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

    public function getBandaModel() {
        return $this->bandaModel;
    }

    public function setBandaModel($bandaModel) {
        $this->bandaModel = $bandaModel;
    }

    public function setId_banda($id_banda) {
        $this->id_banda = $id_banda;
    }

    public function show() {
        echo "<h1>Dados do Cantor</h1>";
        echo "<p><strong>Nome:</strong>{$this->nome}</p>";
        echo "<p><strong>Sexo:</strong>{$this->sexo}</p>";
        echo "<p><strong>Rg:</strong>{$this->rg}</p>";
        echo "<p><strong>Banda: </strong>{$this->bandaModel->getNome()}</p>";
        echo "<p><strong>Nome Banda:</strong>{$this->banda_musico}</p>";
    }

//put your code here
}
