function novoEndereco() {
    let idCliente = document.getElementById('idCliente').value;
    window.location.href = `https://localhost/CRUD_html_php/View/page-novo-endereco/novoEndereco.php?id=${idCliente}`; //UBUNTU
}

function editarEndereco(idEndereco, idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/page-editar-endereco/editarEndereco.php?idCliente=${idCliente}&idEndereco=${idEndereco}`;
}