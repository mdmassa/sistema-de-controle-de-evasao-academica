<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css"  href="http://localhost:5500/style/style.css" />
    <link rel="icon" type="image/x-icon" href="http://localhost:5500/img/favicon.ico">

    <title>Painel de Controle | Sistema de Controle de Evasão Acadêmica</title>
</head>
<body>
    <header>
        <div class="logo">
            <br />
            <center><img class="logo-img" src="http://localhost:5500/img/Marca-Horizontal-Smbolo-Tipografia-001.png" /></center>
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
                        <a href="http://localhost/sicea/sistema-de-controle-de-evasao-academica/login.php">Sair</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="painel-adm">
        
        <div class="lista-solicitacoes">
            <h3>Lista de solicitações</h3>

            <div class="acoes">
                <form action="http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/dashboard.php" method="POST">
                    <button class="btn3" type="submit" id="atualizar" name="atualizar">Atualizar solicitações ↺</button>
                </form>
            </div>

            <div class="solicitacoes-pendentes" id="solicitacoes-pendentes">
                     <table>
                        <thead>
                            <tr>
                            <th>Matricula</th>
                            <th>Nome</th>
                            <th>Data</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><br /><br />Clique em atualizar para exibir solicitações pendentes.</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </body>
</html>            

<?php if(isset($_GET['msg_confirmacao'])) { ?>
        <script>
            window.onload = function() {
                alert("<?php echo $_GET['msg_confirmacao']; ?>");
            }
        </script>
    <?php } ?>