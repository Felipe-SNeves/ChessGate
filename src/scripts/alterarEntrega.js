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