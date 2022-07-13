<?php

    require_once('repository/FuncionarioRepository.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";
    if(fnDeleteFuncionario($id)) {
        $msg = "Sucesso ao apagar";
    } else {
        $msg = "Falha ao apagar";
    }

    header("location: listagem-de-funcionarios.php?notify={$msg}");
    exit;