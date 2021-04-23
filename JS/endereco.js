function novoEndereco() {
    let idCliente = document.getElementById('idCliente').value;
    window.location.href = `https://localhost/CRUD_html_php/View/page-novo-endereco/novoEndereco.php?id=${idCliente}`; //UBUNTU
}

function editarEndereco(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-editar-endereco/editarEndereco.php?id=${idCliente}`;
}