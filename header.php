
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.fullPage.css" />
        <link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url'); ?>"/>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//use.typekit.net/jzb3oiu.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class()?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
      <header class="header center">
      <div class="topbar <?php if(is_home()){ echo 'home';}?>">
				<div class="block">
					<a href="<?php echo get_option('home'); ?>" class="logo-small"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_pressed_small_white.png" alt="Pressed.net"></a>
				<!--<nav class="menu">
					<ul>
						<li><a href="http://localhost:8888/pressedwp/about/">ABOUT US</a></li>
						<li><a href="">ARTICLES</a></li>
						<li><a href="">BLOG</a></li>
						<li><a href="">CONTACT</a></li>
						<li><a href="" class="login">LOGIN</a></li>
						<li><a href="" class="signup">SIGN UP</a></li>
					</ul>

				</nav> -->
				<?php main_nav('top-menu');?>
				</div>
			</div>
			</header>
   		<?php if(is_home()){?>
        <div id="fullpage">
            <div class="section active center" id="first-screen">
                <div class="block">
                    <h1 class=" logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="Pressed - Launch your own Managed WordPress hosting brand!"></h1>
                    <div class="separator"></div>
                    <h2>Launch your own Managed WordPress hosting brand!</h2>
                    <p>Pressed. The easiest way to launch your own white-labeled, fully managed, WordPress hosting brand, and you don't have to manage a single server or even handle customer support.</p>
                    <br>
                </div>

            </div>
         <?php } ?>