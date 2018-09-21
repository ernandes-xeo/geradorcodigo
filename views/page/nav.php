<div id="navigation">
    <nav>
        <ul>
            <!--<li><a href="index.php">Início</a></li>-->
            <li><a href="index.php?op=produtos">Cadastrar</a></li>
            <li><a href="index.php?op=GerarCodigos">Gerar Códigos</a></li>
            <li><a href="index.php?op=listar-produtos">Produtos</a></li>
            <?php if($_SESSION['usuario'] == 'root'){ ?>
			<li><a href="index.php?op=usuarios">Usuários</a></li>
			<?php } ?>
            <li><a href="index.php?op=ajuda">Ajuda</a></li>
        </ul>
    </nav>
</div>