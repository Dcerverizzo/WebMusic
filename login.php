<html >
    <head>
        <meta charset="UTF-8">
        <title>Log-in Usuario</title>
        <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
        <link rel="stylesheet" href="core/vendor/css/style.css">
    </head>

    <body>
        <div class="login-card">
            <h1>Login</h1><br>
            <form id="login" name="login" action="Request.php?class=app\controller\MusicoCtr&method=LogUser&acao=logar"  method="POST">
                <input type="text" name="login" placeholder="Usuario" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <input type="hidden"  name="acao" value="logar"/> 
                <input type="submit" name="login" class="login login-submit" value="login">
            </form>

            <div class="login-help">
                <a href="Request.php?class=app\controller\MusicoCtr&method=LogUser&acao=cadastrar">Registrar</a> 
            </div>
        </div>

        <!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>





    </body>
</html>
