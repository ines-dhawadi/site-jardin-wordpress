<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Gardening Lite
 */
get_header();

$hideslide = get_theme_mod('hide_slides', 1);
$hide_pagethreeboxes = get_theme_mod('hide_pagethreeboxes', 1);
$secwithcontent = get_theme_mod('hide_home_secwith_content', 1);

if (!is_home() && is_front_page()) { 
if( $hideslide == '') { 
$pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod;
    }	
} 
if( !empty($pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $skt_gardening_lite_slideno[] = $i;
          $skt_gardening_lite_slidetitle[] = get_the_title();
		  $skt_gardening_lite_slidedesc[] = get_the_excerpt();
          $skt_gardening_lite_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $skt_gardening_lite_slideno as $skt_gardening_lite_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $skt_gardening_lite_sln ); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo esc_html($skt_gardening_lite_slidetitle[$k] ); ?></h2>
        <p><?php echo esc_html($skt_gardening_lite_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="slide_more" href="<?php echo esc_url($skt_gardening_lite_slidelink[$k] ); ?>">
          <?php esc_html_e('Read More', 'skt-gardening-lite');?>
          </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } ?>
<?php if (!is_home() && is_front_page()) {
	  if( $hide_pagethreeboxes == '') { ?>
<section id="pagearea">
  <div class="container">   
      <?php for($p=1; $p<4; $p++) { 
	  		if( get_theme_mod('page-column'.$p,false)) { 
			$querypagethreeboxes = new WP_query('page_id='.get_theme_mod('page-column'.$p,true)); 
			while( $querypagethreeboxes->have_posts() ) : $querypagethreeboxes->the_post(); ?>
      <div class="threebox <?php if($p % 3 == 0) { echo "last_column"; } ?>">
     	<a href="<?php echo esc_url( get_permalink() ); ?>">
		 <?php if( has_post_thumbnail() ) { ?>
			<div class="thumbbx"><?php the_post_thumbnail();?></div>
          <?php } ?>  
            <h3><?php the_title(); ?></h3>
        </a> 
		<?php the_excerpt(); ?>
        <a class="ReadMore" href="<?php the_permalink(); ?>">
          <?php esc_html_e('Read More', 'skt-gardening-lite');?>
          </a>
      </div>
      <?php endwhile;
       wp_reset_postdata(); 
	   }} ?>
      <div class="clear"></div> 
  </div><!-- container -->
</section><!-- #pagearea -->
<div class="clear"></div>
<?php } } 
	if(!is_home() && is_front_page()){ 
	if( $secwithcontent == '') {
?>
 <section id="sec1section">
 	<div class="container">
    <div class="home_section2_content">
            <div class="columns-row"> 
            <?php if( get_theme_mod('sec-column1', false)) { 
				  $seccolbox = new WP_query('page_id='.get_theme_mod('sec-column1',true));
				  while( $seccolbox->have_posts() ) : $seccolbox->the_post(); ?>            
			<div class="col-columns-full"> 
            <div class="fancy-desc"><?php the_content(); ?></div>
	        <?php endwhile; } ?>       
            </div>  	
            <div class="clear"></div></div>
            </div>
    </div>
 </section>
<?php }} ?>
<div class="container">
     <div class="page_content">
      <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-gardening-lite' ),
							'next_text' => esc_html__( 'Next', 'skt-gardening-lite' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
} else {
    ?>
	<section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
							 ?>
                             <header class="entry-header">           
            				<h1><?php the_title(); ?></h1>
                    		</header>
                             <?php
                            the_content();
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-gardening-lite' ),
							'next_text' => esc_html__( 'Next', 'skt-gardening-lite' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
	<?php
}	
	get_sidebar(); ?>
    <div class="clear"></div>
  </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>