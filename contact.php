<?php

// * IMPORTANT * Set your email information here
define('DESTINATION_EMAIL','tbennett@aii.edu');
define('MESSAGE_SUBJECT','form Demo');
define('REPLY_TO', 'tbennett@aii.edu');
define('FROM_ADDRESS', 'tbennett@aii.edu');
define('REDIRECT_URL', 'index.php');

require_once('inc/config.php');
require_once('inc/validation.php');

//get all content related to this page
  $sql = "SELECT * FROM site_content WHERE page_name='contact'";
  $myData = $db->query($sql);
  
  //create container for each piece of data
  while($row = $myData->fetch_assoc())
  {
	if($row['section_name'] === 'intro')
	{
		$intro = $row['content'];
	}
	elseif($row['section_name'] === 'blurb')
	{
		$blurb = $row['content'];
	}
	  
  }

mysqli_close($db);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Widgeco Widgets - Contact</title>
<link href="newsgothic/stylesheet.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css"><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="contact_page">

<div class="container">
  
  <?php include_once('inc/header.php'); ?>
    
    <?php require_once('inc/nav.php'); ?>
    
  <article class="content">
    <h1>Contact</h1>
    <section>
     <h2>How much do you love us?</h2>
      <p><?php echo $blurb; ?></p>
    </section>
    <section>
		<div class="errors">
		<ul>
			<?php 
			echo '<li>' . @$name_error . '</li>'; 
			echo '<li>' . @$email_error . '</li>'; 
			echo '<li>' . @$message_error . '</li>'; 
			?>
		</ul>
		</div>
		
      	<form id="myform" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<fieldset>
				<legend><h2>Contact Us</h2></legend>
				<ul>
				<li><label for="name">Name:</label>
				<input type="text" name="name" placeholder="type name here" class="required" />
				<br class="clearfloat"></li>
				
				<li><label for="email">Email:</label>
				<input type="text" name="email" placeholder="type email here" class="required email" />
				<br class="clearfloat"></li>
				
				<li><label for="message">Comments:</label>
				<textarea name="message" cols="30" rows="5" 
				placeholder="type comments here"></textarea><br class="clearfloat"></li>
				
				<li><label>&nbsp;</label>
					<a class="button large orange awesome submit">submit comments now »</a>
				<br class="clearfloat">
				</li>
				</ul>
			</fieldset>
		</form>
    </section>
   
    </section>
  <!-- end .content --></article>

  
  <?php include_once('inc/footer.php'); ?>
  
  <!-- end .container --></div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.0.min.js"><\/script>')</script>

<script src="js/jquery.validate.min.js"></script>
<script>
	$(document).ready(function(){
		var errors = $('.errors');
		$('#myform').validate({
			errorContainer: errors,
			errorLabelContainer: $("ul", errors),
			validClass: "success",
			wrapper: 'li',
			messages: {
				first_name: "Please enter your first name.",
				last_name: "Please enter your last name.",
				email:"Please enter a valid email address.",
			}
		});
		
		$('.submit').click(function(e){
			e.preventDefault();
			$('#myform').submit();
		});
	});
</script>
</body>
</html>
