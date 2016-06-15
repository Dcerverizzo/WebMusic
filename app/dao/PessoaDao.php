<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

/**
 * Description of PessoaDao
 *
 * @author jlgregorio81
 */
class PessoaDao extends \core\dao\Dao {
    
    const TB_NOME = 'nome';
    const TB_ENDERECO = 'endereco';
    const TB_BAIRRO = 'bairro';
    const TB_ID_CIDADE = 'id_cidade';
    const TB_TELEFONE_01 = 'telefone01';
    const TB_EMAIL = 'email';
    
    //..nome da sequence
    const TB_SEQ = 'seq_pessoa';
        
    public function __construct(\app\model\PessoaModel $model = null) {
        parent::__construct($model);
        //..seta o nome da tabela
        $this->tableName = 'pessoa';
        //..seta o campo id
        $this->tableId = 'id_pessoa';        
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(),
            self::TB_ENDERECO => $this->model->getEndereco(),
            self::TB_BAIRRO => $this->model->getBairro(),
            self::TB_ID_CIDADE => $this->model->getCidade()->getId(),
            self::TB_TELEFONE_01 => $this->model->getTelefone01(),
            self::TB_EMAIL => $this->model->getEmail()
            );
    }           
        


    public function findById($id) {
        
    }

    public function selectAll($criteria = null, $orderBy = null, $groupBy = null, $limit = null) {
        //..implementado no filho...
    }

//put your code here
}
