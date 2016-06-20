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
                $sqlObj = new \core\dao\SqlObject(\core\dao\Connection::getConnection());
                $criterio = "m.id_banda = b.id_banda";
                $criterio .= " and upper(b.nome) like upper('{$this->post['nome']}%')";
                if ($this->post['banda'] > 0)
                    $criterio .= " and b.id_banda = {$this->post['banda']}";
                $this->post['ordenar'] == 0 ? $orderBy = 'm.nome, b.nome' : $orderBy = 'b.nome, m.nome';
                $dados = $sqlObj->select(' musica m, banda b', 'm.id_banda,m.nome,m.duracao,m.album,m.compositor1, b.nome as banda', $criterio, $orderBy);
            }
            $view = new \app\view\musica\MusicaList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        $this->model = new \app\model\MusicaModel($this->post['id'],
                $this->post['nome'],
                $this->post['duracao'],
                $this->post['album'],
                new \app\model\BandaModel($this->post['banda']),
                $this->post['compositor']);
    }

    public function getBandas() {
        try {
            return $this->dao->selectAll(NULL, \app\dao\BandaDao::TB_NOME);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR);
            $view->show();
        }
    }

//put your code here
}
