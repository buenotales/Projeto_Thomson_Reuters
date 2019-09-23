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
function getUsuarios($tipo, $id_grupo){

    try{

        $ora_conexao = getConnection();

        if($tipo == 1){
            $stid = oci_parse($ora_conexao, "SELECT u.id id, u.nome nome, u.usuario usuario FROM t_usuarios u, t_grupo_usuario_padrao gu, t_grupos g
            WHERE u.id = gu.id_usuario and gu.id_grupo = g.id and g.id = $id_grupo ");
        }else{
            $stid = oci_parse($ora_conexao, "SELECT * FROM t_usuarios");
        }



        oci_execute($stid);

        $x = 0;
        while (oci_fetch($stid)) {

            $obj[$x] = [
                "id" => oci_result($stid, 'ID'),
                "nome" => oci_result($stid, 'NOME'),
                "usuario" => oci_result($stid, 'USUARIO'),
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
function getGrupos($id_gestor){

    try{

        $ora_conexao = getConnection();

        $stid = oci_parse($ora_conexao, "SELECT g.id as id, g.nome as nome FROM t_usuarios u, t_grupo_usuario_padrao gu, t_grupos g where u.id = :id_gestor and u.id = gu.id_usuario
        and g.id = gu.id_grupo and g.tipo = 0 and gu.cargo = 'Gestor'");

        oci_bind_by_name($stid, ":id_gestor", $id_gestor);
        oci_execute($stid);

        $x = 0;
        while (oci_fetch($stid)) {

            $obj[$x] = [
                "id" => oci_result($stid, 'ID'),
                "nome" => oci_result($stid, 'NOME'),
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

    try{

        $ora_conexao = getConnection();

        $stid1 = oci_parse($ora_conexao, "SELECT valida_adm(:email, :senha) as adm, id, nome FROM t_usuarios WHERE usuario = :email and senha = :senha and ativo = 1 AND logar = 1");
        oci_bind_by_name($stid1, ":email", $email);
        oci_bind_by_name($stid1, ":senha", $senha);
        oci_execute($stid1);

        $x = 0;
        while (oci_fetch($stid1)) {


            if(oci_result($stid1, 'ADM') == 1){

                $_SESSION["userid"] = oci_result($stid1, 'ID');
                $_SESSION["adm"] = oci_result($stid1, 'ADM');
                $_SESSION["usernome"] = oci_result($stid1, 'NOME');

            }else{

                $stid = oci_parse($ora_conexao, "SELECT valida_gestor(:email, :senha) as id, nome FROM t_usuarios WHERE usuario = :email and senha = :senha and ativo = 1 AND logar = 1");
                oci_bind_by_name($stid, ":email", $email);
                oci_bind_by_name($stid, ":senha", $senha);
                oci_execute($stid);

                while (oci_fetch($stid)) {
    
                    if(oci_result($stid, 'ID') != ''){

                        echo oci_result($stid1, 'ID');
    
                        $_SESSION["userid"] = oci_result($stid, 'ID');
                        $_SESSION["gestor"] = 1;
                        $_SESSION["usernome"] = oci_result($stid, 'NOME');

                    }else{
    
                        return false;
    
    
                    }
    
                    $x++;
    
                }
            }

            $x++;

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