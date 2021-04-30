$(document).ready(function () {
    let valueFiltro = $("#select-filtro option:selected").val();
    let selectFiltro = $("#select-filtro");
    let inputBuscar = $("#inputBuscar");
    let btnBuscar = $("#btnBuscar");

    btnBuscar.attr("disabled", true);

    inputBuscar.change(function () {
        if ($(this).val() !== "")
            btnBuscar.attr("disabled", false);
        else
            btnBuscar.attr("disabled", true);
    });


    selectFiltro.change(function () {
        valueFiltro = $(this).select().val();
    });

    btnBuscar.click(function () {
        $("#filtro").val(valueFiltro);
    });

});

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
    window.location.href = `https://localhost/CRUD_html_php/Controller/excluirCliente.php?idCliente=${idCliente}`;
}

function sairDoSistema() {
    window.location.href = "https://localhost/CRUD_html_php/Controller/sairDoSistema.php";
}
