<?php
include_once '../models/UsuarioDao.php';
$usarioDao = new UsuarioDao();
@$p = $_GET['p'];
$qnt = 5;
if(!empty($p)){
    $p = $p;
}else{
    $p=1;
}

$max_links = 3;
$total = count($usarioDao->listar());
$pags = ceil($total);



$usuarios = $usarioDao->listarPaginas($p, $qnt);
?>

<script>

    function confirmar(){
        
        res = confirm("Deseja excluir este usuário?");
        return res;
    }

</script>

<section id="main">
    <div class="main">

        <h2>Usuarios</h2>
        <?php
        if (!empty($_REQUEST['sucesso']) && $_REQUEST['sucesso'] == 'ok') {

            echo "<span class='success'>Cadastrado com sucesso!</span>";
        }

        if (!empty($_REQUEST['editar']) && $_REQUEST['editar'] == 'ok') {

            echo "<span class='success'>Alterado com sucesso!</span>";
        }
        
         if (!empty($_REQUEST['excluir']) && $_REQUEST['excluir'] == 'ok') {

            echo "<span class='success'>Excluído com sucesso!</span>";
        }
        ?>
        <p> Lista de Usuários
            <br />
            <a href="../controllers/usuariosController.php?botao=cadastrar" style="float: right">Cadastrar</a>
            
            
            
        <table width="100%" >
            <thead>
            <td>Usuário</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Ações</td>
            </thead>          
            <?php foreach($usuarios as $usuario) { ?>
                <tbody>
                <td><?php echo $usuario->getUsuario() ?></td>
                <td><?php echo $usuario->getNome() ?></td>
                <td><?php echo $usuario->getEmail() ?></td>
                <td align="center">
                    <?php if($usuario->getId() <> 1){ ?>
                        <a href="../controllers/usuariosController.php?botao=exibir&id=<?php echo $usuario->getId() ?>">Exibir </a> |                    
                        <a href="../controllers/usuariosController.php?botao=excluir&id=<?php echo $usuario->getId() ?>" onclick="return confirmar()">Excluir</a>
                    <?php } ?>

                </td>
            <?php } ?>
            </tbody>
            
        </table>  
        <br />
    </div>
</section>