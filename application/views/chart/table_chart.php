	<div id="visualization" style="width: 580px;"></div>
	<script type="text/javascript" src="//www.google.com/jsapi"></script>
	<script type="text/javascript">
    google.load('visualization', '1', {packages: ['table']});
    function drawVisualization() {
      // Create and populate the data table.
      var data = google.visualization.arrayToDataTable([
        ['<?php echo $column_title1;?>', '<?php echo $column_title2;?>'],
		  <?php foreach($pa_count as $row)
		  {
		  		echo "['".$row['position_source']."', ".$row['source']."],";  
		  }
		  ?>
      ]);
    
      // Create and draw the visualization.
      var table = new google.visualization.Table(document.getElementById('visualization'));
    
      var formatter = new google.visualization.BarFormat({width: 100});
      formatter.format(data, 1); // Apply formatter to second column
    
      table.draw(data, {allowHtml: true, showRowNumber: true});
    }
    
    google.setOnLoadCallback(drawVisualization);
  </script>
