<?php
//about theme info
add_action( 'admin_menu', 'skt_gardening_lite_abouttheme' );
function skt_gardening_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-gardening-lite'), esc_html__('About Theme', 'skt-gardening-lite'), 'edit_theme_options', 'skt_gardening_lite_guide', 'skt_gardening_lite_mostrar_guide');   
} 
//guidline for about theme
function skt_gardening_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'skt-gardening-lite'); ?>
		   </div>
          <p><?php esc_html_e('SKT Gardening Lite is a green theme with focus on nature, eco friendly, herbal, organic, natural, fresh, farm produce, solar energy, landscaping, conservation, environment, agriculture, renewable, recycling, plantation, garden, flowers and trees type of websites like nursery. Ecology, forest, water bodies, earth, bio produce, animal husbandry. Non profit organizations NGOs, charity, nature oriented businesses, wildlife, soulful resorts, far away tours and travels, nature photographers can also use it. Multilingual plugins friendly, translation ready and WooCommerce friendly for eCommerce. Contact forms plugin friendly for call to action. SEO friendly. It has a ready to import 63+ Elementor templates for additional designs.','skt-gardening-lite'); ?></p>
		  <a href="<?php echo esc_url(SKT_GARDENING_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo esc_url(SKT_GARDENING_LITE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-gardening-lite'); ?></a> | 
				<a href="<?php echo esc_url(SKT_GARDENING_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-gardening-lite'); ?></a> | 
				<a href="<?php echo esc_url(SKT_GARDENING_LITE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-gardening-lite'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_GARDENING_LITE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>