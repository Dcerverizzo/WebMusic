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
                //..cria um SQLObject para realizar um select no BD
                $sqlObj = new \core\dao\SqlObject(\core\dao\Connection::getConnection());
                //..define a join
                //   $criterio = "p.id_categoria = c.id_categoria";
                $criterio = "m.id_banda = b.id_banda";
                //..define os critérios de seleção
                $criterio .= " and upper(m.nome) like upper('{$this->post['nome']}%')";
                if ($this->post['banda'] > 0)
                    $criterio .= " and m.id_banda = {$this->post['banda']}";

                $this->post['ordenar'] == 0 ? $orderBy = 'm.nome, b.nome' : $orderBy = 'b.nome, m.nome';
                $dados = $sqlObj->select('musica m, banda b', 'm.id_musica,m.nome,m.duracao,m.album,m.id_banda,m.compositor1, b.nome as banda', $criterio, $orderBy);
            }
            $view = new \app\view\musica\MusicaList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        $this->model = new \app\model\MusicaModel(
                $this->post['id'], $this->post['duracao'], $this->post['album'], $this->post['compositor'], $this->post['nome'], new \app\model\BandaModel($this->post['idbanda']));
    }

//(nome, album, id_banda, compositor1, duracao) 

    public function getBandas() {
        try {
            $nome = $this->get['nome'];
            echo $this->dao->getBandasJson($nome);
        } catch (\Exception $ex) {
            echo 'erro';
        }
    }

    public function showReport() {
        if ($this->get) {
            if (isset($this->get['id'])) { //..verifica se existe uma variável id no get
                $id = $this->get['id']; //..pega o id 
                //..recupera o modelo fazendo uma consulta no bando por id
                if ($id == null) {
                    $id = "null";
                }
                $view = new \app\view\musica\MusicaReport();
                $view->showReport($id);
                //      $this->model = $this->dao->findById($id);
            }
        }
    }

    //put your code here
}
