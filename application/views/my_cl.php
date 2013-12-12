<div>
    <a href="<?php echo base_url();?>cl/new_cover_letter" class="btn btn-xs"><button class="btn btn-xs">New Cover Letter</button></a>
<br /><br />
</div>
<?php
	if(isset($cl_list))
	{ ?>
	<table class="table table-striped" style="width:1000px;">
    <tr class="active">
    	<td><a href="<?php echo base_url();?>admin_info?orderby=id"><b>ID</b></a></td>
    	<td><a href="<?php echo base_url();?>admin_info?orderby=provider"><b>Title</b></a></td>
        <td><b>Modify Date</b></td>
        <td><b>Action</b></td>
    </tr>
    <?php 
		foreach($cl_list as $row) {?>
		<tr>
        	<td><?php echo $row['id'];?></td>
            <td><?php echo $row['cl_title'];?></td>
            <td><?php echo $row['cl_date'];?></td>
            <td>
            	<button id="delete" class="btn btn-default btn-xs" onclick="confirm(<?php echo $row['id'];?>);">Delete</button>
                <a href="<?php echo base_url();?>cl/edit_cl/<?php echo $row['id'];?>"><button id="edit" class="btn btn-default btn-xs">Edit</button></a>
            </td>
    	</tr>
        <?php }?>
    </table>
<?php }
?>
<div id="confirm" class="container box-shadows" style="position:absolute;top:40%;left:40%;width:300px;height:150px;text-align:center;display:none;background:#ffffff;">
    	<h2>Delete Confirmation</h2>
        <p>Do you want to delete this CV?</p>
        <button id="yes" class="btn btn-danger btn-xs">Yes</button>&nbsp;<button id="no" class="btn btn-danger btn-xs">No</button>
</div>
<script>
	function confirm(id)
	{
		$("#confirm").fadeIn(600);	
		$("#no").click(function(){
			$("#confirm").fadeOut();
			});	
		$("#yes").click(function(){
			htmlobj=$.ajax({url:"<?php echo base_url();?>cl/delete_cl/"+id,async:false});
  			//$("#center_right").html(htmlobj.responseText);
			if(htmlobj.responseText==1)
			{
				$("#center_right").load("<?php echo base_url();?>admin/cl");	
			}
			});
	}



	
</script>