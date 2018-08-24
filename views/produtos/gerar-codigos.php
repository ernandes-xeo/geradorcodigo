<?php

include_once('../models/codigo.php');
$obCodigo = new Codigo();
$listaCodigos = $obCodigo->listar('idcodigo DESC', 20);

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url .= '/controllers/cadastroController.php';
?>
<style type="text/css">
    /*
    .panel{
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        flex-flow: row;
            
    }
    */
    form{
        width: 20%;
        display: block;
        font-size: 12px;
        line-height: 20px;      
        float: left;
    }

    form fieldset{
        border: none;
    }

    .return{
        min-height: 35px;
    }
    
    form fieldset label{
        font-size: 14px;
    }
    
    .coluna{ 
        width: 40%; 
    }

    #listarcodigos i, .coluna i {
        font-size: 14px;
        cursor: pointer;
    }

    #listarcodigos table{
        font-size: 14px;

    }

    .boxe{
        width: 40%;
        float: left;
        margin-bottom: 5em;
    }
    
    .grid-50{
        width: 50%;
        float: left;
        display: grid;
    }
    
    .label{
        margin: 20px 0 10px;
        font-weight: 600;
    }
    
    .boxe1{
        width: 60%;
        float: left;
        margin-bottom: 5em;
    }

    h2.accordion{ cursor: pointer; }
    /*.panel{ display: none; }*/

</style>

<section id="main">
    <div class="main">
        <p class="return">           
            <?php
            if (@$_SESSION['sucesso'] == true) {
                unset($_SESSION['sucesso']);
                unset($_SESSION['codigo']);
                echo "<span class='success'>Cadastrado com sucesso!</span>";
            }
            if (@$_SESSION['excluido'] == true) {
                unset($_SESSION['excluido']);
                unset($_SESSION['sucesso']);
                unset($_SESSION['codigo']);
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
        <div id="gerar-codigo">
            <h2>Gerar Novos Produtos</h2>
            <div class="boxe">
                <h3>Cadastrar Produto</h3>
                <form id="form-gerarcodigo" name="form-gerarcodigo" method="POST" action="<?php echo $url ?>" style="width: 400px">
                    <input type="hidden" name="acao" value="gerarcodigo" />
                    <fieldset>
                        <label for="marca_id">Marca</label>
                        <select id="ref-marca" name="marca_id" required="required">
                            <option value="">Selecione</option>
                            <?php foreach ($listas as $lista): ?>
                                <option value="<?php echo $lista->getIdMarca() ?>"><?php echo $lista->getNome() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="tipo_id">Tipo</label>
                        <select id="tipo-id" name="tipo_id" required="required">
                            <option value="">Selecione</option>
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?php echo $tipo->getIdTipo() ?>"><?php echo $tipo->getNome() ?></option>
                            <?php endforeach; ?>                    
                        </select>

                        <label for="referencia_id">Referência</label>
                        <select id="ref-ref" name="referencia_id" required="required">
                            <option value="">Selecione</option>
                        </select>
                        <label for="cor" class="label">Selecione Cor</label>
                        <?php foreach ($cores as $cor): ?>
                        <div class="grid-50">
                            <label for="<?php echo $cor->getNome() ?>">
                                <input type="checkbox" name="cores[<?php echo $cor->getIdCor() ?>]" value="<?php echo $cor->getNome() ?>" />
                                <span><?php echo trim($cor->getNome()); ?></span>
                            </label>
                        </div>
                         <?php endforeach; ?>
                        
                        <div style="clear: both"></div>
                        <label for="tamanhos" class="label">Selecione o Tamanho</label>
                        <?php foreach ($tamanhos as $tamanho): ?>
                        <div class="grid-50">
                        <label for="<?php echo $tamanho->getNome() ?>">
                            <input type="checkbox" name="tamanhos[<?php echo $tamanho->getIdTamanho() ?>]" value="<?php echo $tamanho->getNome() ?>" />
                            <span><?php echo trim($tamanho->getNome()); ?></span>
                        </label>
                        </div>
                         <?php endforeach; ?>                                               
                        <br />
                        <input class="botao" id="gerarcodigo" name="botao" type="button" value="Adicionar" />
                    </fieldset>
                </form>
                <div style="clear: both"></div>
                <div class="result"></div>
            </div>
            <div class="boxe1">  
                <h3>Últimos Produtos Cadastrados</h3>
                <div id="listarcodigos">
                        <?php if (count($listaCodigos) > 0): ?>
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
                                    <td>
                                        <?php echo "<i  id='" . $codigo->getCodigoId() . "' class='fa excluir-ref'>&#xf1f8;</i>"; ?>
                                    </td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                        </table>
                        <?php endif; ?>
                </div>
            </div>
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
                $('#tipo-id').html(dados).show();
            }).fail(function () {
                console.log('Erro. Favor atualizar a referencia.');
            })
        });

        /* Chamada Ajax para gerar novo código */
        $("#gerarcodigo").on('click', function (event) {
            event.preventDefault();
            /*campos do form*/
            $.ajax({
                method: "POST",
                url: "<?php echo $url; ?>",
                data: $("#form-gerarcodigo").serialize(),
                beforeSend: function () {
                    $(this).html("carregando...");
                }
            }).done(function (data) {
                $(".result").html(data);
                atualizarListaProdutos();
            })

        })
        
        /* Excluir código gerado */
        $(document).on('click', '.excluir-ref', function () {
            var codigoId;
            codigoId = $(this).attr("id");
            res = confirm("Deseja excluir o código selecionado?");
            if (res) {
                window.location.href = "<?php echo $url . '?acao=excluircodigo&codigoid=' ?>" + codigoId;
            }
        })


        function atualizarListaProdutos() {
            $.ajax({
                method: "POST",
                url: "<?php echo $url; ?>",
                data: {acao: 'listarcodigos'},
                beforeSend: function () {
                    $("#listarcodigos table > tbody").html("Atualizando...");
                }
            }).done(function (data) {
                $("#listarcodigos table > tbody").html(data);

            })
        }
    })
</script>
</section>
