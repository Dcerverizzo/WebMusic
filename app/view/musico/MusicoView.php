<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\musico;

/**
 * Description of MusicoView
 *
 * @author Daniel Cerverizzo
 */
class MusicoView extends \core\mvc\view\HtmlPage {

    private $bandas;

    public function __construct(\app\model\MusicoModel $model = null) {
        is_null($model) ? $this->model = new \app\model\MusicoModel() : $this->model = $model;
        $bandaCtr = new \app\controller\BandaCtr();
        $this->bandas = $bandaCtr->getBandas();
    }

    public function show() {
        //$this->drawTop();
        require_once 'musico-view.phtml';
        $this->drawBottom();
    }

//put your code here
}
