<?php 
	global $SMTheme;
	get_header(); 
?>
<div id='content'>
	<div class='container clearfix'>
		<?php get_sidebar('right'); ?>
		<?php get_sidebar('left'); ?>    
		<div class="main_content">
			<h2 class="page-title"><?php echo $SMTheme->_( 'errortext' ); ?></h2>
			<?php echo $SMTheme->_( 'errorsolution' ); ?>
        </div><!-- #content -->
    
	</div>
</div>
    <?php get_footer(); ?>