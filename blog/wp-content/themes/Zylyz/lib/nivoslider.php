<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed: 500
	});
});
</script>


<div id="nivo-cover">
	<?php $slide_count = get_option('zyl_slide_count'); ?>
	<?php $slide_cat = get_option('zyl_slide_cat');?>
	<?php $slide_type = get_option('zyl_slide_type');?>

<?php
if(get_option('zyl_slide_type') == "recipes") { ?>	
<div class="ribbon"></div>
<?php } else { ?>
<div class="pribbon"></div>
<?php } ?>
<div id="nivo-box">
		
	<div id="slider" class="nivoSlider">

	<?php 
		$my_query = new WP_Query('post_type='.$slide_type.'&category_name='.$slide_cat.'&showposts='.$slide_count.'');
		while ($my_query->have_posts()) : $my_query->the_post();
	?>

	<a href="<?php the_permalink() ?>"><img class="slideimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_image_url()?>&amp;h=300&amp;w=828&amp;zc=1" title=""/></a>
	
	<?php endwhile; ?>


	</div><!-- nivo-Slider -->
	
</div><!-- nivo-box -->
</div> <!-- nivo-cover -->