<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
        require_once 'autoload.php';
         // $view = new \app\view\pessoa_fisica\PessoaFisicaView();
        $cidade = new app\view\cidade\CidadeView();
        $cidade->show();
        ?>
