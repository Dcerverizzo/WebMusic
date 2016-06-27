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
    const TB_DURACAO = 'duracao';

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
            self::TB_COMPOSITOR => $this->model->getCompositor(),
            self::TB_DURACAO => $this->model->getDuracao(),
            self::TB_ID_BANDA => $this->model->getBandaModel()->getId());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                //Recupera a banda da musica
                $bandaDao = new BandaDao();
                $bandaModel = $bandaDao->findById($dados[self::TB_ID_BANDA]);
                $musicaModel = new \app\model\MusicaModel($dados[$this->tableId], $dados[self::TB_DURACAO], $dados[self::TB_ALBUM], $dados[self::TB_COMPOSITOR], $dados[self::TB_NOME], $bandaModel);
                return $musicaModel; //insert into musica (nome, album, id_banda, compositor1, duracao) 
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
                    $bandaModel = $bandaDao->findById($musica[self::TB_ID_BANDA]);
                    $musicaModel = new \app\model\MusicaModel($musica[$this->tableId], $musica[self::TB_NOME], $musica[self::TB_ALBUM], $musica[self::TB_COMPOSITOR], $musica[self::TB_DURACAO], $musica[self::TB_BANDA], $bandaModel);
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

    /* Implementado getBandasJson pra ver se melhora a listagem do bandas */

    public function getBandasJson($nome = null) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $criteria = "upper (m.nome) like upper('{$nome}%') and m.id_banda = b.id_banda";
            $dados = $sqlObj->select('musica m, banda b', 'm.id_banda, m.nome, m.duracao,m.album,m.compositor1, b.nome as banda', $criteria, 'm.nome');
            if ($dados) {
                return json_encode($dados);
            } else {
                return '';
            }
        } catch (\Exception $ex) {
            
        }
    }

//put your code here
}
