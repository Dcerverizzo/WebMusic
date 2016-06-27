<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

/**
 * Description of MusicoDao
 *
 * @author Daniel Cerverizzo
 */
class MusicoDao extends \core\dao\Dao {
    /*  private $nome;
      private $sexo;
      private $cpf;
      private $rg;
      private $banda_musico;
      private $id_banda; */

    const TB_NOME = 'nome';
    const TB_CPF = 'cpf';
    const TB_SEXO = 'sexo';
    const TB_RG = 'rg';
    // const TB_BANDA = 'banda_musico';
    const TB_ID_BANDA = 'id_banda';

    public function __construct(\core\mvc\Model $model = null) {
        parent::__construct($model);
        $this->tableId = 'id_pessoa_musico';
        $this->tableName = 'pessoa_musico';
        if (!$model) {
            $this->model = new \app\model\MusicoModel();
        }
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(),
            self::TB_SEXO => $this->model->getSexo(),
            self::TB_CPF => $this->model->getCpf(),
            self::TB_RG => $this->model->getRg(),
            // self::TB_BANDA => $this->model->setBanda_musico(),
            self::TB_ID_BANDA => $this->model->getBandaModel()->getId(),
        );
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                //Recupera banda do musico
                $bandaDao = new BandaDao();
                $bandaModel = $bandaDao->findById($dados[self::TB_ID_BANDA]);
               // var_dump($dados);
                $musicoModel = new \app\model\MusicoModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_SEXO], $dados[self::TB_CPF], $dados[self::TB_RG], $bandaModel);
                return $musicoModel;
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
                $musicos = null;
                foreach ($dados as $musico) {
                    $bandaDao = new BandaDao();
                    $bandaModel = $bandaDao->findById($musico[self::TB_ID_BANDA]);
                    var_dump($musico);
                    $MusicoModel = new \app\model\MusicoModel($musico[$this->tableId], $musico[self::TB_NOME], $musico[self::TB_SEXO], $musico[self::TB_RG], $musico[self::TB_CPF], $bandaModel);
                    $musicos[] = $MusicoModel;
                }
                // return $musicos;
            } else {
                //  return NULL;
            }
        } catch (\Exception $ex) {
            
        }
    }

//put your code here
}
