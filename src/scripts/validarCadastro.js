function validar () {

  var nome = document.getElementById ("txtNome");
  var email = document.getElementById ("txtEmail");
  var senha1 = document.getElementById ("txtSenha");
  var senha2 = document.getElementById ("cSenha");
  var telefone = document.getElementById ("txtTelefone");
  var endereco = document.getElementById ("txtEndereco");

  if (nome.value.length < 3 || nome.value == "") {
    alert ("É necessário informar um nome de usuário!");
    nome.value = ""
    nome.focus ();
    return false;
  }

  if (email.value == "" || email.value.length < 6 || email.value.indexOf ("@") <= 0 || 
  email.value.lastIndexOf (".") < email.value.indexOf ("@")) {
    alert ("É necessário informar um email válido!");
    email.value = "";
    email.focus ();
    return false;
  }

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

  if (telefone.value == "" || telefone.value.length < 8 || telefone.value.length > 9) {
    alert ("Informe um número de telefone válido!");
    telefone.value = "";
    telefone.focus ();
    return false;
  }

  if (endereco.value == "" || endereco.value.length < 5) {
    alert ("Informe um endereço válido!");
    endereco.value = "";
    endereco.focus ();
    return false;
  }

}

  
  