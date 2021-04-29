function editarCliente(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-editar-cliente/editarCliente.php?id=${idCliente}`; //UBUNTU
}

function pageEndereco(idCliente) {
    let flag = document.getElementById('flagPag').value;
    window.location.href = `https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php?id=${idCliente}&flag=${flag}`; //UBUNTU
}

function excluirCliente(idCliente) {
    let url = document.getElementById('urlAtual').value;
    window.location.href = `https://localhost/CRUD_html_php/Controller/excluirCliente.php?idCliente=${idCliente}&urlAnterior=${url}`;
}
