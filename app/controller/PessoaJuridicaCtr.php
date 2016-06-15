<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;

/**
 * Description of PessoaJuridicaCtr
 *
 * @author PC 05
 */
class PessoaJuridicaCtr extends \core\mvc\Controller {

    public function __construct() {
        parent::__construct();
        $this->view = new \app\view\pessoa_juridica\PessoaJuridicaView();
        $this->dao = new \app\dao\PessoaJuridicaDao();
        $this->model = new \app\model\PessoaJuridicaModel();
    }

    public function showList() {
        try {
            $dados = null;
            if ($this->post) {
                $nome = $this->post['nome'];
                $dados = $this->dao->selectAll("upper(" . \app\dao\PessoaJuridicaDao::TB_NOME . ") like upper('{$nome}%')", \app\dao\PessoaJuridicaDao::TB_NOME);
            }
            $view = new \app\view\pessoa_juridica\PessoaJuridicaList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        $this->model = new \app\model\PessoaJuridicaModel($this->post['id'], $this->post['nome'], $this->post['endereco'], $this->post['bairro'], new \app\model\CidadeModel($this->post['cidade']), $this->post['telefone01'], $this->post['email'], $this->post['cnpj'], $this->post['setor'], $this->post['razaosocial'], $this->post['ramal']);
    }

}
