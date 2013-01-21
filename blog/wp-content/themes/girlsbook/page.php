<?php 
	global $SMTheme;
	get_header(); 
?>
<div id='content'>
	<div class='container clearfix'>
	
		<?php get_sidebar(); ?>    
		
		<div class="main_content">
			
			
			<?php get_template_part('theloop'); ?>
			
			<?php comments_template(); ?>
			
			<?php get_template_part('navigation'); ?>
        </div><!-- #content -->
        
                
	</div>
</div>
<?php get_footer(); ?>