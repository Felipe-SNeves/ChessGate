function recuperar () {

    var email = document.getElementById ("emailRecuperar");

    if (email.value == "") {
        alert ("Por favor, informe um email!");
        return false;
    }

    $.ajax ({
        method: "POST",
        url: "../envioEmail.php",
        async: true,
        data: { cli: email.value }
    }).done ( function (response) {
        alert ('Um email foi enviado para a recuperação de senha!');
    })
    
    $(".modal").modal('hide');
}