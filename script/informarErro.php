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
    <?php            
            if (isset($_POST['informarErro'])) {
            $matricula = $_POST['matricula'];
    }
    ?>

            <br />
            <div class="painel-informa">
                <h1>Informar inconsistências na solicitação</h1>
                <label>Matrícula do aluno: <?php echo $matricula ?></label><br /><br />
                <form action="http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/actions.php" method="POST">
                    <label for="titulo">Título:</label><br />
                    <input name="titulo" id="titulo" class="input-informa" placeholder="Titulo do e-mail" required/>
                    <input type="hidden" name="matricula" value="<?php echo $matricula;?>" />
                    <label for="mensagem">Mensagem:</label><br /><br />
                    <textarea name="mensagem" maxlength="500" cols="30" rows="3" id="mensagem" class="input-outros" placeholder="Informe as inconsistências e peça uma nova solicitação de evasão." required></textarea><br /><br />
                    <button class="btn3" type="submit" name="enviarErros">Enviar</button>
                </form>
            </div>
        </body>
    </html>