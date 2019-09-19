<?php
@session_start();

if(!isset($_SESSION["userid"])){
    header('Location: index.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>

<body>

<nav class="navbar navbar-inverse">


    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="atribuidos.php">Controle de Ativos</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo $_SESSION["usernome"]; ?> <p id="id-user" style="display:none;"><?php echo $_SESSION["userid"]; ?></p>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="php/acao.php?logout=true">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>

    </nav>

    <div class="container">

        <button class="btn btn-primary" id="btnAtribuidos">Equipamentos Atribuidos</button>
        <button class="btn btn-warning" id="btnHistorico">Histórico</button>
        <?php if(isset($_SESSION["userid"]) && $_SESSION["userid"] == "adm"){ ?>

        <button class="btn btn-danger" id="btnUsuarios">Usuários</button>

        <?php } ?>

        <h3>Equipamentos sob minha resposabilidade:</h3>
        <br>
        <table class="table" id="atribuidos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Ativo</th>
                    <th>Data de Entrega</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        <table class="table" id="historico" style="display:none;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Ativo</th>
                    <th>Data de Entrega</th>
                    <th>Data de Devolução</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        <table class="table" id="usuarios" style="display:none;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Usuário</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        <div id="infoAtivo" style="display:none;">

            <form>
                <div class="form-group">
                    <label>ID:</label>
                    <input readonly type="text" class="form-control" name="id">
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input readonly type="text" class="form-control" name="nome">
                </div>
                <div class="form-group">
                    <label>Modelo:</label>
                    <input readonly type="text" class="form-control" name="modelo">
                </div>
                <div class="form-group">
                    <label>Nota Fiscal:</label>
                    <input readonly type="text" class="form-control" name="nota">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea readonly class="form-control" name="descricao" rows="3"></textarea>
                </div>
            </form>

            
            <a href="atribuidos.php"><button class="btn btn-danger">Voltar</button></a>
        </div>

        <div id="infoUser" style="display:none;">

            <form>
                <div class="form-group">
                    <label>ID:</label>
                    <input readonly type="text" class="form-control" name="id-user">
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input readonly type="text" class="form-control" name="nome-user">
                </div>
                <div class="form-group">
                    <label>Usuário:</label>
                    <input readonly type="text" class="form-control" name="usuario-user">
                </div>
                <div class="form-group">
                    <label>E-mail:</label>
                    <input readonly type="text" class="form-control" name="email-user">
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input readonly type="password" class="form-control" name="senha-user">
                </div>
                <div class="form-group">
                    <label>Login:</label>
                    <input readonly type="text" class="form-control" name="login-user">
                </div>
                <div class="form-group">
                    <label>Ativo:</label>
                    <input readonly type="text" class="form-control" name="ativo-user">
                </div>
            </form>

            
            <a href="atribuidos.php"><button class="btn btn-danger">Voltar</button></a>
        </div>


    </div>

</body>

<script src="js/acoes.js"></script>

</html>