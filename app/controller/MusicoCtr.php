<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;

/**
 * Description of MusicoCtr
 *
 * @author DanielCerverizzo
 */
class PessoaMusicoCtr extends \core\mvc\Controller {

    public function __construct() {
        parent::__construct();
        $this->view = new \app\view\pessoa_musico\PessoaMusicoView();
        $this->dao = new \app\dao\PessoaMusicoDao();
        $this->model = new \app\model\PessoaMusicoModel();
    }

    public function showList() {
        try {
            $dados = null;
            if ($this->post) {
                $nome = $this->post['nome'];
                $dados = $this->dao->selectAll("upper(" .\app\dao\PessoaFisicaDao::TB_NOME . ") like upper('{$nome}%')", \app\dao\PessoaFisicaDao::TB_NOME);
            }
            $view = new \app\view\pessoa_fisica\PessoaFisicaList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        $this->model = new \app\model\PessoaMusicoModel($this->post['id'], $this->post['nome'], $this->post['endereco'], $this->post['bairro'], new \app\model\BandaModel($this->post['banda']), $this->post['nome'], $this->post['estilo'], $this->post['inTour']);
    }

//put your code here
}
