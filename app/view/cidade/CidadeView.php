<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\view\cidade;
/**
 * Description of CidadeView
 *
 * @author jlgregorio81
 */
class CidadeView extends \core\mvc\view\HtmlPage {
    
    public function __construct(\app\model\CidadeModel $model = null) {
        is_null($model)? $this->model = new \app\model\CidadeModel():$this->model=$model;
    }
    
    public function show() {
        $this->drawTop();
        require_once 'cidade-view.phtml';
        $this->drawBottom();
    }


}
