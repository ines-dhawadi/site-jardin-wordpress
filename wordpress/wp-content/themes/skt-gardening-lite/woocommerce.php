<?php
/**
 * The template for displaying Woocommerce products in SKT Gardening Lite
 *
 * @package SKT Gardening Lite
 */
get_header(); 
?>
<div class="container">
    		<div class="page_content">
			<?php woocommerce_content(); ?>
		   </div><!-- page_content-->
    </div><!-- content -->     
<?php get_footer(); ?>