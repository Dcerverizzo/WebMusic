<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\pessoa_juridica;

class PessoaJuridicaView extends \core\mvc\view\HtmlPage {

    private $cidades;

    public function __construct(\app\model\PessoaJuridicaModel $model = null) {
        is_null($model) ? $this->model = new \app\model\PessoaJuridicaModel() : $this->model = $model;

        //..instancia um controlador de cidades
        $cidadeCtr = new \app\controller\CidadeCtr();
        //..pega todas as cidades
        $this->cidades = $cidadeCtr->getAllCities();
    }

    public function show() {
        $this->drawTop();
        require_once 'pessoa-juridica-view.phtml';
        $this->drawBottom();
    }

}
