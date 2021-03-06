<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\musica;

/**
 * Description of MusicaList
 *
 * @author Daniel Cerverizzo
 */
class MusicaList extends \core\mvc\view\HtmlPage {

    private $bandas;

    function __construct($model = null) {
        $this->model = $model;
        $bandaCtr = new \app\controller\BandaCtr();
        $this->bandas = $bandaCtr->getBandas();
    }

    public function show() {
        $this->drawTop();
        require_once 'musica-list.phtml';
        $this->drawBottom();
    }

//put your code here
}
