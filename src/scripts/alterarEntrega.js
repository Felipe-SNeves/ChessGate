function alterarEndereco () {

    if (endereco_novo.value.length < 3 || endereco_novo.value == "") {
        alert ("É necessário informar um endereço de entrega!");
        endereco_novo.value = "";
        endereco_novo.focus ();
        return false;
    }
    else {
        enderecoEntrega.value = endereco_novo.value;
        endereco_novo.value = "";
        $(".modal").modal('hide');
    }
}

function limparCarrinho () {
    $.ajax ({
        method: "POST",
        url: "limparCarrinho.php",
        data: {}
    }).done ( function (response) {
        window.location.href = window.location.href.split("?")[0];
    })
}

function finalizarPedido (precoFim) {

    const endEntrega = document.getElementById ('enderecoEntrega').value;

    $.ajax ({
        method: "POST",
        url: "finalizarPedido.php",
        data: {
            enderecoFinal: endEntrega,
            precoFinal: precoFim
        }
    }).done ( function (response) {
        alert ('Pedido finalizado e registrado!');
    })
}