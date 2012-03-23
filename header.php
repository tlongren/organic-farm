<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); ?></title>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

<!--[if lte IE 6]>
	<script type="text/javascript" src="supersleight-min.js"></script>
    <link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<?php wp_head(); ?>
<?php if ( !empty($organicfarm_settings['custom_css']) ) { ?><style type="text/css"><?php echo $organicfarm_settings['custom_css']; ?></style><?php } ?>
</head>

<body <?php body_class(); ?>>
<div id="main"><!-- Main starts here -->
<div id="header"><!-- Header starts here -->
    <!--
	<div class="searchBar">
        <div class="search">
        	<div class="txt"><input type="text" /></div>
            <div class="searchBt"><input type="button" value="search" /></div>
        </div>
    	<div class="signIn">sign in</div>
    </div>
    -->
    <div class="logo">
    	<p><a href="#"><?php bloginfo('name'); ?></a></p>
    </div>
    
    <div class="menu">
    	<?php wp_nav_menu( array( 'menu' => 'top-menu', 'container' => 'false', 'menu_id' => 'tabs' ) ); ?>
    </div>
    <!--
    <div class="subs">
    	<p>SUBCRIBE to RSS</p><img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/rss.png" alt="" />
    </div> -->
</div><!-- Header ends here -->

<div class="clear"></div>