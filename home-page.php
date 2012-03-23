<?php
/*Template Name: Home Page*/
?>
<?php get_header(); ?>

<div id="content">
	
	<div class="welcomeHolder">
    <div class="welcome">
    	 <?php dynamic_sidebar( 'homepage-welcome' ); ?>
         <div class="clear"></div>
    </div>
    <div class="welcomeBottom"></div>
    </div>

	<div class="heading">So, you like beer?</div>
    <div class="organic">
    	<div class="organicHolder">
        	<div class="organicContent">
               <?php dynamic_sidebar( 'homepage-row1col1' ); ?>
            </div>
        </div>
        
        <div class="organicHolder">
        	<div class="organicContent">
            	<?php dynamic_sidebar( 'homepage-row1col2' ); ?>
            </div>
        </div>
        
        <div class="organicHolder">
        	<div class="organicContent">
            	<?php dynamic_sidebar( 'homepage-row1col3' ); ?>
            </div>
        </div>
    </div>
   <!--
    <div class="space"></div>
    
     <div class="organic">
    	<div class="organicHolder">
        	<div class="organicContent">
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img05.jpg" alt="" />
                <h2>Header Four</h2>
                <p>Organic fruit and vegetables Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>
        </div>
        
        <div class="organicHolder">
        	<div class="organicContent">
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img06.jpg" alt="" />
                <h2>Header Five</h2>
                <p>Organic fruit and vegetables Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
            </div>
        </div>
        
        <div class="organicHolder">
        	<div class="vegetable">
            	<h3>Learn About Our Beer</h3>
            </div>
        </div>
    </div>-->
<div class="clear"></div>

<div class="hr"></div>
<div class="space"></div>

<?php get_footer(); ?>