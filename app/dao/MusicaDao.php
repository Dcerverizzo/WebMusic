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

    const TB_NOME = 'nome';
    const TB_ALBUM = 'album';
    const TB_ID_BANDA = 'id_banda';
    const TB_COMPOSITOR = 'compositor1';

    public function __construct(\core\mvc\Model $model = null) {
        parent::__construct($model);
        $this->tableId = 'id_musica';
        $this->tableName = 'musica';
        if (!$model) {
            $this->model = new \app\model\MusicaModel();
        }
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(),
            self::TB_ALBUM => $this->model->getAlbum(),
            self::TB_ID_BANDA => $this->model->getBandaModel()->getId(),
            self::TB_COMPOSITOR => $this->model->getCompositor());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                $bandaDao = new BandaDao();
                $bandaModel = $bandaDao->findById($dados[self::TB_ID_BANDA]);
                $musicaModel = new \app\model\MusicaModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_ALBUM], $bandaModel, $dados[self::TB_COMPOSITOR]);
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
            if ($dados) {
                $musicas = null;
                foreach ($dados as $musica) {
                    $bandaDao = new BandaDao();
                    $bandaModel = $bandaDao->findById($produto[self::TB_ID_BANDA]);
                    $musicaModel = new \app\model\MusicaModel($musica[$this->tableId], $musica[self::TB_NOME], $musica[self::TB_ALBUM], $musica[self::TB_COMPOSITOR], $bandaModel);
                    $musicas[] = $musicaModel;
                }
                return $musicas;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

//put your code here
}
