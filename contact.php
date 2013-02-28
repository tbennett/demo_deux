<?php

//get all content related to this page (home)
  $sql = "SELECT * FROM site_content WHERE page_name='home'";
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

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
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
     <h2>How to use this document</h2>
      <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts, read this article at Adobe's Developer Center - <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
    </section>
    <section>
      	<form>
			<fieldset>
				<legend><h2>Contact Us</h2></legend>
				<ul>
				<li><label for="name">Name:</label>
				<input type="text" name="name" placeholder="type name here" /><br class="clearfloat"></li>
				
				<li><label for="email">Email:</label>
				<input type="text" name="email" placeholder="type email here" /><br class="clearfloat"></li>
				
				<li><label for="comments">Comments:</label>
				<textarea name="comments" id="comments" cols="30" rows="5" 
				placeholder="type comments here"></textarea><br class="clearfloat"></li>
				</ul>
			</fieldset>
		</form>
    </section>
   
    </section>
  <!-- end .content --></article>

  
  <?php include_once('inc/footer.php'); ?>
  
  <!-- end .container --></div>
</body>
</html>
