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

function voltarListaCliente() {
    window.location.href = "https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php";
    //window.location.href = "http://localhost/GitHub_ProjetoWeb/CRUD_html_php/View/listaClientes.php";//WINDOWS
}

function voltarListaEndereco(id) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php?id=${id}`;
}