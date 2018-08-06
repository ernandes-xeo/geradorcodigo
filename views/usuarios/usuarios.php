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
    <div class="main-contener">



        <br />
        <div class="boxe">
            <h2>Usuarios</h2>
        </div>

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
            <br />
            <br />
            <?php 
                for($i=$p-$max_links; $i <= $p-1;$i++){
                    if($i <=0 ){
                    }else {
                       echo " <a href='index.php?op=usuarios&p=".$i."'> " .$i. " </a>";
                    }
                }
                echo $p;
                for($i = $p+1;$i<=$p+$max_links;$i++){
                    if($i > $pags){
                        
                    }
                    else {
                        echo "<a href='index.php?op=usuarios&p=".$i."'> " .$i. " </a>";
                    }
                }
                echO "<a href='index.php?op=usuarios&p='".$pags."'>ultima página</a>"

            ?>
            
            
        <table width="100%" border="1px">
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
                    <a href="../controllers/usuariosController.php?botao=exibir&id=<?php echo $usuario->getId() ?>">Exibir </a> | 
                    <a href="../controllers/usuariosController.php?botao=excluir&id=<?php echo $usuario->getId() ?>" onclick="return confirmar()">Excluir</a>

                </td>
            <?php } ?>
            </tbody>
            
        </table>  
        <br />
    </div>
    <section id='left-destaques'>Left com destaques</section>
</section>