<?php
require_once('inc/config.php');

//get all content related to this page (home)
  $sql = "SELECT * FROM site_content WHERE page_name='about'";
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
    <h1>About</h1>
    <section>
     <h2>How to use this document</h2>
      <p><?php echo $intro; ?></p>
    </section>
    <section>
      <h2>About Our Widgets</h2>
      <p><?php echo $blurb; ?></p>
    </section>
    <section>
      <h2>Our Special Sauce</h2>
      
      
      <?php
	  	
		//loop through $items and build div for each
		for($i = 0; $i < count($items); $i++)
		{
			echo '<div class="widget">';
			echo $items[$i];
			echo '</div>';
		}
	  
	  ?>
      
    </section>
  <!-- end .content --></article>

  
  <?php include_once('inc/footer.php'); ?>
  
  <!-- end .container --></div>
</body>
</html>
