<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

/**
 * Description of CidadeDao
 *
 * @author jlgregorio81
 */
class CidadeDao extends \core\dao\Dao {

    const TB_NOME = 'nome';
    const TB_UF = 'uf';
    const TB_CEP = 'cep';

    public function __construct(\app\model\CidadeModel $model = null) {
        parent::__construct($model);
        $this->tableId = 'id_cidade';
        $this->tableName = 'cidade';
        if (!$model) {
            $this->model = new \app\model\CidadeModel ();
        }
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(), self::TB_UF => $this->model->getUf(), self::TB_CEP => $this->model->getCep());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                $cidadeModel = new \app\model\CidadeModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_UF], $dados[self::TB_CEP]);
                return $cidadeModel;
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
                $cidades = null;
                foreach ($dados as $dado) {
                    $cidadeModel = new \app\model\CidadeModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_UF], $dado[self::TB_CEP]);
                    $cidades[] = $cidadeModel;
                }
                return $cidades;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            
        }
    }

    public function getUfs() {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, ' distinct ' . self::TB_UF, null, 1);
            if ($dados) {
                return json_encode($dados);
            } else {
                return 0;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function getCidadesByUf($uf) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', self::TB_UF . " = '{$uf}'", self::TB_NOME);
            if ($dados) {
                return json_encode($dados);
            } else {
                return 0;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    function getAllCitiesJson($criteria) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select('cidade', '*', $criteria, 'nome');
            if ($dados) {
                return json_encode($dados);
            } else {
                return 'erro';
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

}
