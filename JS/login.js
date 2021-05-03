$(document).ready(function mascaraCPF() {
    $("#cpf").mask("000.000.000-00");
});

function voltarLogin() {
    window.location.href = "https://localhost/CRUD_html_php/View/page-login/login.html";
}

function setRadioButton() {
    let radioButton = document.getElementById('isAdm').value;

    if (radioButton == '0')
        document.getElementById('isAdm').value = 1;

    if (radioButton == '1') {
        document.getElementById('isAdm').checked = false;
        document.getElementById('isAdm').value = 0;
    }
}
