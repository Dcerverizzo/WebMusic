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
    private $banda;
    private $compositor;

    function __construct($id = null, $duracao = null, $album = null, $banda = null, $compositor = null, $nome = null) {
        parent::__construct($id);
        $this->duracao = $duracao;
        $this->album = $album;
        $this->banda = $banda;
        $this->compositor = $compositor;
        $this->nome = $nome;
    }

    public function show() {
        echo "<h1>Dados de Musica</h1>";
        echo "<p><strong>Nome:</strong>{$this->nome}</p>";
        echo "<p><strong>Duração:</strong>{$this->duracao}</p>";
        echo "<p><strong>Album:</strong>{$this->album}</p>";
        echo "<p><strong>Banda:</strong>{$this->banda}</p>";
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

    function getBanda() {
        return $this->banda;
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

    function setBanda($banda) {
        $this->banda = $banda;
    }

    function setCompositor($compositor) {
        $this->compositor = $compositor;
    }

}
