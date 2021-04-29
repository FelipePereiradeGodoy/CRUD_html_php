$(document).ready(function () {
    let numErros = 0;

    $("#submit").attr("disabled", false);
    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("00.000.000-0");
    $("#telefone1").mask("(00) 0000-0000");
    $("#telefone2").mask("(00) 0000-0000");

    $("#nome").focusout(function () {
        let nome = $(this).val();

        if (nome == "" || nome == null || nome == undefined) {
            numErros += 1;
            alert("Campo vazio! Campo Obrigatorio!");
        } else {
            let notValido = contemNumero(nome);

            if (notValido == true) {
                numErros += 1;
                alert("NOME INVALIDO!");
            }
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
        alert("data invalida!");
        return false;
    }

    if (new Date(data) > new Date()) {
        alert("Você ainda não nasceu !")
        return false;
    }

    return true;
}