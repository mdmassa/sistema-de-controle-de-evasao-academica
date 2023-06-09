<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css"  href="./style/style.css" />
    <link rel="icon" type="image/x-icon" href="http://localhost:5500/img/favicon.ico">

    <script>
        if (document.querySelector('input[name="justif-evasao"]:checked').value === '') {
            alert('Por favor, selecione uma opção ou preencha o campo "Outros motivos".');
        } else if (document.querySelector('input[name="justif-evasao"]:checked').value === 'Outros motivos') {
            var outrosMotivos = document.querySelector('input[name="justif-evasao-texto"]').value;
            // faça o post usando o valor de outrosMotivos
        } else {
            var motivoSelecionado = document.querySelector('input[name="justif-evasao"]:checked').value;
            // faça o post usando o valor de motivoSelecionado
        }
    </script>
    
    <title>Sistema de Controle de Evasão Acadêmica</title>
</head>
<body>
    <header>

        <div class="logo" id="inicio">
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

    <div class="form-area">
        <form action="http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/actions.php" method="POST">
            <div class="info-solicitacao">
                <br />
                <h2>Informações básicas do aluno</h2>
                
                <label for="nome">Nome: *</label><br />
                <input type="text" name="nome" placeholder="Digite seu nome completo..." id="nome" class="input-nome" required>
                <br />
                <br />
                <label for="nomesocial">Nome social: </label><br />
                <input type="text" name="nomesocial" placeholder="Digite seu nome social completo se houver..." id="nomesocial" class="input-nome">
                <br />
                <br />
                <label for="cursoaluno">Curso: *</label>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ<label for="unid">Unidade/Campus: *</label>
                <br />
                <select name="cursoaluno" class="input-curso" id="cursoaluno" required>
                    <option disabled selected>Selecione o seu curso...</option>
                    <option value="Administração">Administração</option>
                    <option value="Agronomia">Agronomia</option>
                    <option value="Artes Visuais">Artes Visuais</option>
                    <option value="Ciẽncias Biológicas">Ciẽncias Biológicas</option>
                    <option value="Ciências Contábeis">Ciências Contábeis</option>
                    <option value="Direito">Direito</option>
                    <option value="Engenharia Civil">Engenharia Civil</option>
                    <option value="Engenharia da Computação">Engenharia da Computação</option>
                    <option value="Engenharia Elétrica">Engenharia Elétrica</option>
                    <option value="Engenharia Mecânica">Engenharia Mecânica</option>
                    <option value="Engenharia Química">Engenharia Química</option>
                    <option value="Geologia">Geologia</option>
                    <option value="Letras - Inglês">Letras - Inglês</option>
                    <option value="Letras - Português">Letras - Português</option>
                    <option value="Matemática">Matemática</option>
                    <option value="Psicologia">Psicologia</option>
                    <option value="Química">Química</option>
                    <option value="Sistemas de Informação">Sistemas de Informação</option>
                </select>
                ㅤ
                <select name="unid" class="input-unid" required>
                    <option disabled selected>Selecione a sua unidade...</option>
                    <option value="1">Campus 1</option>
                    <option value="2">Campus 2</option>
                    <option value="3">Campus 3</option>
                </select>
                <br />
                <br />
                <label for="nmatricula">Nº da matrícula: *</label>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ<label for="cpf">CPF: *</label><br />
                <input type="text"  name="nmatricula" placeholder="Digite sua matrícula..." id="nmatricula" class="input-matricula" required/>
                ㅤ
                <input type="text"  name="cpf" placeholder="Digite seu CPF..." id="cpf" class="input-cpf" required/>
                <br />
                <br />
                <label for="email">E-mail: *</label>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ<label for="cpf">Telefone: *</label><br />
                <input type="text"  name="email" placeholder="Digite seu e-mail..." id="email" class="input-email" required/>
                ㅤ
                <input type="text"  name="tel" placeholder="Digite seu telefone..." id="tel" class="input-tel" required/>
                <br />
                <br />
                <label for="idade">Idade: *</label>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ<label for="sexo">Sexo: *</label><br />
                <input type="text"  name="idade" placeholder="Digite sua idade..." id="idade" class="input-idade" required/>
                ㅤ
                <select name="sexo" class="input-sexo" required>
                    <option disabled selected>Selecione seu sexo...</option>
                    <option value="F">Feminino</option>
                    <option value="M">Masculino</option>
                </select>
            </div>

            <div class="justif-evasao">
                <h2>Justifique sua evasão</h2>
                <br />
                <br />
                <br />
                <p>
                <input type="radio" name="justif-evasao" value="Não me identifiquei com o curso." /> Não me identifiquei com o curso<br />
                <input type="radio" name="justif-evasao" value="Precisei ir trabalhar." /> Precisei ir trabalhar<br />
                <input type="radio" name="justif-evasao" value="Muitas despesas para se manter na universidade." /> Muitas despesas para se manter na universidade<br />
                <input type="radio" name="justif-evasao" value="Problemas de saúde (discente/familiares)." /> Problemas de saúde (discente/familiares)<br />
                <input type="radio" name="justif-evasao" value="Deficiência da educação básica." /> Deficiência da educação básica<br />
                <input type="radio" name="justif-evasao" value="Mudança de endereço." /> Mudança de endereço<br />
                <input type="radio" name="justif-evasao" value="Reprovações sucessivas." /> Reprovações sucessivas<br />
                <input type="radio" name="justif-evasao" value="Casamento não planejados/nascimento de filhos." /> Casamento não planejados/nascimento de filhos<br />
                <input type="radio" name="justif-evasao" value="Entrei na faculdade por imposição." /> Entrei na faculdade por imposição<br />
                <input type="radio" name="justif-evasao" value="Outros." /> Outros<br />
                <br />
                <textarea name="outros-motivos" maxlength="500" cols="30" rows="3" id="justif-evasao" class="input-outros" ></textarea>
                </p>
                <br />
                <button class="btn3" type="submit" name="enviar-solicitacao" id="enviar-solicitacao">Enviar solicitação</button>
            </div>
            
        </form>
        
    </div>

</body>

</html>

<?php if(isset($_GET['msg'])) { ?>
        <script>
            window.onload = function() {
                alert("<?php echo $_GET['msg']; ?>");
            }
        </script>
<?php } ?>