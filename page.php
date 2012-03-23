<?php get_header(); ?>

<div id="content">
    
    <div class="welcomeHolder">
    <div class="welcome">
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
        
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
             <?php the_content(__( 'Read more','organicfarm' )); ?>
            <?php /* Edit Link */ // edit_post_link(); ?>
            <!--
            <footer class="post-meta">
                <p>
                    <?php //_e( 'In ','organicfarm'); ?><?php the_category(', '); ?>
                    <?php //_e( 'by ','organicfarm'); ?> <span class="author vcard"><?php the_author_posts_link(); ?></span>
                    <?php //if ($organicfarm_settings['fuzzy_timestamps'] == 0) { _e( 'on ','organicfarm'); } ?> <time datetime="<?php the_time('Y-m-d\TH:i:sO'); ?>" class="timeago" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time><?php if (get_the_modified_time() != get_the_time()) { ?>, updated <time datetime="<?php the_modified_time('Y-m-d\TH:i:sO'); ?>"><?php the_modified_date(); ?></time><?php } ?>
                    <?php // wp_link_pages( array( 'before' => __( '<span class="alignright">Pages:', 'organicfarm' ), 'after' => '</span>' ) ); ?>
                </p>
                
            </footer>--> <!-- end post meta -->
            <!-- <article class="comments">
                <?php //comments_template(); ?>
            </article>-->
        </article> <!-- end post 1 -->
    <?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.','organicfarm' ); ?></p>
    <?php endif; ?>
         <div class="clear"></div>
    </div>
    <div class="welcomeBottom"></div>
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