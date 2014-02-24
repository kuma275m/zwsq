<div>
    <button class="btn btn-xs" data-toggle="modal" data-target="#add_new" >Create New Cover Letter</button>
<br /><br />
</div>
<div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog"  style="width:800px;">
    <div class="modal-content">
          <form method="post" action="<?php echo base_url();?>cl/<?php if(isset($cl)){echo $cl['route']."/".$cl[0]['id'];}else{echo "create_cl";}?>" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create Cover Letter</h4>
      </div>
      <div class="modal-body">
        <input type="text" id="title" name="title" class="form-control" placeholder="Cover Letter Title" <?php if(isset($cl)) {echo "value='".$cl[0]['cl_title']."'";} ?> />
        <br />
		<textarea name="body" style="width:100%;height:400px;padding:10px;" placeholder="Cover Letter Content">
        <?php if(isset($cl)) echo $cl[0]['cl_body']?>
        </textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Submit" />
      <script>
	  init_editor();
	  </script>
      </div>
      </form>
    </div>
  </div>
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