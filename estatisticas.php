<?php

    include './script/conexao.php';

    //padrão de inicio
    $ano = 'todos os anos';

    $sql  = "SELECT curso, COUNT(curso) as 'evasoes' FROM EstatisticasEvasao GROUP BY curso";
    $sql2 = "SELECT sexo, COUNT(sexo) AS 'num' FROM EstatisticasEvasao WHERE sexo='F' UNION SELECT sexo, COUNT(sexo) AS 'num' FROM EstatisticasEvasao WHERE sexo='M'";
    $sql3 = "SELECT motivo_evasao, COUNT(motivo_evasao) AS 'num' FROM EstatisticasEvasao GROUP BY motivo_evasao";
    $sql4 = "SELECT idade, COUNT(idade) as 'num' FROM EstatisticasEvasao GROUP BY idade";


    //atualizando grafico curso
    if(isset($_POST['buscar'])){

      if($_POST['ano'] == 'all') {
        $sql = "SELECT curso, COUNT(curso) AS 'evasoes' FROM EstatisticasEvasao GROUP BY curso";
        $ano = "todos os anos";
      } else {
        $ano = $_POST['ano'];
        $sql = "SELECT curso, COUNT(curso) as 'evasoes' FROM EstatisticasEvasao WHERE YEAR(data_evasao) = '$ano' GROUP BY curso";
      }
    }
  
    $rs = mysqli_query($con, $sql);
  
    while($dados_1 =  mysqli_fetch_array($rs)) {
        $dados_curso[] = [$dados_1['curso'], intval($dados_1['evasoes'])];
    }


    //atualizando grafico sexo
    if(isset($_POST['buscar'])){

      if($_POST['ano'] == 'all') {
        $sql2 = "SELECT sexo, COUNT(sexo) AS 'num' FROM EstatisticasEvasao WHERE sexo='F' UNION SELECT sexo, COUNT(sexo) AS 'num' FROM EstatisticasEvasao WHERE sexo='M'";
        $ano = "todos os anos";
      } else {
        $ano = $_POST['ano'];
        $sql2 = "SELECT sexo, COUNT(sexo) AS 'num' FROM EstatisticasEvasao WHERE sexo='F' AND YEAR(data_evasao) = '$ano' UNION SELECT sexo, COUNT(sexo) AS 'num' FROM EstatisticasEvasao WHERE sexo='M' AND YEAR(data_evasao) = '$ano'";
      }
    }

    $rs2 = mysqli_query($con, $sql2);
  
    while($dados_2 =  mysqli_fetch_array($rs2)) {
        $dados_sexo[] = [$dados_2['sexo'], intval($dados_2['num'])];
    }


    //atualizando grafico motivos
    if(isset($_POST['buscar'])){

      if($_POST['ano'] == 'all') {
        $sql3 = "SELECT motivo_evasao, COUNT(motivo_evasao) AS 'num' FROM EstatisticasEvasao GROUP BY motivo_evasao";
        $ano = "todos os anos";
      } else {
        $ano = $_POST['ano'];
        $sql3 = "SELECT motivo_evasao, COUNT(motivo_evasao) AS 'num' FROM EstatisticasEvasao WHERE YEAR(data_evasao) = '$ano' GROUP BY motivo_evasao";
      }
    }

    $rs3 = mysqli_query($con, $sql3);
  
    while($dados_3 =  mysqli_fetch_array($rs3)) {
        $dados_motivos[] = [$dados_3['motivo_evasao'], intval($dados_3['num'])];
    }


    //atualizando grafico idade
    if(isset($_POST['buscar'])){

      if($_POST['ano'] == 'all') {
        $sql4 = "SELECT idade, COUNT(idade) as 'num' FROM EstatisticasEvasao GROUP BY idade";
        $ano = "todos os anos";
      } else {
        $ano = $_POST['ano'];
        $sql4 = "SELECT idade, COUNT(idade) as 'num' FROM EstatisticasEvasao WHERE YEAR(data_evasao) = '$ano' GROUP BY idade";
      }
    }

    $rs4 = mysqli_query($con, $sql4);
  
    while($dados_4 =  mysqli_fetch_array($rs4)) {
        $dados_idade[] = [$dados_4['idade'], intval($dados_4['num'])];
    }
    
  ?>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css"  href="http://localhost:5500/style/style.css" />
    <link rel="icon" type="image/x-icon" href="http://localhost:5500/img/favicon.ico">

    <title>Estatísticas | Sistema de Controle de Evasão Acadêmica</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(gerarGraficoCursos);
      google.charts.setOnLoadCallback(gerarGraficoSexo);
      google.charts.setOnLoadCallback(gerarGraficoMotivos);
      google.charts.setOnLoadCallback(gerarGraficoIdade);

      // Gráfico Curso:
      function gerarGraficoCursos() {

        var dadosCurso = new google.visualization.DataTable();
        dadosCurso.addColumn('string', 'Topping');
        dadosCurso.addColumn('number', 'Nº de Evasões');
        dadosCurso.addRows(<?php echo json_encode($dados_curso); ?>);

        var opCurso = {'title':'Número de evasões por curso',
                       'width':1200,
                       'height':500};

        var graficoCurso = new google.visualization.BarChart(document.getElementById('grafico_cursos'));
        graficoCurso.draw(dadosCurso, opCurso);

      }
    

      // Gráfico Sexo:
      function gerarGraficoSexo() {

        var dadosSexo = new google.visualization.DataTable();
        dadosSexo.addColumn('string', 'Topping');
        dadosSexo.addColumn('number', 'Slices');
        dadosSexo.addRows(<?php echo json_encode($dados_sexo); ?>);

        var opSexo = {'title':'Número de evasões por sexo',
                       'width':1000,
                       'height':500,
                       'is3D':true};

        var graficoSexo = new google.visualization.PieChart(document.getElementById('grafico_sexo'));
        graficoSexo.draw(dadosSexo, opSexo);
      }


      // Gráfico Motivos:
      function gerarGraficoMotivos() {

        var dadosMotivos = new google.visualization.DataTable();
        dadosMotivos.addColumn('string', 'Topping');
        dadosMotivos.addColumn('number', 'Slices');
        dadosMotivos.addRows(<?php echo json_encode($dados_motivos); ?>);

        var opMotivos = {'title':'Número de evasões por motivos',
                      'width':1000,
                      'height':500,
                      'is3D':true};

        var graficoMotivos = new google.visualization.PieChart(document.getElementById('grafico_motivos'));
        graficoMotivos.draw(dadosMotivos, opMotivos);
      }

      // Gráfico Idade:
      function gerarGraficoIdade() {

        var dadosIdade = new google.visualization.DataTable();
        dadosIdade.addColumn('string', 'Topping');
        dadosIdade.addColumn('number', 'Nº de Evasões');
        dadosIdade.addRows(<?php echo json_encode($dados_idade); ?>);

        var opIdade = {'title':'Número de evasões por idade',
                      'width':1200,
                      'height':500};

        var graficoIdade = new google.visualization.LineChart(document.getElementById('grafico_idade'));
        graficoIdade.draw(dadosIdade, opIdade);

      }
    </script>  
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
                        <a href="http://localhost/sicea/sistema-de-controle-de-evasao-academica/login.php">Login administrativo</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="titulo"><h1>Estatísticas de Evasão da UNIFESSPA</h1>
    <h3>Exibindo dados de <?php echo $ano; ?></h3>
    </div>
    
      <div class="graficos">
      <center>
        <form method="POST">
        <br />
        <br />
        <br />
          <label>Filtrar:</label>
          <select name="ano" class="input-ano" id="ano">
            <option selected value="all">Escolha o ano</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="all">Todos os anos</option>
          </select>


          <button class="btn6" type="submit" name="buscar" id="buscar">Gerar gráficos</button>
        </form>
      </center>

        <br />
        <br />
        <center>
          <div class="gr_curso" id="grafico_cursos"></div>
          <br />
          <table class="columns">
              <tr>
                <td><div class="gr_sexo" id="grafico_sexo"></div></td>
                <td><div class="gr_motivos" id="grafico_motivos"></div></td>
              </tr>
          </table>
          <br />
          <div class="gr_idade" id="grafico_idade"></div>
        </center>
      </div>

  </body>
</html>