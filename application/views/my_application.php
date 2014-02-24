<div>
    <button class="btn btn-xs" data-toggle="modal" data-target="#send_application" >Send Application</button>
<br /><br />
</div>
<div class="modal fade" id="send_application" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:1050px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send Application</h4>
      </div>
      <div class="modal-body">
      <script>
	  	htmlobj=$.ajax({url:"<?php echo base_url();?>pa/send_application",async:false});
		$(".modal-body").html(htmlobj.responseText);
		init_editor();
	  </script>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<div>
	<form class="form-inline" role="form" method="post" onsubmit="send_quest();">
    <label class="sr-only" for="keyword">Keyword: </label>
    <div class="col-sm-4">
    	<input type="text" id="keyword" name="keyword" class="form-control" placeholder="Keyword" />
	</div>  
    <label class="sr-only" for="startdate">Start Date: </label>
    <div class="col-sm-2">
    	<input type="text" id="startdate" name="startdate" class="form-control" onClick="WdatePicker();" placeholder="Start Date" /> 
	</div> 
    <label class="sr-only" for="startdate">End Date: </label>
    <div class="col-sm-2">
    	<input type="text" id="enddate" name="enddate" class="form-control" onchange="CheckTime(this.value);" onClick="WdatePicker();" placeholder="End Date" />
	</div> 
    <button type="button" class="btn btn-default" onclick="send_quest();">Search</button>
    </form>
    <br />
</div>
	<table class="table table-striped" style="width:1000px;">
    <tr class="active">
    	<td><a href="<?php echo base_url();?>admin_info?orderby=id"><b>ID</b></a></td>
    	<td><a href="<?php echo base_url();?>admin_info?orderby=provider"><b>Target Company</b></a></td>
        <td><b>Position Source</b></td>
        <td><b>Send Date</b></td>
        <td><b>Application Status</b></td>
        <td><b>Action</b></td>
    </tr>
    <?php 
	if(isset($pa_list))
	{
		foreach($pa_list as $row) {?>
		<tr>
        	<td><?php echo $row['id'];?></td>
            <td><?php echo $row['position_company'];?></td>
            <td><?php echo $row['position_source'];?></td>
            <td><?php echo $row['position_date'];?></td>
            <td><?php if($row['position_status']=="open"){echo "<b style='color:#0b9134;'>";}else{echo "<b style='color:#f00505;'>";} echo $row['position_status'];?></b></td>
            <td>
            	<button id="delete" class="btn btn-default btn-xs" onclick="change_status(<?php echo $row['id'];?>);">Change Status</button>
            </td>
    	</tr>
        <?php }
	 }?>
    </table>
<script>
	function change_status(id)
	{
			htmlobj=$.ajax({url:"<?php echo base_url();?>pa/change_status/"+id,async:false});
  			//$("#center_right").html(htmlobj.responseText);
			if(htmlobj.responseText==1)
			{
				$("#center_right").load("<?php echo base_url();?>admin/application");	
			}	
	}
	function send_quest()
	{
		htmlobj="";	
    alert("haha");
    form_submit();
	}
	function CheckTime(value)
	{
		//var timestmap = (new Date()).valueOf(); 
		alert(value);	
	}
</script>