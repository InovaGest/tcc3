<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Financeiro</title>
    <link rel="stylesheet" type="text/css" href="financeiro.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    
    <div class="menu">
          <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="pedidos_pendentes.php">Pedidos</a></li>
            <li><a href="estoque.php">Estoque</a></li>
            <li><a href="financeiro.php">Financeiro</a></li>
            <li><a href="relatorio.php">Relatorios</a></li>
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="admin.php">Administradores</a></li>
          </ul>
    </div>

<div class="container">
    <h1>Financeiro</h1>
    <div class="grafico">
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </div>
        <table class="saldo"> 
            <button class="add"> <a href="#">Editar saldo </a></button>
                <thead>
                    <tr>
                        <th>Saldo atual da empresa</th>
                        <th>Total de receita do mês</th>
                        <th>Total de despesas do mês</th>
                    </tr>
                </thead>
                <tbody id="financeiro-list">
            <?php
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['saldo_atual']."</td>";
                echo "<td>".$row['total_receita_mes']."</td>";
                echo "<td>".$row['total_despesas_mes']."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
</div>

<footer>
</footer>
</body>
</html>