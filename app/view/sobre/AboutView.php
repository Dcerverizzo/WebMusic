<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\sobre;

/**
 * Description of AboutView
 *
 * @author Daniel Cerverizzo
 */
class AboutView extends \core\mvc\view\HtmlPage {

    public function show() {
        $this->drawTop();
       // require_once 'sobre.phtml';
        $this->drawBottom();
    }

//put your code here
}
