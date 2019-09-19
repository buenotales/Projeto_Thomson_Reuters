<?php

@session_start();

function getConnection(){

    try{

        $oracle_usuario = "SFWISV12D1"; 
        $oracle_senha = "SFWISV12D1"; 
        $oracle_bd = "ORA12UTF8TST";

        if ($ora_conexao = oci_connect($oracle_usuario,$oracle_senha,$oracle_bd) ){ 
            
            //echo "Conexão com o banco Oracle foi feita com sucesso";
            return $ora_conexao;

        }else{	

            echo "Erro na conexão com o Oracle.";		
        }

    } catch (PDOException $e) {
        echo $e->getMessage();

    }

}

function getAtribuidos($userid){

    try{

        $ora_conexao = getConnection();

        $stid = oci_parse($ora_conexao, "SELECT a.id idAtivo, a.nome ativo, ua.data_atribuicao data_atribuicao,ua.data_retirada data_retirada
                                        FROM t_usuarios u, t_ativos a, t_usuario_ativo ua
                                        WHERE a.id = ua.id_ativo AND u.id = ua.id_usuario AND u.id = $userid AND ua.ativo = 1");
        oci_execute($stid);

        $x = 0;
        while (oci_fetch($stid)) {

            $obj[$x] = [
                "id" => oci_result($stid, 'IDATIVO'),
                "ativo" => oci_result($stid, 'ATIVO'),
                "data_atribuicao" => oci_result($stid, 'DATA_ATRIBUICAO'),
            ];

            $x++;
        }

        return $obj;

    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        unset($ora_conexao);
    }
}
function getUsuarios(){

    try{

        $ora_conexao = getConnection();

        $stid = oci_parse($ora_conexao, "SELECT * FROM t_usuarios");
        oci_execute($stid);

        $x = 0;
        while (oci_fetch($stid)) {

            $obj[$x] = [
                "id" => oci_result($stid, 'ID'),
                "nome" => oci_result($stid, 'NOME'),
                "usuario" => oci_result($stid, 'USUARIO'),
                "email" => oci_result($stid, 'EMAIL'),
                "senha" => oci_result($stid, 'SENHA'),
                "login" => oci_result($stid, 'LOGAR'),
                "ativo" => oci_result($stid, 'ATIVO'),
            ];

            $x++;
        }

        return $obj;

    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        unset($ora_conexao);
    }
}

function getUsuarioID($id){

    try{

        $ora_conexao = getConnection();

        $stid = oci_parse($ora_conexao, "SELECT * FROM t_usuarios WHERE id = $id");
        oci_execute($stid);

        while (oci_fetch($stid)) {

            $obj = [
                "id" => oci_result($stid, 'ID'),
                "nome" => oci_result($stid, 'NOME'),
                "usuario" => oci_result($stid, 'USUARIO'),
                "email" => oci_result($stid, 'EMAIL'),
                "senha" => oci_result($stid, 'SENHA'),
                "login" => oci_result($stid, 'LOGAR'),
                "ativo" => oci_result($stid, 'ATIVO'),
            ];

            return $obj;
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        unset($ora_conexao);
    }
}

function getHistorico($userid){

    try{

        $ora_conexao = getConnection();

        $stid = oci_parse($ora_conexao, "SELECT a.id id, a.nome ativo, ua.data_atribuicao data_atribuicao, ua.data_retirada data_retirada
                                         FROM t_usuarios u, t_ativos a, t_usuario_ativo ua
                                         WHERE a.id = ua.id_ativo AND u.id = ua.id_usuario AND u.id = $userid");
        oci_execute($stid);

        $x = 0;
        while (oci_fetch($stid)) {

            $obj[$x] = [
                "id" => oci_result($stid, 'ID'),
                "ativo" => oci_result($stid, 'ATIVO'),
                "data_atribuicao" => oci_result($stid, 'DATA_ATRIBUICAO'),
                "data_retirada" => oci_result($stid, 'DATA_RETIRADA'),
            ];

            $x++;
        }

        return $obj;

    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        unset($ora_conexao);
    }
}

function getAtivo($id){

    try{

        $ora_conexao = getConnection();

        $stid = oci_parse($ora_conexao, "SELECT *
                                         FROM t_ativos
                                         WHERE id = $id");
        oci_execute($stid);

        while (oci_fetch($stid)) {

            $obj = [
                "id" => oci_result($stid, 'ID'),
                "nome" => oci_result($stid, 'NOME'),
                "modelo" => oci_result($stid, 'MODELO'),
                "nota" => oci_result($stid, 'NOTA'),
                "descricao" => oci_result($stid, 'DESCRICAO'),
            ];

            return $obj;
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        unset($ora_conexao);
    }
}

function login($email, $senha){

    if($email == "adm@adm.com" && $senha == "adm"){
        $_SESSION["userid"] = "adm";
        $_SESSION["usernome"] = "Administrador";
        return true;
    }else{

        try{

            $ora_conexao = getConnection();

            $stid = oci_parse($ora_conexao, "SELECT * FROM t_usuarios WHERE email = :email AND 
                                                        senha = :senha AND ativo = 1 AND logar = 1");
            oci_bind_by_name($stid, ":email", $email);
            oci_bind_by_name($stid, ":senha", $senha);
            oci_execute($stid);

                $x = 0;
                while (oci_fetch($stid)) {

                    $obj[$x] = [
                        "id" => oci_result($stid, 'ID'),
                        "nome" => oci_result($stid, 'NOME'),
                    ];

                    $x++;
                    $_SESSION["userid"] = oci_result($stid, 'ID');
                    $_SESSION["usernome"] = oci_result($stid, 'NOME');

                }
                if($x > 0){
                    return true;
                }else{
                    return false;
                }

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            unset($ora_conexao);
        }
    }

}

if(isset($_GET["logout"]) && $_GET["logout"] == true){
    
    unset($_SESSION["userid"]);
    unset($_SESSION["usernome"]);
    header('Location: ../index.php');

}else if(isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "historico"){


    $obj = getHistorico($_SESSION["userid"]);

    echo json_encode($obj);


}else if(isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "atribuidos" && isset($_POST["id"])){


    $obj = getAtribuidos($_POST["id"]);

    echo json_encode($obj);


}else if(isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "usuarios"){


    $obj = getUsuarios();

    echo json_encode($obj);


}else if(isset($_POST["email"]) && isset($_POST["password"])){

    if(login($_POST["email"], $_POST["password"]) == false){

        header('Location: ../index.php');

    }else{

        header('Location: ../atribuidos.php');
    }

}else if(isset($_POST["id"]) && isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "ativo"){

    echo json_encode(getAtivo($_POST["id"]));

}else if(isset($_POST["id"]) && isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "user"){

    echo json_encode(getUsuarioID($_POST["id"]));

}


?>