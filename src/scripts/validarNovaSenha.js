function validarNovaSenha () {
    senha1 = document.getElementById ('txtSenha');
    senha2 = document.getElementById ('cSenha');

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

    return true;
}