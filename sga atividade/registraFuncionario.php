<?php

    require_once('repository/FuncionarioRepository.php');
    require_once('util/base64.php');


    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $acesso = filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";
    if(fnAddFuncionario($nome, $email, $acesso)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }

    
    header("location: formulario-cadastro-funcionario.php?notify={$msg}");
    exit;