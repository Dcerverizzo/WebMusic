<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\model;

/**
 * Description of Pessoa
 *
 * @author @DanielCerverizzo
 */
class PessoaModel extends \core\mvc\Model {
    
    protected $nome;
    protected $endereco;
    protected $bairro;
    protected $cidade;
    protected $telefone01;    
    protected $email;

    public function __construct($id = null, $nome = null, $endereco = null, 
            $bairro = null, CidadeModel $cidade = null, $telefone01 = null,
            $email = null) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        is_null($cidade) ? $this->cidade = new CidadeModel() : $this->cidade = $cidade;
        $this->telefone01 = $telefone01;
        $this->email = $email;
    }
    
    public function show() {
        echo "<h1>Dados de Pessoa</h1>";
        echo "<p><strong>Nome:</strong>{$this->nome}</p>";
        echo "<p><strong>Endereço:</strong>{$this->endereco}</p>";
        echo "<p><strong>Bairro:</strong>{$this->bairro}</p>";
        echo "<p><strong>Cidade:</strong>{$this->cidade->getNome()}/{$this->cidade->getUf()}</p>";
        echo "<p><strong>Telefone01:</strong>{$this->telefone01}</p>";
        echo "<p><strong>E-mail:</strong>{$this->email}</p>";
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getTelefone01() {
        return $this->telefone01;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade(CidadeModel $cidade) {
        $this->cidade = $cidade;
    }

    public function setTelefone01($telefone01) {
        $this->telefone01 = $telefone01;
    }

    public function setEmail($email) {
        $this->email = $email;
    }


    

}
