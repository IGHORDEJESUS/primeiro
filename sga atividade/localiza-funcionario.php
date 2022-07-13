<?php
    require_once('repository/FuncionarioRepository.php');
    $nome = filter_input(INPUT_POST, 'nomeFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: listagem-de-funcionarios.php?nome={$nome}");
    exit;