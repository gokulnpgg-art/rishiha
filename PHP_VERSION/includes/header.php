<?php
require_once 'functions.php';
require_once 'database.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Web Based College Complaint System</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Real Site Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->

<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

<style type="text/css">
    .style1 {
        width: 100%;
    }
    .style2 {
        width: 163px;
    }
    .style3 {
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
        color: #FFFFFF;
    }
    .style4 {
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
        color: #FFFFFF;
        width: 371px;
    }
    .style6 {
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
        color: #FFFFFF;
        width: 317px;
    }
    .style7 {
        width: 187px;
    }
    .alert {
        margin: 15px 0;
        padding: 15px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
    .alert-info {
        color: #31708f;
        background-color: #d9edf7;
        border-color: #bce8f1;
    }
    .badge {
        display: inline-block;
        padding: 0.25em 0.6em;
        font-size: 0.75em;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
        color: #fff;
    }
    .badge-primary { background-color: #007bff; }
    .badge-success { background-color: #28a745; }
    .badge-danger { background-color: #dc3545; }
    .badge-warning { background-color: #ffc107; color: #212529; }
    .badge-info { background-color: #17a2b8; }
    .badge-secondary { background-color: #6c757d; }
    .badge-light { background-color: #f8f9fa; color: #212529; }
    .badge-orange { background-color: #fd7e14; }
</style>

</head>
<body>

<!-- navigation -->
<div class="header w3ls">
	<div class="container">
		<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header logo">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<h1>Web Based College Complaint System</h1>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
							<nav class="cl-effect-1">
								<ul class="nav navbar-nav ">
								</ul>
							</nav>
						</div><!-- /navbar-collapse -->
		</nav>
	</div>
</div>
<!-- //navigation -->

<!-- header -->
<!-- //header -->

<div class="newsletter agile" style="padding-top: 10px;">
	<div class="container">
		<div class="sub">
			<!-- Display flash messages -->
			<?php echo displayFlashMessage(); ?>
			
			<!-- Content will be inserted here -->
