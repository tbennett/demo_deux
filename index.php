<?php

	require_once('inc/config.php');
	
	
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
<title>Widgeco Widgets - HOME</title>
<link href="newsgothic/stylesheet.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css"><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="home_page">

<div class="container">

<?php include_once('inc/header.php'); ?>

  
 
<?php require_once('inc/nav.php'); ?>    

  <article class="content">
    <h1>Home</h1>
    <section>
     <h2>Welcome to Widgco Widgets</h2>
     
      <p>
      	<?php echo $intro; ?>
      </p>
    </section>
    
    <section>
      <h2>What we do...</h2>
      <p>
		<?php echo $blurb; ?>
	</p>
    </section>

    
  <!-- end .content --></article>
  
<?php include_once('inc/footer.php'); ?>

  <!-- end .container --></div>
</body>
</html>
