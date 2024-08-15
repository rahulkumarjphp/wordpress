<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>

<meta name="description" content="">

<meta name="keywords" content="">

<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.html">

<!-- Bootstrap -->
<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/css/font-awesome.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/rs-plugin/css/settings.css">
<link href="<?php bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/magnific-popup.css">
<?php wp_head(); ?> 
</head>
<body>

<div class="header-wrap">
 
   <div class="containere">
	     <div class="navWrap">
      <div class="navigationwrape">
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              
               
               <?php echo get_field('menu');  ?>
               
               
               
            </ul>
          </div>
           
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
   </div>
  
  <div class="container">
	  
	
	  
    <div class="headerWrp">
      <div class="row">
        <div class="col-lg-5 col-md-3">
          <a href=""> <a href=""> <div class="logo"><img alt="" src="<?php bloginfo('template_directory'); ?>/images/logo.png"></div> </a> </a>
        </div>
        <div class="col-lg-7 col-md-9">
          <div class="adressWrp">
            <ul class="row">
              <li class="col-md-5 col-sm-5 col-xs-6">
                <div class="headerInfo">Email<span><a href="mailto:xyz@gmail.com">xyz@gmail.com</a></span></div>
              </li>
              <li class="col-md-4 col-sm-4 col-xs-6">
                <div class="headerInfo phone">Mobile<span> <a href="tel:+91-8800277535"><strong>+91-8800277535</strong></a> </span></div>
              </li>
               
            </ul>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!--Header End--> 
