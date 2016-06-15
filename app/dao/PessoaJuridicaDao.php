<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

/**
 * Description of PessoaJuridicaDao
 *
 * @author PC 05
 */
class PessoaJuridicaDao extends PessoaDao {

    const TB_CNPJ = 'cnpj';
    const TB_FUNCAO = 'funcao';
    const TB_RAZAOSOCIAL = 'razao_social';
    const TB_NUMERO = 'numero_juridico';
    const TABLE_NAME = 'pessoa_juridica';
    const TB_ID_PESSOA_JURIDICA = 'id_pessoa_juridica';

    public function __construct(\app\model\PessoaJuridicaModel $model = null) {
        parent::__construct($model);
    }

    public function insertUpdate($returnId = null) {
        try {
            $this->connection->beginTransaction();
            $id = parent::insertUpdate(self::TB_SEQ);

            if (is_null($id))
                $id = $this->model->getId();

            $sqlObj = new \core\dao\SqlObject($this->connection);

            $dados = array(self::TB_ID_PESSOA_JURIDICA => $id,
                self::TB_CNPJ => $this->model->getCnpj(),
                self::TB_FUNCAO => $this->model->getFuncao(),
                self::TB_RAZAOSOCIAL => $this->model->getRazaosocial(),
                self::TB_NUMERO => $this->model->getNumeroJuridico());

            if ($this->model->getId() == '')
                $sqlObj->insert(self::TABLE_NAME, $dados);
            else
                $sqlObj->update(self::TABLE_NAME, $dados, self::TB_ID_PESSOA_FISICA . " = {$id}");
            $this->connection->commit();
        } catch (Exception $ex) {
            $this->connection->rollBack();
            throw $ex;
        }
    }

    public function delete($id) {
        try {
            $this->connection->beginTransaction();
            $sqlOjb = new \core\dao\SqlObject($this->connection);
            $sqlOjb->delete(self::TABLE_NAME, self::TB_ID_PESSOA_JURIDICA . " = {$id}");
            parent::delete($id);
            $this->connection->commit();
        } catch (\Exception $ex) {
            $this->connection->rollBack();
            throw $ex;
        }
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select('pessoa p, pessoa_juridica pj, cidade c', 'p.*, pj.*', "p.id_pessoa = {$id} and p.id_pessoa = pj.id_pessoa_juridica and p.id_cidade = c.id_cidade");
            if ($dados) {
                $dados = $dados[0];
                $cidadeDao = new CidadeDao();
                $cidadeModel = $cidadeDao->findById($dados[self::TB_ID_CIDADE]);
                $pjModel = new \app\model\PessoaJuridicaModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_ENDERECO], $dados[self::TB_BAIRRO], $cidadeModel, $dados[self::TB_TELEFONE_01], $dados[self::TB_EMAIL], $dados[self::TB_CNPJ], $dados[self::TB_SETOR], $dados[self::TB_RAZAOSOCIAL], $dados[self::TB_RAMAL]);
                return $pjModel;
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
            $dados = $sqlObj->select('pessoa p, pessoa_juridica pj, cidade c', 'p.*, pj.*', "p.id_pessoa = pj.id_pessoa_juridica and p.id_cidade = c.id_cidade");
            $pessoas = null;
            if ($dados) {
                foreach ($dados as $dado) {
                    $cidadeDao = new CidadeDao();
                    $cidadeModel = $cidadeDao->findById($dado[self::TB_ID_CIDADE]);
                    $pjModel = new \app\model\PessoaJuridicaModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_ENDERECO], $dado[self::TB_BAIRRO], $cidadeModel, $dado[self::TB_TELEFONE_01], $dado[self::TB_EMAIL], $dado[self::TB_CNPJ], $dado[self::TB_FUNCAO], $dado[self::TB_RAZAOSOCIAL], $dado[self::TB_NUMERO]);
                    $pessoas[] = $pjModel;
                }
                return $pessoas;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

}
