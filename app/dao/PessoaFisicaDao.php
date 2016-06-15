<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

/**
 * Description of PessoaFisicaDao
 *
 * @author jlgregorio81
 */
class PessoaFisicaDao extends PessoaDao {

    const TB_SEXO = 'sexo';
    const TB_CPF = 'cpf';
    const TB_RG = 'rg';
    //..constantes para a tabela pessoa_fisica
    const TABLE_NAME = 'pessoa_fisica';
    const TB_ID_PESSOA_FISICA = 'id_pessoa_fisica';

    public function __construct(\app\model\PessoaFisicaModel $model = null) {
        parent::__construct($model);
    }

    public function insertUpdate($returnId = null) {
        try {
            //..inicia a transação.
            $this->connection->beginTransaction();
            //..insere/atualiza na tabela Pessoa e retorna o id inserido...
            $id = parent::insertUpdate(self::TB_SEQ);
            
            //..se for atualização, então não retorna id. Neste caso será necessário pegar o id que já está no model.
            if (is_null($id))
                $id = $this->model->getId();

            
            //..cria um novo sqlObj
            $sqlObj = new \core\dao\SqlObject($this->connection);
            //..dados que serão inseridos/atualizados na tabela pessoa_fisica
            $dados = array(self::TB_ID_PESSOA_FISICA => $id,
                self::TB_SEXO => $this->model->getSexo(),
                self::TB_CPF => $this->model->getCpf(),
                self::TB_RG => $this->model->getRg(),
            );
            //..insere ou atualiza na tabela pessoa_fisica
            //..se o id do model for nulo, então é inserção...
            if ($this->model->getId()=='')
                $sqlObj->insert(self::TABLE_NAME, $dados);
            else
            //..senão é atualização.
                $sqlObj->update(self::TABLE_NAME, $dados, self::TB_ID_PESSOA_FISICA . " = {$id}");
            //..aplica um commit
            $this->connection->commit();
        } catch (\Exception $ex) {
            //..caso aconteça um erro, cancela a transação.
            $this->connection->rollBack();
            throw $ex;
        }
    }

    public function delete($id) {
        try {
            //..inicia a transaçao
            $this->connection->beginTransaction();
            //..cria um novo sqlobj
            $sqlOjb = new \core\dao\SqlObject($this->connection);
            //..deleta o registro da pessoa_fisica
            $sqlOjb->delete(self::TABLE_NAME, self::TB_ID_PESSOA_FISICA . " = {$id}");
            //..delete o registro da tabela pessoa
            parent::delete($id);
            //..confirma a transação.
            $this->connection->commit();
        } catch (\Exception $ex) {
            //..cancela a transação.
            $this->connection->rollBack();
            //..lança a exceção.
            throw $ex;
        }
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select('pessoa p, pessoa_fisica pf, cidade c', 'p.*, pf.*', "p.id_pessoa = {$id} and p.id_pessoa = pf.id_pessoa_fisica and p.id_cidade = c.id_cidade");
            if ($dados) {
                $dados = $dados[0];
                $cidadeDao = new CidadeDao();
                $cidadeModel = $cidadeDao->findById($dados[self::TB_ID_CIDADE]);
                $pfModel = new \app\model\PessoaFisicaModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_ENDERECO], $dados[self::TB_BAIRRO], $cidadeModel, $dados[self::TB_TELEFONE_01], $dados[self::TB_EMAIL], $dados[self::TB_SEXO], $dados[self::TB_CPF], $dados[self::TB_RG]);
                return $pfModel;
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
            $dados = $sqlObj->select('pessoa p, pessoa_fisica pf, cidade c', 'p.*, pf.*', "p.id_pessoa = pf.id_pessoa_fisica and p.id_cidade = c.id_cidade");
            $pessoas = null;
            if ($dados) {
                foreach ($dados as $dado) {
                    $cidadeDao = new CidadeDao();
                    $cidadeModel = $cidadeDao->findById($dado[self::TB_ID_CIDADE]);
                    $pfModel = new \app\model\PessoaFisicaModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_ENDERECO], $dado[self::TB_BAIRRO], $cidadeModel, $dado[self::TB_TELEFONE_01], $dado[self::TB_EMAIL], $dado[self::TB_SEXO], $dado[self::TB_CPF], $dado[self::TB_RG]);
                    $pessoas[] = $pfModel;
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
