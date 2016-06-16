<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

/**
 * Description of MusicaDao
 *
 * @author Daniel Cerverizzo
 */
class MusicaDao extends \core\dao\Dao {
    /* private $duracao;
      private $nome;
      private $album;
      private $banda;
      private $id_banda;
      private $compositor; */

    const TB_NOME = 'nome';
    const TB_ALBUM = 'album';
    const TB_BANDA = 'banda';
    const TB_COMPOSITOR = 'compositor';
    const TABLE_NAME = 'musica';
    const TB_ID_BANDA = 'id_banda';

    public function __construct(\core\mvc\Model $model = null) {
        parent::__construct($model);
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(), self::TB_ALBUM => $this->model->getAlbum(), self::TB_BANDA => $this->model->getBanda(), self::TB_COMPOSITOR => $this->model->getCompositor(), self::TB_ID_BANDA => $this->model->getId_banda());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                $musicaModel = new \app\model\MusicaModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_ALBUM], $dados[self::TB_BANDA], $dados[self::TB_COMPOSITOR], $dados[self::TB_ID_BANDA]);
                return $musicaModel;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function selectAll($criteria = null, $orderBy = null, $groupBy = null, $limit = null) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', $criteria, $orderBy, $groupBy, $limit);
            if ($dados) {
                $musicas = null;
                foreach ($dados as $dado) {
                    $musicaModel = new \app\model\MusicaModel($dado[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_ALBUM], $dados[self::TB_BANDA], $dados[self::TB_COMPOSITOR], $dados[self::TB_ID_BANDA]);
                    $musicas[] = $musicaModel;
                }
                return $musicas;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            
        }
    }

//put your code here
}
