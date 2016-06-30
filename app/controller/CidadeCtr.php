<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;

/**
 * Description of CidadeCtr
 *
 * @author Daniel Cerverizzo
 */
class CidadeCtr extends \core\mvc\Controller {

    public function __construct() {
        parent::__construct();
        $this->view = new \app\view\cidade\CidadeView();
        $this->model = new \app\model\CidadeModel();
        $this->dao = new \app\dao\CidadeDao();
    }

    public function showList() {
        try {
            $dados = null;
            if ($this->post) {
                $nome = $this->post['nome'];
                $dados = $this->dao->selectAll("upper(" . \app\dao\CidadeDao::TB_NOME . ") like upper('{$nome}%')", \app\dao\CidadeDao::TB_NOME);
            }
            $view = new \app\view\cidade\CidadeList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        $this->model = new \app\model\CidadeModel($this->post['id'], $this->post['nome'], $this->post['uf'], $this->post['cep']);
    }

    public function getAllCities() {
        return $this->dao->selectAll(null, \app\dao\CidadeDao::TB_NOME);
    }

    public function getAllCitiesJson() {
        try {
            $nome = "";
            if ($this->get['nome'])
                $nome = $_GET['nome'];
            echo $this->dao->getAllCitiesJson("upper(" . \app\dao\CidadeDao::TB_NOME . ") like upper('{$nome}%')");
        } catch (\Exception $ex) {
            echo 'erro';
        }
    }

    public function showReport() {
        $view = new \app\view\cidade\CidadeReport();
          $view->showReport();
    }

}
