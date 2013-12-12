<div>
    <a href="<?php echo base_url();?>pa/send_application" class="btn btn-xs"><button class="btn btn-xs">Send Application</button></a>
	<a href="<?php echo base_url();?>pa/send_application" class="btn btn-xs"><button class="btn btn-xs">Load Sent Application</button></a>
<br /><br />
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
            <td><?php echo $row['position_status'];?></td>
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
</script>