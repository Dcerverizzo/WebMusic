<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\pessoa_juridica;

class PessoaJuridicaList extends \core\mvc\view\HtmlPage {
    //put your code here
    public function __construct($model = null) {
        $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'pessoa-juridica-list.phtml';
        $this->drawBottom();
    }

}
