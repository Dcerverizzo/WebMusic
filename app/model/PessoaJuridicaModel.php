<?php

namespace app\model;

/**
 * Description of PessoaJuridicaModel
 *
 * @author PC 05
 */
class PessoaJuridicaModel extends PessoaModel {

    private $cnpj;
    private $funcao;
    private $razaosocial;
    private $numeroJuridico;

    public function __construct($id = null, $nome = null, $endereco = null, $bairro = null, CidadeModel $cidade = null, $telefone01 = null, $email = null, $cnpj = null, $funcao = null, $razaosocial = null, $numeroJuridico = null) {
        parent::__construct($id, $nome, $endereco, $bairro, $cidade, $telefone01, $email);
        $this->cnpj = $cnpj;
        $this->funcao = $funcao;
        $this->razaosocial = $razaosocial;
        $this->numeroJuridico = $numeroJuridico;
    }

    public function show() {
        parent::show();
        echo "<p><strong>CNPJ:</strong>{$this->cnpj}</p>";
        echo "<p><strong>Função:</strong>{$this->funcao}</p>";
        echo "<p><strong>Razão Social:</strong>{$this->razaosocial}</p>";
        echo "<p><strong>Numero Juridico:</strong>{$this->numeroJuridico}</p>";
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getFuncao() {
        return $this->funcao;
    }

    public function getRazaosocial() {
        return $this->razaosocial;
    }

    public function getNumeroJuridico() {
        return $this->numeroJuridico;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    public function setRazaosocial($razaosocial) {
        $this->razaosocial = $razaosocial;
    }

    public function setNumeroJuridico($numeroJuridico) {
        $this->numeroJuridico = $numeroJuridico;
    }

}
