<div>
	<button class="btn btn-xs" onClick="show('add_new');">Upload CV</button>
<br /><br />
</div>
<div class="box-shadows collapse text-shadows" id="add_new" style="background:#ffffff;position:absolute;top:80px;left:305px;width:600px;height:auto;padding:10px;text-align:center;">
	<form method="post" action="<?php echo base_url();?>cv/upload_cv" enctype="multipart/form-data">
    	<h2>Upload New CV</h2>
        <br />
        <input type="text" id="title" name="title" class="form-control" placeholder="CV Name" />
        <br />
		<label for="userfile">Select File</label>
		<input type="file" id="userfile" name="userfile">
		<p class="help-block">Pdf or Doc file is accepted.</p>
        <br />
        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Submit" />
    </form>
</div>
<?php
	if(isset($cv_list))
	{ ?>
	<table class="table table-striped" style="width:1000px;">
    <tr class="active">
    	<td><a href="<?php echo base_url();?>admin_info?orderby=id"><b>ID</b></a></td>
    	<td><a href="<?php echo base_url();?>admin_info?orderby=provider"><b>Title</b></a></td>
        <td><b>Address</b></td>
        <td><b>Action</b></td>
    </tr>
    <?php 
		foreach($cv_list as $row) {?>
		<tr>
        	<td><?php echo $row['id'];?></td>
            <td><?php echo $row['cv_title'];?></td>
            <td><?php echo $row['cv_address'];?></td>
            <td><button id="delete" class="btn btn-default btn-xs" onclick="confirm(<?php echo $row['id'];?>);">Delete</button></td>
    	</tr>
        <?php }?>
    </table>
<?php }
?>
<div id="confirm" class="container box-shadows" style="position:absolute;top:40%;left:40%;width:300px;height:150px;text-align:center;display:none;background:#ffffff;">
    	<h2>Delete Confirmation</h2>
        <p>Do you want to delete this CV?</p>
        <button id="yes" class="btn btn-default btn-xs">Yes</button>&nbsp;<button id="no" class="btn btn-default btn-xs">No</button>
</div>
<script>
	function show(id)
	{
		if($("#"+id).is(":hidden"))
		{
			$("#"+id).fadeIn(600);	
			return false;
		}	
		if(!$("#"+id).is(":hidden"))
		{
			$("#"+id).fadeOut(600);	
			return false;	
		}	
	}
	function confirm(id)
	{
		$("#confirm").fadeIn(600);	
		$("#no").click(function(){
			$("#confirm").fadeOut();
			});	
		$("#yes").click(function(){
			htmlobj=$.ajax({url:"<?php echo base_url();?>cv/delete_cv/"+id,async:false});
  			//$("#center_right").html(htmlobj.responseText);
			if(htmlobj.responseText==1)
			{
				$("#center_right").load("<?php echo base_url();?>admin/cv");	
			}
			});
	}
</script>