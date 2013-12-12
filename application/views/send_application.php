<div class="box-shadows" id="add_new" style="background:#ffffff;width:1000px;height:auto;padding:10px;text-align:left;">
	<form method="post" action="<?php echo base_url();?>pa/send_application" enctype="multipart/form-data">
    	<h2 class="text-shadows">Send Application</h2>
        <br />
        <label class='help-block'>Position Source: </label>
			<select id='source' name='source' class='form-control'>
				<option value='Aarresaari'>Aarresaari</option>
				<option value='Mol'>Mol</option>
				<option value='LinkedIn'>LinkedIn</option>
			</select>
        <br />
        <label class='help-block'>Target Company: </label>
        <input type="text" id="company" name="company" class="form-control" placeholder="Target Company" />
        <br /> 
        <label class='help-block'>Company Email Address: </label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Company Email Address" />
        <br />
        <label class='help-block'>Application Title: </label>
        <input type="text" id="title" name="title" class="form-control" placeholder="Application Title" />
        <br />
        <label class='help-block'>Select CV: </label>
			<select id='cv' name='cv' class='form-control'>
            	<option value="empty"></option>
            <?php
            	if(isset($cv_list))
				{
					foreach($cv_list as $row)
					{
						echo "<option value='".$row['id']."'>".$row['cv_title']."</option>";	
					}	
				}
			?>
			</select>
        <br />
        <label class='help-block'>Cover Letter Template: </label>
			<select id='cl' name='cl' class='form-control' onchange="get_cl_body(this.value);">
            	<option value="empty"></option>
            <?php
            	if(isset($cl_list))
				{
					foreach($cl_list as $row)
					{
						echo "<option value='".$row['id']."'>".$row['cl_title']."</option>";	
					}	
				}
			?>
			</select>
        <br />
        <div id="textarea">
		<textarea id="cl_body" name="body" style="width:980px;height:400px;padding:10px;" placeholder="Cover Letter Content">
        </textarea></div>
        <br />
        <label class="help-block">Save cover letter as new template:</label>
        <input type="text" id="cl_name" name="cl_name" class="form-control" placeholder="Template Title">
        <br />
        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Submit" />
    </form>
</div>
<script>

	function get_cl_body(value)
	{
		if(value!="empty")
		{
			htmlobj=$.ajax({url:"<?php echo base_url();?>cl/get_cl_body/"+value,async:false});
			new_body=htmlobj.responseText;
			html="<textarea id='cl_body' name='body' style='width:980px;height:400px;padding:10px;'>"+htmlobj.responseText+"</textarea>";	
			$('#textarea').html(html);
			init_editor();
		}
		else
		{
			html="<textarea id='cl_body' name='body' style='width:980px;height:400px;padding:10px;'></textarea>";	
			$('#textarea').html(html);
			init_editor();
		}
	}
</script>