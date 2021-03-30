function alterarNome () {

    if (usuarioNovo.value == "" || usuarioNovo.value.length < 3) {
        alert ("É necessário informar um nome de usuário válido!");
        usuarioNovo.value = "";
        usuarioNovo.focus ();
        return false;
    }
    else {
        txtNome.value = usuarioNovo.value;
        usuarioNovo.value = "";
        $(".modal").modal('hide');
    }
}

function alterarEmail () {

    if (emailNovo.value == "" || emailNovo.value.length < 6 || emailNovo.value.indexOf ("@") <= 0 || 
  emailNovo.value.lastIndexOf (".") < emailNovo.value.indexOf ("@")) {
        alert ("É necessário informar um email válido!");
        emailNovo.value = "";
        emailNovo.focus ();
        return false;
  }
  else {
      txtEmail.value = emailNovo.value;
      emailNovo.value = "";
      $(".modal").modal('hide');
  }
}

function alterarSenha () {

    var senha1 = document.getElementById('senhaNovo');
    var senha2 = document.getElementById('senhaNovoConfirmacao');
    
    if (senha1.value == "" || senha1.value.length < 8 || senha2.value == "" || senha2.value.length < 8) {
        alert ("É necessário informar uma senha com no minímo 8 caracteres!");
        senha1.value = "";
        senha2.value = "";
        senha1.focus ();
        return false;
    }
    
    if (senha1.value != senha2.value) {
        alert ("A senha e a confirmação de senha diferem!");
        senha1.value = "";
        senha2.value = "";
        senha1.focus ();
        return false;
    }

    txtSenha.value = senha1.value;
    senha1.value = senha2.value = "";
    $(".modal").modal('hide');
}

function alterarTelefone () {

    if (telefoneNovo.value == "" || telefoneNovo.value.length < 8 || telefoneNovo.value.length > 9 || isNaN(telefoneNovo.value)) {
        alert ("Informe um número de telefone válido!");
        telefoneNovo.value = "";
        telefoneNovo.focus ();
        return false;
    }
    else {
        txtTelefone.value = telefoneNovo.value;
        telefoneNovo.value = "";
        $(".modal").modal('hide');
    }
}

function alterarEndereco () {

    if (enderecoNovo.value == "" || enderecoNovo.value.length < 3) {
        alert ("Insira um endereço válido!");
        enderecoNovo.value = "";
        enderecoNovo.focus ();
        return false;
    }
    else {
        txtEndereco.value = enderecoNovo.value;
        enderecoNovo.value = "";
        $(".modal").modal('hide');
    }
}