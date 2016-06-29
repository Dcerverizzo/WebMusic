<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="head">
            <div class="container center-block" width="500px" height="300px">
                <img class="img-lightbox" src="core/vendor/img/logo12.png" alt="logo" width="300px" height="200px" >


            </div>
        </div>
        <?php
        require_once 'autoload.php';
        $sobre = new \app\view\sobre\AboutView();
        $sobre->show();
        ?>
        <div class="container">

            <h1># WebMusic</h1>

            <h4 class="panel"> Sistema em php para cadastro simples de Álbuns e musicas </h4>

            <h1> #Objetivos</h1>
            <p> Este sistema tem como principal objetivo aplicar conhecimentos acadêmicos obtidos na matéria
                de desenvolvimento para servidores 2, que consiste em aplicar modelo de cadastros utilizando um framework 
                desenvolvido pelos em aula.</p>

            <h1>#Tecnologias Utilizada</h1>
            <ul class="list-group-item-text">
                <li class="list-group">1.HTML5</li>
                <li class="list-group">2.CSS3</li>
                <li class="list-group">3.Twitter Bootstrap</li>
                <li class="list-group">4.Jquery</li>
                <li class="list-group">5.Responsive Layout</li>
                <li class="list-group">6.My Report php</li>
                <li class="list-group">7.PhpDocumentor</li>
                <li class="list-group">8.POO</li>
            </ul>
            <hr>
            <h4 class="panel">Sistema web desenvolvido na linguagem PHP para simples cadastros e algumas funcionalidades utilizando vários padrões de projetos e boas práticas de programação, sempre aprimorando o conhecimento adquirido em sala de aula.
            </h4>
            <h1> #Objetivos</h1>
            <p> Este sistema tem como principal objetivo aplicar conhecimentos acadêmicos obtidos na matéria
                de desenvolvimento para servidores 2 e me ajudar em obter novos discos e ter um controle sobre minhas principais bandas, como por exemplo cidades que eles estarão, turnes, numero de integrantes, dados relevantes que todo fã adoraria saber. 
                Este projeto consiste em aplicar modelos de cadastros utilizando um framework desenvolvido pelos alunos em aula, sempre aplicando <i>design patters</i> e boas práticas de programação.</p>


            <h1>Funcionalidades Funcionais do sistema</h1>

            - [x] Cadastro de Musicos,bandas,albuns <br>
            - [x] Listagem de Musicos,bandas, albuns<br>
            - [x] Listagem de Turnes Nacionais Internacionais<br>
            - [x] Layout Responsivo, elegante sempre mantendo boa usuabilidade<br>
            - [ ] Gerar Relatorios com filtros<br>
            - [ ] Fazer auditoria do sistema com foco em segurança(Login e senha)<br>

            <br>
            <br>
            <br>
            <br>

        </div>





    </body>
</html>
