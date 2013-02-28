<?php
require_once('inc/config.php');
require_once('inc/validation.php');


	// * IMPORTANT * Set your email information here
	define('DESTINATION_EMAIL','tbennett@aii.edu');
	define('MESSAGE_SUBJECT','form Demo');
	define('REPLY_TO', 'tbennett@aii.edu');
	define('FROM_ADDRESS', 'tbennett@aii.edu');
	define('REDIRECT_URL', 'http://atlantainteractivedesign.com/tbennett/2013/demo_deux/');
	


//get all content related to this page
  $sql = "SELECT * FROM site_content WHERE page_name='contact'";
  $myData = $db->query($sql);
  
  $items = array();
  
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
	elseif($row['section_name'] === 'widgets')
	{
		$items[] = $row['content'];
	}
	  
  }

mysqli_close($db);

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="newsgothic/stylesheet.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="about_page">

<div class="container">
  
  <?php include_once('inc/header.php'); ?>
   
   <?php require_once('inc/nav.php'); ?>
   

  <article class="content">
    <h1>Contact</h1>
    <section>
     <h2>How to use this document</h2>
      <p><?php echo $intro; ?></p>
    </section>
    
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<p>
				<label for="name">Name:</label><?php echo @$name_error; ?>
				<input type="text" id="name" name="name" value="<?php echo @$name ?>" class="required" />
			</p>
			<p>
				<label for="email">Email:</label><?php echo @$email_error; ?>
				<input type="text" id="email" name="email" value="<?php echo @$email ?>" class="email required" />
			</p>
			<p>
				<label for="message">Message:</label><?php echo @$message_error; ?>
				<textarea cols="45" rows="7" id="message" name="message" class="required"><?php echo @$message ?></textarea>
			</p>
			<input name="submitted" type="submit" value="Send" />
		</fieldset>
	</form>

      
      
    </article>  
 
  <!-- end .content --></article>

  
  <?php include_once('inc/footer.php'); ?>
  
  <!-- end .container --></div>
</body>
</html>
