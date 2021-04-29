$(document).ready(function () {
    let numErros = 0;

    $("#submit").attr("disabled", false);
    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("00.000.000-0");
    $("#telefone1").mask("(00) 0000-0000");
    $("#telefone2").mask("(00) 0000-0000");

    $("#nome").focusout(function () {
        let nome = $(this).val();
        let notValido = contemNumero(nome);

        if (notValido == true) {
            numErros += 1;
            alert("NOME INVALIDO!");
        }

    });

    $("#email").focusout(function () {
        let email = $(this).val();
        let isValido = emailValido(email);

        if (isValido == false) {
            numErros += 1;
            alert("EMAIL INVALIDO");
        }
    });

});

function contemNumero(texto) {
    const regex = /[0-9]/;
    return regex.test(texto);
}

function emailValido(email) {
    const regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function dataValida() {
    data = document.getElementById('dataNasc').value;

    if (data == "" || data == null || data == undefined) {
        return false;
    }

    if (new Date(data) > new Date()) {
        return false;
    }

    return true;
}

function validaForm() {
    try {
        if (nome == "" || nome == null || nome == undefined)
            throw "Campo vazio! Campo Obrigatorio!";

        if (dataValida() == false)
            throw "data Invalida";

    }
    catch (Error) {
        alert(Error);
    }
}