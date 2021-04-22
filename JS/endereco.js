function novoEndereco() {
    let idCliente = document.getElementById('idCliente').value;
    window.location.href = `https://localhost/CRUD_html_php/View/novoEndereco.php?id=${idCliente}`; //UBUNTU
}

function editarEndereco(idCliente) {
    window.location.href = `https://localhost/CRUD_html_php/View/editarEndereco.php?id=${idCliente}`;
}