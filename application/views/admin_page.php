<!DOCTYPE html>
<html lang="en">
	<meta charset="utf-8">
	<title>ZWSQCMS</title>
	<link href="<?php echo base_url();?>static/css/bootstrap.css" rel="stylesheet" media="screen" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>static/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>static/js/bootstrap.js"></script>
    <script charset="utf-8" src="<?php echo base_url()?>extension/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="<?php echo base_url()?>extension/kindeditor/lang/en.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url()?>extension/My97DatePicker/WdatePicker.js"></script>

<body>
<!--Header Start-->
<div id="header" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url();?>admin">ZWSQ CMS</a>
			</div>
            <div class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">
                    <li class="active"><img src="<?php echo base_url();?>static/img/1.png" style="border:2px solid #ffffff; width:50px;height:50px;" alt="..." class="img-circle"></li>
                    <li><a href="<?php echo base_url();?>admin/logout">Sign Out</a></li>
                </ul>
            </div>
		</div>
	</div>
</div>
<!--Header End-->
<!--Center Start-->
<div id="center">
	<div style="height:80px;"></div>
    <div id="center_left" class="col-xs-2 col-sm-2 sidebar-offcanvas pull-left in">
		<div class="list-group" style="text-align:center">
			<a href="<?php echo base_url();?>admin" class="list-group-item"><b>Control Pannel</b></a>
            <a id="cv" class="list-group-item" onClick="change('cv');"><button type="button" class="btn btn-info form-control">My CV</button></a>
            <a id="cl" class="list-group-item" onClick="change('cl');"><button type="button" class="btn btn-info form-control">Cover Letter</button></a>
            <a id="profile" class="list-group-item" onClick="change('profile');"><button type="button" class="btn btn-info form-control">My Profile</button></a>
            <a id="application" class="list-group-item" onClick="change('application');"><button type="button" class="btn btn-info form-control">My Application</button></a>
		</div>
    </div>
    <div id="center_right" class="pull-left fade in" style="min-height:500px;">
    <?php
		if(isset($msg))
		{
			echo "<h2 class='text-shadows'>Message:</h2><br />";
			echo "<label class='help-block'><b>".$msg."</b></label>";	
		}
		else if(isset($function) && $function == "new_cl")
		{
			$this->load->view('create_cl');	
		}
		else if(isset($function) && $function == "edit_cl")
		{
			$this->load->view('create_cl');	
		}
		else if(isset($function) && $function == "send_application")
		{
			$this->load->view('send_application');	
		}
		else
		{
			echo "<div id='dashboard'>";
			echo "<div>";
			echo "<select class='form-control' style='width:150px;' onchange='change_report(this.value);'>
					<option value='month'>Monthly Report</option>
					<option value='week'>Weekly Report</option>
				</select>";
			echo "<iframe id='sent_application_frame' class='fade in' src='".base_url()."pa/count_sent_application/month' style='width:1000px; height:220px;border:0px;text-align:left;'></iframe>";
			echo "</div><br />";
			echo "<div class='pull-left'>";
			echo "<select class='form-control' style='width:220px;'>
					<option value='month'>Application Status Report</option>
				</select>";
			echo "<iframe src='".base_url()."pa/count_application_status/status' style='width:500px; height:300px;border:0px;text-align:left;'></iframe>";
			echo "</div>";
			echo "<div class='pull-left'>";
			echo "<select class='form-control' style='width:220px;'>
					<option value='month'>Position Source Report</option>
				</select>";
			echo "<iframe src='".base_url()."pa/count_application_status/source' style='width:600px; height:300px;border:0px;text-align:left;'></iframe>";
			echo "</div></div>";
		}
	?>

    </div>
</div>
<!--Center End-->
<div style="clear:both;"></div>
<!--Footer Start-->
<div id="footer" class="" style="text-align:center;">
	<div style="height:50px;"></div>
	<p>Copyright:2013</p>
</div>
<!--Footer End-->
<script>
	function load_dashboard()
	{
		htmlobj=$.ajax({url:"<?php echo base_url();?>pa/count_sent_application",async:false});
		//alert("aaa");
		$("#dashboard").load("<?php echo base_url();?>pa/count_sent_application");
	}
	//load_dashboard();
	function init_editor(){
		var editor;
		KindEditor.ready(function(K) {
		editor = K.create('textarea[name="body"]', {
			cssPath : '<?php echo base_url();?>extension/kindeditor/themes/simple/simple.css',
			filterMode : true,
			resizeType : 2,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			items : [
					'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
					'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
					'insertunorderedlist', '|', 'emoticons', 'image', 'link']
			});
		});	
	}
	init_editor();
	function change(value)
	{
		$('.list-group-item').removeClass("active");
		$('#'+value).addClass("active");
		$("#center_right").fadeOut("slow");
		htmlobj=$.ajax({url:"<?php echo base_url();?>admin/"+value,async:false});
		$("#center_right").html(htmlobj.responseText);
		//$("#center_right").load("<?php echo base_url();?>admin/"+value);
		$("#center_right").fadeIn("slow");
	}
	function change_report(value)
	{
		$("#sent_application_frame").attr("src","<?php echo base_url();?>pa/count_sent_application/"+value);	
	}
</script>
</body>
</html>