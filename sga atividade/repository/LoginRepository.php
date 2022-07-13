<?php

    require_once('Connection.php');


    function fnAddAluno($nome, $email, $acesso) {
        $con = getConnection();
        
        $sql = "insert into funcionario (nome, email, acesso) values (:pNome, :pEmail, :pAcesso)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pNome", $nome); 
        $stmt->bindParam(":pEmail", $email); 
        $stmt->bindParam(":pAcesso", $acesso); 
        
        return $stmt->execute();
    }

    function fnListFuncionarios() {
        $con = getConnection();

        $sql = "select * from funcionario";

        $result = $con->query($sql);

        $lstFuncionario = array();
        while($funcionario = $result->fetch(PDO::FETCH_OBJ)) {
            array_push($lstFuncionarios, $funcionario);
        } 

        return $lstFuncionarios;
    }

    function fnLocalizaFuncionarioPorId($id) {
        $con = getConnection();

        $sql = "select * from funcionario where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return null;
    }
    
    function fnUpdateFuncionario($id, $nome, $email, $acesso) {
        $con = getConnection();
                
        $sql = "update funcionario set nome = :pNome, email = :pEmail, acesso = :pAcesso where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id); 
        $stmt->bindParam(":pNome", $nome); 
        $stmt->bindParam(":pEmail", $email); 
        $stmt->bindParam(":pAcesso", $acesso); 
        
        return $stmt->execute();
    }
    
    function fnDeleteFuncionario($id) {
        $con = getConnection();
                
        $sql = "delete from funcionario where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        return $stmt->execute();
    }

    function fnLogin($email, $senha) {
        $con = getConnection();

        $sql = "select * from login where email = :pEmail and senha = :pSenha";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindValue(":pSenha", md5($senha));

        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return null;
    }