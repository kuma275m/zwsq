<div>
	<button class="btn btn-xs" onClick="show('change_password');">Change Password</button>
<br /><br />
</div>
<div class="box-shadows collapse text-shadows" id="change_password" style="background:#ffffff;position:absolute;top:80px;left:350px;width:600px;height:auto;padding:10px;text-align:center;">
	<form method="post" action="<?php echo base_url();?>admin/change_password" enctype="multipart/form-data" onsubmit="return checkinput(this)">
    	<h2>Change Password</h2>
        <br />
        <input type="password" id="password" name="password" class="form-control" placeholder="New Password" />
        <br />
		<input type="password" id="re_password" name="re_password" class="form-control" placeholder="Confirm Password" />
        <br />
        <label id="message" class="help-block"></label>
        <br />
        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Submit" />
    </form>
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
					echo "Total: <b>".$pa_num."</b>";	
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