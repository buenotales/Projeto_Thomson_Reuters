<?php

@session_start();

include_once ("functions.php");


if(isset($_GET["logout"]) && $_GET["logout"] == true){
    
    unset($_SESSION["userid"]);
    unset($_SESSION["usernome"]);
    unset($_SESSION["adm"]);
    unset($_SESSION["gestor"]);
    header('Location: ../index.php');

}else if(isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "historico"){


    $obj = getHistorico($_SESSION["userid"]);

    echo json_encode($obj);


}else if(isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "atribuidos" && isset($_POST["id"])){


    $obj = getAtribuidos($_POST["id"]);

    echo json_encode($obj);


}else if(isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "usuarios"){

    if(isset($_SESSION["gestor"]) && $_SESSION["gestor"] == 1){

        $obj = getUsuarios(1, $_POST["id_grupo"]);

    }else if(isset($_SESSION["adm"]) && $_SESSION["adm"] == 1){

        $obj = getUsuarios(2, 0);

    }


    echo json_encode($obj);


}else if(isset($_POST["action"]) && $_POST["action"] == "select" && isset($_POST["tipo"]) && $_POST["tipo"] == "grupos"){

    $obj = getGrupos($_POST["id"]);

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