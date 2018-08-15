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
            window.location.href = "<?php echo $url . '?acao=escluircodlista&codigoid=' ?>" + codigoId;
        }
    })
    $(".editarcodigo").on('click', function () {
        var codigoId;
        codigoId = $(this).attr("id");
        window.location.href = "<?php echo $url . '?acao=editarcodigo&codigoid=' ?>" + codigoId;  
    })

})