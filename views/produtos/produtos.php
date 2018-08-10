<?php
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
    <div class="main-contener">
        <h2>Cadastros</h2>
        <p>
        <?php 
            $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            $url .= '/controllers/cadastroController.php';
        ?>
        <?php
        if (!empty($_REQUEST['sucesso']) && $_REQUEST['sucesso'] == 'ok') {

            echo "<span class='success'>Cadastrado com sucesso!</span>";
        }
        ?>
        <form method="POST" action="<?php echo $url ?>">
            <input type="hidden" name="acao" value="marca" />
            <fieldset><legend>Cadastrar Marcas</legend>
                <label for="nome">Informe o nome</label>
                <input type="text" name="nome" id="nome" />
                <input class="botao" name="botao" name="botao" type="submit" value="Salvar" />
            </fieldset>
            <fieldset><legend>Marcas</legend>
                <?php 
                        foreach ($listas as $marca){
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
                        foreach ($tipos as $tipo){
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
                    <option value="<?php echo $lista->getIdMarca()?>"><?php echo $lista->getNome() ?></option>
                    <?php endforeach;?>
                </select>

                <label for="tipo_id">Tipo</label>
                <select name="tipo_id">
                    <option value="">Selecione</option>
                    <?php foreach ($tipos as $tipo): ?>
                    <option value="<?php echo $tipo->getIdTipo()?>"><?php echo $tipo->getNome() ?></option>
                    <?php endforeach;?>                    
                </select>
                <br />
                <label for="nome">Descrição Ref.:</label>
                <input type="text" name="nome" id="nome" />
                <input class="botao" name="botao" type="submit" value="Salvar" />
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
        <p style="clear: both"></p>
        <hr />
        <div id="gerar-codigo">
        <form method="POST" action="<?php echo $url ?>" style="width: 400px">
            <input type="hidden" name="acao" value="gerarcodigo" />
            <fieldset><legend>Gerar CÓDIGO SKU</legend>
                                
                <label for="marca">Marca</label>
                <select id="ref-marca" name="marca">
                    <option value="">Selecione</option>
                    <?php foreach ($listas as $lista): ?>
                    <option value="<?php echo $lista->getIdMarca()?>"><?php echo $lista->getNome() ?></option>
                    <?php endforeach;?>
                </select>
                
                <label for="tipo_id">Tipo</label>
                <select name="tipo_id">
                    <option value="">Selecione</option>
                    <?php foreach ($tipos as $tipo): ?>
                    <option value="<?php echo $tipo->getIdTipo()?>"><?php echo $tipo->getNome() ?></option>
                    <?php endforeach;?>                    
                </select>

                <label for="referencia">Referência</label>
                <select id="ref-ref" name="referencia">
                    <option value="">Selecione</option>
                </select>
                
                <label for="cor">Cor</label>
                <select name="cor">
                    <option value="">Selecione</option>
                    <?php foreach ($cores as $cor): ?>
                    <option value="<?php echo $cor->getIdCor()?>"><?php echo $cor->getNome() ?></option>
                    <?php endforeach;?>
                </select>

                <label for="tamanho">Tamanho</label>
                <select name="tamanho">
                    <option value="">Selecione</option>
                    <?php foreach ($tamanhos as $tamanho): ?>
                    <option value="<?php echo $tamanho->getIdTamanho()?>"><?php echo $tamanho->getNome() ?></option>
                    <?php endforeach;?>
                </select>




                <br />
                <input class="botao" name="botao" type="submit" value="Adicionar" />
            </fieldset>
        </form>
                
        </div>
    </div>
    
    <script type="text/javascript">
        $(function (){
            $('#ref-marca').on('change', function() {
                var marca_id = this.value;
                $.ajax({
                    method: "POST",
                    url: "<?php echo $url; ?>",
                    data: { acao:'buscaref', marca_id:marca_id },
                    beforeSend: function(){
                        $('#ref-ref').html('<option>Carregando...</option>');
                    }
                }).done(function (dados){
                    $('#ref-ref').html(dados).show();
                }).fail(function(){
                    console.log('Erro. Favor atualizar a página.');
                })
                
            });
            
        })
    </script>
    
    <section id='left-destaques'>Left com destaques</section>
</section>
