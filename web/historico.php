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
        <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="atribuidos.php">Sob Responsabilidade</a>
                </li>
            
                <li class="nav-item">
                    <a href="historico.php">Histórico</a>
                </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo $_SESSION["usernome"]; ?>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="php/acao.php?logout=true">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>

    </nav>

    <div class="container">
        <h3>Histórico de equipamentos atribuidos a mim:</h3>
        <br>
        <table class="table" id="historico">
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

    </div>

</body>

<script src="js/acoes.js"></script>

</html>