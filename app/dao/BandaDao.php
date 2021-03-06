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
    const TB_TOUR = 'intour';
    const TB_ID_BANDA = 'id_banda';

    public function __construct(\core\mvc\Model $model = null) {
        parent::__construct($model);
        $this->tableId = 'id_banda';
        $this->tableName = 'banda';
        if (!$model) {
            $this->model = new \app\model\BandaModel();
        }
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(), self::TB_TOUR => $this->model->getInTour());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                $bandaModel = new \app\model\BandaModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_TOUR]);
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
                    $bandaModel = new \app\model\BandaModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_TOUR]);
                    $bandas[] = $bandaModel;
                }
                return $bandas;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            
        }
    }

    public function selectByName($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $bandas = null;
                foreach ($dados as $dado) {
                    $bandaModel = new \app\model\BandaModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_TOUR]);
                    $bandas[] = $bandaModel;
                }
                return $bandas;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            
        }
    }

    public function getBandasJson($nome = null) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            //  $criteria = "upper (m.nome) like upper('{$nome}%') and m.id_banda = b.id_banda";
            //   $dados = $sqlObj->select('musica m, banda b', 'm.id_banda, m.nome, m.duracao,m.album,m.compositor1, b.nome as banda', $criteria, 'm.nome');
            $dados = $sqlObj->select('banda b', 'b.id_banda, b.nome', "upper(b.nome) like upper('{$nome}%')", 'b.nome');
            if ($dados) {
                return json_encode($dados);
            } else {
                return '';
            }
        } catch (\Exception $ex) {
            
        }
    }

}
