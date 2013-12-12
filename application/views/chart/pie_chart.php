	<div id="piechart" style="width: 480px; height: 280px;"></div>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Rate'],
		  <?php foreach($pa_count as $row)
		  {
		  		echo "['".$row['position_status']."', ".$row['rate']."],";  
		  }
		  ?>
        ]);

        var options = {
          title: '<?php echo $title;?>',
		  is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>

   
