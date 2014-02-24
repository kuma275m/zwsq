<!DOCTYPE html>
<html lang="en">
	<meta charset="utf-8">
	<title>ZWSQCMS</title>
	<link href="<?php echo base_url();?>static/css/bootstrap.css" rel="stylesheet" media="screen" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>static/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>static/js/bootstrap.js"></script>
<body>
  <!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->
  <!-- Indicators -->
  <!--<ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>-->

  <!-- Wrapper for slides -->
  <!--<div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo base_url();?>/static/img/slide1.jpg" style="width:100%;" alt="First slide">
      <div class="carousel-caption">
       <h3>The first Slide</h3>
      <p>...</p>
      </div>
    </div>
   <div class="item">
      <img src="<?php echo base_url();?>/static/img/slide2.jpg" style="width:100%;" alt="Second slide">
      <div class="carousel-caption">
       <h3>The Second Slide</h3>
      <p>...</p>
      </div>
    </div>
   <div class="item">
      <img src="<?php echo base_url();?>/static/img/slide3.png" style="width:100%;" alt="Second slide">
      <div class="carousel-caption">
       <h3>The Second Slide</h3>
      <p>...</p>
      </div>
    </div>
  </div>-->

  <!-- Controls -->
  <!--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>-->
<div style="width:400px;height:auto;border:1px solid #000000;padding:15px;margin:0 auto;margin-top:5%;text-align:center;" class="box-shadows">
        <h2>ZWQS-CMS</h2>
        <label id='message' class='help-block'>
            <?php
                if(isset($message))
                {
                    echo $message;	
                }
            ?>
        </label>
        <form action="<?php echo base_url()."welcome/login" ?>" method="post" autocomplete="off" accept-charset="utf-8" id="search" onsubmit="return checklogin(this)">
            <input type="text" id="username" name="username" class="form-control" maxlength="20" placeholder="Username" /><br />
            <input type="password" id="password" name="password" class="form-control" maxlength="20" placeholder="Password" /><br />
            <input type="submit" id="login" name="login" class="btn btn-default btn-lg" value="Login" />
        </form>
</div>
<script>
       function checklogin(form){
           if($.trim(form.username.value)==""){
               $('#message').html("Please input username.");
               form.username.focus();
               return false;
           } 
           if($.trim(form.password.value)==""){
               $('#message').html("Please input password.");
               form.password.focus();
               return false;
           } 		   
           return true;
       }
</script>
</body>
</html>