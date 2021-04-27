<?php
session_start();

unset($_SESSION['usuarioValido']);
unset($_SESSION['isAdm']);
unset($_SESSION['idFuncionario']);

header("Location: https://localhost/CRUD_html_php/View/page-login/login.html");
