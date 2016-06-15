<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\view\pessoa_fisica;
/**
 * Description of PessoaFisicaView
 *
 * @author jlgregorio81
 */
class PessoaFisicaView extends \core\mvc\view\HtmlPage {
    
    private $cidades;
    
    public function __construct(\app\model\PessoaFisicaModel $model = null) {
        is_null($model) ? $this->model = new \app\model\PessoaFisicaModel() : $this->model = $model;
        
        //..instancia um controlador de cidades
        $cidadeCtr = new \app\controller\CidadeCtr();
        //..pega todas as cidades
        $this->cidades = $cidadeCtr->getAllCities();        
    }
    
    public function show() {
        $this->drawTop();
        require_once 'pessoa-fisica-view.phtml';
        $this->drawBottom();
    }

}
