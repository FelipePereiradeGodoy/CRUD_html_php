function novoCliente() {
    window.location.href = "https://localhost/CRUD_html_php/View/page-cadastro-clientes/cadastroCliente.php";//UBUNTU

    //window.location.href = "http://localhost/GitHub_ProjetoWeb/CRUD_html_php/View/cadastroCliente.php";//WINDOWS
}

function editarCliente(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-editar-cliente/editarCliente.php?id=${idCliente}`; //UBUNTU
}

function pageEndereco(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php?id=${idCliente}`; //UBUNTU
}

function excluirCliente(idCliente) {
    let url = document.getElementById('urlAtual').value;
    window.location.href = `https://localhost/CRUD_html_php/Controller/excluirCliente.php?idCliente=${idCliente}&urlAnterior=${url}`;
}

function sairDoSistema() {
    window.location.href = "https://localhost/CRUD_html_php/Controller/sairDoSistema.php";
}