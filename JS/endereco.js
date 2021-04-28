function novoEndereco() {
    let idCliente = document.getElementById('idCliente').value;
    let url = document.getElementById('urlAnterior').value;
    window.location.href = `https://localhost/CRUD_html_php/View/page-novo-endereco/novoEndereco.php?id=${idCliente}&urlAnterior=${url}`; //UBUNTU
}

function editarEndereco(idEndereco, idCliente) {
    let url = document.getElementById('urlAnterior').value;
    window.location.href = `https://localhost/CRUD_html_php/View/page-editar-endereco/editarEndereco.php?idCliente=${idCliente}&idEndereco=${idEndereco}&urlAnterior=${url}`;
}

function excluirEndereco(idEndereco, idCliente) {
    let urlAtual = document.getElementById('urlAtual').value;
    let urlAnterior = document.getElementById('urlAnterior').value;
    window.location.href = `https://localhost/CRUD_html_php/Controller/excluirEndereco.php?idCliente=${idCliente}&idEndereco=${idEndereco}&urlAnterior=${urlAnterior}&urlAtual=${urlAtual}`;
}

function voltarPaginaListaEndereco() {
    let id = document.getElementById('idCliente').value;
    let url = document.getElementById('urlAnterior').value;
    window.location.href = `https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php?id=${id}&urlAnterior=${url}`;
}

function voltarPagina() {
    let url = document.getElementById('urlAnterior').value;
    window.location.href = url;
}