<?php
include_once('../models/codigo.php');



$obCodigo = new Codigo();
$listaCodigos = $obCodigo->listar('idcodigo DESC');

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
            // o novo código já exite
            if (@$_SESSION['retorno']) {
                foreach ($_SESSION['retorno'] as $nome) {
                    echo "<span class='success'>$nome Atualizado com sucesso</span>";
                }
                unset($_SESSION['retorno']);
            }
            ?>



        </p>
        <div class="list-produtos">
            <?php if (count($listaCodigos) > 0): ?>
                <h3> Produtos Cadastrados </h3>
                <table>
                    <form name="listprodutos" method="POST" action="<?php echo $url ?>">
                        <input type="hidden" name="acao" value="update-list" />
                        <thead>
                            <tr>
                                <td colspan="2">&nbsp;</td>                                
                                <td colspan="2"><input class="botao" type="submit" name="botao" value="Salvar Todos" /></td>                                
                            </tr>
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
                                    <td class="editar-nome"><?php if (empty($codigo->getNomeSite())) { ?>
                                            <input type="text" name="nome-site[<?php echo $codigo->getCodigoId() ?>]" value="<?php if ($nome = $codigo->getNomeSite()) echo $nome; ?>">
                                            <?php
                                        }else {
                                            echo $codigo->getNomeSite();
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($codigo->getNomeSite())) {
                                            echo "<a class='editarcodigo' href='#' id='" . $codigo->getCodigoId() . "'>Editar</a>";
                                        } ?>
                                <?php echo "<a class='excluir' style='float: right' href='#' id='" . $codigo->getCodigoId() . "'> Excluir</a>" ?>
                                    </td>
                                </tr>
    <?php } //endforeach  ?> 
                        </tbody>
                        <tfoot>


                        </tfoot>
                    </form>
                </table>
                <br />
<?php endif; ?>
        </div>
    </div>
<script type="text/javascript">
    $(function () {

        $(".excluir").on('click', function () {
            var codigoId;
            codigoId = $(this).attr("id");
            res = confirm("Deseja excluir o código selecionado?");
            if (res) {
                window.location.href = "<?php echo $url . '?acao=excluirItem&codigoid=' ?>" + codigoId;
            }
        })

        $(document).on('click', '.editarcodigo', function () {
            var codigoId;
            codigoId = $(this).attr("id");
            var nome = $.trim($(this).parent().prev().html()); // valor do elemento irmão

            var input = '<input type="text" id=' + codigoId + ' name="nome-site[' + codigoId + ']" value="' + nome + '">';

            $(this).parent().prev().html(input);
            $(this).addClass("salvar").removeClass("editarcodigo").html("Salvar");
        })

        $(document).on('click', '.salvar', function () {
            // tag <a>
            var acao = $(this);
            var codigoId = acao.attr("id");

            var nomeSite = $(this).parent().prev().find("input"); //elemento
            var nome = nomeSite.val();
            var id = nomeSite.attr("id");
            $.ajax({
                method: "GET",
                url: "<?php echo $url; ?>",
                data: {acao: 'editarNomeSite', codigoid: codigoId, nomesite: nome},
                beforeSend: function () {
                    $(this).parent().prev().html("carregando..");
                }
            }).done(function (dados) {

                $(nomeSite).parent().html(dados);
                $(nomeSite).remove();
                $(acao).addClass("editarcodigo").removeClass("salvar").html("Editar");

            }).fail(function () {
                console.log("Erro ao atualizar o nome do site");
            })

        })

    })
</script>

</section>
