<?php
require_once('inc/config.php');

//get all content related to this page (home)
  $sql = "SELECT * FROM site_content WHERE page_name='about'";
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
      <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts, read this article at Adobe's Developer Center - <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
    </section>
    <section>
      <h2>About Our Widgets</h2>
      <p>Because all the columns are floated, this layout uses a clear:both declaration in the footer rule.  This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If your design requires you to remove the footer from the .container, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect. </p>
    </section>
    <section>
      <h2>Our Special Sauce</h2>
      <p>An image placeholder was used in this layout in the header where you'll likely want to place  a logo. It is recommended that you remove the placeholder and replace it with your own linked logo. </p>
      <p> Be aware that if you use the Property inspector to navigate to your logo image using the SRC field (instead of removing and replacing the placeholder), you should remove the inline background and display properties. These inline styles are only used to make the logo placeholder show up in browsers for demonstration purposes. </p>

      <p>To remove the inline styles, make sure your CSS Styles panel is set to Current. Select the image, and in the Properties pane of the CSS Styles panel, right click and delete the display and background properties. (Of course, you can always go directly into the code and delete the inline styles from the image or placeholder there.)</p>
    </section>
  <!-- end .content --></article>

  
  <?php include_once('inc/footer.php'); ?>
  
  <!-- end .container --></div>
</body>
</html>
