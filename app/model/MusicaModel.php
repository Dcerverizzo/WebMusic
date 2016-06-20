<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\model;

/**
 * Description of MusicaModel
 *
 * @author Daniel Cerverizzo
 */
class MusicaModel extends \core\mvc\Model {

    private $duracao;
    private $nome;
    private $album;
    private $compositor;
    private $bandaModel;

    function __construct($id = null, $duracao = null, $album = null, $compositor = null, $nome = null, $bandaModel = null) {
        parent::__construct($id);
        $this->duracao = $duracao;
        $this->album = $album;
        $this->compositor = $compositor;
        $this->nome = $nome;
        is_null($bandaModel) ? $this->bandaModel = new BandaModel() : $this->bandaModel = $bandaModel;
    }

    public function show() {
        echo "<h1>Dados de Musica</h1>";
        echo "<p><strong>Nome:</strong>{$this->nome}</p>";
        echo "<p><strong>Duração:</strong>{$this->duracao}</p>";
        echo "<p><strong>Album:</strong>{$this->album}</p>";
        echo "<p><strong>Banda: </strong>{$this->bandaModel->getNome()}</p>";
        echo "<p><strong>Compositor:</strong>{$this->compositor}</p>";
    }

    function getDuracao() {
        return $this->duracao;
    }

    function getNome() {
        return $this->nome;
    }

    function getAlbum() {
        return $this->album;
    }

    function getCompositor() {
        return $this->compositor;
    }

    function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setAlbum($album) {
        $this->album = $album;
    }

    function getBandaModel() {
        return $this->bandaModel;
    }

    function setBandaModel($bandaModel) {
        $this->bandaModel = $bandaModel;
    }

    function setCompositor($compositor) {
        $this->compositor = $compositor;
    }

}
