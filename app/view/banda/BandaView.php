<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\banda;

/**
 * Description of BandaView
 *
 * @author Daniel Cerverizzo
 */
class BandaView extends \core\mvc\view\HtmlPage {

    public function __construct(\app\model\BandaModel $model = null) {
        is_null($model) ? $this->model = new \app\model\BandaModel() : $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'banda-view.phtml';
        $this->drawBottom();
    }

//put your code here
}
