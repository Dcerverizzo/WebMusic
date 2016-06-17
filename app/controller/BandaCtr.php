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
        $this->model = new \app\model\BandaModel($this->post['id'], $this->post['nome'], $this->post['musico'], $this->post['intour']);
    }

//put your code here
}
