$(document).ready(function mascaraCadastroCliente() {
    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("00.000.000-0");
    $("#telefone1").mask("(00) 0000-0000");
    $("#telefone2").mask("(00) 0000-0000");
});



function dataValida() {
    //data = document.getElementById('dataNasc').value;
    //
    //if (data == "" || data == null || data == undefined) {
    //    return false;
    //}
    //
    //if (new Date(data) > new Date()) {
    //    return false;
    //}
    //
    //return true;
}
