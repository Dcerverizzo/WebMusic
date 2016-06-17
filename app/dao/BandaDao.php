<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

/**
 * Description of BandaDao
 *
 * @author Daniel Cerverizzo
 */
class BandaDao extends \core\dao\Dao {

    const TB_NOME = 'nome';
    const TB_MUSICO = 'musico';
    const TB_TOUR = 'intour';

    public function __construct(\core\mvc\Model $model = null) {
        parent::__construct($model);
        $this->tableId = 'id_banda';
        $this->tableName = 'banda';
        if (!$model) {
            $this->model = new \app\model\BandaModel();
        }
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(), self::TB_MUSICO => $this->model->getMusico(), self::TB_TOUR => $this->model->getInTour());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                $bandaModel = new \app\model\BandaModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_MUSICO], $dados[self::TB_TOUR]);
                return $bandaModel;
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
                $bandas = null;
                foreach ($dados as $dado) {
                    $bandaModel = new \app\model\BandaModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_MUSICO], $dado[self::TB_TOUR]);
                    $bandas[] = $bandaModel;
                }
                return $bandas;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            
        }
    }

}
