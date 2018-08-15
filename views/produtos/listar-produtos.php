<?php
include_once('../models/marca.php');
include_once('../models/tipo.php');
include_once('../models/cor.php');
include_once('../models/tamanho.php');
include_once('../models/referencia.php');
include_once('../models/codigo.php');

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


$obCodigo = new Codigo();
$listaCodigos = $obCodigo->listar();

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url .= '/controllers/cadastroController.php';
?>
<style type="text/css">
    form, .boxe{
        width: 25%;
        height: auto;
        margin: 0 auto;
        display: block;
        font-size: 12px;
        line-height: 20px;
        float: left;
    }
</style>

<section id="main">
    <div class="main">
        <p>
            <?php
            if (@$_SESSION['sucesso'] == true) {
                unset($_SESSION['sucesso']);
                unset($_SESSION['codigo']);
                echo "<span class='success'>Cadastrado com sucesso!</span>";
            }
            if (@$_SESSION['excluido'] == true) {
                unset($_SESSION['excluido']);
                echo "<span class='success'>Código Excluido.</span>";
            }

            // o novo código já exite
            if (@$_SESSION['codigo'] == true) {
                $nomeProduto = $_SESSION['nome_produto'];
                echo "<span class='error'>Por favor verifique o cadastro, $nomeProduto já existe.</span>";
                unset($_SESSION['codigo']);
            }
            ?>
        </p>
        <div class="list-produtos">
            <?php if (count($listaCodigos) > 0): ?>
                <h3> Produtos Cadastrados </h3>
                <table>
                    <thead>
                        <tr>
                            <th>Código Produto</th>
                            <th>Nome do Produto</th>
                            <th>Nome do Produto no Site</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaCodigos as $codigo) { ?> 
                            <tr>
                                <td><?php echo $codigo->getCodigoProduto(); ?></td>
                                <td><?php echo $codigo->getNome(); ?></td>
                                <td><?php echo $codigo->getNomeSite(); ?></td>
                                <td>
                                    <?php echo "<a class='editarcodigo' href='#' id='" . $codigo->getCodigoId() . "'>Editar</a>" ?>
                                    <?php echo "<a class='excluir' href='#' id='" . $codigo->getCodigoId() . "'> Excluir</a>" ?>
                                </td>
                            </tr>
                        <?php } ?> 
                    </tbody>

                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript">


    $(function () {

        $(".excluir").on('click', function () {
            var codigoId;
            codigoId = $(this).attr("id");
            res = confirm("Deseja excluir o código selecionado?");
            if (res) {
                window.location.href = "<?php echo $url . '?acao=escluircodlista&codigoid=' ?>" + codigoId;
            }
        })

        $(".editarcodigo").on('click', function () {
            var codigoId;
            codigoId = $(this).attr("id");
            window.location.href = "<?php echo $url . '?acao=editarcodigo&codigoid=' ?>" + codigoId;

        })


    })
</script>

</section>
