<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;

/**
 * Description of MusicoCtr
 *
 * @author DanielCerverizzo
 */
class MusicoCtr extends \core\mvc\Controller {

    public function __construct() {
        parent::__construct();
        $this->view = new \app\view\musico\MusicoView();
        $this->dao = new \app\dao\MusicoDao();
        $this->model = new \app\model\MusicoModel();
    }

    public function showList() {
        try {
            $dados = null;
            if ($this->post) {
                //..cria um SQLObject para realizar um select no BD
                $sqlObj = new \core\dao\SqlObject(\core\dao\Connection::getConnection());
                //..define a join
                //   $criterio = "p.id_categoria = c.id_categoria";
                $criterio = "p.id_banda = b.id_banda";
                //..define os critérios de seleção
                $criterio .= " and upper(p.nome) like upper('{$this->post['nome']}%')";
                if ($this->post['banda'] > 0)
                    $criterio .= " and p.id_banda = {$this->post['banda']}";

                $this->post['ordenar'] == 0 ? $orderBy = 'p.nome, b.nome' : $orderBy = 'b.nome, p.nome';
                $dados = $sqlObj->select('pessoa_musico p, banda b', 'p.id_pessoa_musico,p.sexo,p.cpf,p.rg,p.login,p.id_banda,p.nome, b.nome as banda', $criterio, $orderBy);

                // var_dump($dados);
            }
            $view = new \app\view\musico\MusicoList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        $this->model = new \app\model\MusicoModel($this->post['id'], $this->post['nome'], $this->post['sexo'], $this->post['cpf'], $this->post['rg'], $this->post['login'], $this->post['senha'], new \app\model\BandaModel($this->post['banda']));
    }

    public function getBandas() {
        try {
            $nome = $this->get['banda'];
            echo $this->dao->getBandasJson($nome);
        } catch (\Exception $ex) {
            echo 'erro';
        }
    }

    /* Futura funçao para logar */

    public function LogUser() {
        session_start();
        $acao = $_GET['acao'];
        if ($acao == "Logout") {
            session_destroy();
            header("location:http://localhost/GitHub/WebMusic/login.php");
        }
        if ($acao == "cadastrar") {
            $_SESSION['convidado'] = "convidado";
            header("location:http://localhost/GitHub/WebMusic/Request.php?class=app\controller\MusicoCtr&method=showView");
        }
        if ($acao == "logar") {
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            try {
                // var_dump($login, $senha);
                if ($this->dao->findByUser($login, $senha)) {
                    session_start();
                    $_SESSION['usuario'] = $login;
                    // var_dump($_SESSION['usuario']);
                    header("location:http://localhost/GitHub/WebMusic/");
                } else {
                    echo 'Erro';
                }
            } catch (Exception $ex) {
                echo 'Erro';
            }
        }
    }

    //put your code here
}
