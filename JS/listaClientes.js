function novoCliente() {
    window.location.href = "https://localhost/CRUD_html_php/View/page-cadastro-clientes/cadastroCliente.html";//UBUNTU

    //window.location.href = "http://localhost/GitHub_ProjetoWeb/CRUD_html_php/View/cadastroCliente.html";//WINDOWS
}

function editarCliente(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-editar-cliente/editarCliente.php?id=${idCliente}`; //UBUNTU
}

function pageEndereco(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php?id=${idCliente}`; //UBUNTU
}