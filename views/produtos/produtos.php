<?php

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$urlEditar = $url . '/codigo/controllers/editarCadastroController.php';

$url .= '/codigo/controllers/cadastroController.php';
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
        width: 18%; 
        margin-left: 10px; 
        float: left;
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
    .boxe1{
        width: 60%;
        float: left;
        margin-bottom: 5em;
    }

    h2.accordion{ cursor: pointer; }
    /*.panel{ display: none; }*/

</style>

<!-- <iframe width="100%" height="760" src="https://www.youtube-nocookie.com/embed/TnHSL9bytos?controls=0&amp;start=2" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

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
        <div class="cadastros" id="accordion">            
            <h2 class="accordion">Formulários Básicos</h2>
            <div class="panel">
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="marca" />
                    <fieldset><legend>Cadastrar Marcas</legend>
                        <label for="nome">Informe o nome</label>
                        <input type="text" name="nome" id="nome" required="required" />
                        <input class="botao" name="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                </form>
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="tipo" />
                    <fieldset><legend>Cadastrar Tipo</legend>
                        <label for="nome">Informe o nome</label>
                        <input type="text" name="nome" required="required" />
                        <input class="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                </form>
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="referencia" />
                    <fieldset><legend>Cadastrar Referência</legend>                
                        <label for="marca_id">Marca</label>
                        <select name="marca_id" required="required">
                            <option value="">Selecione</option>
                            <?php foreach ($listas as $lista): ?>
                                <option value="<?php echo $lista->getIdMarca() ?>"><?php echo $lista->getNome() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="tipo_id">Tipo</label>
                        <select name="tipo_id" required="required">
                            <option value="">Selecione</option>
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?php echo $tipo->getIdTipo() ?>"><?php echo $tipo->getNome() ?></option>
                            <?php endforeach; ?>                    
                        </select>
                        <br />
                        <label for="nome">Descrição Ref.:</label>
                        <input type="text" name="nome" id="nome" required="required" />
                        <input class="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                </form>
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="cor" />
                    <fieldset><legend>Cadastrar Cor</legend>
                        <label for="nome">Informe o nome</label>
                        <input type="text" name="nome" id="nome" required="required" />
                        <input class="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                </form>
                <form method="POST" action="<?php echo $url ?>">
                    <input type="hidden" name="acao" value="tamanho" />
                    <fieldset><legend>Cadastrar Tamanho</legend>
                        <label for="nome">Informe o nome</label>
                        <input type="text" name="nome" id="nome" required="required" />
                        <input class="botao" name="botao" type="submit" value="Salvar" />
                    </fieldset>
                </form> 
            </div>
        </div>
        <p style="clear: both"></p>
        <!-- Itens cadastrados --> 
        <div class="panel">
            <div class="coluna">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Marcas</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listas as $marca) { ?>
                            <tr>
                                <td><?php echo $marca->getNome() ?></td>
                                <td>
                                    <?php echo "<i  id='Marca_editar_" . $marca->getIdMarca() . "' class='fa editarcodigo'>&#xf044;</i>"; ?> 
                                    <?php echo "<i  id='Marca_excluir_" . $marca->getIdMarca() . "' class='fa excluir'>&#xf1f8;</i>"; ?>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="coluna">
                <table>
                    <thead>
                        <tr> 
                            <th colspan="2">Tipos</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tipos as $tipo) { ?>
                            <tr>
                                <td><?php echo $tipo->getNome() ?></td>
                                <td>
                                    <?php echo "<i  id='Tipo_editar_" . $tipo->getIdTipo() . "' class='fa editarcodigo'>&#xf044;</i>"; ?> 
                                    <?php echo "<i  id='Tipo_excluir_" . $tipo->getIdTipo() . "' class='fa excluir'>&#xf1f8;</i>"; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table> 
            </div>
            <div class="coluna">
                <table>
                    <thead>
                        <tr> 
                            <th colspan="2">Referências</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($referencias as $referencia) { ?>
                            <tr>
                                <td><?php
                                    echo $marca->buscarNome($referencia->getMarcaId()) . ": " .
                                    $objTipo->buscarNome($referencia->getTipoId()) . "_" . $referencia->getNome();
                                    ?></td>
                                <td>
                                    <?php // echo "<i  id='Referencia_editar_". $referencia->getIdReferencia()  ."' class='fa editarcodigo'>&#xf044;</i>"; ?> 
                                    <?php echo "<i  id='Referencia_excluir_" . $referencia->getIdReferencia() . "' class='fa excluir'>&#xf1f8;</i>"; ?>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel">
            <div class="coluna">
                <table>
                    <thead>
                        <tr> 
                            <th colspan="2">Cores</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cores as $cor) { ?>
                            <tr>
                                <td><?php echo $cor->getNome() ?></td>
                                <td>
                                    <?php echo "<i  id='Cor_editar_" . $cor->getIdCor() . "' class='fa editarcodigo'>&#xf044;</i>"; ?> 
                                    <?php echo "<i  id='Cor_excluir_" . $cor->getIdCor() . "' class='fa excluir'>&#xf1f8;</i>"; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="coluna">
                <table>
                    <thead>
                        <tr> 
                            <th colspan="2">Tamanhos</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tamanhos as $tamanho) { ?>
                        <tr>                        
                            <td><?php echo $tamanho->getNome() ?></td>
                            <td>
                                <?php echo "<i  id='Tamanho_editar_" . $tamanho->getIdTamanho() . "' class='fa editarcodigo'>&#xf044;</i>"; ?> 
                                <?php echo "<i  id='Tamanho_excluir_" . $tamanho->getIdTamanho() . "' class='fa excluir'>&#xf1f8;</i>"; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>
<script type="text/javascript">
    $(function () {
       
//        $('h2.accordion').click(function () {
//            $(".panel").slideToggle("slow");
//        });
        
        /* Editar cadastrados pela listagem */
        /* Pegar o valor do id e texto do campo nome */
        $(document).on('click', '.editarcodigo', function () {
            var codigoId;
            codigoId = $(this).attr("id");
            var nome = $.trim($(this).parent().prev().html()); // valor do elemento irmão

            var input = '<input type="text" id=' + codigoId + ' name="' + codigoId + '" value="' + nome + '">';

            $(this).parent().prev().html(input);
            // inserir a acao para salvar
            salvar = "<i  class='fa'>&#xf00c;</i>";
            $(this).addClass("salvar").removeClass("editarcodigo").html(salvar);
        })
        /* Salvar edição cadastro simples */
        $(document).on('click', '.salvar', function () {
            // tag <a>
            var elemento = $(this); //elemento html
            var data = elemento.attr("id").split("_");

            var edite = $(this).parent().prev().find("input"); //elemento
            var nvalor = edite.val();

            $.ajax({
                method: "POST",
                url: "<?php echo $urlEditar; ?>",
                data: {table: data[0], acao: data[1], codigoId: data[2], valor: nvalor},
                beforeSend: function () {
                    $(this).parent().prev().html("carregando..");
                }
            }).done(function (dados) {

                $(edite).parent().html(dados);
                $(edite).remove();
                $(elemento).addClass("editarcodigo").removeClass("salvar").html("&#xf044;"); // EDITAR

            }).fail(function () {
                console.log("Erro ao atualizar o nome do site");
            })


        })

        /* Excluir cadastros básicos */
        $(document).on('click', '.excluir', function () {
            var info = $(this).attr("id").split("_");
            var tbody = $(this).parents('tbody');

            $.ajax({
                method: "POST",
                url: "<?php echo $urlEditar; ?>",
                data: {table: info[0], acao: info[1], codigoId: info[2]},
                beforeSend: function () {
                    $(tbody).html("Atualizando...");
                }
            }).done(function (data) {
                if (data) {
                    atualizarCadastros(tbody, info);
                }
            })
        })

        function atualizarCadastros(tbody, data) {

            $.ajax({
                method: "POST",
                url: "<?php echo $urlEditar; ?>",
                data: {table: data[0], acao: 'listar', codigoId: data[2]},
                beforeSend: function () {
                    //$(".panel .coluna table > tbody").html("Atualizando...");
                }
            }).done(function (data) {
                $(tbody).html(data);
            })


        }
    })
</script>
</section>
