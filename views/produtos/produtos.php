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
        <div class="cadastros">
            <h2>Cadastros Básicos</h2>
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
            <div class="accordion">
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="marca" />
                    <fieldset><legend>Cadastrar Marcas</legend>
                        <label for="nome">Informe o nome</label>
                        <input type="text" name="nome" id="nome" />
                        <input class="botao" name="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                    <fieldset><legend>Marcas</legend>
                        <?php
                        foreach ($listas as $marca) {
                            echo $marca->getNome() . "<br />";
                        }
                        ?>

                    </fieldset>
                </form>
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="tipo" />
                    <fieldset><legend>Cadastrar Tipo</legend>
                        <label for="nome">Informe o nome</label>
                        <input type="text" name="nome" />
                        <input class="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                    <fieldset><legend>Tipos</legend>
                        <?php
                        foreach ($tipos as $tipo) {
                            echo $tipo->getNome() . "<br />";
                        }
                        ?>

                    </fieldset>
                </form>
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="referencia" />
                    <fieldset><legend>Cadastrar Referência</legend>                
                        <label for="marca_id">Marca</label>
                        <select name="marca_id">
                            <option value="">Selecione</option>
                            <?php foreach ($listas as $lista): ?>
                                <option value="<?php echo $lista->getIdMarca() ?>"><?php echo $lista->getNome() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="tipo_id">Tipo</label>
                        <select name="tipo_id">
                            <option value="">Selecione</option>
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?php echo $tipo->getIdTipo() ?>"><?php echo $tipo->getNome() ?></option>
                            <?php endforeach; ?>                    
                        </select>
                        <br />
                        <label for="nome">Descrição Ref.:</label>
                        <input type="text" name="nome" id="nome" />
                        <input class="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>

                    <fieldset><legend>Referências</legend>
                        <?php
                        foreach ($referencias as $referencia) {
                            echo $marca->buscarNome($referencia->getMarcaId()) . ": " .
                            $objTipo->buscarNome($referencia->getTipoId()) . "_" . $referencia->getNome() . "<br />";
                        }
                        ?>

                    </fieldset>

                </form>
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="cor" />
                    <fieldset><legend>Cadastrar Cor</legend>
                        <label for="nome">Informe o nome</label>
                        <input type="text" name="nome" id="nome" />
                        <input class="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                </form>
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="tamanho" />
                    <fieldset><legend>Cadastrar Tamanho</legend>
                        <label for="nome">Informe o nome</label>
                        <input type="text" name="nome" id="nome" />
                        <input class="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                </form> 
            </div>
        </div>
        <p style="clear: both"></p>
        <hr />
        <div id="gerar-codigo">
            <h2>Gerar Códigos</h2>
            <form method="POST" action="<?php echo $url ?>" style="width: 400px">
                <input type="hidden" name="acao" value="gerarcodigo" />
                <fieldset><legend>Gerar CÓDIGO SKU</legend>

                    <label for="marca_id">Marca</label>
                    <select id="ref-marca" name="marca_id" required="required">
                        <option value="">Selecione</option>
                        <?php foreach ($listas as $lista): ?>
                            <option value="<?php echo $lista->getIdMarca() ?>"><?php echo $lista->getNome() ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="tipo_id">Tipo</label>
                    <select id="tipo_id" name="tipo_id" required="required">
                        <option value="">Selecione</option>
                        <?php foreach ($tipos as $tipo): ?>
                            <option value="<?php echo $tipo->getIdTipo() ?>"><?php echo $tipo->getNome() ?></option>
                        <?php endforeach; ?>                    
                    </select>

                    <label for="referencia_id">Referência</label>
                    <select id="ref-ref" name="referencia_id" required="required">
                        <option value="">Selecione</option>
                    </select>

                    <label for="cor_id">Cor</label>
                    <select name="cor_id">
                        <option value="">Selecione</option>
                        <?php foreach ($cores as $cor): ?>
                            <option value="<?php echo $cor->getIdCor() ?>"><?php echo $cor->getNome() ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="tamanho_id">Tamanho</label>
                    <select name="tamanho_id">
                        <option value="">Selecione</option>
                        <?php foreach ($tamanhos as $tamanho): ?>
                            <option value="<?php echo $tamanho->getIdTamanho() ?>"><?php echo $tamanho->getNome() ?></option>
                        <?php endforeach; ?>
                    </select>




                    <br />
                    <input class="botao" name="botao" type="submit" value="Adicionar" />
                </fieldset>
            </form>
        </div>
        <div class="list-produtos">
            <?php if (count($listaCodigos) > 0): ?>
                <h3> Produtos Cadastrados </h3>
                <table>
                    <thead>
                        <tr>
                            <th>Código Produto</th>
                            <th>Nome do Produto</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaCodigos as $codigo) { ?> 
                            <tr>
                                <td><?php echo $codigo->getCodigoProduto(); ?></td>
                                <td><?php echo $codigo->getNome(); ?></td>
                                <td><?php echo "<a class='excluir' href='#' id='" . $codigo->getCodigoId() . "'> Excluir</a>" ?></td>
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
        $('#ref-marca').on('change', function () {
            var marca_id = this.value;
            $.ajax({
                method: "POST",
                url: "<?php echo $url; ?>",
                data: {acao: 'buscaref', marca_id: marca_id},
                beforeSend: function () {
                    $('#ref-ref').html('<option>Carregando...</option>');
                }
            }).done(function (dados) {
                $('#ref-ref').html(dados).show();
            }).fail(function () {
                console.log('Erro. Favor atualizar a página.');
            })
        });

        $('#ref-marca').on('change', function () {
            var marca_id = this.value;
            $.ajax({
                method: "POST",
                url: "<?php echo $url; ?>",
                data: {acao: 'buscatiporef', marca_id: marca_id},
                beforeSend: function () {
                    $('#tipo_id').html('<option>Carregando...</option>');
                }
            }).done(function (dados) {
                $('#tipo_id').html(dados).show();
            }).fail(function () {
                console.log('Erro. Favor atualizar a página.');
            })
        });

        $(".excluir").on('click', function () {
            var codigoId;
            codigoId = $(this).attr("id");
            res = confirm("Deseja excluir o código selecionado?");
            if (res) {
                window.location.href = "<?php echo $url . '?acao=excluircodigo&codigoid=' ?>" + codigoId;
            }
        })
        
        

    })
</script>

</section>
