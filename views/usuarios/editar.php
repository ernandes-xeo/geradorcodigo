<section id="main">
    <div class="main-contener">
        <h2>Dados do Usuario</h2>
        <?php 
        $usario = $_SESSION['dadosUser'];
       
        /*
            echo $usario->getId();
            echo "<br />";
            echo $usario->getNome();
            echo "<br />";
            echo $usario->getEmail();
            echo "<br />";
            echo $usario->getUsuario();
            echo "<br />";
         * 
         */
        ?>
        
        <form id='meuform' method="POST" action="../controllers/LoginController.php" >
            <fieldset> <legend>Login</legend>
                <input type="hidden" name="id" value="<?php if(!empty($usario->getId())) echo $usario->getId(); ?>"  />
                <label>Usuário</label>
                <input id="user" type="text" name="user" value="<?php if(!empty($usario->getUsuario())) echo $usario->getUsuario(); ?>" />
                
                <label>Nome</label>
                <input id="nome" type="text" name="nome" value="<?php if(!empty($usario->getNome())) echo $usario->getNome(); ?>" />
                
                <label>Email</label>
                <input id="mail" type="text" name="email" value="<?php if(!empty($usario->getEmail())) echo $usario->getEmail(); ?>" />

                <label>Senha</label>
                <input id="senha" type="text" name="senha" value="<?php if(!empty($usario->getSenha())) echo $usario->getSenha(); ?>" />

                <input class="botao" type="submit" name="botao" value="editar" />
                <a class='botao reset' href="index.php?op=usuarios">Voltar</a>
                <a class='botao reset' href="../controllers/loginController.php?botao=excluir&id=<?php echo $usario->getId(); ?>">Excluir</a>

            </fieldset>
        </form>
        
        
    </div>
    <section id='left-destaques'>Left com destaques</section>
</section>