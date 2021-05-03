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

        switch (parseInt(valueFiltro)) {
            case 0:
                inputBuscar.attr("type", "text");
                inputBuscar.unmask();
                inputBuscar.attr("placeholder", "Fulano de tal");
                break;
            case 1:
                inputBuscar.mask("000.000.000-00");
                inputBuscar.attr("placeholder", "000.000.000-00");
                break;
            case 2:
                inputBuscar.attr("type", "number");
                inputBuscar.unmask();
                inputBuscar.attr("placeholder", "0 ou 1");
                break;
            default:
        }

        $("#filtro").attr("value", valueFiltro);
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
