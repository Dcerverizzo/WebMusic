<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;

/**
 * Description of BandaCtr
 *
 * @author Daniel Cerverizzo
 */
class BandaCtr extends \core\mvc\Controller {

    public function __construct() {
        parent::__construct();
        $this->view = new \app\view\banda\BandaView();
        $this->model = new \app\model\BandaModel();
        $this->dao = new \app\dao\BandaDao();
    }

    public function showList() {
        try {
            $dados = null;
            if ($this->post) {
                $nome = $this->post['nome'];
                $dados = $this->dao->selectAll("upper(" . \app\dao\BandaDao::TB_NOME . ") like upper('{$nome}%')", \app\dao\BandaDao::TB_NOME);
            }
            $view = new \app\view\banda\BandaList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        $this->model = new \app\model\BandaModel($this->post['id'], $this->post['nome'], $this->post['intour']);
    }

    public function getBandas() {
        try {
            return $this->dao->selectAll(NULL, \app\dao\BandaDao::TB_NOME);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR);
            $view->show();
        }
    }

    public function showReport() {
        if ($this->get) {
            if (isset($this->get['id'])) { //..verifica se existe uma variável id no get
                $id = $this->get['id']; //..pega o id 
                $view = new \app\view\banda\BandaReport();
                $view->showReport($id);
            }
        }
    }

    public function getBandasJson() {
        try {
            $nome = $this->get['nome'];
            echo $this->dao->getBandasJson($nome);
        } catch (\Exception $ex) {
            echo 'erro';
        }
    }

//put your code here
}
