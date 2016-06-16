<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;

/**
 * Description of MusicaCtr
 *
 * @author Daniel Cerverizzo
 */
class MusicaCtr extends \core\mvc\Controller {

    public function __construct() {
        parent::__construct();
        $this->view = new \app\view\musica\MusicaView();
        $this->model = new \app\model\MusicaModel();
        $this->dao = new \app\dao\MusicaDao();
    }

    public function showList() {
        try {
            $dados = null;
            if ($this->post) {
                $nome = $this->post['nome'];
                $dados = $this->dao->selectAll("upper(" . \app\dao\MusicaDao::TB_NOME . ") like upper('{$nome}%')", \app\dao\MusicaDao::TB_NOME);
            }
            $view = new \app\view\musica\MusicaList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        $this->model = new \app\model\MusicaModel($this->post['id'], $this->post['nome'], $this->post['duracao'], $this->post['album'], $this->post['banda'], $this->post['compositor']);
    }

//put your code here
}
