$(document).ready(function () {
    let btnSalvar = $("#btnSalvar");
    let cep = $("#cep");

    cep.mask("00000-000");

});


function novoEndereco() {
    let idCliente = document.getElementById('idCliente').value;
    window.location.href = `https://localhost/CRUD_html_php/View/page-novo-endereco/novoEndereco.php?id=${idCliente}`; //UBUNTU
}

function editarEndereco(idEndereco, idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-editar-endereco/editarEndereco.php?idCliente=${idCliente}&idEndereco=${idEndereco}`;
}

function excluirEndereco(idEndereco, idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/Controller/excluirEndereco.php?idCliente=${idCliente}&idEndereco=${idEndereco}`;
}

