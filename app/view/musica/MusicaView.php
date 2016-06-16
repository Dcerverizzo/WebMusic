<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\musica;

/**
 * Description of musicaView
 *
 * @author Daniel Cerverizzo
 */
class MusicaView extends \core\mvc\view\HtmlPage {

    public function __construct(\app\model\MusicaModel $model = null) {
        is_null($model) ? $this->model = new \app\model\MusicaModel() : $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'musica-view.phtml';
        $this->drawBottom();
    }

//put your code here
}
