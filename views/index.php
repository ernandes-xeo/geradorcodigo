<?php
require_once '../models/login.php';
include_once('../models/marca.php');
include_once('../models/tipo.php');
include_once('../models/cor.php');
include_once('../models/tamanho.php');
include_once('../models/referencia.php');

$marca = new Marca();
$listas = $marca->listar();

$objTipo = new Tipo();
$tipos = $objTipo->listar();

$objCor = new Cor();
$cores = $objCor->listar();

$objTamanhos = new Tamanho();
$tamanhos = $objTamanhos->listar();

$objref = new Referencia();
$referencias = $objref->listar();


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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            case 'GerarCodigos':
                include_once './produtos/gerar-codigos.php';
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