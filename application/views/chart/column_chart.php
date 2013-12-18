    <div id="chart_div" style="width:980px; height:200px;text-align:left;"></div>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['<?php echo $x;?>', '<?php echo $y;?>'],
		  <?php foreach($pa_count as $row)
		  {
		  		echo "['".$row['position_date']."', ".$row['sum']."],";  
		  }
		  ?>
        ]);

        var options = {
          title: '<?php echo $title;?>',
		  legend: { position: 'bottom' },
		  vAxis: {ticks: [0,2,4,6,8,10]},
		  animation: {duration: 1000, easing: 'out',}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
