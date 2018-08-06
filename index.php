<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" >
        <title>Formulário Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="skin/css/longin.css" >
        <link rel="stylesheet" type="text/css" href="skin/css/style.css" >
    </head>
    <body>
        <h1>Login</h1>
        <?php if (!empty($_SESSION['erro'])) { ?>

            <div class="resp">

                <p><?php echo $_SESSION['erro'] ?> </p>


            </div>
        <?php } ?>
        <form method="POST" action="controllers/LoginController.php" >
            <fieldset> <legend>Login</legend>
                <label>Usuário</label>
                <input id="nome" type="text" name="user" />

                <label> Senha:</label>
                <input type="password" id='senha' name="senha"></input>

                <input class="botao" type="submit" name="botao" value="Entrar" />
                <input class='botao reset' type="reset" value="Limpar" onclick="document.getElementById('meuform').submit();" />

            </fieldset>
        </form>
        
    </body>
</html>