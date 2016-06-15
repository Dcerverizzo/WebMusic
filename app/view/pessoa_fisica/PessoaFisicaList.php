<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\pessoa_fisica;

/**
 * Description of PessoaFisicaList
 *
 * @author jlgregorio81
 */
class PessoaFisicaList extends \core\mvc\view\HtmlPage {
    //put your code here
    public function __construct($model = null) {
        $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'pessoa-fisica-list.phtml';
        $this->drawBottom();
    }

}
