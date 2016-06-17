<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\banda;

/**
 * Description of BandaList
 *
 * @author Daniel Cerverizzo
 */
class BandaList extends \core\mvc\view\HtmlPage {

    public function __construct($model = null) {
        $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'banda-list.phtml';
        $this->drawBottom();
    }

//put your code here
}
