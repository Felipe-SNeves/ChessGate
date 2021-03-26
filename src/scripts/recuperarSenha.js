function recuperar () {

    var email = document.getElementById ("emailRecuperar");

    if (email.value == "") {
        alert ("Por favor, informe um email!");
        return false;
    }

    alert(email.value);
}