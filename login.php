<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css"  href="./style/style.css" />
    <link rel="icon" type="image/x-icon" href="http://localhost:5500/img/favicon.ico">

    <title>Login Administrativo | Sistema de Controle de Evasão Acadêmica</title>
</head>
<body>
    <header>
        <div class="logo">
            <br />
            <center><img class="logo-img" src="./img/Marca-Horizontal-Smbolo-Tipografia-001.png" /></center>
        </div>

        <div class="navbar-container">
            <nav>
                <ul class="nav-list">
                    <li>
                        <a href="http://localhost/sicea/sistema-de-controle-de-evasao-academica/index.php">Início</a>
                    </li>
                    <li>
                        <a href="http://localhost/sicea/sistema-de-controle-de-evasao-academica/sobre.php">Sobre o sistema</a>
                    </li>
                    <li>
                        <a href="http://localhost/sicea/sistema-de-controle-de-evasao-academica/solicitar-evasao.php">Solicitar evasão</a>
                    </li>
                    <li>
                        <a href="http://localhost/sicea/sistema-de-controle-de-evasao-academica/estatisticas.php">Estatísticas</a>
                    </li>
                    <div class="navbar-spacing"></div>
                    <li>
                        <a href="http://localhost/sicea/sistema-de-controle-de-evasao-academica/login.php">Login administrativo</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="login-box">
        <br />
        <center>
            <h4>Login administrativo</h4>
        </center>
            <form action="http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/realizarLogin.php" class="form-login" method="POST">
                <label>Login: *</label>
                <br />
                <input type="text" name="login" placeholder="Insira seu login..." id="login" class="input" required>
                <br />
                <br />
                <label>Senha: *</label>
                <br />
                <input type="password" name="password" placeholder="Insira sua senha..." id="password" class="input" required>
                <br />
                <br />
                <center><button class="btn2" type="submit" name="entrar" id="entrar">Entrar</button></center>
                <br />
                <br />
            </form>
    </div>

</body>
</html>