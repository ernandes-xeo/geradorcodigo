<?php
require_once '../models/login.php';

if (!isset($_SESSION)) {
    session_start();
}

$login = new Login();

if ($login->verificaLogin()) {
    $logado = $_SESSION['usuario'];
} else {
   $login->sair();
   header("location:../controllers/loginController.php?botao=sair");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Gerador Código Produto</title>
        <meta name="author" content="Ernandes Xeo" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Layout padrão página html" >
        <link rel="stylesheet" type="text/css" href="../skin/css/style.css">
        <link rel="stylesheet" type="text/css" href="../skin/css/longin.css">
        <script type="text/javascript" src="../skin/js/jquery-3.3.1.min.js"></script>        
<!--        <script type="text/javascript" src="../skin/js/codigos.js"></script>        -->
    </head>
    <body>
        <?php
        // include de aquivos para a formação da página
        include_once "./page/header.php";
        
        include_once "./page/nav.php";
       
        $_GET['key'] = (isset($_GET['key'])? $_GET['key'] : 'index/index');
        //echo $_GET['key'];
        
        
        @$opcao = $_REQUEST['op'];

        switch ($opcao) {
            case 'servicos':
                include_once './servicos/servicos.php';
                break;
            case 'usuarios':
                include_once './usuarios/usuarios.php';
                break;
            case 'cadastrar':
                include_once './usuarios/cadastrar.php';
                break;
            case 'userview':
                include_once './usuarios/view-user.php';
                break;
            case 'produtos':
                include_once './produtos/produtos.php';
                break;
            
            case 'listar-produtos':
                include_once './produtos/listar-produtos.php';
                break;
            
            case 'ajuda':
                include_once './help/ajuda.php';
                break;
            default:
                //include_once "./page/content.php";
                include_once './produtos/produtos.php';
        }

        
        include_once "./page/footer.php";
        ?>
    </body>
</html>