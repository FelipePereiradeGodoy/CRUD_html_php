function voltarListaCliente() {
    window.location.href = "https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php"
    //window.location.href = "http://localhost/GitHub_ProjetoWeb/CRUD_html_php/View/listaClientes.php";//WINDOWS
}

function editarCliente(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-editar-cliente/editarCliente.php?id=${idCliente}`; //UBUNTU
}

function pageEndereco(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php?id=${idCliente}`; //UBUNTU
}

function excluirCliente(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/Controller/excluirCliente.php?idCliente=${idCliente}`;
}