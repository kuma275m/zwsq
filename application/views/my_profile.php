<div>
	<button class="btn btn-xs" data-toggle="modal" data-target="#change_password">Change Password</button>
<br /><br />
</div>
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
	<form method="post" action="<?php echo base_url();?>admin/change_password" enctype="multipart/form-data" onsubmit="return checkinput(this)">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
		<input type="password" id="password" name="password" class="form-control" placeholder="New Password" />
        <br />
		<input type="password" id="re_password" name="re_password" class="form-control" placeholder="Confirm Password" />
        <label id="message" class="help-block"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Submit" />
      </div>
          </form>
    </div>
  </div>
</div>

<div>
	<div class="panel panel-default pull-left" style="margin-right:10px;">
		<div class="panel-heading">
			<b class="panel-title">CVs</b>
		</div>
		<div class="panel-body">
			<?php 
				if(isset($cv_num))
				{
					echo "Total: <b>".$cv_num."</b>";	
				}
			?>
		</div>
	</div>
	<div class="panel panel-default pull-left" style="margin-right:10px;">
		<div class="panel-heading">
			<b class="panel-title">Cover Letters</b>
		</div>
		<div class="panel-body">
			<?php 
				if(isset($cl_num))
				{
					echo "Total: <b>".$cl_num."</b>";	
				}
			?>
		</div>
	</div>
	<div class="panel panel-default pull-left" style="margin-right:10px;">
		<div class="panel-heading">
			<b class="panel-title">Applications</b>
		</div>
		<div class="panel-body">
			<?php 
				if(isset($pa_num))
				{
					echo "Total: <b>".$pa_num."</b><br />";
					echo "Open Applications: <b>".$pa_open_num."</b><br />";
					echo "Close Applications: <b>".$pa_close_num."</b><br />";	
				}
			?>
		</div>
	</div>
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
	function checkinput(form)
	{
           if($.trim(form.password.value)==""){
               $('#message').html("Please input password.");
               form.password.focus();
               return false;
           } 
		   if($.trim(form.re_password.value)==""){
               $('#message').html("Please confirm your password.");
               form.re_password.focus();
               return false;
           }
           if($.trim(form.password.value)!=$.trim(form.re_password.value)){
               $('#message').html("The password and confirm password you input are not matched.");
               form.password.focus();
               return false;
           } 		   
           return true;
       }
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