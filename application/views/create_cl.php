<div class="box-shadows text-shadows" id="add_new" style="background:#ffffff;width:1000px;height:auto;padding:10px;text-align:center;">
	<form method="post" action="<?php echo base_url();?>cl/<?php if(isset($cl)){echo $cl['route']."/".$cl[0]['id'];}else{echo "create_cl";}?>" enctype="multipart/form-data">
    	<h2>Create Cover Letter</h2>
        <br /> 
        <input type="text" id="title" name="title" class="form-control" placeholder="Cover Letter Title" <?php if(isset($cl)) {echo "value='".$cl[0]['cl_title']."'";} ?> />
        <br />
		<textarea name="body" style="width:980px;height:400px;padding:10px;" placeholder="Cover Letter Content">
        <?php if(isset($cl)) echo $cl[0]['cl_body']?>
        </textarea>
        <br /><br />
        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Submit" />
    </form>
</div>