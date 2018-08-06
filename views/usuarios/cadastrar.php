<section id="main">
    <div class="main-contener">
        <h2>Novo Cadastro de Usuário</h2>
        
        <form id='meuform' method="POST" action="../controllers/usuariosController.php" >
            <fieldset> <legend>Login</legend>
                <input type="hidden" name="id"  />
                <label>Usuário</label>
                <input id="user" type="text" name="user" />
                
                <label>Nome</label>
                <input id="nome" type="text" name="nome"  />
                
                <label>Email</label>
                <input id="mail" type="text" name="email" />
                
                <label>Senha</label>
                <input id="senha" type="password" name="senha" />
                
                <label>Confirme suaSenha</label>
                <input id="senha" type="password" name="repeatsenha" />
                
                

                <input class="botao" type="submit" name="botao" value="Salvar" />
                 <a class='botao reset' href="index.php?op=usuarios">Voltar</a>

            </fieldset>
        </form>
    </div>
    <section id='left-destaques'>Left com destaques</section>
</section>